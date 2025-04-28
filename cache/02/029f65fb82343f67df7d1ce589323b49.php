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
        yield "
<script>
    const mod = '";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "';
    const entity = 'Marcas';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <div>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
        ";
        // line 12
        if ((($context["module"] ?? null) == "form")) {
            // line 13
            yield "        <div class=\"btn-group\">
            <button id=\"btnGuardar\" class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-save\"></i> Guardar</button>
            <a id=\"btnCancelar\" class=\"btn btn-outline-secondary\" href=\"?mod=";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><i class=\"fas fa-times\"></i> Cancelar</a>
        </div>
        ";
        }
        // line 18
        yield "    </div>
    <div class=\"card-body\">
        ";
        // line 20
        if ((($context["module"] ?? null) == "list")) {
            // line 21
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "&id=0\" data-id=\"0\"><i class=\"fas fa-plus\"></i> Nuevo</a>
            </div>
        </div>
        <div class=\"table-responsive\">
            <table class=\"table table-hover datatables\" data-dt_order='[[1,\"asc\"]]'>
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Logo</th>
                        <th>Marca</th>
                        <th>Descripción (ES)</th>
                        <th>Descripción (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 39
                yield "                    <tr 
                        data-id=\"";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 40), "html", null, true);
                yield "\" 
                        data-foto=\"";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 41), "html", null, true);
                yield "\" 
                        data-logo=\"";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "logo", [], "any", false, false, false, 42), "html", null, true);
                yield "\"
                    >
                        <td>
                            <div class=\"position-relative\" style=\"width: 80px; height: 80px;\">
                                ";
                // line 46
                if (CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 46)) {
                    // line 47
                    yield "                                <img src=\"../";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 47), "html", null, true);
                    yield "\" class=\"img-thumbnail position-absolute\" style=\"width: 100%; height: 100%; object-fit: cover; z-index: 1;\">
                                ";
                } else {
                    // line 49
                    yield "                                <div class=\"bg-light d-flex align-items-center justify-content-center position-absolute\" style=\"width: 100%; height: 100%; z-index: 1;\">
                                    <i class=\"fas fa-image text-muted\"></i>
                                </div>
                                ";
                }
                // line 53
                yield "                                ";
                if (CoreExtension::getAttribute($this->env, $this->source, $context["data"], "logo", [], "any", false, false, false, 53)) {
                    // line 54
                    yield "                                <img src=\"../";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "logo", [], "any", false, false, false, 54), "html", null, true);
                    yield "\" class=\"img-thumbnail position-absolute\" style=\"width: calc(100% - 10px); height: 25px; object-fit: contain; bottom: 0; left: 5px; right: 5px; z-index: 2; background: none; border: none; padding: 2px;\">
                                ";
                }
                // line 56
                yield "                            </div>
                        </td>
                        <td>
                            <div class=\"fw-bold\">";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre", [], "any", false, false, false, 59), "html", null, true);
                yield "</div>
                            <small class=\"text-muted\">";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "codigo", [], "any", false, false, false, 60), "html", null, true);
                yield "</small>
                        </td>
                        <td>
                            ";
                // line 63
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 63)) > 120)) {
                    // line 64
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 64), 0, 120), "html", null, true);
                    yield "...
                            ";
                } else {
                    // line 66
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 66), "html", null, true);
                    yield "
                            ";
                }
                // line 68
                yield "                        </td>
                        <td>
                            ";
                // line 70
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 70)) > 120)) {
                    // line 71
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 71), 0, 120), "html", null, true);
                    yield "...
                            ";
                } else {
                    // line 73
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 73), "html", null, true);
                    yield "
                            ";
                }
                // line 75
                yield "                        </td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod=";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 78), "html", null, true);
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
            // line 88
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 91
($context["module"] ?? null) == "form")) {
            // line 92
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 93
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Marcas\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Marca</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-xl-6 col-md-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre\" name=\"nombre\" class=\"form-control validar\" placeholder=\"Nombre de la Marca\" value=\"";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre", [], "any", false, false, false, 105), "html", null, true);
            yield "\">
                                        <label for=\"nombre\">Nombre de la Marca</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Español\">";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_es", [], "any", false, false, false, 113), "html", null, true);
            yield "</textarea>
                                        <label for=\"descripcion_es\">Descripción (Español)</label>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Descripción en Inglés\">";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_en", [], "any", false, false, false, 121), "html", null, true);
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
                                <label for=\"logo\" class=\"form-label\">Logo</label>
                                <input type=\"file\" class=\"form-control\" id=\"logo\" name=\"logo\" accept=\"image/*\" value=\"";
            // line 140
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 140), "html", null, true);
            yield "\">
                                <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"";
            // line 141
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 141), "html", null, true);
            yield "\" />
                                <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
            yield "\">
                                ";
            // line 143
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 143)) {
                // line 144
                yield "                                <div class=\"mt-2 text-center\">
                                    <img src=\"../";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 145), "html", null, true);
                yield "\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
                                </div>
                                ";
            }
            // line 148
            yield "                            </div>
                            <div class=\"mb-3\">
                                <label for=\"foto\" class=\"form-label\">Foto</label>
                                <input type=\"file\" class=\"form-control\" id=\"foto\" name=\"foto\" accept=\"image/*\" value=\"";
            // line 151
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 151), "html", null, true);
            yield "\">
                                <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"";
            // line 152
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 152), "html", null, true);
            yield "\" />
                                <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
            yield "\">
                                ";
            // line 154
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 154)) {
                // line 155
                yield "                                <div class=\"mt-2 text-center\">
                                    <img src=\"../";
                // line 156
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 156), "html", null, true);
                yield "\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
                                </div>
                                ";
            }
            // line 159
            yield "                            </div>
                        </div>
                    </div>

                    <!-- Auditoría -->
                    ";
            // line 164
            if (($context["showAudit"] ?? null)) {
                // line 165
                yield "                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    ";
                // line 173
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 173), "html", null, true);
                yield "<br>
                                    ";
                // line 174
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 174), "html", null, true);
                yield "
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    ";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 178), "html", null, true);
                yield "<br>
                                    ";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 179), "html", null, true);
                yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            // line 185
            yield "                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 188
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 188), "html", null, true);
            yield "\">
        </form>
        ";
        } else {
            // line 191
            yield "        <div class=\"alert alert-warning\">Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 193
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 197
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 198
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
                                const logo = row.getAttribute('data-logo');

                                const filesToDelete = [];
                                if (foto) filesToDelete.push(`images/marcas/fotos/\${foto}`);
                                if (logo) filesToDelete.push(`images/marcas/logos/\${logo}`);
                                
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
        return array (  430 => 198,  423 => 197,  416 => 193,  410 => 191,  404 => 188,  399 => 185,  390 => 179,  386 => 178,  379 => 174,  375 => 173,  365 => 165,  363 => 164,  356 => 159,  349 => 156,  346 => 155,  344 => 154,  340 => 153,  336 => 152,  332 => 151,  327 => 148,  320 => 145,  317 => 144,  315 => 143,  311 => 142,  307 => 141,  303 => 140,  281 => 121,  270 => 113,  259 => 105,  245 => 93,  242 => 92,  240 => 91,  235 => 88,  217 => 78,  212 => 75,  206 => 73,  200 => 71,  198 => 70,  194 => 68,  188 => 66,  182 => 64,  180 => 63,  174 => 60,  170 => 59,  165 => 56,  158 => 54,  155 => 53,  149 => 49,  142 => 47,  140 => 46,  133 => 42,  129 => 41,  125 => 40,  122 => 39,  118 => 38,  100 => 23,  96 => 21,  94 => 20,  90 => 18,  84 => 15,  80 => 14,  77 => 13,  75 => 12,  71 => 11,  63 => 6,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}

<script>
    const mod = '{{ mod }}';
    const entity = 'Marcas';
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
            <table class=\"table table-hover datatables\" data-dt_order='[[1,\"asc\"]]'>
                <thead>
                    <tr>
                        <th style=\"width: 100px\">Logo</th>
                        <th>Marca</th>
                        <th>Descripción (ES)</th>
                        <th>Descripción (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {% for data in Content %}
                    <tr 
                        data-id=\"{{ data.id }}\" 
                        data-foto=\"{{ data.foto }}\" 
                        data-logo=\"{{ data.logo }}\"
                    >
                        <td>
                            <div class=\"position-relative\" style=\"width: 80px; height: 80px;\">
                                {% if data.foto %}
                                <img src=\"../{{ ruta_fotos }}{{ data.foto }}\" class=\"img-thumbnail position-absolute\" style=\"width: 100%; height: 100%; object-fit: cover; z-index: 1;\">
                                {% else %}
                                <div class=\"bg-light d-flex align-items-center justify-content-center position-absolute\" style=\"width: 100%; height: 100%; z-index: 1;\">
                                    <i class=\"fas fa-image text-muted\"></i>
                                </div>
                                {% endif %}
                                {% if data.logo %}
                                <img src=\"../{{ ruta_logo }}{{ data.logo }}\" class=\"img-thumbnail position-absolute\" style=\"width: calc(100% - 10px); height: 25px; object-fit: contain; bottom: 0; left: 5px; right: 5px; z-index: 2; background: none; border: none; padding: 2px;\">
                                {% endif %}
                            </div>
                        </td>
                        <td>
                            <div class=\"fw-bold\">{{ data.nombre }}</div>
                            <small class=\"text-muted\">{{ data.codigo }}</small>
                        </td>
                        <td>
                            {% if data.descripcion_es|length > 120 %}
                                {{ data.descripcion_es[:120] }}...
                            {% else %}
                                {{ data.descripcion_es }}
                            {% endif %}
                        </td>
                        <td>
                            {% if data.descripcion_en|length > 120 %}
                                {{ data.descripcion_en[:120] }}...
                            {% else %}
                                {{ data.descripcion_en }}
                            {% endif %}
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
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Marcas\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Marca</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-xl-6 col-md-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre\" name=\"nombre\" class=\"form-control validar\" placeholder=\"Nombre de la Marca\" value=\"{{ data.nombre }}\">
                                        <label for=\"nombre\">Nombre de la Marca</label>
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
                                <label for=\"logo\" class=\"form-label\">Logo</label>
                                <input type=\"file\" class=\"form-control\" id=\"logo\" name=\"logo\" accept=\"image/*\" value=\"{{ data.logo }}\">
                                <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"{{ data.logo }}\" />
                                <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"{{ ruta_logo }}\">
                                {% if data.logo %}
                                <div class=\"mt-2 text-center\">
                                    <img src=\"../{{ ruta_logo }}{{ data.logo }}\" class=\"img-thumbnail\" style=\"max-width: 200px;\">
                                </div>
                                {% endif %}
                            </div>
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
                                const logo = row.getAttribute('data-logo');

                                const filesToDelete = [];
                                if (foto) filesToDelete.push(`images/marcas/fotos/\${foto}`);
                                if (logo) filesToDelete.push(`images/marcas/logos/\${logo}`);
                                
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
{% endblock %}", "@modules/marcas.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\marcas.twig");
    }
}
