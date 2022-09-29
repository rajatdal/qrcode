<?php

namespace Drupal\qrmanager\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation 'qrmanager'.
 *
 * @FieldType(
 *   id = "qrmanager",
 *   label = @Translation("QR manager"),
 *   description = @Translation("Field for generating QR codes from content entity."),
 *   default_widget = "qrmanager_widget",
 *   default_formatter = "qrmanager_formatter"
 * )
 */
class QRManagerItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
      'qrcode_plugin' => 'gchart',
    ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];
    $pluginDefinitions = \Drupal::service('plugin.manager.qrmanager')->getDefinitionsList();
    $elements['qrcode_plugin'] = [
      '#title' => $this->t('QR code service plugin'),
      '#type' => 'select',
      '#options' => $pluginDefinitions,
      '#default_value' => $this->getSetting('qrcode_plugin'),
      '#description' => $this->t('Service to use for QR code generation.'),
    ];
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['text'] = DataDefinition::create('string')
      ->setLabel(t('QR text'));
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'text' => [
          'type' => 'varchar',
          'length' => '255',
        ],
      ],
    ];
  }

}
