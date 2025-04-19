<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* body.twig */
class __TwigTemplate_2408d236505900f40f91f92d2b44dc77 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html dir=\"ltr\" lang=\"es\">

<head>
    <meta charset=\"utf-8\">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name=\"robots\" content=\"noindex,nofollow\" />
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/favicon.png\" type=\"image/png\">
    <title>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Sistema"] ?? null), "html", null, true);
        yield "</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/font-awesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/DataTables/datatables.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["style"] ?? null), "html", null, true);
        yield "\" rel=\"stylesheet\">
</head>

<body class=\"sb-nav-fixed\">
    <div class=\"preloader\">
        <div class=\"loader\"></div>
    </div>
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <a class=\"navbar-brand ps-3\" href=\"./\">";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Sistema"] ?? null), "html", null, true);
        yield "</a>
        <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i class=\"fas fa-bars\"></i></button>
        <ul class=\"navbar-nav ms-auto me-0 me-md-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Activity Log</a></li>
                    <li><hr class=\"dropdown-divider\" /></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id=\"layoutSidenav\">
        <div id=\"layoutSidenav_nav\">
            <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
                <div class=\"sb-sidenav-menu\">
                    <div class=\"nav\">
                        <div class=\"sb-sidenav-menu-heading\"></div>
                        <a class=\"nav-link\" href=\"./\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-house\"></i></div>
                            Inicio
                        </a>
                        <a class=\"nav-link\" href=\"?mod=marcas\" mod=\"MARCAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-handshake\"></i></div>
                            Marcas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=categorias\" mod=\"CATEGORIAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-list\"></i></div>
                            Categorias
                        </a>
                        <a class=\"nav-link\" href=\"?mod=productos\" mod=\"PRODUCTOS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fas fa-code-branch\"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id=\"layoutSidenav_content\">
            <main>
                ";
        // line 66
        yield from $this->loadTemplate(($context["contenido"] ?? null), "body.twig", 66)->unwrap()->yield($context);
        // line 67
        yield "            </main>
            <footer class=\"py-4 bg-light mt-auto\">
                <div class=\"container-fluid px-4\">
                    <div class=\"d-flex align-items-center justify-content-between small\">
                        <div class=\"text-muted\">2024 Representaciones JCE &copy; Todos los derechos reservados.</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src=\"../js/vendor/jquery/jquery-3.7.1.min.js\"></script>
    <script src=\"../js/vendor/bootstrap/bootstrap.bundle.min.js\"></script>
    <script src=\"../js/vendor/popper/popper.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/DataTables/datatables.min.js\"></script>
    <script src=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["functions"] ?? null), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["init"] ?? null), "html", null, true);
        yield "\"></script>
    ";
        // line 84
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 85
        yield "</body>
</html>";
        yield from [];
    }

    // line 84
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "body.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  154 => 84,  148 => 85,  146 => 84,  142 => 83,  138 => 82,  121 => 67,  119 => 66,  74 => 24,  63 => 16,  56 => 12,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html dir=\"ltr\" lang=\"es\">

<head>
    <meta charset=\"utf-8\">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name=\"robots\" content=\"noindex,nofollow\" />
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/favicon.png\" type=\"image/png\">
    <title>{{ Sistema }}</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/font-awesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/DataTables/datatables.min.css\" rel=\"stylesheet\">
    <link href=\"{{ style }}\" rel=\"stylesheet\">
</head>

<body class=\"sb-nav-fixed\">
    <div class=\"preloader\">
        <div class=\"loader\"></div>
    </div>
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <a class=\"navbar-brand ps-3\" href=\"./\">{{ Sistema }}</a>
        <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i class=\"fas fa-bars\"></i></button>
        <ul class=\"navbar-nav ms-auto me-0 me-md-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Activity Log</a></li>
                    <li><hr class=\"dropdown-divider\" /></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id=\"layoutSidenav\">
        <div id=\"layoutSidenav_nav\">
            <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
                <div class=\"sb-sidenav-menu\">
                    <div class=\"nav\">
                        <div class=\"sb-sidenav-menu-heading\"></div>
                        <a class=\"nav-link\" href=\"./\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-house\"></i></div>
                            Inicio
                        </a>
                        <a class=\"nav-link\" href=\"?mod=marcas\" mod=\"MARCAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-handshake\"></i></div>
                            Marcas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=categorias\" mod=\"CATEGORIAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-list\"></i></div>
                            Categorias
                        </a>
                        <a class=\"nav-link\" href=\"?mod=productos\" mod=\"PRODUCTOS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fas fa-code-branch\"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id=\"layoutSidenav_content\">
            <main>
                {% include contenido %}
            </main>
            <footer class=\"py-4 bg-light mt-auto\">
                <div class=\"container-fluid px-4\">
                    <div class=\"d-flex align-items-center justify-content-between small\">
                        <div class=\"text-muted\">2024 Representaciones JCE &copy; Todos los derechos reservados.</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src=\"../js/vendor/jquery/jquery-3.7.1.min.js\"></script>
    <script src=\"../js/vendor/bootstrap/bootstrap.bundle.min.js\"></script>
    <script src=\"../js/vendor/popper/popper.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/DataTables/datatables.min.js\"></script>
    <script src=\"{{ functions }}\"></script>
    <script src=\"{{ init }}\"></script>
    {% block scripts %}{% endblock %}
</body>
</html>", "body.twig", "C:\\laragon\\www\\jce\\adm\\views\\body.twig");
    }
}
