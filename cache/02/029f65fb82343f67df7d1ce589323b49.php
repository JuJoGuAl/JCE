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
        yield "<div class=\"card mb-4\">
    <div class=\"card-header\">";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
    <div class=\"card-body\">
        ";
        // line 7
        if ((($context["module"] ?? null) == "list")) {
            // line 8
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"button-group\">
                    <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "&id=0\" data-id=\"0\"><span class=\"btn-label\"><i class=\"fas fa-plus\"></i></span> Nuevo</a>
                </div>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover datatables\">
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
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["marca"]) {
                // line 28
                yield "                    <tr>
                        <td>";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "codigo", [], "any", false, false, false, 29), "html", null, true);
                yield "</td>
                        <td>";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "nombre", [], "any", false, false, false, 30), "html", null, true);
                yield "</td>
                        <td>";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_es", [], "any", false, false, false, 31), "html", null, true);
                yield "</td>
                        <td>";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_en", [], "any", false, false, false, 32), "html", null, true);
                yield "</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\"
                                    href=\"?mod=";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 36), "html", null, true);
                yield "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                            </div>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['marca'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 44
($context["module"] ?? null) == "form")) {
            // line 45
            yield "        ";
            $context["marca"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 46
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"dato\" name=\"dato\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "nombre", [], "any", false, false, false, 50), "html", null, true);
            yield "\">
                        <label for=\"dato\" class=\"control-label col-form-label\">Nombre de la Marca</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Español\">";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_es", [], "any", false, false, false, 58), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripcion (Español)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Ingles\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_en", [], "any", false, false, false, 66), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripcion (Ingles)</label>
                    </div>
                </div>
            </div>
            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" name=\"id\" value=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "id", [], "any", false, false, false, 74), "html", null, true);
            yield "\">
                        <button class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a class=\"btn btn-outline-primary\" href=\"?mod=";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
                    </div>
                </div>
            </div>
        </form>
        ";
        } else {
            // line 82
            yield "        <div class=\"alert alert-warning\"> Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield " </div>
        ";
        }
        // line 84
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 87
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 88
        yield "<script>

</script>
";
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
        return array (  218 => 88,  211 => 87,  204 => 84,  198 => 82,  189 => 76,  185 => 75,  181 => 74,  170 => 66,  159 => 58,  148 => 50,  142 => 46,  139 => 45,  137 => 44,  132 => 41,  119 => 36,  112 => 32,  108 => 31,  104 => 30,  100 => 29,  97 => 28,  93 => 27,  74 => 11,  69 => 8,  67 => 7,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}
<div class=\"card mb-4\">
    <div class=\"card-header\">{{module_subtitulo}}</div>
    <div class=\"card-body\">
        {% if module == 'list' %}
        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"button-group\">
                    <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod={{mod}}&id=0\" data-id=\"0\"><span class=\"btn-label\"><i class=\"fas fa-plus\"></i></span> Nuevo</a>
                </div>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-bordered table-hover datatables\">
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
                    {% for marca in Content %}
                    <tr>
                        <td>{{ marca.codigo }}</td>
                        <td>{{ marca.nombre }}</td>
                        <td>{{ marca.descripcion_es }}</td>
                        <td>{{ marca.descripcion_en }}</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\"
                                    href=\"?mod={{ mod }}&id={{ marca.id }}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                            </div>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
        {% elseif module == 'form' %}
        {% set marca = Content[0] %}
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"dato\" name=\"dato\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"{{ marca.nombre }}\">
                        <label for=\"dato\" class=\"control-label col-form-label\">Nombre de la Marca</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Español\">{{ marca.descripcion_es }}</textarea>
                        <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripcion (Español)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Ingles\">{{ marca.descripcion_en }}</textarea>
                        <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripcion (Ingles)</label>
                    </div>
                </div>
            </div>
            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" name=\"id\" value=\"{{ marca.id }}\">
                        <button class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"{{ mod }}\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a class=\"btn btn-outline-primary\" href=\"?mod={{ mod }}\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
                    </div>
                </div>
            </div>
        </form>
        {% else %}
        <div class=\"alert alert-warning\"> Operación no válida: {{ module }} </div>
        {% endif %}
    </div>
</div>
{% endblock %}
{% block scripts %}
<script>

</script>
{% endblock %}", "@modules/marcas.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\marcas.twig");
    }
}
