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

/* @views/login.twig */
class __TwigTemplate_a0017f07eca9fa786cc81cf8f0e5abb0 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html dir=\"ltr\" lang=\"es\">

<head>
    <meta charset=\"utf-8\" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name=\"robots\" content=\"noindex,nofollow\" />
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/favicon.png\" type=\"image/png\">
    <title>Login - ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["Sistema"] ?? null), "html", null, true);
        yield "</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/font-awesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["style"] ?? null), "html", null, true);
        yield "\" rel=\"stylesheet\">
</head>

<body>
    <div class=\"main-wrapper\">
        <div class=\"preloader\">
            <div class=\"loader\"></div>
        </div>
        <div class=\"auth-wrapper d-flex no-block justify-content-center align-items-center\" style=\"background:url(../images/bg/bg_01.jpg) no-repeat center center; background-size: cover;\">
            <div class=\"auth-box\">
                <div id=\"loginform\">
                    <div class=\"logo\">
                        <img src=\"../images/logo-black.png\" alt=\"logo\" width=\"200px\" />
                        <h4 class=\"fs-5 my-3\">Panel de Administración</h4>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-12\">
                            <form class=\"form-horizontal mt-3\" id=\"loginform\" action=\"./\">
                                <div class=\"input-group mb-3\">
                                    <input type=\"text\" id=\"user\" class=\"form-control\" placeholder=\"Usuario\" aria-label=\"Usuario\">
                                </div>
                                <div class=\"input-group mb-3\">
                                    <input type=\"password\" id=\"pass\" class=\"form-control\" placeholder=\"Password\" autocomplete=\"off\" aria-label=\"Password\">
                                </div>
                                <div class=\"form-group text-center\">
                                    <div class=\"col-xs-12 pb-3\">
                                        <div class=\"d-grid\">
                                            <button class=\"btn btn-lg btn-info\" type=\"submit\">Entrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=\"../js/vendor/jquery/jquery-3.7.1.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/popper/popper.min.js\"></script>
    <script src=\"../js/vendor/bootstrap/bootstrap.bundle.min.js\"></script>
    <script src=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["functions"] ?? null), "html", null, true);
        yield "\"></script>
    <script>
        \$(document).ready(function () {
            jQuery('.preloader').fadeOut();
        });
        jQuery(\"#loginform\").submit(async function (event) {
            try {
                event.preventDefault();
                clear_log();
                var username = \$('#user').val(), pass = \$('#pass').val();
                if (username == '') {
                    \$('#user').focus();
                    \$('#user').addClass(\"is-invalid\");
                    dialog(\"Debe ingresar el Usuario\", \"ERROR\");
                } else if (pass == '') {
                    \$('#pass').focus();
                    \$('#pass').addClass(\"is-invalid\");
                    dialog(\"Debe ingresar la Contraseña\", \"ERROR\");
                } else {
                    const requestData = {
                        username: username,
                        password: pass,
                        entity: 'Usuarios',
                        action: 'val_log'
                    };
                    const datas = await fetchCall(`/src/Api/Index.php`, 'POST', requestData);
                    if (!datas.isOk){
                        dialog(datas.Message, datas.Type);
                        return;
                    }
                    document.location.href = \"./\";
                }
                return false;
            } catch (error) {
                const mensaje = 'Error al procesar la petición: ' + error;
                dialog(mensaje, 'error');
            }
        });
    </script>
</body>

</html>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@views/login.twig";
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
        return array (  106 => 57,  61 => 15,  55 => 12,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html dir=\"ltr\" lang=\"es\">

<head>
    <meta charset=\"utf-8\" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name=\"robots\" content=\"noindex,nofollow\" />
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"/favicon.png\" type=\"image/png\">
    <title>Login - {{ Sistema }}</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/font-awesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"{{ style }}\" rel=\"stylesheet\">
</head>

<body>
    <div class=\"main-wrapper\">
        <div class=\"preloader\">
            <div class=\"loader\"></div>
        </div>
        <div class=\"auth-wrapper d-flex no-block justify-content-center align-items-center\" style=\"background:url(../images/bg/bg_01.jpg) no-repeat center center; background-size: cover;\">
            <div class=\"auth-box\">
                <div id=\"loginform\">
                    <div class=\"logo\">
                        <img src=\"../images/logo-black.png\" alt=\"logo\" width=\"200px\" />
                        <h4 class=\"fs-5 my-3\">Panel de Administración</h4>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-12\">
                            <form class=\"form-horizontal mt-3\" id=\"loginform\" action=\"./\">
                                <div class=\"input-group mb-3\">
                                    <input type=\"text\" id=\"user\" class=\"form-control\" placeholder=\"Usuario\" aria-label=\"Usuario\">
                                </div>
                                <div class=\"input-group mb-3\">
                                    <input type=\"password\" id=\"pass\" class=\"form-control\" placeholder=\"Password\" autocomplete=\"off\" aria-label=\"Password\">
                                </div>
                                <div class=\"form-group text-center\">
                                    <div class=\"col-xs-12 pb-3\">
                                        <div class=\"d-grid\">
                                            <button class=\"btn btn-lg btn-info\" type=\"submit\">Entrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=\"../js/vendor/jquery/jquery-3.7.1.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/popper/popper.min.js\"></script>
    <script src=\"../js/vendor/bootstrap/bootstrap.bundle.min.js\"></script>
    <script src=\"{{ functions }}\"></script>
    <script>
        \$(document).ready(function () {
            jQuery('.preloader').fadeOut();
        });
        jQuery(\"#loginform\").submit(async function (event) {
            try {
                event.preventDefault();
                clear_log();
                var username = \$('#user').val(), pass = \$('#pass').val();
                if (username == '') {
                    \$('#user').focus();
                    \$('#user').addClass(\"is-invalid\");
                    dialog(\"Debe ingresar el Usuario\", \"ERROR\");
                } else if (pass == '') {
                    \$('#pass').focus();
                    \$('#pass').addClass(\"is-invalid\");
                    dialog(\"Debe ingresar la Contraseña\", \"ERROR\");
                } else {
                    const requestData = {
                        username: username,
                        password: pass,
                        entity: 'Usuarios',
                        action: 'val_log'
                    };
                    const datas = await fetchCall(`/src/Api/Index.php`, 'POST', requestData);
                    if (!datas.isOk){
                        dialog(datas.Message, datas.Type);
                        return;
                    }
                    document.location.href = \"./\";
                }
                return false;
            } catch (error) {
                const mensaje = 'Error al procesar la petición: ' + error;
                dialog(mensaje, 'error');
            }
        });
    </script>
</body>

</html>", "@views/login.twig", "C:\\laragon\\www\\jce\\adm\\views\\login.twig");
    }
}
