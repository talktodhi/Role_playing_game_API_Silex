<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_42423661d334aa4de637abada5b586c440b2b451e577c4046747502d995df332 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f6881e01e5ac5518a5d5791971a70c54b86825f4a00f082fd8be789234334021 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f6881e01e5ac5518a5d5791971a70c54b86825f4a00f082fd8be789234334021->enter($__internal_f6881e01e5ac5518a5d5791971a70c54b86825f4a00f082fd8be789234334021_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f6881e01e5ac5518a5d5791971a70c54b86825f4a00f082fd8be789234334021->leave($__internal_f6881e01e5ac5518a5d5791971a70c54b86825f4a00f082fd8be789234334021_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_11d5279ee4cf27c4ef39f69854fcb726187abbf1d7ed4ca3bba34a1bc6ab5639 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_11d5279ee4cf27c4ef39f69854fcb726187abbf1d7ed4ca3bba34a1bc6ab5639->enter($__internal_11d5279ee4cf27c4ef39f69854fcb726187abbf1d7ed4ca3bba34a1bc6ab5639_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_11d5279ee4cf27c4ef39f69854fcb726187abbf1d7ed4ca3bba34a1bc6ab5639->leave($__internal_11d5279ee4cf27c4ef39f69854fcb726187abbf1d7ed4ca3bba34a1bc6ab5639_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_db51554cc5a3a28eabdff333f20468ce5002193773640124be4f62af37c2986b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_db51554cc5a3a28eabdff333f20468ce5002193773640124be4f62af37c2986b->enter($__internal_db51554cc5a3a28eabdff333f20468ce5002193773640124be4f62af37c2986b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_db51554cc5a3a28eabdff333f20468ce5002193773640124be4f62af37c2986b->leave($__internal_db51554cc5a3a28eabdff333f20468ce5002193773640124be4f62af37c2986b_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_f3de6fbe1b61b830f6a8df85fdd173f66256af5306b69ed56cd8fd83364e2f50 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f3de6fbe1b61b830f6a8df85fdd173f66256af5306b69ed56cd8fd83364e2f50->enter($__internal_f3de6fbe1b61b830f6a8df85fdd173f66256af5306b69ed56cd8fd83364e2f50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_f3de6fbe1b61b830f6a8df85fdd173f66256af5306b69ed56cd8fd83364e2f50->leave($__internal_f3de6fbe1b61b830f6a8df85fdd173f66256af5306b69ed56cd8fd83364e2f50_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\TwigBundle\\Resources\\views\\Exception\\exception_full.html.twig");
    }
}
