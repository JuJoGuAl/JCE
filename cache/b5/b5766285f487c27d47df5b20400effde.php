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

/* @views/home.twig */
class __TwigTemplate_862b2559255cc7277a9e7bd0670934fa extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@views/home.twig", 1);
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan=\"4\" class=\"text-center\">No hay actividad reciente</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    // line 161
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 162
        yield "<script>
document.addEventListener('DOMContentLoaded', function() {
    // Aquí podríamos agregar llamadas AJAX para obtener estadísticas reales
    // y actualizar los contadores en las tarjetas
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
        return "@views/home.twig";
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
        return array (  227 => 162,  220 => 161,  59 => 3,  52 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}
{% block content %}
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                        <div class=\"h4 mb-0\">0</div>
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
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan=\"4\" class=\"text-center\">No hay actividad reciente</td>
                            </tr>
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
    // Aquí podríamos agregar llamadas AJAX para obtener estadísticas reales
    // y actualizar los contadores en las tarjetas
});
</script>
{% endblock %}", "@views/home.twig", "C:\\laragon\\www\\jce\\adm\\views\\home.twig");
    }
}
