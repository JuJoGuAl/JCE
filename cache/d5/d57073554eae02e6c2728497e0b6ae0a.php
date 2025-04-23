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

/* @modules/productos.twig */
class __TwigTemplate_fe2eeed4f11e0a5959d56031319a67fb extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@modules/productos.twig", 1);
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
        yield "<style>
    /* Estilos para el contenedor de la tabla de características */
    .tabla-caracteristicas-container {
        position: relative;
        min-height: 100px;
        overflow: visible;
    }
</style>

<script>
    const mod = '";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "';
    const entity = 'Productos';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <div>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
        ";
        // line 20
        if ((($context["module"] ?? null) == "form")) {
            // line 21
            yield "        <div class=\"btn-group\">
            <button id=\"btnGuardar\" class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-save\"></i> Guardar</button>
            <a id=\"btnCancelar\" class=\"btn btn-outline-secondary\" href=\"?mod=";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-times\"></i> Cancelar</a>
        </div>
        ";
        }
        // line 26
        yield "    </div>
    <div class=\"card-body\">
        ";
        // line 28
        if ((($context["module"] ?? null) == "list")) {
            // line 29
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "&id=0\" data-id=\"0\"><i class=\"fas fa-plus\"></i> Nuevo</a>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-hover datatables\" data-dt_order='[[2,\"asc\"]]'>
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Imagen</th>
                        <th>SKU</th>
                        <th>Producto</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 48
                yield "                    <tr 
                        data-id=\"";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 49), "html", null, true);
                yield "\" 
                        data-ficha=\"";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "ficha", [], "any", false, false, false, 50), "html", null, true);
                yield "\" 
                    >
                        <td>
                            ";
                // line 53
                if (CoreExtension::getAttribute($this->env, $this->source, $context["data"], "imagen", [], "any", false, false, false, 53)) {
                    // line 54
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "imagen", [], "any", false, false, false, 54), "html", null, true);
                    yield "\" class=\"img-thumbnail\" style=\"width: 80px; height: 80px; object-fit: cover;\">
                            ";
                } else {
                    // line 56
                    yield "                            <div class=\"bg-light d-flex align-items-center justify-content-center\" style=\"width: 80px; height: 80px;\">
                                <i class=\"fas fa-image text-muted\"></i>
                            </div>
                            ";
                }
                // line 60
                yield "                        </td>
                        <td>";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "sku", [], "any", false, false, false, 61), "html", null, true);
                yield "</td>
                        <td>
                            <div class=\"fw-bold\">";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_es", [], "any", false, false, false, 63), "html", null, true);
                yield "</div>
                            <small class=\"text-muted\">";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_en", [], "any", false, false, false, 64), "html", null, true);
                yield "</small>
                        </td>
                        <td>";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "marca", [], "any", false, false, false, 66), "nombre", [], "any", false, false, false, 66), "html", null, true);
                yield "</td>
                        <td>
                            <div class=\"fw-bold\">
                                ";
                // line 69
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 69)) > 20)) {
                    // line 70
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 70), 0, 20), "html", null, true);
                    yield "...
                                ";
                } else {
                    // line 72
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 72), "html", null, true);
                    yield "
                                ";
                }
                // line 74
                yield "                            </div>
                            <small class=\"text-muted\">
                                ";
                // line 76
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 76)) > 20)) {
                    // line 77
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 77), 0, 20), "html", null, true);
                    yield "...
                                ";
                } else {
                    // line 79
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 79), "html", null, true);
                    yield "
                                ";
                }
                // line 81
                yield "                            </small>
                        </td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod=";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 85), "html", null, true);
                yield "\" title=\"Ver\" data-toggle=\"tooltip\" data-placement=\"top\">
                                    <i class=\"fas fa-search\"></i>
                                </a>
                                <button class=\"btn btn-sm btn-outline-danger btnEliminarRegistro\" title=\"Eliminar\" data-toggle=\"tooltip\" data-placement=\"top\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['data'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 98
