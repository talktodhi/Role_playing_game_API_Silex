<?php

/* game/index.html.twig */
class __TwigTemplate_f451fa10f100680db7417642a4dd0fbf965c3209c84dac297342d5d16f689743 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "game/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7175e23652cf230023fb9a5c81619f10e6116a418b3128c75ffcdd3dbaabbb05 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7175e23652cf230023fb9a5c81619f10e6116a418b3128c75ffcdd3dbaabbb05->enter($__internal_7175e23652cf230023fb9a5c81619f10e6116a418b3128c75ffcdd3dbaabbb05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "game/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7175e23652cf230023fb9a5c81619f10e6116a418b3128c75ffcdd3dbaabbb05->leave($__internal_7175e23652cf230023fb9a5c81619f10e6116a418b3128c75ffcdd3dbaabbb05_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_28ed65800e391165dcbdc02719c999c3a27a72c3b4539579eb6b7bed7c5011af = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_28ed65800e391165dcbdc02719c999c3a27a72c3b4539579eb6b7bed7c5011af->enter($__internal_28ed65800e391165dcbdc02719c999c3a27a72c3b4539579eb6b7bed7c5011af_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <p style='text-align:center;'>Login</p>
    ";
        // line 5
        if ($this->getAttribute((isset($context["userData"]) ? $context["userData"] : null), "error", array(), "array", true, true)) {
            // line 6
            echo "        <h4 style='text-align:center; color: yellow;'>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "error", array(), "array"), "html", null, true);
            echo "</h4>
    ";
        }
        // line 8
        echo "    <form action='";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_do_login");
        echo "' method='POST'>
        Username: <input type='text' required name='username' /><br /><br />
        Password: <input type='password' required name='password' /><br /><br />
        <input type='submit' name='login' value='Login' />
    </form>
";
        
        $__internal_28ed65800e391165dcbdc02719c999c3a27a72c3b4539579eb6b7bed7c5011af->leave($__internal_28ed65800e391165dcbdc02719c999c3a27a72c3b4539579eb6b7bed7c5011af_prof);

    }

    // line 15
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_fef20c2766573f8743b7739e208fe8d297f3f776bf4cdc512a28af1c46efed19 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fef20c2766573f8743b7739e208fe8d297f3f776bf4cdc512a28af1c46efed19->enter($__internal_fef20c2766573f8743b7739e208fe8d297f3f776bf4cdc512a28af1c46efed19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 16
        echo "    
";
        
        $__internal_fef20c2766573f8743b7739e208fe8d297f3f776bf4cdc512a28af1c46efed19->leave($__internal_fef20c2766573f8743b7739e208fe8d297f3f776bf4cdc512a28af1c46efed19_prof);

    }

    public function getTemplateName()
    {
        return "game/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 16,  66 => 15,  52 => 8,  46 => 6,  44 => 5,  41 => 4,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block body %}
    <p style='text-align:center;'>Login</p>
    {% if userData['error'] is defined %}
        <h4 style='text-align:center; color: yellow;'>{{ userData['error'] }}</h4>
    {% endif %}
    <form action='{{ path('wargame_do_login') }}' method='POST'>
        Username: <input type='text' required name='username' /><br /><br />
        Password: <input type='password' required name='password' /><br /><br />
        <input type='submit' name='login' value='Login' />
    </form>
{% endblock %}

{% block stylesheets %}
    
{% endblock %}
", "game/index.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\app\\Resources\\views\\game\\index.html.twig");
    }
}
