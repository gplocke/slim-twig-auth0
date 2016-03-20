<?php

/* backend/content/dashboard.twig */
class __TwigTemplate_3c29502d6bbff0c63c2f1d58c4effbceab4749d77da6c66d0215a48dca6b91e3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((isset($context["message"]) ? $context["message"] : null)) {
            // line 2
            echo "
    ";
            // line 3
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "

";
        }
        // line 6
        echo "

<h1>Hello, ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1>
<hr>
<p>There are : ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["user"]) ? $context["user"] : null), "html", null, true);
        echo " accounts registered !</p>
<hr>
<p>";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["time"]) ? $context["time"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["ip"]) ? $context["ip"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["csrf_name"]) ? $context["csrf_name"] : null), "html", null, true);
        echo " : ";
        echo twig_escape_filter($this->env, (isset($context["csrf_value"]) ? $context["csrf_value"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["random"]) ? $context["random"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["PUBLIC_DIR"]) ? $context["PUBLIC_DIR"] : null), "html", null, true);
        echo "</p>";
    }

    public function getTemplateName()
    {
        return "backend/content/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 16,  58 => 15,  52 => 14,  48 => 13,  44 => 12,  39 => 10,  34 => 8,  30 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if message %}*/
/* */
/*     {{ message }}*/
/* */
/* {% endif %}*/
/* */
/* */
/* <h1>Hello, {{ name }}</h1>*/
/* <hr>*/
/* <p>There are : {{ user }} accounts registered !</p>*/
/* <hr>*/
/* <p>{{ time }}</p>*/
/* <p>{{ ip }}</p>*/
/* <p>{{ csrf_name }} : {{ csrf_value }}</p>*/
/* <p>{{ random }}</p>*/
/* <p>{{ PUBLIC_DIR }}</p>*/
