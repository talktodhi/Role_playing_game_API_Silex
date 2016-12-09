<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_f2d33b21d1acece01cd7baa61fb539ed45c97586cd246c48410956892c3f3651 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_6a220b762a7a16b331c2952d6a68d551fef436f1eb8bfdf1117681e700ecc046 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6a220b762a7a16b331c2952d6a68d551fef436f1eb8bfdf1117681e700ecc046->enter($__internal_6a220b762a7a16b331c2952d6a68d551fef436f1eb8bfdf1117681e700ecc046_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6a220b762a7a16b331c2952d6a68d551fef436f1eb8bfdf1117681e700ecc046->leave($__internal_6a220b762a7a16b331c2952d6a68d551fef436f1eb8bfdf1117681e700ecc046_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_55f83bc0f1d48abbfa08f218380b5c73ba2deaacf05a5852ece79537c103df24 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_55f83bc0f1d48abbfa08f218380b5c73ba2deaacf05a5852ece79537c103df24->enter($__internal_55f83bc0f1d48abbfa08f218380b5c73ba2deaacf05a5852ece79537c103df24_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_55f83bc0f1d48abbfa08f218380b5c73ba2deaacf05a5852ece79537c103df24->leave($__internal_55f83bc0f1d48abbfa08f218380b5c73ba2deaacf05a5852ece79537c103df24_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_08391550736f7bb2895265027ba2a6b9fe30b759ee9cffc868e5897f31a0b7c3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_08391550736f7bb2895265027ba2a6b9fe30b759ee9cffc868e5897f31a0b7c3->enter($__internal_08391550736f7bb2895265027ba2a6b9fe30b759ee9cffc868e5897f31a0b7c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_08391550736f7bb2895265027ba2a6b9fe30b759ee9cffc868e5897f31a0b7c3->leave($__internal_08391550736f7bb2895265027ba2a6b9fe30b759ee9cffc868e5897f31a0b7c3_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_711861287af273ad58d6e2f44ff32cf325a08ff732f452b0351dad4bf427bb05 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_711861287af273ad58d6e2f44ff32cf325a08ff732f452b0351dad4bf427bb05->enter($__internal_711861287af273ad58d6e2f44ff32cf325a08ff732f452b0351dad4bf427bb05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_711861287af273ad58d6e2f44ff32cf325a08ff732f452b0351dad4bf427bb05->leave($__internal_711861287af273ad58d6e2f44ff32cf325a08ff732f452b0351dad4bf427bb05_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
