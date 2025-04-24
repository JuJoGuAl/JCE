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

    /* Estilos para Dropzone */
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        min-height: 150px;
        padding: 20px;
    }

    .dropzone .dz-preview {
        margin: 10px;
        position: relative;
        display: inline-block;
        width: 200px;
        height: 200px;
    }

    .dropzone .dz-preview .dz-image {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        overflow: hidden;
    }

    .dropzone .dz-preview .dz-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dropzone .dz-preview .dz-details {
        display: none;
    }

    .dropzone .dz-preview .dz-progress {
        display: none;
    }

    .dropzone .dz-preview .dz-remove {
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 999;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0.9;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .dropzone .dz-preview .dz-remove:hover {
        background: #c82333;
        opacity: 1;
        transform: scale(1.1);
        text-decoration: none;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }

    .dropzone .dz-preview:hover .dz-remove {
        opacity: 1;
    }

    .dropzone .dz-preview .dz-remove i {
        font-size: 12px;
    }
</style>

<script>
    const mod = '";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "';
    const entity = 'Productos';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <div>";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
        ";
        // line 96
        if ((($context["module"] ?? null) == "form")) {
            // line 97
            yield "        <div class=\"btn-group\">
            <button id=\"btnGuardar\" class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 98
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-save\"></i> Guardar</button>
            <a id=\"btnCancelar\" class=\"btn btn-outline-secondary\" href=\"?mod=";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-times\"></i> Cancelar</a>
        </div>
        ";
        }
        // line 102
        yield "    </div>
    <div class=\"card-body\">
        ";
        // line 104
        if ((($context["module"] ?? null) == "list")) {
            // line 105
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 107
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
            // line 123
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 124
                yield "                    <tr 
                        data-id=\"";
                // line 125
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 125), "html", null, true);
                yield "\" 
                        data-ficha=\"";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "ficha", [], "any", false, false, false, 126), "html", null, true);
                yield "\" 
                    >
                        <td>
                            ";
                // line 129
                if (CoreExtension::getAttribute($this->env, $this->source, $context["data"], "imagen", [], "any", false, false, false, 129)) {
                    // line 130
                    yield "                            <img src=\"../";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "imagen", [], "any", false, false, false, 130), "html", null, true);
                    yield "\" class=\"img-thumbnail\" style=\"width: 80px; height: 80px; object-fit: cover;\">
                            ";
                } else {
                    // line 132
                    yield "                            <div class=\"bg-light d-flex align-items-center justify-content-center\" style=\"width: 80px; height: 80px;\">
                                <i class=\"fas fa-image text-muted\"></i>
                            </div>
                            ";
                }
                // line 136
                yield "                        </td>
                        <td>";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "sku", [], "any", false, false, false, 137), "html", null, true);
                yield "</td>
                        <td>
                            <div class=\"fw-bold\">";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_es", [], "any", false, false, false, 139), "html", null, true);
                yield "</div>
                            <small class=\"text-muted\">";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_en", [], "any", false, false, false, 140), "html", null, true);
                yield "</small>
                        </td>
                        <td>";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["data"], "marca", [], "any", false, false, false, 142), "nombre", [], "any", false, false, false, 142), "html", null, true);
                yield "</td>
                        <td>
                            <div class=\"fw-bold\">
                                ";
                // line 145
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 145)) > 20)) {
                    // line 146
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 146), 0, 20), "html", null, true);
                    yield "...
                                ";
                } else {
                    // line 148
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 148), "html", null, true);
                    yield "
                                ";
                }
                // line 150
                yield "                            </div>
                            <small class=\"text-muted\">
                                ";
                // line 152
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 152)) > 20)) {
                    // line 153
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 153), 0, 20), "html", null, true);
                    yield "...
                                ";
                } else {
                    // line 155
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 155), "html", null, true);
                    yield "
                                ";
                }
                // line 157
                yield "                            </small>
                        </td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod=";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 161), "html", null, true);
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
            // line 171
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 174
($context["module"] ?? null) == "form")) {
            // line 175
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 176
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
            // line 188
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_es", [], "any", false, false, false, 188), "html", null, true);
            yield "\">
                                        <label for=\"nombre_es\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Nombre en Inglés\" value=\"";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_en", [], "any", false, false, false, 194), "html", null, true);
            yield "\">
                                        <label for=\"nombre_en\">Nombre (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"sku\" name=\"sku\" class=\"form-control validar\" placeholder=\"SKU\" value=\"";
            // line 202
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "sku", [], "any", false, false, false, 202), "html", null, true);
            yield "\">
                                        <label for=\"sku\">SKU</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <select id=\"marca_id\" name=\"marca_id\" class=\"form-select validar\">
                                            <option value=\"\">Seleccione una Marca</option>
                                            ";
            // line 210
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Marcas"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["marca"]) {
                // line 211
                yield "                                                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 211), "html", null, true);
                yield "\" ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "marca_id", [], "any", false, false, false, 211) == CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 211))) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "nombre", [], "any", false, false, false, 211), "html", null, true);
                yield "</option>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['marca'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 213
            yield "                                        </select>
                                        <label for=\"marca_id\">Marca</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Español\">";
            // line 221
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_es", [], "any", false, false, false, 221), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_es\">Descripción (Español)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Inglés\">";
            // line 229
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_en", [], "any", false, false, false, 229), "html", null, true);
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
            // line 253
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 253))) {
                // line 254
                yield "                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 254));
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
                    // line 255
                    yield "                                                <tr data-caracteristica-id=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "caracteristica_id", [], "any", false, false, false, 255), "html", null, true);
                    yield "\">
                                                    <td>
                                                        <select class=\"form-select caracteristica-select\" name=\"caracteristicas[";
                    // line 257
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 257), "html", null, true);
                    yield "][id]\">
                                                            <option value=\"\">Seleccione una característica</option>
                                                            ";
                    // line 259
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["Caracteristicas"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["carac"]) {
                        // line 260
                        yield "                                                                <option value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 260), "html", null, true);
                        yield "\" ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 260) == CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "caracteristica_id", [], "any", false, false, false, 260))) {
                            yield "selected";
                        }
                        yield ">
                                                                    ";
                        // line 261
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "nombre_es", [], "any", false, false, false, 261), "html", null, true);
                        yield "
                                                                </option>
                                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['carac'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 264
                    yield "                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type=\"text\" class=\"form-control\" name=\"caracteristicas[";
                    // line 267
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 267), "html", null, true);
                    yield "][valor]\" value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["caracteristica"], "valor", [], "any", false, false, false, 267), "html", null, true);
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
                // line 276
                yield "                                        ";
            }
            // line 277
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
            // line 299
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Categorias"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
                // line 300
                yield "                                        <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "id", [], "any", false, false, false, 300), "html", null, true);
                yield "\" ";
                if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "id", [], "any", false, false, false, 300), Twig\Extension\CoreExtension::map($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "categorias", [], "any", true, true, false, 300)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "categorias", [], "any", false, false, false, 300), [])) : ([])), function ($__c__) use ($context, $macros) { $context["c"] = $__c__; return CoreExtension::getAttribute($this->env, $this->source, ($context["c"] ?? null), "categoria_id", [], "any", false, false, false, 300); }))) {
                    yield "selected";
                }
                yield ">
                                            ";
                // line 301
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoria"], "nombre_es", [], "any", false, false, false, 301), "html", null, true);
                yield "
                                        </option>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['categoria'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 304
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
            // line 317
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 317), "html", null, true);
            yield "\">
                            <input type=\"hidden\" name=\"ficha_actual\" id=\"ficha_actual\" value=\"";
            // line 318
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 318), "html", null, true);
            yield "\" />
                            <input type=\"hidden\" id=\"ficha_path\" name=\"ficha_path\" value=\"";
            // line 319
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_ficha"] ?? null), "html", null, true);
            yield "\">
                            ";
            // line 320
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 320))) {
                // line 321
                yield "                            <div class=\"mt-2\">
                                <a href=\"../";
                // line 322
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_ficha"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "ficha", [], "any", false, false, false, 322)), "html", null, true);
                yield "\" target=\"_blank\" class=\"btn btn-sm btn-outline-primary\">
                                    <i class=\"fas fa-file-pdf\"></i> Ver Ficha Actual
                                </a>
                            </div>
                            ";
            }
            // line 327
            yield "                        </div>
                    </div>

                    <!-- Auditoría -->
                    ";
            // line 331
            if (($context["showAudit"] ?? null)) {
                // line 332
                yield "                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    ";
                // line 340
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 340), "html", null, true);
                yield "<br>
                                    ";
                // line 341
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 341), "html", null, true);
                yield "
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    ";
                // line 345
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 345), "html", null, true);
                yield "<br>
                                    ";
                // line 346
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 346), "html", null, true);
                yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            // line 352
            yield "                </div>
            </div>

            <!-- Imágenes -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"card-title mb-0\">Imágenes del Producto</h5>
                </div>
                <div class=\"card-body\">
                    <!-- Sección de imágenes existentes -->
                    ";
            // line 362
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "imagenes", [], "any", false, false, false, 362))) {
                // line 363
                yield "                    <div class=\"row mb-4\">
                        <h6 class=\"mb-3\">Imágenes existentes:</h6>
                        ";
                // line 365
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "imagenes", [], "any", false, false, false, 365));
                foreach ($context['_seq'] as $context["_key"] => $context["imagen"]) {
                    // line 366
                    yield "                        <div class=\"col-md-3 col-sm-6 mb-3\">
                            <div class=\"position-relative\">
                                <img src=\"../";
                    // line 368
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["imagen"], "ruta", [], "any", false, false, false, 368), "html", null, true);
                    yield "\" class=\"img-thumbnail\" style=\"width: 100%; height: 200px; object-fit: cover;\">
                                <button type=\"button\" class=\"btn btn-sm btn-danger position-absolute top-0 end-0 m-2 eliminar-imagen\" 
                                        data-id=\"";
                    // line 370
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["imagen"], "id", [], "any", false, false, false, 370), "html", null, true);
                    yield "\" 
                                        data-ruta=\"";
                    // line 371
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["imagen"], "ruta", [], "any", false, false, false, 371), "html", null, true);
                    yield "\"
                                        title=\"Eliminar imagen\">
                                    <i class=\"fas fa-times\"></i>
                                </button>
                            </div>
                        </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['imagen'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 378
                yield "                    </div>
                    ";
            }
            // line 380
            yield "
                    <div id=\"dropzone\" class=\"dropzone\">
                        <div class=\"dz-message\">
                            Arrastra y suelta imágenes aquí o haz clic para seleccionar
                        </div>
                    </div>
                    <div id=\"preview-template\" style=\"display: none;\">
                        <div class=\"dz-preview dz-file-preview\">
                            <div class=\"dz-image\">
                                <img data-dz-thumbnail />
                            </div>
                            <div class=\"dz-details\">
                                <div class=\"dz-size\"><span data-dz-size></span></div>
                                <div class=\"dz-filename\"><span data-dz-name></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 400
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 400), "html", null, true);
            yield "\">
        </form>
        ";
        } else {
            // line 403
            yield "        <div class=\"alert alert-warning\">Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 405
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 409
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 410
        yield "<script>
    // Desactivar la inicialización automática de Dropzone
    Dropzone.autoDiscover = false;

    // Obtener configuración de imágenes
    const configImagenes = {
        maxSize: ";
        // line 416
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["max_size_image"] ?? null), "html", null, true);
        yield ", // Convertir a MB
        allowedTypes: ";
        // line 417
        yield json_encode(($context["allowed_types_image"] ?? null));
        yield ",
        imagenesExistentes: ";
        // line 418
        yield json_encode(((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "imagenes", [], "any", true, true, false, 418)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "imagenes", [], "any", false, false, false, 418), [])) : ([])));
        yield "
    };

    document.addEventListener('DOMContentLoaded', function () {
        try {
            \$('.preloader').fadeOut();
            
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');
            const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
            const btnAgregarCaracteristica = document.getElementById('agregarCaracteristica');
            const dropzone = document.getElementById('dropzone');
            let contadorFilas = ";
        // line 430
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 430))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "caracteristicas", [], "any", false, false, false, 430)), "html", null, true);
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
        // line 440
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["Caracteristicas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["carac"]) {
            // line 441
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "id", [], "any", false, false, false, 441), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["carac"], "nombre_es", [], "any", false, false, false, 441), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['carac'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 443
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

            // Función para eliminar imagen existente
            document.querySelectorAll('.eliminar-imagen').forEach(btn => {
                btn.addEventListener('click', async function() {
                    const id = this.dataset.id;
                    const ruta = this.dataset.ruta;
                    
                    dialog(
                        \"¿Está seguro que desea eliminar esta imagen?\",
                        \"WARNING\",
                        null,
                        null,
                        {
                            \"Sí\": { 
                                btnClass: \"btn-orange\", 
                                action: async function () {
                                    const formData = new FormData();
                                    formData.append('action', 'delete_image');
                                    formData.append('entity', entity);
                                    formData.append('id', id);
                                    formData.append('ruta', ruta);
                                    
                                    const url = `/src/Api/index.php`;
                                    const response = await fetchCall(url, 'POST', formData);
                                    
                                    if (!response.isOk) {
                                        dialog(response.Message, response.Type);
                                        return;
                                    }
                                    
                                    // Recargar la página para mostrar los cambios
                                    location.reload();
                                } 
                            },
                            \"No\": { 
                                btnClass: \"btn-default\", 
                            }
                        }
                    );
                });
            });

            if (btnGuardar) {
                const myDropzone = new Dropzone(\"#dropzone\", {
                    url: \"#\", // No subir inmediatamente
                    paramName: \"imagenes[]\",
                    maxFilesize: configImagenes.maxSize, // Tamaño máximo en MB
                    acceptedFiles: configImagenes.allowedTypes.map(type => `.\${type.split('/')[1]}`).join(','), // Convertir MIME types a extensiones
                    addRemoveLinks: true,
                    autoProcessQueue: false, // No procesar automáticamente
                    dictDefaultMessage: \"Arrastra y suelta imágenes aquí o haz clic para seleccionar\",
                    dictRemoveFile: `<i class=\"fas fa-times\"></i>`,
                    dictFileTooBig: `La imagen es demasiado grande (";
        // line 577
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["filesize"] ?? null), "html", null, true);
        yield "MB). Tamaño máximo: \${configImagenes.maxSize}MB.`,
                    dictInvalidFileType: \"No puedes subir archivos de este tipo.\",
                    dictResponseError: \"Error al subir el archivo.\",
                    dictCancelUpload: \"Cancelar subida\",
                    dictUploadCanceled: \"Subida cancelada\",
                    dictCancelUploadConfirmation: \"¿Estás seguro de que quieres cancelar esta subida?\",
                    dictMaxFilesExceeded: \"No puedes subir más archivos.\"
                });

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

                    // Crear inputs file para las imágenes de Dropzone
                    const form = document.getElementById('form_');
                    const imagenesContainer = document.createElement('div');
                    imagenesContainer.style.display = 'none';

                    // Agregar input para la ruta de las imágenes
                    const rutaInput = document.createElement('input');
                    rutaInput.type = 'hidden';
                    rutaInput.name = 'imagenes_path';
                    rutaInput.value = 'images/productos/'; // Ruta base
                    imagenesContainer.appendChild(rutaInput);

                    myDropzone.files.forEach((file, index) => {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.name = 'imagenes[]';
                        
                        // Crear un nuevo DataTransfer para cada archivo
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        input.files = dataTransfer.files;
                        
                        imagenesContainer.appendChild(input);
                    });

                    form.appendChild(imagenesContainer);

                    // Enviar el formulario
                    \$('#form_').sendForm();

                    imagenesContainer.remove();
                });
            }

            async function eliminaRegistro(event) {
                event.preventDefault();
                dialog(
                    \"¿Está seguro que desea eliminar este registro?\",
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
        return array (  948 => 577,  812 => 443,  801 => 441,  797 => 440,  780 => 430,  765 => 418,  761 => 417,  757 => 416,  749 => 410,  742 => 409,  735 => 405,  729 => 403,  723 => 400,  701 => 380,  697 => 378,  684 => 371,  680 => 370,  675 => 368,  671 => 366,  667 => 365,  663 => 363,  661 => 362,  649 => 352,  640 => 346,  636 => 345,  629 => 341,  625 => 340,  615 => 332,  613 => 331,  607 => 327,  599 => 322,  596 => 321,  594 => 320,  590 => 319,  586 => 318,  582 => 317,  567 => 304,  558 => 301,  549 => 300,  545 => 299,  521 => 277,  518 => 276,  493 => 267,  488 => 264,  479 => 261,  470 => 260,  466 => 259,  461 => 257,  455 => 255,  437 => 254,  435 => 253,  408 => 229,  397 => 221,  387 => 213,  372 => 211,  368 => 210,  357 => 202,  346 => 194,  337 => 188,  323 => 176,  320 => 175,  318 => 174,  313 => 171,  295 => 161,  289 => 157,  283 => 155,  277 => 153,  275 => 152,  271 => 150,  265 => 148,  259 => 146,  257 => 145,  251 => 142,  246 => 140,  242 => 139,  237 => 137,  234 => 136,  228 => 132,  222 => 130,  220 => 129,  214 => 126,  210 => 125,  207 => 124,  203 => 123,  184 => 107,  180 => 105,  178 => 104,  174 => 102,  168 => 99,  164 => 98,  161 => 97,  159 => 96,  155 => 95,  147 => 90,  59 => 4,  52 => 3,  41 => 1,);
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

    /* Estilos para Dropzone */
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        min-height: 150px;
        padding: 20px;
    }

    .dropzone .dz-preview {
        margin: 10px;
        position: relative;
        display: inline-block;
        width: 200px;
        height: 200px;
    }

    .dropzone .dz-preview .dz-image {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        overflow: hidden;
    }

    .dropzone .dz-preview .dz-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dropzone .dz-preview .dz-details {
        display: none;
    }

    .dropzone .dz-preview .dz-progress {
        display: none;
    }

    .dropzone .dz-preview .dz-remove {
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 999;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0.9;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .dropzone .dz-preview .dz-remove:hover {
        background: #c82333;
        opacity: 1;
        transform: scale(1.1);
        text-decoration: none;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
    }

    .dropzone .dz-preview:hover .dz-remove {
        opacity: 1;
    }

    .dropzone .dz-preview .dz-remove i {
        font-size: 12px;
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
                            <img src=\"../{{ data.imagen }}\" class=\"img-thumbnail\" style=\"width: 80px; height: 80px; object-fit: cover;\">
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

            <!-- Imágenes -->
            <div class=\"card mb-4\">
                <div class=\"card-header\">
                    <h5 class=\"card-title mb-0\">Imágenes del Producto</h5>
                </div>
                <div class=\"card-body\">
                    <!-- Sección de imágenes existentes -->
                    {% if data.imagenes is not empty %}
                    <div class=\"row mb-4\">
                        <h6 class=\"mb-3\">Imágenes existentes:</h6>
                        {% for imagen in data.imagenes %}
                        <div class=\"col-md-3 col-sm-6 mb-3\">
                            <div class=\"position-relative\">
                                <img src=\"../{{ imagen.ruta }}\" class=\"img-thumbnail\" style=\"width: 100%; height: 200px; object-fit: cover;\">
                                <button type=\"button\" class=\"btn btn-sm btn-danger position-absolute top-0 end-0 m-2 eliminar-imagen\" 
                                        data-id=\"{{ imagen.id }}\" 
                                        data-ruta=\"{{ imagen.ruta }}\"
                                        title=\"Eliminar imagen\">
                                    <i class=\"fas fa-times\"></i>
                                </button>
                            </div>
                        </div>
                        {% endfor %}
                    </div>
                    {% endif %}

                    <div id=\"dropzone\" class=\"dropzone\">
                        <div class=\"dz-message\">
                            Arrastra y suelta imágenes aquí o haz clic para seleccionar
                        </div>
                    </div>
                    <div id=\"preview-template\" style=\"display: none;\">
                        <div class=\"dz-preview dz-file-preview\">
                            <div class=\"dz-image\">
                                <img data-dz-thumbnail />
                            </div>
                            <div class=\"dz-details\">
                                <div class=\"dz-size\"><span data-dz-size></span></div>
                                <div class=\"dz-filename\"><span data-dz-name></span></div>
                            </div>
                        </div>
                    </div>
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
    // Desactivar la inicialización automática de Dropzone
    Dropzone.autoDiscover = false;

    // Obtener configuración de imágenes
    const configImagenes = {
        maxSize: {{ max_size_image }}, // Convertir a MB
        allowedTypes: {{ allowed_types_image|json_encode|raw }},
        imagenesExistentes: {{ data.imagenes|default([])|json_encode|raw }}
    };

    document.addEventListener('DOMContentLoaded', function () {
        try {
            \$('.preloader').fadeOut();
            
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');
            const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
            const btnAgregarCaracteristica = document.getElementById('agregarCaracteristica');
            const dropzone = document.getElementById('dropzone');
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

            // Función para eliminar imagen existente
            document.querySelectorAll('.eliminar-imagen').forEach(btn => {
                btn.addEventListener('click', async function() {
                    const id = this.dataset.id;
                    const ruta = this.dataset.ruta;
                    
                    dialog(
                        \"¿Está seguro que desea eliminar esta imagen?\",
                        \"WARNING\",
                        null,
                        null,
                        {
                            \"Sí\": { 
                                btnClass: \"btn-orange\", 
                                action: async function () {
                                    const formData = new FormData();
                                    formData.append('action', 'delete_image');
                                    formData.append('entity', entity);
                                    formData.append('id', id);
                                    formData.append('ruta', ruta);
                                    
                                    const url = `/src/Api/index.php`;
                                    const response = await fetchCall(url, 'POST', formData);
                                    
                                    if (!response.isOk) {
                                        dialog(response.Message, response.Type);
                                        return;
                                    }
                                    
                                    // Recargar la página para mostrar los cambios
                                    location.reload();
                                } 
                            },
                            \"No\": { 
                                btnClass: \"btn-default\", 
                            }
                        }
                    );
                });
            });

            if (btnGuardar) {
                const myDropzone = new Dropzone(\"#dropzone\", {
                    url: \"#\", // No subir inmediatamente
                    paramName: \"imagenes[]\",
                    maxFilesize: configImagenes.maxSize, // Tamaño máximo en MB
                    acceptedFiles: configImagenes.allowedTypes.map(type => `.\${type.split('/')[1]}`).join(','), // Convertir MIME types a extensiones
                    addRemoveLinks: true,
                    autoProcessQueue: false, // No procesar automáticamente
                    dictDefaultMessage: \"Arrastra y suelta imágenes aquí o haz clic para seleccionar\",
                    dictRemoveFile: `<i class=\"fas fa-times\"></i>`,
                    dictFileTooBig: `La imagen es demasiado grande ({{filesize}}MB). Tamaño máximo: \${configImagenes.maxSize}MB.`,
                    dictInvalidFileType: \"No puedes subir archivos de este tipo.\",
                    dictResponseError: \"Error al subir el archivo.\",
                    dictCancelUpload: \"Cancelar subida\",
                    dictUploadCanceled: \"Subida cancelada\",
                    dictCancelUploadConfirmation: \"¿Estás seguro de que quieres cancelar esta subida?\",
                    dictMaxFilesExceeded: \"No puedes subir más archivos.\"
                });

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

                    // Crear inputs file para las imágenes de Dropzone
                    const form = document.getElementById('form_');
                    const imagenesContainer = document.createElement('div');
                    imagenesContainer.style.display = 'none';

                    // Agregar input para la ruta de las imágenes
                    const rutaInput = document.createElement('input');
                    rutaInput.type = 'hidden';
                    rutaInput.name = 'imagenes_path';
                    rutaInput.value = 'images/productos/'; // Ruta base
                    imagenesContainer.appendChild(rutaInput);

                    myDropzone.files.forEach((file, index) => {
                        const input = document.createElement('input');
                        input.type = 'file';
                        input.name = 'imagenes[]';
                        
                        // Crear un nuevo DataTransfer para cada archivo
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        input.files = dataTransfer.files;
                        
                        imagenesContainer.appendChild(input);
                    });

                    form.appendChild(imagenesContainer);

                    // Enviar el formulario
                    \$('#form_').sendForm();

                    imagenesContainer.remove();
                });
            }

            async function eliminaRegistro(event) {
                event.preventDefault();
                dialog(
                    \"¿Está seguro que desea eliminar este registro?\",
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
