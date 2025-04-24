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

/* @views/error404.twig */
class __TwigTemplate_2c6822f2ec5ca2e818ecdc3119ae0848 extends Template
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

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "@views/body.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@views/body.twig", "@views/error404.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 3
        yield "<div class=\"container-fluid p-0\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-6 text-center\">
            <div class=\"error-content\">
                <img class=\"img-error\" src=\"../../images/error-404-monochrome.svg\" style=\"max-width: 200px; height: auto;\" />
                <h1 class=\"display-6 fw-bold text-primary mb-3\">¡Ups! Página no encontrada</h1>
                <p class=\"lead text-muted mb-4\">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
                <div class=\"d-grid gap-2 d-sm-flex justify-content-sm-center\">
                    <a href=\"./\" class=\"btn btn-primary btn-lg px-4 gap-3\">
                        <i class=\"fas fa-arrow-left me-2\"></i>
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        yield "<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar animación de entrada
        const errorContent = document.querySelector('.error-content');
        errorContent.style.opacity = '0';
        errorContent.style.transform = 'translateY(20px)';
        errorContent.style.transition = 'all 0.5s ease-out';
        
        setTimeout(() => {
            errorContent.style.opacity = '1';
            errorContent.style.transform = 'translateY(0)';
        }, 100);
    });
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@views/error404.twig";
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
        return array (  88 => 23,  81 => 22,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}
{% block content %}
<div class=\"container-fluid p-0\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-6 text-center\">
            <div class=\"error-content\">
                <img class=\"img-error\" src=\"../../images/error-404-monochrome.svg\" style=\"max-width: 200px; height: auto;\" />
                <h1 class=\"display-6 fw-bold text-primary mb-3\">¡Ups! Página no encontrada</h1>
                <p class=\"lead text-muted mb-4\">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
                <div class=\"d-grid gap-2 d-sm-flex justify-content-sm-center\">
                    <a href=\"./\" class=\"btn btn-primary btn-lg px-4 gap-3\">
                        <i class=\"fas fa-arrow-left me-2\"></i>
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar animación de entrada
        const errorContent = document.querySelector('.error-content');
        errorContent.style.opacity = '0';
        errorContent.style.transform = 'translateY(20px)';
        errorContent.style.transition = 'all 0.5s ease-out';
        
        setTimeout(() => {
            errorContent.style.opacity = '1';
            errorContent.style.transform = 'translateY(0)';
        }, 100);
    });
</script>
{% endblock %}", "@views/error404.twig", "C:\\laragon\\www\\jce\\adm\\views\\error404.twig");
    }
}