($context["module"] ?? null) == "form")) {
            // line 99
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 100
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Productos\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información del Producto</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Nombre en Español\" value=\"";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_es", [], "any", false, false, false, 112), "html", null, true);
            yield "\">
                                        <label for=\"nombre_es\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Nombre en Inglés\" value=\"";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_en", [], "any", false, false, false, 118), "html", null, true);
            yield "\">
                                        <label for=\"nombre_en\">Nombre (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"sku\" name=\"sku\" class=\"form-control validar\" placeholder=\"SKU\" value=\"";
            // line 126
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "sku", [], "any", false, false, false, 126), "html", null, true);
            yield "\">
                                        <label for=\"sku\">SKU</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <select id=\"marca_id\" name=\"marca_id\" class=\"form-select validar\">
                                            <option value=\"\">Seleccione una Marca</option>
                                            ";
            // line 134
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Marcas"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["marca"]) {
                // line 135
                yield "                                                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 135), "html", null, true);
                yield "\" ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "marca_id", [], "any", false, false, false, 135) == CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 135))) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "nombre", [], "any", false, false, false, 135), "html", null, true);
                yield "</option>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['marca'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            yield "                                        </select>
                                        <label for=\"marca_id\">Marca</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Español\">";
            // line 145
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_es", [], "any", false, false, false, 145), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_es\">Descripción (Español)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Inglés\">";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_en", [], "any", false, false, false, 153), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_en\">Descripción (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Características -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Características del Producto</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"table-responsive tabla-caracteristicas-container\">
                                <table class=\"table\" id=\"tablaCaracteristicas\">
                                    <thead>
                                        <tr>
                                            <th style=\"width: 50%\">Característica</th>
                                            <th style=\"width: 40%\">Valor</th>
                                            <th class=\"columna-acciones\"></th>
                                        </tr>
                                    </thead>
                                    <tbody style=\"min-height: 150px;\">
                                        ";
            // line 177
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 177))) {
                // line 178
                yield "                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 178));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["caracteristica"]) {
                    // line 179
                    yield "                                                <tr data-caracteristica-id=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "caracteristica_id", [], "any", false, false, false, 179), "html", null, true);
                    yield "\">
                                                    <td>
                                                        <select class=\"form-select caracteristica-select\" name=\"caracteristicas[";
                    // line 181
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 181), "html", null, true);
                    yield "][id]\">
                                                            <option value=\"\">Seleccione una característica</option>
                                                            ";
                    // line 183
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["Caracteristicas"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["carac"]) {
                        // line 184
                        yield "                                                                <option value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 184), "html", null, true);
                        yield "\" ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 184) == CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "caracteristica_id", [], "any", false, false, false, 184))) {
                            yield "selected";
                        }
                        yield ">
                                                                    ";
                        // line 185
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "nombre_es", [], "any", false, false, false, 185), "html", null, true);
                        yield "
                                                                </option>
                                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['carac'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 188
                    yield "                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type=\"text\" class=\"form-control\" name=\"caracteristicas[";
                    // line 191
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 191), "html", null, true);
                    yield "][valor]\" value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "valor", [], "any", false, false, false, 191), "html", null, true);
                    yield "\" placeholder=\"Valor\">
                                                    </td>
                                                    <td class=\"columna-acciones\">
                                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger eliminar-fila\" title=\"Eliminar\">
                                                            <i class=\"fas fa-trash\"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['caracteristica'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 200
                yield "                                        ";
            }
            // line 201
            yield "                                    </tbody>
                                </table>
                            </div>
                            <div class=\"text-end mt-3\">
                                <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" id=\"agregarCaracteristica\" title=\"Agregar Característica\">
                                    <i class=\"fas fa-plus\"></i> Característica
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
                    <!-- Categorías -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Categorías</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"form-floating\">
                                <select id=\"categorias\" name=\"categorias[]\" class=\"form-select tomselect validar\" data-remove-button=\"true\" multiple data-placeholder=\"Seleccione categorías\">
                                    ";
            // line 223
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Categorias"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
                // line 224
                yield "                                        <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "id", [], "any", false, false, false, 224), "html", null, true);
                yield "\" ";
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "id", [], "any", false, false, false, 224), Twig\Extension\CoreExtension::map($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "categorias", [], "any", true, true, false, 224)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "categorias", [], "any", false, false, false, 224), [])) : ([])), function ($__c__) use ($context, $macros) { $context["c"] = $__c__; return CoreExtension::getAttribute($this->env, $this->source, ($context["c"] ?? null), "categoria_id", [], "any", false, false, false, 224); }))) {
                    yield "selected";
                }
                yield ">
                                            ";
                // line 225
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "nombre_es", [], "any", false, false, false, 225), "html", null, true);
                yield "
                                        </option>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['categoria'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 228
            yield "                                </select>
                                <label for=\"categorias\">Categorías</label>
                            </div>
                        </div>
                    </div>

                    <!-- Ficha Técnica -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Ficha Técnica</h5>
                        </div>
                        <div class=\"card-body\">
                            <label for=\"ficha\" class=\"form-label\">Subir PDF</label>
                            <input type=\"file\" name=\"ficha\" id=\"ficha\" class=\"form-control\" accept=\".pdf\" value=\"";
            // line 241
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 241), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"ficha_actual\" id=\"ficha_actual\" value=\"";
            // line 242
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 242), "html", null, true);
            yield "\" />
                            <input type=\"hidden\" id=\"ficha_path\" name=\"ficha_path\" value=\"";
            // line 243
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_ficha"] ?? null), "html", null, true);
            yield "\">
                            ";
            // line 244
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 244))) {
                // line 245
                yield "                            <div class=\"mt-2\">
                                <a href=\"../";
                // line 246
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_ficha"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 246)), "html", null, true);
                yield "\" target=\"_blank\" class=\"btn btn-sm btn-outline-primary\">
                                    <i class=\"fas fa-file-pdf\"></i> Ver Ficha Actual
                                </a>
                            </div>
                            ";
            }
            // line 251
            yield "                        </div>
                    </div>

                    <!-- Auditoría -->
                    ";
            // line 255
            if (($context["showAudit"] ?? null)) {
                // line 256
                yield "                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    ";
                // line 264
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 264), "html", null, true);
                yield "<br>
                                    ";
                // line 265
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 265), "html", null, true);
                yield "
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    ";
                // line 269
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 269), "html", null, true);
                yield "<br>
                                    ";
                // line 270
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 270), "html", null, true);
                yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            // line 276
            yield "                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 279
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 279), "html", null, true);
            yield "\">
        </form>
        ";
        } else {
            // line 282
            yield "        <div class=\"alert alert-warning\">Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 284
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 288
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 289
        yield "<script>
    document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');
            const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
            const btnAgregarCaracteristica = document.getElementById('agregarCaracteristica');
            let contadorFilas = ";
        // line 296
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 296))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 296)), "html", null, true);
        } else {
            yield "0";
        }
        yield ";

            // Función para agregar nueva fila de característica
            function agregarFilaCaracteristica() {
                const tbody = tablaCaracteristicas.querySelector('tbody');
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <select class=\"form-control form-select caracteristica-select\" name=\"caracteristicas[\${contadorFilas}][id]\">
                            <option value=\"\">Seleccione una característica</option>
                            ";
        // line 306
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["Caracteristicas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["carac"]) {
            // line 307
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 307), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "nombre_es", [], "any", false, false, false, 307), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['carac'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 309
        yield "                        </select>
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"caracteristicas[\${contadorFilas}][valor]\" placeholder=\"Valor\">
                    </td>
                    <td class=\"columna-acciones\">
                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger eliminar-fila\" title=\"Eliminar\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
                contadorFilas++;

                // Inicializar TomSelect para el nuevo select
                new TomSelect(tr.querySelector('.caracteristica-select'), {
                    create: false,
                    sortField: {
                        field: \"text\",
                        direction: \"asc\"
                    },
                    dropdownParent: 'body'
                });
            }

            // Evento para el botón de agregar característica
            if (btnAgregarCaracteristica) {
                btnAgregarCaracteristica.addEventListener('click', function(e) {
                    e.preventDefault();
                    agregarFilaCaracteristica();
                });
            }

            // Evento para eliminar fila
            if (tablaCaracteristicas) {
                tablaCaracteristicas.addEventListener('click', function(e) {
                    if (e.target.closest('.eliminar-fila')) {
                        e.target.closest('tr').remove();
                        contadorFilas--;
                    }
                });
            }

            // Validación de duplicados
            if (tablaCaracteristicas) {
                tablaCaracteristicas.addEventListener('change', function(e) {
                    if (e.target.classList.contains('caracteristica-select')) {
                        const selectedValue = e.target.value;
                        const selects = document.querySelectorAll('.caracteristica-select');
                        let duplicado = false;

                        selects.forEach(select => {
                            if (select !== e.target && select.value === selectedValue && selectedValue !== '') {
                                duplicado = true;
                            }
                        });

                        if (duplicado) {
                            dialog('Esta característica ya ha sido seleccionada', 'warning');
                            e.target.value = '';
                        }
                    }
                });
            }

            // Inicializar TomSelect para selects existentes
            document.querySelectorAll('.caracteristica-select').forEach(select => {
                new TomSelect(select, {
                    create: false,
                    sortField: {
                        field: \"text\",
                        direction: \"asc\"
                    },
                    dropdownParent: 'body'
                });
            });

            if (btnEliminarRegistro) {
                btnEliminarRegistro.forEach(btn => {
                    btn.addEventListener('click', eliminaRegistro);
                });
            }
            
            if (btnGuardar) {
                btnGuardar.addEventListener('click', async function () { 
                    // Validar que no haya características duplicadas antes de enviar
                    const selects = document.querySelectorAll('select.caracteristica-select');
                    const valores = new Set();
                    let duplicado = false;
                    let caracteristicaVacia = false;

                    selects.forEach(select => {
                        const valor = select.value;
                        if (valor === '') {
                            caracteristicaVacia = true;
                        } else if (valores.has(valor)) {
                            duplicado = true;
                        }
                        valores.add(valor);
                    });

                    if (caracteristicaVacia) {
                        dialog('Existen características sin seleccionar. Por favor, complete todas las características.', 'warning');
                        return;
                    }

                    if (duplicado) {
                        dialog('Existen características duplicadas. Por favor, corrija antes de guardar.', 'warning');
                        return;
                    }

                    \$('#form_').sendForm(); 
                });
            }

            async function eliminaRegistro(event) {
                event.preventDefault();
                dialog(
                    \"¿Está seguro?\",
                    \"WARNING\",
                    null,
                    null,
                    {
                        \"Sí\": { 
                            btnClass: \"btn-orange\", 
                            action: async function () { 
                                const row = event.target.closest('tr');
                                const id = row.getAttribute('data-id');
                                const ficha = row.getAttribute('data-ficha');

                                const filesToDelete = [];
                                if (ficha) filesToDelete.push(`documentos/productos/\${ficha}`);
                                
                                const formData = new FormData();
                                formData.append('action', 'delete');
                                formData.append('entity', entity);
                                formData.append('id', id);
                                formData.append('files', filesToDelete);
                                
                                const url = `/src/Api/index.php`;
                                const response = await fetchCall(url, 'POST',formData);
                                if (!response.isOk){
                                    \$(\".preloader\").fadeOut();
                                    if (response.Content == 0) {
                                        //Session
                                        document.location.href = \"./\";
                                    }
                                    dialog(response.Message, response.Type);
                                    return;
                                }
                                const botones = { ACEPTAR: { btnClass: 'btn-success', action: function(){ document.location.href=\"./?mod=\"+mod; } }};
                                dialog(response.Message,response.Type,null,null,botones);
                            } 
                        },
                        \"No\": { 
                            btnClass: \"btn-default\", 
                        }
                    }
                );
            }
        } catch (error) {
            const mensaje = `Error al procesar la petición: \${error}`;
            dialog(mensaje, 'error');
        }
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
        return "@modules/productos.twig";
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
        return array (  645 => 309,  634 => 307,  630 => 306,  613 => 296,  604 => 289,  597 => 288,  590 => 284,  584 => 282,  578 => 279,  573 => 276,  564 => 270,  560 => 269,  553 => 265,  549 => 264,  539 => 256,  537 => 255,  531 => 251,  523 => 246,  520 => 245,  518 => 244,  514 => 243,  510 => 242,  506 => 241,  491 => 228,  482 => 225,  473 => 224,  469 => 223,  445 => 201,  442 => 200,  417 => 191,  412 => 188,  403 => 185,  394 => 184,  390 => 183,  385 => 181,  379 => 179,  361 => 178,  359 => 177,  332 => 153,  321 => 145,  311 => 137,  296 => 135,  292 => 134,  281 => 126,  270 => 118,  261 => 112,  247 => 100,  244 => 99,  242 => 98,  237 => 95,  219 => 85,  213 => 81,  207 => 79,  201 => 77,  199 => 76,  195 => 74,  189 => 72,  183 => 70,  181 => 69,  175 => 66,  170 => 64,  166 => 63,  161 => 61,  158 => 60,  152 => 56,  146 => 54,  144 => 53,  138 => 50,  134 => 49,  131 => 48,  127 => 47,  108 => 31,  104 => 29,  102 => 28,  98 => 26,  92 => 23,  88 => 22,  85 => 21,  83 => 20,  79 => 19,  71 => 14,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}
<style>
    /* Estilos para el contenedor de la tabla de características */
    .tabla-caracteristicas-container {
        position: relative;
        min-height: 100px;
        overflow: visible;
    }
</style>

<script>
    const mod = '{{ mod }}';
    const entity = 'Productos';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <div>{{module_subtitulo}}</div>
        {% if module == 'form' %}
        <div class=\"btn-group\">
            <button id=\"btnGuardar\" class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"{{ mod }}\"><i class=\"fas fa-save\"></i> Guardar</button>
            <a id=\"btnCancelar\" class=\"btn btn-outline-secondary\" href=\"?mod={{ mod }}\"><i class=\"fas fa-times\"></i> Cancelar</a>
        </div>
        {% endif %}
    </div>
    <div class=\"card-body\">
        {% if module == 'list' %}
        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod={{mod}}&id=0\" data-id=\"0\"><i class=\"fas fa-plus\"></i> Nuevo</a>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-hover datatables\" data-dt_order='[[2,\"asc\"]]'>
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Imagen</th>
                        <th>SKU</th>
                        <th>Producto</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {% for data in Content %}
                    <tr 
                        data-id=\"{{ data.id }}\" 
                        data-ficha=\"{{ data.ficha }}\" 
                    >
                        <td>
                            {% if data.imagen %}
                            <img src=\"{{ data.imagen }}\" class=\"img-thumbnail\" style=\"width: 80px; height: 80px; object-fit: cover;\">
                            {% else %}
                            <div class=\"bg-light d-flex align-items-center justify-content-center\" style=\"width: 80px; height: 80px;\">
                                <i class=\"fas fa-image text-muted\"></i>
                            </div>
                            {% endif %}
                        </td>
                        <td>{{ data.sku }}</td>
                        <td>
                            <div class=\"fw-bold\">{{ data.nombre_es }}</div>
                            <small class=\"text-muted\">{{ data.nombre_en }}</small>
                        </td>
                        <td>{{ data.marca.nombre }}</td>
                        <td>
                            <div class=\"fw-bold\">
                                {% if data.descripcion_es|length > 20 %}
                                    {{ data.descripcion_es[:20] }}...
                                {% else %}
                                    {{ data.descripcion_es }}
                                {% endif %}
                            </div>
                            <small class=\"text-muted\">
                                {% if data.descripcion_en|length > 20 %}
                                    {{ data.descripcion_en[:20] }}...
                                {% else %}
                                    {{ data.descripcion_en }}
                                {% endif %}
                            </small>
                        </td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod={{ mod }}&id={{ data.id }}\" title=\"Ver\" data-toggle=\"tooltip\" data-placement=\"top\">
                                    <i class=\"fas fa-search\"></i>
                                </a>
                                <button class=\"btn btn-sm btn-outline-danger btnEliminarRegistro\" title=\"Eliminar\" data-toggle=\"tooltip\" data-placement=\"top\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
        {% elseif module == 'form' %}
        {% set data = Content[0] %}
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Productos\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información del Producto</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Nombre en Español\" value=\"{{ data.nombre_es }}\">
                                        <label for=\"nombre_es\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Nombre en Inglés\" value=\"{{ data.nombre_en }}\">
                                        <label for=\"nombre_en\">Nombre (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"sku\" name=\"sku\" class=\"form-control validar\" placeholder=\"SKU\" value=\"{{ data.sku }}\">
                                        <label for=\"sku\">SKU</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <select id=\"marca_id\" name=\"marca_id\" class=\"form-select validar\">
                                            <option value=\"\">Seleccione una Marca</option>
                                            {% for marca in Marcas %}
                                                <option value=\"{{ marca.id }}\" {% if data.marca_id == marca.id %}selected{% endif %}>{{ marca.nombre }}</option>
                                            {% endfor %}
                                        </select>
                                        <label for=\"marca_id\">Marca</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Español\">{{ data.descripcion_es }}</textarea>
                                        <label for=\"descripcion_es\">Descripción (Español)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Inglés\">{{ data.descripcion_en }}</textarea>
                                        <label for=\"descripcion_en\">Descripción (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Características -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Características del Producto</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"table-responsive tabla-caracteristicas-container\">
                                <table class=\"table\" id=\"tablaCaracteristicas\">
                                    <thead>
                                        <tr>
                                            <th style=\"width: 50%\">Característica</th>
                                            <th style=\"width: 40%\">Valor</th>
                                            <th class=\"columna-acciones\"></th>
                                        </tr>
                                    </thead>
                                    <tbody style=\"min-height: 150px;\">
                                        {% if data.caracteristicas is not empty %}
                                            {% for caracteristica in data.caracteristicas %}
                                                <tr data-caracteristica-id=\"{{ caracteristica.caracteristica_id }}\">
                                                    <td>
                                                        <select class=\"form-select caracteristica-select\" name=\"caracteristicas[{{ loop.index0 }}][id]\">
                                                            <option value=\"\">Seleccione una característica</option>
                                                            {% for carac in Caracteristicas %}
                                                                <option value=\"{{ carac.id }}\" {% if carac.id == caracteristica.caracteristica_id %}selected{% endif %}>
                                                                    {{ carac.nombre_es }}
                                                                </option>
                                                            {% endfor %}
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type=\"text\" class=\"form-control\" name=\"caracteristicas[{{ loop.index0 }}][valor]\" value=\"{{ caracteristica.valor }}\" placeholder=\"Valor\">
                                                    </td>
                                                    <td class=\"columna-acciones\">
                                                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger eliminar-fila\" title=\"Eliminar\">
                                                            <i class=\"fas fa-trash\"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            {% endfor %}
                                        {% endif %}
                                    </tbody>
                                </table>
                            </div>
                            <div class=\"text-end mt-3\">
                                <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" id=\"agregarCaracteristica\" title=\"Agregar Característica\">
                                    <i class=\"fas fa-plus\"></i> Característica
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
                    <!-- Categorías -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Categorías</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"form-floating\">
                                <select id=\"categorias\" name=\"categorias[]\" class=\"form-select tomselect validar\" data-remove-button=\"true\" multiple data-placeholder=\"Seleccione categorías\">
                                    {% for categoria in Categorias %}
                                        <option value=\"{{ categoria.id }}\" {% if categoria.id in data.categorias|default([])|map(c => c.categoria_id) %}selected{% endif %}>
                                            {{ categoria.nombre_es }}
                                        </option>
                                    {% endfor %}
                                </select>
                                <label for=\"categorias\">Categorías</label>
                            </div>
                        </div>
                    </div>

                    <!-- Ficha Técnica -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Ficha Técnica</h5>
                        </div>
                        <div class=\"card-body\">
                            <label for=\"ficha\" class=\"form-label\">Subir PDF</label>
                            <input type=\"file\" name=\"ficha\" id=\"ficha\" class=\"form-control\" accept=\".pdf\" value=\"{{ data.ficha }}\">
                            <input type=\"hidden\" name=\"ficha_actual\" id=\"ficha_actual\" value=\"{{ data.ficha }}\" />
                            <input type=\"hidden\" id=\"ficha_path\" name=\"ficha_path\" value=\"{{ ruta_ficha }}\">
                            {% if data.ficha is not empty %}
                            <div class=\"mt-2\">
                                <a href=\"../{{ ruta_ficha ~ data.ficha }}\" target=\"_blank\" class=\"btn btn-sm btn-outline-primary\">
                                    <i class=\"fas fa-file-pdf\"></i> Ver Ficha Actual
                                </a>
                            </div>
                            {% endif %}
                        </div>
                    </div>

                    <!-- Auditoría -->
                    {% if showAudit %}
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    {{ data.creacion_usuario }}<br>
                                    {{ data.creacion_fecha }}
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    {{ data.actualizacion_usuario }}<br>
                                    {{ data.actualizacion_fecha }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {% endif %}
                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"{{ data.id }}\">
        </form>
        {% else %}
        <div class=\"alert alert-warning\">Operación no válida: {{ module }}</div>
        {% endif %}
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');
            const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
            const btnAgregarCaracteristica = document.getElementById('agregarCaracteristica');
            let contadorFilas = {% if data.caracteristicas is not empty %}{{ data.caracteristicas|length }}{% else %}0{% endif %};

            // Función para agregar nueva fila de característica
            function agregarFilaCaracteristica() {
                const tbody = tablaCaracteristicas.querySelector('tbody');
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <select class=\"form-control form-select caracteristica-select\" name=\"caracteristicas[\${contadorFilas}][id]\">
                            <option value=\"\">Seleccione una característica</option>
                            {% for carac in Caracteristicas %}
                                <option value=\"{{ carac.id }}\">{{ carac.nombre_es }}</option>
                            {% endfor %}
                        </select>
                    </td>
                    <td>
                        <input type=\"text\" class=\"form-control\" name=\"caracteristicas[\${contadorFilas}][valor]\" placeholder=\"Valor\">
                    </td>
                    <td class=\"columna-acciones\">
                        <button type=\"button\" class=\"btn btn-sm btn-outline-danger eliminar-fila\" title=\"Eliminar\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
                contadorFilas++;

                // Inicializar TomSelect para el nuevo select
                new TomSelect(tr.querySelector('.caracteristica-select'), {
                    create: false,
                    sortField: {
                        field: \"text\",
                        direction: \"asc\"
                    },
                    dropdownParent: 'body'
                });
            }

            // Evento para el botón de agregar característica
            if (btnAgregarCaracteristica) {
                btnAgregarCaracteristica.addEventListener('click', function(e) {
                    e.preventDefault();
                    agregarFilaCaracteristica();
                });
            }

            // Evento para eliminar fila
            if (tablaCaracteristicas) {
                tablaCaracteristicas.addEventListener('click', function(e) {
                    if (e.target.closest('.eliminar-fila')) {
                        e.target.closest('tr').remove();
                        contadorFilas--;
                    }
                });
            }

            // Validación de duplicados
            if (tablaCaracteristicas) {
                tablaCaracteristicas.addEventListener('change', function(e) {
                    if (e.target.classList.contains('caracteristica-select')) {
                        const selectedValue = e.target.value;
                        const selects = document.querySelectorAll('.caracteristica-select');
                        let duplicado = false;

                        selects.forEach(select => {
                            if (select !== e.target && select.value === selectedValue && selectedValue !== '') {
                                duplicado = true;
                            }
                        });

                        if (duplicado) {
                            dialog('Esta característica ya ha sido seleccionada', 'warning');
                            e.target.value = '';
                        }
                    }
                });
            }

            // Inicializar TomSelect para selects existentes
            document.querySelectorAll('.caracteristica-select').forEach(select => {
                new TomSelect(select, {
                    create: false,
                    sortField: {
                        field: \"text\",
                        direction: \"asc\"
                    },
                    dropdownParent: 'body'
                });
            });

            if (btnEliminarRegistro) {
                btnEliminarRegistro.forEach(btn => {
                    btn.addEventListener('click', eliminaRegistro);
                });
            }
            
            if (btnGuardar) {
                btnGuardar.addEventListener('click', async function () { 
                    // Validar que no haya características duplicadas antes de enviar
                    const selects = document.querySelectorAll('select.caracteristica-select');
                    const valores = new Set();
                    let duplicado = false;
                    let caracteristicaVacia = false;

                    selects.forEach(select => {
                        const valor = select.value;
                        if (valor === '') {
                            caracteristicaVacia = true;
                        } else if (valores.has(valor)) {
                            duplicado = true;
                        }
                        valores.add(valor);
                    });

                    if (caracteristicaVacia) {
                        dialog('Existen características sin seleccionar. Por favor, complete todas las características.', 'warning');
                        return;
                    }

                    if (duplicado) {
                        dialog('Existen características duplicadas. Por favor, corrija antes de guardar.', 'warning');
                        return;
                    }

                    \$('#form_').sendForm(); 
                });
            }

            async function eliminaRegistro(event) {
                event.preventDefault();
                dialog(
                    \"¿Está seguro?\",
                    \"WARNING\",
                    null,
                    null,
                    {
                        \"Sí\": { 
                            btnClass: \"btn-orange\", 
                            action: async function () { 
                                const row = event.target.closest('tr');
                                const id = row.getAttribute('data-id');
                                const ficha = row.getAttribute('data-ficha');

                                const filesToDelete = [];
                                if (ficha) filesToDelete.push(`documentos/productos/\${ficha}`);
                                
                                const formData = new FormData();
                                formData.append('action', 'delete');
                                formData.append('entity', entity);
                                formData.append('id', id);
                                formData.append('files', filesToDelete);
                                
                                const url = `/src/Api/index.php`;
                                const response = await fetchCall(url, 'POST',formData);
                                if (!response.isOk){
                                    \$(\".preloader\").fadeOut();
                                    if (response.Content == 0) {
                                        //Session
                                        document.location.href = \"./\";
                                    }
                                    dialog(response.Message, response.Type);
                                    return;
                                }
                                const botones = { ACEPTAR: { btnClass: 'btn-success', action: function(){ document.location.href=\"./?mod=\"+mod; } }};
                                dialog(response.Message,response.Type,null,null,botones);
                            } 
                        },
                        \"No\": { 
                            btnClass: \"btn-default\", 
                        }
                    }
                );
            }
        } catch (error) {
            const mensaje = `Error al procesar la petición: \${error}`;
            dialog(mensaje, 'error');
        }
    });
</script>
{% endblock %}", "@modules/productos.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\productos.twig");
    }
}
