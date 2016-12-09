<?php

/* game/profile.html.twig */
class __TwigTemplate_54bb42f5a1cde6f4aebc974ae3ba7baf6b5ffbb8d01ee8a2dc872f6710db6e03 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "game/profile.html.twig", 1);
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
        $__internal_b56efdb1649b48caefd911104be85e1204cced294c5b15e35e90962ad83e1783 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b56efdb1649b48caefd911104be85e1204cced294c5b15e35e90962ad83e1783->enter($__internal_b56efdb1649b48caefd911104be85e1204cced294c5b15e35e90962ad83e1783_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "game/profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b56efdb1649b48caefd911104be85e1204cced294c5b15e35e90962ad83e1783->leave($__internal_b56efdb1649b48caefd911104be85e1204cced294c5b15e35e90962ad83e1783_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_16564f4787e185b3a8e59e809d450b522b91685e6b334bccd9ba6d6b9273bf7a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_16564f4787e185b3a8e59e809d450b522b91685e6b334bccd9ba6d6b9273bf7a->enter($__internal_16564f4787e185b3a8e59e809d450b522b91685e6b334bccd9ba6d6b9273bf7a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <p style='text-align:center;'>Profile</p>
            <div class='centerDiv' style='width:300px;text-align:left;'>
            \t<label style='width:7em;'>Username:</label>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "username", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Level:</label>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "level", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Exp:</label>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "exp", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Health:</label>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "health", array(), "array"), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "max_health", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Money:</label>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "money", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Strength:</label>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "strength", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Intelligence:</label>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "intelligence", array(), "array"), "html", null, true);
        echo "<br />
\t\t<label style='width:7em;'>Endurance:</label>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userData"]) ? $context["userData"] : $this->getContext($context, "userData")), "endurance", array(), "array"), "html", null, true);
        echo "<br />
                
            
            </div>
            <div class='centerDiv' style='width:300px;text-align:left;'>
                <br/><br/>
                <table class='centerDiv' style='width:500px;'>
                    <tr>
                        <th style='width:30%;'>Attack Name</th>
                        <th style='width:20%;'>Type</th>
                    </tr>
                        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attacks"]) ? $context["attacks"] : $this->getContext($context, "attacks")));
        foreach ($context['_seq'] as $context["attackKey"] => $context["attackArr"]) {
            // line 24
            echo "                            <tr>
                                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["attackArr"], "name", array(), "array"), "html", null, true);
            echo "</td>
                                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["attackArr"], "type", array(), "array"), "html", null, true);
            echo "</td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attackKey'], $context['attackArr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </table>
            </div>
";
        
        $__internal_16564f4787e185b3a8e59e809d450b522b91685e6b334bccd9ba6d6b9273bf7a->leave($__internal_16564f4787e185b3a8e59e809d450b522b91685e6b334bccd9ba6d6b9273bf7a_prof);

    }

    // line 33
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_46381cbf3a18bf9920ff75df579d089309f875af0f6be1b2cd616d1625af8da8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_46381cbf3a18bf9920ff75df579d089309f875af0f6be1b2cd616d1625af8da8->enter($__internal_46381cbf3a18bf9920ff75df579d089309f875af0f6be1b2cd616d1625af8da8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 34
        echo "    
";
        
        $__internal_46381cbf3a18bf9920ff75df579d089309f875af0f6be1b2cd616d1625af8da8->leave($__internal_46381cbf3a18bf9920ff75df579d089309f875af0f6be1b2cd616d1625af8da8_prof);

    }

    public function getTemplateName()
    {
        return "game/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 34,  118 => 33,  109 => 29,  100 => 26,  96 => 25,  93 => 24,  89 => 23,  75 => 12,  71 => 11,  67 => 10,  63 => 9,  57 => 8,  53 => 7,  49 => 6,  45 => 5,  41 => 3,  35 => 2,  11 => 1,);
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
    <p style='text-align:center;'>Profile</p>
            <div class='centerDiv' style='width:300px;text-align:left;'>
            \t<label style='width:7em;'>Username:</label>{{ userData['username'] }}<br />
\t\t<label style='width:7em;'>Level:</label>{{ userData['level'] }}<br />
\t\t<label style='width:7em;'>Exp:</label>{{ userData['exp'] }}<br />
\t\t<label style='width:7em;'>Health:</label>{{ userData['health'] }} / {{ userData['max_health'] }}<br />
\t\t<label style='width:7em;'>Money:</label>{{ userData['money'] }}<br />
\t\t<label style='width:7em;'>Strength:</label>{{ userData['strength'] }}<br />
\t\t<label style='width:7em;'>Intelligence:</label>{{ userData['intelligence'] }}<br />
\t\t<label style='width:7em;'>Endurance:</label>{{ userData['endurance'] }}<br />
                
            
            </div>
            <div class='centerDiv' style='width:300px;text-align:left;'>
                <br/><br/>
                <table class='centerDiv' style='width:500px;'>
                    <tr>
                        <th style='width:30%;'>Attack Name</th>
                        <th style='width:20%;'>Type</th>
                    </tr>
                        {% for attackKey,attackArr in attacks %}
                            <tr>
                                <td>{{ attackArr['name'] }}</td>
                                <td>{{ attackArr['type'] }}</td>
                            </tr>
                        {% endfor %}
                </table>
            </div>
{% endblock %}

{% block stylesheets %}
    
{% endblock %}
", "game/profile.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\app\\Resources\\views\\game\\profile.html.twig");
    }
}
