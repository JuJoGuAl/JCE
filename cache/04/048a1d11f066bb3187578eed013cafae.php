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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"container\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-12\">
            <div class=\"text-center my-4\">
                <img class=\"mb-4 img-error\" src=\"../../images/error-404-monochrome.svg\" />
                <p class=\"lead\">El módulo que estas solicitando no se encuentra, intenta realizar la petición nuevamente</p>
                <a href=\"./\">
                    <i class=\"fas fa-arrow-left me-1\"></i>
                    Regresar al Inicio
                </a>
            </div>
        </div>
    </div>
</div>";
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
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"container\">
    <div class=\"row justify-content-center\">
        <div class=\"col-lg-12\">
            <div class=\"text-center my-4\">
                <img class=\"mb-4 img-error\" src=\"../../images/error-404-monochrome.svg\" />
                <p class=\"lead\">El módulo que estas solicitando no se encuentra, intenta realizar la petición nuevamente</p>
                <a href=\"./\">
                    <i class=\"fas fa-arrow-left me-1\"></i>
                    Regresar al Inicio
                </a>
            </div>
        </div>
    </div>
</div>", "@views/error404.twig", "C:\\laragon\\www\\jce\\adm\\views\\error404.twig");
    }
}
