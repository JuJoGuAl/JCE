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

/* @views/body.twig */
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
            'content' => [$this, 'block_content'],
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
    <link rel=\"icon\" href=\"../favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"../favicon.png\" type=\"image/png\">
    <title>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Sistema"] ?? null), "html", null, true);
        yield "</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/fontawesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/DataTables/datatables.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/tom-select/tom-select.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/tom-select/tom-select.bootstrap5.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/dropzone/dropzone.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["style"] ?? null), "html", null, true);
        yield "\" rel=\"stylesheet\">
</head>

<body class=\"sb-nav-fixed\">
    <div class=\"preloader\">
        <div class=\"loader\"></div>
    </div>
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <a class=\"navbar-brand ps-3\" href=\"./\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Sistema"] ?? null), "html", null, true);
        yield "</a>
        <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i
                class=\"fas fa-bars\"></i></button>
        <ul class=\"navbar-nav ms-auto me-0 me-md-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                    aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Activity Log</a></li>
                    <li>
                        <hr class=\"dropdown-divider\" />
                    </li>
                    <li><a id=\"btnSalir\" class=\"dropdown-item\" href=\"javascript:void(0)\">Salir</a></li>
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
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-trademark\"></i></div>
                            Marcas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=categorias\" mod=\"CATEGORIAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-tags\"></i></div>
                            Categorias
                        </a>
                        <a class=\"nav-link\" href=\"?mod=caracteristicas\" mod=\"CARACTERISTICAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-list-check\"></i></div>
                            Caracteristicas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=productos\" mod=\"PRODUCTOS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-box\"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id=\"layoutSidenav_content\">
            <main>
                <div class=\"container-fluid px-4\">
                    ";
        // line 78
        if (($context["module_titulo"] ?? null)) {
            // line 79
            yield "                    <h1 class=\"my-4\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_titulo"] ?? null), "html", null, true);
            yield "</h1>
                    ";
        }
        // line 81
        yield "                    ";
        if (($context["Message"] ?? null)) {
            // line 82
            yield "                    <div class=\"alert alert-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Type"] ?? null), "html", null, true);
            yield "\" role=\"alert\">
                        ";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Message"] ?? null), "html", null, true);
            yield "
                    </div>
                    ";
        }
        // line 86
        yield "                    ";
        if ((array_key_exists("mod_descrip", $context) && ($context["mod_descrip"] ?? null))) {
            // line 87
            yield "                    <div class=\"card mb-4\">
                        <div class=\"card-body\">
                            ";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_descrip"] ?? null), "html", null, true);
            yield "
                        </div>
                    </div>
                    ";
        }
        // line 93
        yield "                    ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 94
        yield "                </div>
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
    <script src=\"../js/vendor/fontawesome/all.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/DataTables/datatables.min.js\"></script>
    <script src=\"../js/vendor/tom-select/tom-select.complete.min.js\"></script>
    <script src=\"../js/vendor/dropzone/dropzone.min.js\"></script>
    <script src=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["functions"] ?? null), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["init"] ?? null), "html", null, true);
        yield "\"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnSalir = document.getElementById('btnSalir');

            btnSalir.addEventListener('click', async function () { 
                event.preventDefault();
                const url = `/src/Api/index.php?action=logout&entity=Usuarios`;
                const response = await fetchCall(url, 'GET');
                if (!response.isOk){
                    \$(\".preloader\").fadeOut();
                    if (response.Content == 0) {
                        //Session
                        document.location.href = \"./\";
                    }
                    dialog(response.Message, response.Type);
                    return;
                }
                document.location.href = \"./\";
            });
        } catch (error) {
            const mensaje = `Error al procesar la petición: \${error}`;
            dialog(mensaje, 'error');
        }
    });
    </script>
    ";
        // line 141
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 142
        yield "</body>

