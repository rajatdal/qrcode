<?php

namespace Drupal\qrmanager\Plugin\Field\FieldFormatter;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\qrmanager\Service\QRImageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Base class for qrmanagerFormatter plugins.
 */
abstract class QRManagerFormatterBase extends FormatterBase {

  use StringTranslationTrait;

  /**
   * QR image service.
   *
   * @var \Drupal\qrmanager\Service\QRImageInterface
   */
  protected $qrImage;

  /**
   * Plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $pluginManager;

  /**
   * Constructs a FormatterBase object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param \Drupal\qrmanager\Service\QRImageInterface $qrImage
   *   QR image service.
   * @param \Drupal\Component\Plugin\PluginManagerInterface $pluginManager
   *   Plugin manager.
   */
  public function __construct(
    $plugin_id,
    $plugin_definition,
    FieldDefinitionInterface $field_definition,
    array $settings,
    $label,
    $view_mode,
    array $third_party_settings,
    QRImageInterface $qrImage,
    PluginManagerInterface $pluginManager) {
    parent::__construct(
      $plugin_id,
      $plugin_definition,
      $field_definition,
      $settings,
      $label,
      $view_mode,
      $third_party_settings
    );
    $this->fieldDefinition = $field_definition;
    $this->settings = $settings;
    $this->label = $label;
    $this->viewMode = $view_mode;
    $this->thirdPartySettings = $third_party_settings;
    $this->qrImage = $qrImage;
    $this->pluginManager = $pluginManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('qrmanager.qrimage'),
      $container->get('plugin.manager.qrmanager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'image' => [
        'width' => 100,
        'height' => 100,
      ],
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);
    $elements['image']['width'] = [
      '#title' => $this->t('Width'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('image')['width'],
    ];
    $elements['image']['height'] = [
      '#title' => $this->t('Height'),
      '#type' => 'number',
      '#default_value' => $this->getSetting('image')['height'],
    ];
    $activePluginDefinition = $this->pluginManager->getDefinition($this->getFieldSetting('qrcode_plugin'));
    $elements['plugin'] = [
      '#type' => 'select',
      '#title' => $this->t('QR code service plugin'),
      '#description' => $this->t('Plugin can be changed at field settings form'),
      '#options' => [
        $activePluginDefinition['label'],
      ],
      '#disabled' => TRUE,
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $activePluginDefinition = $this->pluginManager->getDefinition($this->getFieldSetting('qrcode_plugin'));
    $summary['plugin'] = $this->t('QR image service: @name', [
      '@name' => $activePluginDefinition['label'],
    ]);
    $summary['dimensions'] = $this->t('QR image dimension: @widthx@height', [
      '@width' => $this->getSetting('image')['width'],
      '@height' => $this->getSetting('image')['height'],
    ]);
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $imageWidth = $this->getSetting('image')['width'];
    $imageHeight = $this->getSetting('image')['width'];
    $qrImageActivePlugin = $this->getFieldSetting('qrcode_plugin');
    $targetEntity = $items->getEntity();
    $targetEntityType = $items->getFieldDefinition()->getTargetEntityTypeId();

    /** @var \Drupal\Core\Field\FieldItemInterface $item */
    foreach ($items as $delta => $item) {
      $image = $this->qrImage->setPlugin($qrImageActivePlugin)
        ->build([
          'text' => $item->get('text')->getValue(),
          'objects' => [$targetEntityType => $targetEntity],
        ],
        $imageWidth,
        $imageHeight
      );
      $elements[$delta]['image'] = $image;
    }

    return $elements;
  }

}
