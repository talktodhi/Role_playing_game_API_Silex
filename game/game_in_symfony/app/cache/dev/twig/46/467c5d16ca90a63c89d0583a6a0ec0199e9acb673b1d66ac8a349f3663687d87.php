<?php

/* game/createAttack.html.twig */
class __TwigTemplate_f4bb5e0508537520d65fc2857774fc3e1f41ace7889e9e132efc593bd81c006c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "game/createAttack.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e3dbe8b42c7efb9089ddfaada764a77c6fabd5c404de62fa85c451729d24c7b4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e3dbe8b42c7efb9089ddfaada764a77c6fabd5c404de62fa85c451729d24c7b4->enter($__internal_e3dbe8b42c7efb9089ddfaada764a77c6fabd5c404de62fa85c451729d24c7b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "game/createAttack.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e3dbe8b42c7efb9089ddfaada764a77c6fabd5c404de62fa85c451729d24c7b4->leave($__internal_e3dbe8b42c7efb9089ddfaada764a77c6fabd5c404de62fa85c451729d24c7b4_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_4de9b93fcab0e26e1fabc3fefc7259fe93c385fb177832dec4231f5527201391 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4de9b93fcab0e26e1fabc3fefc7259fe93c385fb177832dec4231f5527201391->enter($__internal_4de9b93fcab0e26e1fabc3fefc7259fe93c385fb177832dec4231f5527201391_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "    <div class='formContainer centerDiv' style='width:300px;text-align:left;'>
        <form id=\"attackForm\" method='POST'>
            <label style='width:6em;'>Name:</label><input type='text' name='name' /><br />
            <label style='width:6em;'>Combat Text:</label><input type='text' name='combat_text' /><br />
            <label style='width:6em;'>Type:</label>
                <select name='type'>
                    <option value='melee'>Melee</option>
                    <option value='magic'>Magic</option>
                </select><br />
            <label style='width:6em;'>Power:</label><input class=\"numbers\" value=\"5\" type='number' name='power' /><br />
            <label style='width:6em;'>Purchase Cost:</label><input class=\"numbers\" value=\"5\" type='number' name='purchase_cost' /><br />
            <input type='button' onClick=\"createAttack();\" name='create_attack' value='Create Attack' />
        </form>
    </div>
    
<script>
function createAttack(){
    
    if(\$.trim(\$(\"input[name='name']\").val()) == ''){
        alert('Name cannot be left blank.');
        return false;
    }
    
    if(\$.trim(\$(\"input[name='combat_text']\").val()) == ''){
        alert('Combat text cannot be left blank.');
        return false;
    }

    \$.ajax({
       type:    'POST',
       async:   false,
       url:     '";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("wargame_insertAttack");
        echo "',
       data:    \$('#attackForm').serialize(),
       success: function(data) {
                var newdata =   data.split(\"--\");
                if(newdata[0] == 'id'){
                    alert('Attcak created succesfully');
                    location.replace(location.pathname);
                }
                if(newdata[0] == 'error'){
                    alert(\"Alert: \"+newdata[1]);
                    location.reload();
                }
                
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
           window.send_request_data=\"Ajax Error found-: \\n \\n\"+XMLHttpRequest.responseText;
           console.log(\"Ajax Error found-: \\n \\n\"+XMLHttpRequest.responseText);
       }
    });
}

</script>
";
        
        $__internal_4de9b93fcab0e26e1fabc3fefc7259fe93c385fb177832dec4231f5527201391->leave($__internal_4de9b93fcab0e26e1fabc3fefc7259fe93c385fb177832dec4231f5527201391_prof);

    }

    public function getTemplateName()
    {
        return "game/createAttack.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 34,  40 => 3,  34 => 2,  11 => 1,);
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
    <div class='formContainer centerDiv' style='width:300px;text-align:left;'>
        <form id=\"attackForm\" method='POST'>
            <label style='width:6em;'>Name:</label><input type='text' name='name' /><br />
            <label style='width:6em;'>Combat Text:</label><input type='text' name='combat_text' /><br />
            <label style='width:6em;'>Type:</label>
                <select name='type'>
                    <option value='melee'>Melee</option>
                    <option value='magic'>Magic</option>
                </select><br />
            <label style='width:6em;'>Power:</label><input class=\"numbers\" value=\"5\" type='number' name='power' /><br />
            <label style='width:6em;'>Purchase Cost:</label><input class=\"numbers\" value=\"5\" type='number' name='purchase_cost' /><br />
            <input type='button' onClick=\"createAttack();\" name='create_attack' value='Create Attack' />
        </form>
    </div>
    
<script>
function createAttack(){
    
    if(\$.trim(\$(\"input[name='name']\").val()) == ''){
        alert('Name cannot be left blank.');
        return false;
    }
    
    if(\$.trim(\$(\"input[name='combat_text']\").val()) == ''){
        alert('Combat text cannot be left blank.');
        return false;
    }

    \$.ajax({
       type:    'POST',
       async:   false,
       url:     '{{ path('wargame_insertAttack') }}',
       data:    \$('#attackForm').serialize(),
       success: function(data) {
                var newdata =   data.split(\"--\");
                if(newdata[0] == 'id'){
                    alert('Attcak created succesfully');
                    location.replace(location.pathname);
                }
                if(newdata[0] == 'error'){
                    alert(\"Alert: \"+newdata[1]);
                    location.reload();
                }
                
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
           window.send_request_data=\"Ajax Error found-: \\n \\n\"+XMLHttpRequest.responseText;
           console.log(\"Ajax Error found-: \\n \\n\"+XMLHttpRequest.responseText);
       }
    });
}

</script>
{% endblock %}
", "game/createAttack.html.twig", "C:\\xampp\\htdocs\\game\\game_in_symfony\\app\\Resources\\views\\game\\createAttack.html.twig");
    }
}
