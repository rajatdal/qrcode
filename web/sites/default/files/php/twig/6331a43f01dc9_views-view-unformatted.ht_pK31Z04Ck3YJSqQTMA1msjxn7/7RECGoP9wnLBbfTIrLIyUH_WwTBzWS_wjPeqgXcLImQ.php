<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/qrtheme/templates/views/views-view-unformatted.html.twig */
class __TwigTemplate_827d54e6691c73edca982f599a3b925a72994f78826beef5a8ed0d7439cc6aaa extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        if (($context["title"] ?? null)) {
            // line 19
            echo "  <h3>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 19, $this->source), "html", null, true);
            echo "</h3>
";
        }
        // line 21
        echo "
";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 23
            echo "\t";
            // line 24
            $context["row_classes"] = [0 => ((            // line 25
($context["default_row_class"] ?? null)) ? ("views-row") : ("")), 1 => "col-sm-12", 2 => "col-md-6", 3 => "col-lg-4"];
            // line 31
            echo "\t";
            $context["nid"] = twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 31)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#row"] ?? null) : null), "_entity", [], "any", false, false, true, 31), "nid", [], "any", false, false, true, 31)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "value", [], "any", false, false, true, 31);
            // line 32
            echo "\t<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 32), "addClass", [0 => ($context["row_classes"] ?? null)], "method", false, false, true, 32), 32, $this->source), "html", null, true);
            echo ">
\t<a href=\"/node/";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nid"] ?? null), 33, $this->source), "html", null, true);
            echo "\">
\t\t<div class=\"Product_card\">
\t\t\t<p><img src=\"";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 35)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#row"] ?? null) : null), "_entity", [], "any", false, false, true, 35), "field_image", [], "any", false, false, true, 35), "entity", [], "any", false, false, true, 35), "uri", [], "any", false, false, true, 35), "value", [], "any", false, false, true, 35), 35, $this->source)), "html", null, true);
            echo "\" alt=\"Girl in a jacket\" width=\"100%\">
\t\t\t</p>
\t\t\t<h4>";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 37)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["#row"] ?? null) : null), "_entity", [], "any", false, false, true, 37), "title", [], "any", false, false, true, 37)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[0] ?? null) : null), "value", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
            echo "</h4>
\t\t</div>
\t\t</a>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/custom/qrtheme/templates/views/views-view-unformatted.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 37,  72 => 35,  67 => 33,  62 => 32,  59 => 31,  57 => 25,  56 => 24,  54 => 23,  50 => 22,  47 => 21,  41 => 19,  39 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/qrtheme/templates/views/views-view-unformatted.html.twig", "C:\\mywork\\htdocs\\qrpro01\\web\\themes\\custom\\qrtheme\\templates\\views\\views-view-unformatted.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 18, "for" => 22, "set" => 24);
        static $filters = array("escape" => 19);
        static $functions = array("file_url" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape'],
                ['file_url']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
