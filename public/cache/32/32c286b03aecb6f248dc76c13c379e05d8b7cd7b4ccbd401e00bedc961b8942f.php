<?php

/* index.html.twig */
class __TwigTemplate_3fc72efb9c082eaf2b98b0e0f85b498a743e68eb0ac620d58d7ee748d03e7fb6 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\" dir=\"ltr\">
  <head>
    <meta charset=\"utf-8\">
    <title>";
        // line 5
        echo twig_escape_filter($this->env, ($context["sitetitle"] ?? null), "html", null, true);
        echo "</title>

    
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css\" integrity=\"sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS\" crossorigin=\"anonymous\">
  </head>
  <body>


    <!--
      BARRE DE NAVIGATION
    -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
      <a class=\"navbar-brand\" href=\"#\">Logo</a>

      <form class=\"form-inline my-2 my-lg-0\">
        <input class=\"form-control mr-sm-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">
        <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>
      </form>

      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>

      <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Login
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
              <a class=\"dropdown-item\" href=\"#\">login</a>
              <a class=\"dropdown-item\" href=\"#\">create account</a>
              <!-- <div class=\"dropdown-divider\"></div>
              <a class=\"dropdown-item\" href=\"#\">Something else here</a> -->
            </div>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link disabled\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>

    <header>



    </header>


  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.html.twig", "/home/www/ACCESS_CODE/Cafe Latte/projet_cine/public/tpl/index.html.twig");
    }
}