</html>";
        yield from [];
    }

    // line 93
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 141
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
        return "@views/body.twig";
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
        return array (  245 => 141,  235 => 93,  228 => 142,  226 => 141,  196 => 114,  192 => 113,  171 => 94,  168 => 93,  161 => 89,  157 => 87,  154 => 86,  148 => 83,  143 => 82,  140 => 81,  134 => 79,  132 => 78,  78 => 27,  67 => 19,  57 => 12,  44 => 1,);
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
    <link rel=\"icon\" href=\"../favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"../favicon.png\" type=\"image/png\">
    <title>{{ Sistema }}</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/fontawesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/DataTables/datatables.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/tom-select/tom-select.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/tom-select/tom-select.bootstrap5.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/dropzone/dropzone.min.css\" rel=\"stylesheet\">
    <link href=\"{{ style }}\" rel=\"stylesheet\">
</head>

<body class=\"sb-nav-fixed\">
    <div class=\"preloader\">
        <div class=\"loader\"></div>
    </div>
    <nav class=\"sb-topnav navbar navbar-expand navbar-dark bg-dark\">
        <a class=\"navbar-brand ps-3\" href=\"./\">{{ Sistema }}</a>
        <button class=\"btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0\" id=\"sidebarToggle\" href=\"#!\"><i
                class=\"fas fa-bars\"></i></button>
        <ul class=\"navbar-nav ms-auto me-0 me-md-3 me-lg-4\">
            <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                    aria-expanded=\"false\"><i class=\"fas fa-user fa-fw\"></i></a>
                <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"navbarDropdown\">
                    <li><a class=\"dropdown-item\" href=\"#!\">Settings</a></li>
                    <li><a class=\"dropdown-item\" href=\"#!\">Activity Log</a></li>
                    <li>
                        <hr class=\"dropdown-divider\" />
                    </li>
                    <li><a id=\"btnSalir\" class=\"dropdown-item\" href=\"javascript:void(0)\">Salir</a></li>
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
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-trademark\"></i></div>
                            Marcas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=categorias\" mod=\"CATEGORIAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-tags\"></i></div>
                            Categorias
                        </a>
                        <a class=\"nav-link\" href=\"?mod=caracteristicas\" mod=\"CARACTERISTICAS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-list-check\"></i></div>
                            Caracteristicas
                        </a>
                        <a class=\"nav-link\" href=\"?mod=productos\" mod=\"PRODUCTOS\">
                            <div class=\"sb-nav-link-icon\"><i class=\"fa-solid fa-box\"></i></div>
                            Productos
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id=\"layoutSidenav_content\">
            <main>
                <div class=\"container-fluid px-4\">
                    {% if module_titulo %}
                    <h1 class=\"my-4\">{{ module_titulo }}</h1>
                    {% endif %}
                    {% if Message %}
                    <div class=\"alert alert-{{ Type }}\" role=\"alert\">
                        {{ Message }}
                    </div>
                    {% endif %}
                    {% if mod_descrip is defined and mod_descrip %}
                    <div class=\"card mb-4\">
                        <div class=\"card-body\">
                            {{ mod_descrip }}
                        </div>
                    </div>
                    {% endif %}
                    {% block content %}{% endblock %}
                </div>
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
    <script src=\"../js/vendor/fontawesome/all.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/DataTables/datatables.min.js\"></script>
    <script src=\"../js/vendor/tom-select/tom-select.complete.min.js\"></script>
    <script src=\"../js/vendor/dropzone/dropzone.min.js\"></script>
    <script src=\"{{ functions }}\"></script>
    <script src=\"{{ init }}\"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnSalir = document.getElementById('btnSalir');

            btnSalir.addEventListener('click', async function () { 
                event.preventDefault();
                const url = `/src/Api/index.php?action=logout&entity=Usuarios`;
                const response = await fetchCall(url, 'GET');
                if (!response.isOk){
                    \$(\".preloader\").fadeOut();
                    if (response.Content == 0) {
                        //Session
                        document.location.href = \"./\";
                    }
                    dialog(response.Message, response.Type);
                    return;
                }
                document.location.href = \"./\";
            });
        } catch (error) {
            const mensaje = `Error al procesar la petición: \${error}`;
            dialog(mensaje, 'error');
        }
    });
    </script>
    {% block scripts %}{% endblock %}
</body>

</html>", "@views/body.twig", "C:\\laragon\\www\\jce\\adm\\views\\body.twig");
    }
}
