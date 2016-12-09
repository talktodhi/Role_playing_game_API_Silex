<?php

/* base.html.twig */
class __TwigTemplate_99dfe2770a24bea6dffbf118e925984b58777fdcc3557352ba8047889d5d1426 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cd965d60dbeb8e04833bd1cd5e7a8585bd082d0b1cb0df29627b6a3b2f6faf0e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd965d60dbeb8e04833bd1cd5e7a8585bd082d0b1cb0df29627b6a3b2f6faf0e->enter($__internal_cd965d60dbeb8e04833bd1cd5e7a8585bd082d0b1cb0df29627b6a3b2f6faf0e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
            <title>Warriors of Magic</title>
            <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("game/style/layout.css"), "html", null, true);
        echo "\">
    </head>
   <body>
        <h3>Warriors of Magic</h3>
        <div id='content'>
        ";
        // line 10
        if (((isset($context["showMenu"]) ? $context["showMenu"] : $this->getContext($context, "showMenu")) == "1")) {
            echo "    
        <div id='menu'>
            <ul>
                <li><a href=\"";
            // line 13
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_profile");
            echo "\">Profile</a></li>
                <li><a href=\"";
            // line 14
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_warArea");
            echo "\">War Arena</a></li>
                <li><a href=\"";
            // line 15
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_attackShop");
            echo "\">Attack Shop</a></li>
                <li><a href=\"";
            // line 16
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_healingShop");
            echo "\">Healing Shop</a></li>
                <li><a href=\"";
            // line 17
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_createMonster");
            echo "\">Create Monster</a></li>
                <li><a href=\"";
            // line 18
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_createAttack");
            echo "\">Create Attack</a></li>
                <li><a href=\"";
            // line 19
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_do_logout");
            echo "\">Logout</a></li>
            </ul>
        </div>
        ";
        }
        // line 23
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 24
        echo "        </div>
    </body>
    ";
        // line 26
        $this->displayBlock('javascripts', $context, $blocks);
        // line 37
        echo "</html>
";
        
        $__internal_cd965d60dbeb8e04833bd1cd5e7a8585bd082d0b1cb0df29627b6a3b2f6faf0e->leave($__internal_cd965d60dbeb8e04833bd1cd5e7a8585bd082d0b1cb0df29627b6a3b2f6faf0e_prof);

    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        $__internal_57bcb82b01e7401fa55c5e24ca29b14ca21e139553a749017eddeb21a256fe1a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_57bcb82b01e7401fa55c5e24ca29b14ca21e139553a749017eddeb21a256fe1a->enter($__internal_57bcb82b01e7401fa55c5e24ca29b14ca21e139553a749017eddeb21a256fe1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_57bcb82b01e7401fa55c5e24ca29b14ca21e139553a749017eddeb21a256fe1a->leave($__internal_57bcb82b01e7401fa55c5e24ca29b14ca21e139553a749017eddeb21a256fe1a_prof);

    }

    // line 26
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_24d58b2867c6cb1c5bf3a5974debb6eb9021e8c25d8eb9f83e45fba020661d1d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_24d58b2867c6cb1c5bf3a5974debb6eb9021e8c25d8eb9f83e45fba020661d1d->enter($__internal_24d58b2867c6cb1c5bf3a5974debb6eb9021e8c25d8eb9f83e45fba020661d1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 27
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("game/js/jquery.js"), "html", null, true);
        echo "\"></script>
        <script>
            \$(\"input.numbers\").keypress(function(event) {
                return (/\\d/.test(String.fromCharCode(event.which) ))
            });
            //\$('input.numbers').live('keyup', function(e) {
            //    \$(this).val(\$(this).val().replace(/[^0-9]/g, ''));
            //});
        </script>
    ";
        
        $__internal_24d58b2867c6cb1c5bf3a5974debb6eb9021e8c25d8eb9f83e45fba020661d1d->leave($__internal_24d58b2867c6cb1c5bf3a5974debb6eb9021e8c25d8eb9f83e45fba020661d1d_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 27,  103 => 26,  92 => 23,  84 => 37,  82 => 26,  78 => 24,  75 => 23,  68 => 19,  64 => 18,  60 => 17,  56 => 16,  52 => 15,  48 => 14,  44 => 13,  38 => 10,  30 => 5,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
            <title>Warriors of Magic</title>
            <link rel=\"stylesheet\" href=\"{{ asset('game/style/layout.css') }}\">
    </head>
   <body>
        <h3>Warriors of Magic</h3>
        <div id='content'>
        {% if showMenu == '1' %}    
        <div id='menu'>
            <ul>
                <li><a href=\"{{ path('wargame_profile') }}\">Profile</a></li>
                <li><a href=\"{{ path('wargame_warArea') }}\">War Arena</a></li>
                <li><a href=\"{{ path('wargame_attackShop') }}\">Attack Shop</a></li>
                <li><a href=\"{{ path('wargame_healingShop') }}\">Healing Shop</a></li>
                <li><a href=\"{{ path('wargame_createMonster') }}\">Create Monster</a></li>
                <li><a href=\"{{ path('wargame_createAttack') }}\">Create Attack</a></li>
                <li><a href=\"{{ path('wargame_do_logout') }}\">Logout</a></li>
            </ul>
        </div>
        {% endif %}
        {% block body %}{% endblock %}
        </div>
    </body>
    {% block javascripts %}
        <script src=\"{{ asset('game/js/jquery.js') }}\"></script>
        <script>
            \$(\"input.numbers\").keypress(function(event) {
                return (/\\d/.test(String.fromCharCode(event.which) ))
            });
            //\$('input.numbers').live('keyup', function(e) {
            //    \$(this).val(\$(this).val().replace(/[^0-9]/g, ''));
            //});
        </script>
    {% endblock %}
</html>
", "base.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\app\\Resources\\views\\base.html.twig");
    }
}
