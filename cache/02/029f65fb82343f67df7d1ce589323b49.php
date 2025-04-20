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

/* @modules/marcas.twig */
class __TwigTemplate_59c16321c857b68d67f0a757bb123442 extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@modules/marcas.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "
";
        // line 5
        if ((($context["operation"] ?? null) == "list")) {
            // line 6
            yield "<div class=\"card mb-4\">
    <div class=\"card-header\">Lista de Marcas</div>
    <div class=\"card-body\">
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover\">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>MARCA</th>
                        <th>DESCRIPCION (ES)</th>
                        <th>DESCRIPCION (EN)</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["marcas"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["marca"]) {
                // line 22
                yield "                    <tr>
                        <td>";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "codigo", [], "any", false, false, false, 23), "html", null, true);
                yield "</td>
                        <td>";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "nombre", [], "any", false, false, false, 24), "html", null, true);
                yield "</td>
                        <td>";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_es", [], "any", false, false, false, 25), "html", null, true);
                yield "</td>
                        <td>";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_en", [], "any", false, false, false, 26), "html", null, true);
                yield "</td>
                        <td>
                            <a href=\"?mod=marcas&id=";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "codigo", [], "any", false, false, false, 28), "html", null, true);
                yield "\" class=\"btn btn-sm btn-warning\">Editar</a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['marca'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "                </tbody>
            </table>
        </div>
    </div>
</div>
";
        } else {
            // line 38
            yield "<form id=\"form_\">
    <input type=\"hidden\" name=\"id\" value=\"";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "codigo", [], "any", false, false, false, 39), "html", null, true);
            yield "\">
    <div class=\"mb-3\">
        <label for=\"nombre\">Nombre:</label>
        <input type=\"text\" name=\"nombre\" id=\"nombre\" class=\"form-control\" value=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "nombre", [], "any", false, false, false, 42), "html", null, true);
            yield "\">
    </div>
    <div class=\"mb-3\">
        <label for=\"descripcion_es\">Descripción (Español):</label>
        <textarea name=\"descripcion_es\" id=\"descripcion_es\" class=\"form-control\">";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_es", [], "any", false, false, false, 46), "html", null, true);
            yield "</textarea>
    </div>
    <div class=\"mb-3\">
        <label for=\"descripcion_en\">Descripción (Inglés):</label>
        <textarea name=\"descripcion_en\" id=\"descripcion_en\" class=\"form-control\">";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_en", [], "any", false, false, false, 50), "html", null, true);
            yield "</textarea>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Guardar</button>
</form>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@modules/marcas.twig";
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
        return array (  145 => 50,  138 => 46,  131 => 42,  125 => 39,  122 => 38,  114 => 32,  104 => 28,  99 => 26,  95 => 25,  91 => 24,  87 => 23,  84 => 22,  80 => 21,  63 => 6,  61 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}

{% if operation == 'list' %}
<div class=\"card mb-4\">
    <div class=\"card-header\">Lista de Marcas</div>
    <div class=\"card-body\">
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover\">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>MARCA</th>
                        <th>DESCRIPCION (ES)</th>
                        <th>DESCRIPCION (EN)</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    {% for marca in marcas %}
                    <tr>
                        <td>{{ marca.codigo }}</td>
                        <td>{{ marca.nombre }}</td>
                        <td>{{ marca.descripcion_es }}</td>
                        <td>{{ marca.descripcion_en }}</td>
                        <td>
                            <a href=\"?mod=marcas&id={{ marca.codigo }}\" class=\"btn btn-sm btn-warning\">Editar</a>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
{% else %}
<form id=\"form_\">
    <input type=\"hidden\" name=\"id\" value=\"{{ marca.codigo }}\">
    <div class=\"mb-3\">
        <label for=\"nombre\">Nombre:</label>
        <input type=\"text\" name=\"nombre\" id=\"nombre\" class=\"form-control\" value=\"{{ marca.nombre }}\">
    </div>
    <div class=\"mb-3\">
        <label for=\"descripcion_es\">Descripción (Español):</label>
        <textarea name=\"descripcion_es\" id=\"descripcion_es\" class=\"form-control\">{{ marca.descripcion_es }}</textarea>
    </div>
    <div class=\"mb-3\">
        <label for=\"descripcion_en\">Descripción (Inglés):</label>
        <textarea name=\"descripcion_en\" id=\"descripcion_en\" class=\"form-control\">{{ marca.descripcion_en }}</textarea>
    </div>
    <button type=\"submit\" class=\"btn btn-primary\">Guardar</button>
</form>
{% endif %}
{% endblock %}", "@modules/marcas.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\marcas.twig");
    }
}
