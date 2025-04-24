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
    <link rel=\"icon\" href=\"../favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"../favicon.png\" type=\"image/png\">
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
    <style>
        .auth-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--jce-primary) 0%, var(--jce-secondary) 100%);
            position: relative;
            overflow: hidden;
        }
        .auth-wrapper::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            animation: gradientMove 20s linear infinite;
        }
        .auth-wrapper::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
            opacity: 0.1;
        }
        @keyframes gradientMove {
            0% { transform: rotate(30deg); }
            100% { transform: rotate(390deg); }
        }
        .auth-wrapper .auth-box {
            background: rgba(255, 255, 255, 0.95) !important;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            margin: 1rem;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }
        .auth-wrapper .auth-box .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .auth-wrapper .auth-box .logo img {
            max-width: 200px;
            height: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        .auth-wrapper .auth-box h4 {
            color: var(--jce-gray);
            font-weight: 500;
            margin-top: 1rem;
            position: relative;
        }
        .auth-wrapper .auth-box h4::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--jce-primary);
            margin: 0.5rem auto;
            border-radius: 3px;
        }
        .form-control {
            height: 48px;
            border: 1px solid var(--jce-border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.9) !important;
        }
        .form-control:focus {
            border-color: var(--jce-primary);
            box-shadow: 0 0 0 3px rgba(0, 128, 96, 0.1);
            background: white !important;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .btn-login {
            background-color: var(--jce-primary);
            color: white;
            height: 48px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            border: none;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(0, 128, 96, 0.2);
        }
        .btn-login:hover {
            background-color: var(--jce-secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 128, 96, 0.3);
        }
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .input-group .form-control {
            padding: 0.75rem 1rem;
            position: relative;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .loader {
            width: 48px;
            height: 48px;
            border: 4px solid var(--jce-light);
            border-top-color: var(--jce-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div class=\"main-wrapper\">
        <div class=\"preloader\">
            <div class=\"loader\"></div>
        </div>
        <div class=\"auth-wrapper d-flex no-block justify-content-center align-items-center\">
            <div class=\"auth-box\">
                <div id=\"loginform\">
                    <div class=\"logo\">
                        <img src=\"../images/logo-black.png\" alt=\"logo\" />
                        <h4>Panel de Administración</h4>
                    </div>
                    <form class=\"form-horizontal\" id=\"loginform\" action=\"./\">
                        <div class=\"input-group\">
                            <input type=\"text\" id=\"user\" class=\"form-control\" placeholder=\"Usuario\" aria-label=\"Usuario\">
                        </div>
                        <div class=\"input-group\">
                            <input type=\"password\" id=\"pass\" class=\"form-control\" placeholder=\"Contraseña\" autocomplete=\"off\" aria-label=\"Password\">
                        </div>
                        <div class=\"form-group text-center\">
                            <div class=\"col-12\">
                                <div class=\"d-grid\">
                                    <button class=\"btn btn-login\" type=\"submit\">Iniciar Sesión</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src=\"../js/vendor/jquery/jquery-3.7.1.min.js\"></script>
    <script src=\"../js/vendor/jquery-confirm/jquery-confirm.min.js\"></script>
    <script src=\"../js/vendor/popper/popper.min.js\"></script>
    <script src=\"../js/vendor/bootstrap/bootstrap.bundle.min.js\"></script>
    <script src=\"";
        // line 190
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
                    const formData = new FormData();
                    formData.append('username', username);
                    formData.append('password', pass);
                    formData.append('entity', 'Usuarios');
                    formData.append('action', 'val_log');
                    const datas = await fetchCall(`/src/Api/index.php`, 'POST', formData);
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
        return array (  239 => 190,  61 => 15,  55 => 12,  42 => 1,);
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
    <link rel=\"icon\" href=\"../favicon.ico\" type=\"image/x-icon\">
    <link rel=\"icon\" href=\"../favicon.png\" type=\"image/png\">
    <title>Login - {{ Sistema }}</title>
    <link href=\"../css/vendor/jquery-confirm/jquery-confirm.min.css\" rel=\"stylesheet\">
    <link href=\"../css/vendor/font-awesome/all.min.css\" rel=\"stylesheet\">
    <link href=\"{{ style }}\" rel=\"stylesheet\">
    <style>
        .auth-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--jce-primary) 0%, var(--jce-secondary) 100%);
            position: relative;
            overflow: hidden;
        }
        .auth-wrapper::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            animation: gradientMove 20s linear infinite;
        }
        .auth-wrapper::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");
            opacity: 0.1;
        }
        @keyframes gradientMove {
            0% { transform: rotate(30deg); }
            100% { transform: rotate(390deg); }
        }
        .auth-wrapper .auth-box {
            background: rgba(255, 255, 255, 0.95) !important;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            margin: 1rem;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
        }
        .auth-wrapper .auth-box .logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .auth-wrapper .auth-box .logo img {
            max-width: 200px;
            height: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        .auth-wrapper .auth-box h4 {
            color: var(--jce-gray);
            font-weight: 500;
            margin-top: 1rem;
            position: relative;
        }
        .auth-wrapper .auth-box h4::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--jce-primary);
            margin: 0.5rem auto;
            border-radius: 3px;
        }
        .form-control {
            height: 48px;
            border: 1px solid var(--jce-border);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.9) !important;
        }
        .form-control:focus {
            border-color: var(--jce-primary);
            box-shadow: 0 0 0 3px rgba(0, 128, 96, 0.1);
            background: white !important;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .btn-login {
            background-color: var(--jce-primary);
            color: white;
            height: 48px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            border: none;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(0, 128, 96, 0.2);
        }
        .btn-login:hover {
            background-color: var(--jce-secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 128, 96, 0.3);
        }
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .input-group .form-control {
            padding: 0.75rem 1rem;
            position: relative;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .loader {
            width: 48px;
            height: 48px;
            border: 4px solid var(--jce-light);
            border-top-color: var(--jce-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div class=\"main-wrapper\">
        <div class=\"preloader\">
            <div class=\"loader\"></div>
        </div>
        <div class=\"auth-wrapper d-flex no-block justify-content-center align-items-center\">
            <div class=\"auth-box\">
                <div id=\"loginform\">
                    <div class=\"logo\">
                        <img src=\"../images/logo-black.png\" alt=\"logo\" />
                        <h4>Panel de Administración</h4>
                    </div>
                    <form class=\"form-horizontal\" id=\"loginform\" action=\"./\">
                        <div class=\"input-group\">
                            <input type=\"text\" id=\"user\" class=\"form-control\" placeholder=\"Usuario\" aria-label=\"Usuario\">
                        </div>
                        <div class=\"input-group\">
                            <input type=\"password\" id=\"pass\" class=\"form-control\" placeholder=\"Contraseña\" autocomplete=\"off\" aria-label=\"Password\">
                        </div>
                        <div class=\"form-group text-center\">
                            <div class=\"col-12\">
                                <div class=\"d-grid\">
                                    <button class=\"btn btn-login\" type=\"submit\">Iniciar Sesión</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    const formData = new FormData();
                    formData.append('username', username);
                    formData.append('password', pass);
                    formData.append('entity', 'Usuarios');
                    formData.append('action', 'val_log');
                    const datas = await fetchCall(`/src/Api/index.php`, 'POST', formData);
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
