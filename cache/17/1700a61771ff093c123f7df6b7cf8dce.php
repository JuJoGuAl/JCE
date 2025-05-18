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

/* @modules/caracteristicas.twig */
class __TwigTemplate_86e42380c2d63a2eec733293485db7c4 extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@modules/caracteristicas.twig", 1);
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
        yield "<script>
    const mod = '";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "';
    const entity = 'Caracteristicas';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <div>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
        ";
        // line 11
        if ((($context["module"] ?? null) == "form")) {
            // line 12
            yield "        <div class=\"btn-group\">
            <button id=\"btnGuardar\" class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-save\"></i> Guardar</button>
            <a id=\"btnCancelar\" class=\"btn btn-outline-secondary\" href=\"?mod=";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-times\"></i> Cancelar</a>
        </div>
        ";
        }
        // line 17
        yield "    </div>
    <div class=\"card-body\">
        ";
        // line 19
        if ((($context["module"] ?? null) == "list")) {
            // line 20
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "&id=0\" data-id=\"0\"><i class=\"fas fa-plus\"></i> Nuevo</a>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-hover datatables\">
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Foto</th>
                        <th style=\"width: 100px\">Característica</th>
                        <th>Nombre (ES)</th>
                        <th>Nombre (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 38
                yield "                    <tr data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 38), "html", null, true);
                yield "\" data-foto=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 38), "html", null, true);
                yield "\">
                        <td>
                            <div class=\"position-relative\" style=\"width: 80px; height: 80px;\">
                                ";
                // line 41
                if (CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 41)) {
                    // line 42
                    yield "                                <img src=\"../";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 42), "html", null, true);
                    yield "\" class=\"img-thumbnail position-absolute\" style=\"width: 100%; height: 100%; object-fit: cover; z-index: 1;\">
                                ";
                } else {
                    // line 44
                    yield "                                <div class=\"bg-light d-flex align-items-center justify-content-center position-absolute\" style=\"width: 100%; height: 100%; z-index: 1;\">
                                    <i class=\"fas fa-image text-muted\"></i>
                                </div>
                                ";
                }
                // line 48
                yield "                            </div>
                        </td>
                        <td>";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "codigo", [], "any", false, false, false, 50), "html", null, true);
                yield "</td>
                        <td>";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_es", [], "any", false, false, false, 51), "html", null, true);
                yield "</td>
                        <td>";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_en", [], "any", false, false, false, 52), "html", null, true);
                yield "</td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod=";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 55), "html", null, true);
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
            // line 65
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 68
($context["module"] ?? null) == "form")) {
            // line 69
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 70
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" data-entity=\"Caracteristicas\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Característica</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Nombre en Español\" value=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_es", [], "any", false, false, false, 82), "html", null, true);
            yield "\">
                                        <label for=\"nombre_es\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-md-6\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Nombre en Inglés\" value=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_en", [], "any", false, false, false, 88), "html", null, true);
            yield "\">
                                        <label for=\"nombre_en\">Nombre (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Español\">";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_es", [], "any", false, false, false, 96), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_es\">Descripción (Español)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Inglés\">";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_en", [], "any", false, false, false, 104), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_en\">Descripción (Inglés)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
                    <!-- Imágenes -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Imágenes</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"mb-3\">
                                <label for=\"foto\" class=\"form-label\">Foto</label>
                                <input type=\"file\" class=\"form-control\" id=\"foto\" name=\"foto\" accept=\"image/*\" value=\"";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 123), "html", null, true);
            yield "\">
                                <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 124), "html", null, true);
            yield "\" />
                                <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
            yield "\">
                                ";
            // line 126
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 126)) {
                // line 127
                yield "                                <div class=\"mt-2 text-center\">
                                    <img src=\"../";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 128), "html", null, true);
                yield "\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
                                </div>
                                ";
            }
            // line 131
            yield "                            </div>
                        </div>
                    </div>
                    <!-- Auditoría -->
                    ";
            // line 135
            if (($context["showAudit"] ?? null)) {
                // line 136
                yield "                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    ";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 144), "html", null, true);
                yield "<br>
                                    ";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 145), "html", null, true);
                yield "
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    ";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 149), "html", null, true);
                yield "<br>
                                    ";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 150), "html", null, true);
                yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            // line 156
            yield "                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 159), "html", null, true);
            yield "\">
        </form>
        ";
        } else {
            // line 162
            yield "        <div class=\"alert alert-warning\">Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 164
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 168
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 169
        yield "<script>
    document.addEventListener('DOMContentLoaded', function () {
        try {
            \$('.preloader').fadeOut();
            
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');

            if(btnGuardar != null) {
                btnGuardar.addEventListener('click', async function () { \$('#form_').sendForm(); });
            }

            if (btnEliminarRegistro) {
                btnEliminarRegistro.forEach(btn => {
                    btn.addEventListener('click', eliminaRegistro);
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
                                const foto = row.getAttribute('data-foto');

                                const filesToDelete = [];
                                if (foto) filesToDelete.push(`images/caracteristicas/\${foto}`);

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
        return "@modules/caracteristicas.twig";
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
        return array (  355 => 169,  348 => 168,  341 => 164,  335 => 162,  329 => 159,  324 => 156,  315 => 150,  311 => 149,  304 => 145,  300 => 144,  290 => 136,  288 => 135,  282 => 131,  275 => 128,  272 => 127,  270 => 126,  266 => 125,  262 => 124,  258 => 123,  236 => 104,  225 => 96,  214 => 88,  205 => 82,  191 => 70,  188 => 69,  186 => 68,  181 => 65,  163 => 55,  157 => 52,  153 => 51,  149 => 50,  145 => 48,  139 => 44,  132 => 42,  130 => 41,  121 => 38,  117 => 37,  99 => 22,  95 => 20,  93 => 19,  89 => 17,  83 => 14,  79 => 13,  76 => 12,  74 => 11,  70 => 10,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}
<script>
    const mod = '{{ mod }}';
    const entity = 'Caracteristicas';
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
            <table class=\"table table-hover datatables\">
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Foto</th>
                        <th style=\"width: 100px\">Característica</th>
                        <th>Nombre (ES)</th>
                        <th>Nombre (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {% for data in Content %}
                    <tr data-id=\"{{ data.id }}\" data-foto=\"{{ data.foto }}\">
                        <td>
                            <div class=\"position-relative\" style=\"width: 80px; height: 80px;\">
                                {% if data.foto %}
                                <img src=\"../{{ ruta_fotos }}{{ data.foto }}\" class=\"img-thumbnail position-absolute\" style=\"width: 100%; height: 100%; object-fit: cover; z-index: 1;\">
                                {% else %}
                                <div class=\"bg-light d-flex align-items-center justify-content-center position-absolute\" style=\"width: 100%; height: 100%; z-index: 1;\">
                                    <i class=\"fas fa-image text-muted\"></i>
                                </div>
                                {% endif %}
                            </div>
                        </td>
                        <td>{{ data.codigo }}</td>
                        <td>{{ data.nombre_es }}</td>
                        <td>{{ data.nombre_en }}</td>
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
        <form role=\"form\" name=\"form_\" id=\"form_\" data-entity=\"Caracteristicas\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Característica</h5>
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
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
                    <!-- Imágenes -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Imágenes</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"mb-3\">
                                <label for=\"foto\" class=\"form-label\">Foto</label>
                                <input type=\"file\" class=\"form-control\" id=\"foto\" name=\"foto\" accept=\"image/*\" value=\"{{ data.foto }}\">
                                <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"{{ data.foto }}\" />
                                <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"{{ ruta_fotos }}\">
                                {% if data.foto %}
                                <div class=\"mt-2 text-center\">
                                    <img src=\"../{{ ruta_fotos }}{{ data.foto }}\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
                                </div>
                                {% endif %}
                            </div>
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
            \$('.preloader').fadeOut();
            
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');

            if(btnGuardar != null) {
                btnGuardar.addEventListener('click', async function () { \$('#form_').sendForm(); });
            }

            if (btnEliminarRegistro) {
                btnEliminarRegistro.forEach(btn => {
                    btn.addEventListener('click', eliminaRegistro);
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
                                const foto = row.getAttribute('data-foto');

                                const filesToDelete = [];
                                if (foto) filesToDelete.push(`images/caracteristicas/\${foto}`);

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
{% endblock %} ", "@modules/caracteristicas.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\caracteristicas.twig");
    }
}
