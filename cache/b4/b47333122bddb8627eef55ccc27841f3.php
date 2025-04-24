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

/* @modules/home.twig */
class __TwigTemplate_1f5df5c342bf26b79c06393ff6e59596 extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@modules/home.twig", 1);
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
        $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
        // line 4
        yield "<div class=\"row g-4\">
    <!-- Tarjetas de Resumen -->
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-primary border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-box fa-2x text-primary\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-primary mb-1\">Productos</div>
                        <div class=\"h4 mb-0\">";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "total_productos", [], "any", false, false, false, 15), "html", null, true);
        yield "</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=productos\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-success border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-trademark fa-2x text-success\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-success mb-1\">Marcas</div>
                        <div class=\"h4 mb-0\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "total_marcas", [], "any", false, false, false, 36), "html", null, true);
        yield "</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=marcas\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-warning border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-tags fa-2x text-warning\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-warning mb-1\">Categorías</div>
                        <div class=\"h4 mb-0\">";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "total_categorias", [], "any", false, false, false, 57), "html", null, true);
        yield "</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=categorias\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-info border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-list-check fa-2x text-info\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-info mb-1\">Características</div>
                        <div class=\"h4 mb-0\">";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "total_caracteristicas", [], "any", false, false, false, 78), "html", null, true);
        yield "</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=caracteristicas\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Acciones Rápidas -->
<div class=\"row mt-4\">
    <div class=\"col-12\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Acciones Rápidas</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-3\">
                        <a href=\"?mod=productos&action=add\" class=\"btn btn-primary w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nuevo Producto
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=marcas&action=add\" class=\"btn btn-success w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Marca
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=categorias&action=add\" class=\"btn btn-warning w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Categoría
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=caracteristicas&action=add\" class=\"btn btn-info w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Característica
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actividad Reciente -->
<div class=\"row mt-4\">
    <div class=\"col-12\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Actividad Reciente</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Módulo</th>
                                <th>Acción</th>
                                <th>Registro</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 151
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["Logs"] ?? null)) > 0)) {
            // line 152
            yield "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Logs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["actividad"]) {
                // line 153
                yield "                                <tr>
                                    <td class=\"fecha-actividad\" data-fecha=\"";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "fecha", [], "any", false, false, false, 154), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "fecha", [], "any", false, false, false, 154), "html", null, true);
                yield "</td>
                                    <td>";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "modulo", [], "any", false, false, false, 155), "html", null, true);
                yield "</td>
                                    <td>
                                        <span class=\"badge ";
                // line 157
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "accion", [], "any", false, false, false, 157) == "Creación")) {
                    yield "bg-success";
                } else {
                    yield "bg-warning";
                }
                yield "\">
                                            ";
                // line 158
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "accion", [], "any", false, false, false, 158), "html", null, true);
                yield "
                                        </span>
                                    </td>
                                    <td>";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "registro", [], "any", false, false, false, 161), "html", null, true);
                yield "</td>
                                    <td>";
                // line 162
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["actividad"], "usuario", [], "any", false, false, false, 162), "html", null, true);
                yield "</td>
                                </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['actividad'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 165
            yield "                            ";
        } else {
            // line 166
            yield "                                <tr>
                                    <td colspan=\"4\" class=\"text-center\">No hay actividad reciente</td>
                                </tr>
                            ";
        }
        // line 170
        yield "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 179
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 180
        yield "<script>
    document.addEventListener('DOMContentLoaded', function() {
        \$('.preloader').fadeOut();
        function formatDate(dateString) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat(navigator.language, {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            }).format(date);
        }
    
        document.querySelectorAll('.fecha-actividad').forEach(element => {
            const fechaOriginal = element.getAttribute('data-fecha');
            element.textContent = formatDate(fechaOriginal);
        });
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
        return "@modules/home.twig";
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
        return array (  298 => 180,  291 => 179,  279 => 170,  273 => 166,  270 => 165,  261 => 162,  257 => 161,  251 => 158,  243 => 157,  238 => 155,  232 => 154,  229 => 153,  224 => 152,  222 => 151,  146 => 78,  122 => 57,  98 => 36,  74 => 15,  61 => 4,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}
{% block content %}
{% set data = Content[0] %}
<div class=\"row g-4\">
    <!-- Tarjetas de Resumen -->
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-primary border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-box fa-2x text-primary\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-primary mb-1\">Productos</div>
                        <div class=\"h4 mb-0\">{{ data.total_productos }}</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=productos\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-success border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-trademark fa-2x text-success\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-success mb-1\">Marcas</div>
                        <div class=\"h4 mb-0\">{{ data.total_marcas }}</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=marcas\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-warning border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-tags fa-2x text-warning\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-warning mb-1\">Categorías</div>
                        <div class=\"h4 mb-0\">{{ data.total_categorias }}</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=categorias\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card border-start border-info border-4 h-100\">
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"flex-shrink-0\">
                        <i class=\"fa-solid fa-list-check fa-2x text-info\"></i>
                    </div>
                    <div class=\"flex-grow-1 ms-3\">
                        <div class=\"small fw-bold text-info mb-1\">Características</div>
                        <div class=\"h4 mb-0\">{{ data.total_caracteristicas }}</div>
                    </div>
                </div>
            </div>
            <div class=\"card-footer bg-transparent border-0\">
                <a href=\"?mod=caracteristicas\" class=\"text-decoration-none\">
                    Ver detalles
                    <i class=\"fas fa-arrow-right ms-2\"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Acciones Rápidas -->
<div class=\"row mt-4\">
    <div class=\"col-12\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Acciones Rápidas</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-3\">
                        <a href=\"?mod=productos&action=add\" class=\"btn btn-primary w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nuevo Producto
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=marcas&action=add\" class=\"btn btn-success w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Marca
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=categorias&action=add\" class=\"btn btn-warning w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Categoría
                        </a>
                    </div>
                    <div class=\"col-md-3\">
                        <a href=\"?mod=caracteristicas&action=add\" class=\"btn btn-info w-100\">
                            <i class=\"fas fa-plus me-2\"></i>
                            Nueva Característica
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actividad Reciente -->
<div class=\"row mt-4\">
    <div class=\"col-12\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"card-title mb-0\">Actividad Reciente</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Módulo</th>
                                <th>Acción</th>
                                <th>Registro</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% if Logs|length > 0 %}
                                {% for actividad in Logs %}
                                <tr>
                                    <td class=\"fecha-actividad\" data-fecha=\"{{ actividad.fecha }}\">{{ actividad.fecha }}</td>
                                    <td>{{ actividad.modulo }}</td>
                                    <td>
                                        <span class=\"badge {% if actividad.accion == 'Creación' %}bg-success{% else %}bg-warning{% endif %}\">
                                            {{ actividad.accion }}
                                        </span>
                                    </td>
                                    <td>{{ actividad.registro }}</td>
                                    <td>{{ actividad.usuario }}</td>
                                </tr>
                                {% endfor %}
                            {% else %}
                                <tr>
                                    <td colspan=\"4\" class=\"text-center\">No hay actividad reciente</td>
                                </tr>
                            {% endif %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        \$('.preloader').fadeOut();
        function formatDate(dateString) {
            const date = new Date(dateString);
            return new Intl.DateTimeFormat(navigator.language, {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            }).format(date);
        }
    
        document.querySelectorAll('.fecha-actividad').forEach(element => {
            const fechaOriginal = element.getAttribute('data-fecha');
            element.textContent = formatDate(fechaOriginal);
        });
    });
    </script>
{% endblock %} ", "@modules/home.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\home.twig");
    }
}
