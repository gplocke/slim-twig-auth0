<?php

/* frontend/content/homepage.twig */
class __TwigTemplate_1d633d95d8ece496093cc3f110b3f2632fcd0ba1c9a48f0e9aac7d963660ccd6 extends Twig_Template
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
        echo "<h1>Hello, ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1>
<hr>
<p>";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["time"]) ? $context["time"] : null), "html", null, true);
        echo "</p>";
    }

    public function getTemplateName()
    {
        return "frontend/content/homepage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  19 => 1,);
    }
}
/* <h1>Hello, {{ name }}</h1>*/
/* <hr>*/
/* <p>{{ time }}</p>*/
