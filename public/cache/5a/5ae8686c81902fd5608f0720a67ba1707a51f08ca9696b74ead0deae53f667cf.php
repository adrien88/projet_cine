<?php

/* test.html.twig */
class __TwigTemplate_587598cf4c218878f7f80be4c1aa08b6cf8ef5b2a727b9cc145e22a7d4f9329b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<html>
  <h1>";
        // line 2
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</h1>

</html>
";
    }

    public function getTemplateName()
    {
        return "test.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "test.html.twig", "/home/www/ACCESS_CODE/Cafe Latte/projet_cine/public/tpl/test.html.twig");
    }
}
