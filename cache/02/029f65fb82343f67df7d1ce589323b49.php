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
        yield "<script>
    const mod = '";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "';
    const entity = 'Marcas';
</script>
<div class=\"card mb-4\">
    <div class=\"card-header\">";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module_subtitulo"] ?? null), "html", null, true);
        yield "</div>
    <div class=\"card-body\">
        ";
        // line 11
        if ((($context["module"] ?? null) == "list")) {
            // line 12
            yield "        <div class=\"row mb-4\">
            <div class=\"col-md-3 col-sm-6\">
                <div class=\"button-group\">
                    <a class=\"btn btn-outline-primary btn-sm\" href=\"?mod=";
            // line 15
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
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 32
                yield "                    <tr 
                        data-id=\"";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 33), "html", null, true);
                yield "\" 
                        data-foto=\"";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "foto", [], "any", false, false, false, 34), "html", null, true);
                yield "\" 
                        data-logo=\"";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "logo", [], "any", false, false, false, 35), "html", null, true);
                yield "\"
                    >
                        <td>";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "codigo", [], "any", false, false, false, 37), "html", null, true);
                yield "</td>
                        <td>";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre", [], "any", false, false, false, 38), "html", null, true);
                yield "</td>
                        <td>";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_es", [], "any", false, false, false, 39), "html", null, true);
                yield "</td>
                        <td>";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "descripcion_en", [], "any", false, false, false, 40), "html", null, true);
                yield "</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\" href=\"?mod=";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 43), "html", null, true);
                yield "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                                <a class=\"btn btn-outline-primary btn-circle btn-sm btnEliminarRegistro\" href=\"javascript:void(0)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"fas fa-trash\"></i></a>
                            </div>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['data'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 52
($context["module"] ?? null) == "form")) {
            // line 53
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 54
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Marcas\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"nombre\" name=\"nombre\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre", [], "any", false, false, false, 58), "html", null, true);
            yield "\">
                        <label for=\"nombre\" class=\"control-label col-form-label\">Nombre de la Marca</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Español\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_es", [], "any", false, false, false, 66), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripcion (Español)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Ingles\">";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "descripcion_en", [], "any", false, false, false, 74), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripcion (Ingles)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <label for=\"logo\" class=\"form-label\">Logo</label>
                    <input type=\"file\" name=\"logo\" id=\"logo\" class=\"form-control\" accept=\"image/*\" value=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 82), "html", null, true);
            yield "\">
                </div>
                <div class=\"col-sm-6\">
                    <label for=\"foto\" class=\"form-label\">Foto</label>
                    <input type=\"file\" name=\"foto\" id=\"foto\" class=\"form-control\" accept=\"image/*\" value=\"";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 86), "html", null, true);
            yield "\">
                </div>
            </div>
            <div class=\"row my-5\">
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Logo Actual</span>
                    <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 92), "html", null, true);
            yield "\" />
                    ";
            // line 93
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 93))) {
                // line 94
                yield "                    <img src=\"../";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_logo"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, false, 94)), "html", null, true);
                yield "\" alt=\"Logo\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    ";
            } else {
                // line 96
                yield "                    <span class=\"text-muted\">No hay logo cargado</span>
                    ";
            }
            // line 98
            yield "                </div>
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Foto Actual</span>
                    <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 101), "html", null, true);
            yield "\" />
                    ";
            // line 102
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 102))) {
                // line 103
                yield "                    <img src=\"../";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_fotos"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "foto", [], "any", false, false, false, 103)), "html", null, true);
                yield "\" alt=\"Foto\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    ";
            } else {
                // line 105
                yield "                    <span class=\"text-muted\">No hay logo cargado</span>
                    ";
            }
            // line 107
            yield "                </div>
            </div>
            
            ";
            // line 110
            if (($context["showAudit"] ?? null)) {
                // line 111
                yield "            <div class=\"card-body\">
                <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
                <div class=\"col-sm-3\"><strong>CREADO POR: </strong>";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 113), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 114), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 115), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 116), "html", null, true);
                yield "</div>
                </div>
            </div>
            <hr>
            ";
            }
            // line 121
            yield "            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 124), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"";
            // line 126
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
            yield "\">
                        <button id=\"btnGuardar\" class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a id=\"btnCancelar\" class=\"btn btn-outline-primary\" href=\"?mod=";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
                    </div>
                </div>
            </div>
        </form>
        ";
        } else {
            // line 134
            yield "        <div class=\"alert alert-warning\"> Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield " </div>
        ";
        }
        // line 136
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 139
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 140
        yield "<script>
    document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');

            btnEliminarRegistro.forEach(btn => {
                btn.addEventListener('click', eliminaRegistro);
            });
            
            if(btnGuardar != null) {
                btnGuardar.addEventListener('click', async function () { \$('#form_').sendForm(); });
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
        return array (  335 => 140,  328 => 139,  321 => 136,  315 => 134,  306 => 128,  302 => 127,  298 => 126,  294 => 125,  290 => 124,  285 => 121,  277 => 116,  273 => 115,  269 => 114,  265 => 113,  261 => 111,  259 => 110,  254 => 107,  250 => 105,  244 => 103,  242 => 102,  238 => 101,  233 => 98,  229 => 96,  223 => 94,  221 => 93,  217 => 92,  208 => 86,  201 => 82,  190 => 74,  179 => 66,  168 => 58,  162 => 54,  159 => 53,  157 => 52,  152 => 49,  138 => 43,  132 => 40,  128 => 39,  124 => 38,  120 => 37,  115 => 35,  111 => 34,  107 => 33,  104 => 32,  100 => 31,  81 => 15,  76 => 12,  74 => 11,  69 => 9,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
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
                    {% for data in Content %}
                    <tr 
                        data-id=\"{{ data.id }}\" 
                        data-foto=\"{{ data.foto }}\" 
                        data-logo=\"{{ data.logo }}\"
                    >
                        <td>{{ data.codigo }}</td>
                        <td>{{ data.nombre }}</td>
                        <td>{{ data.descripcion_es }}</td>
                        <td>{{ data.descripcion_en }}</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\" href=\"?mod={{ mod }}&id={{ data.id }}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                                <a class=\"btn btn-outline-primary btn-circle btn-sm btnEliminarRegistro\" href=\"javascript:void(0)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"fas fa-trash\"></i></a>
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
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"nombre\" name=\"nombre\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"{{ data.nombre }}\">
                        <label for=\"nombre\" class=\"control-label col-form-label\">Nombre de la Marca</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Español\">{{ data.descripcion_es }}</textarea>
                        <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripcion (Español)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Ingles\">{{ data.descripcion_en }}</textarea>
                        <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripcion (Ingles)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <label for=\"logo\" class=\"form-label\">Logo</label>
                    <input type=\"file\" name=\"logo\" id=\"logo\" class=\"form-control\" accept=\"image/*\" value=\"{{ data.logo }}\">
                </div>
                <div class=\"col-sm-6\">
                    <label for=\"foto\" class=\"form-label\">Foto</label>
                    <input type=\"file\" name=\"foto\" id=\"foto\" class=\"form-control\" accept=\"image/*\" value=\"{{ data.foto }}\">
                </div>
            </div>
            <div class=\"row my-5\">
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Logo Actual</span>
                    <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"{{ data.logo }}\" />
                    {% if data.logo is not empty %}
                    <img src=\"../{{ ruta_logo ~ data.logo }}\" alt=\"Logo\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    {% else %}
                    <span class=\"text-muted\">No hay logo cargado</span>
                    {% endif %}
                </div>
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Foto Actual</span>
                    <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"{{ data.foto }}\" />
                    {% if data.foto is not empty %}
                    <img src=\"../{{ ruta_fotos ~ data.foto }}\" alt=\"Foto\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    {% else %}
                    <span class=\"text-muted\">No hay logo cargado</span>
                    {% endif %}
                </div>
            </div>
            
            {% if showAudit %}
            <div class=\"card-body\">
                <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
                <div class=\"col-sm-3\"><strong>CREADO POR: </strong>{{ data.creacion_usuario }}</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ data.creacion_fecha }}</div>
                <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>{{ data.actualizacion_usuario }}</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ data.actualizacion_fecha }}</div>
                </div>
            </div>
            <hr>
            {% endif %}
            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"{{ data.id }}\">
                        <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"{{ ruta_logo }}\">
                        <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"{{ ruta_fotos }}\">
                        <button id=\"btnGuardar\" class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"{{ mod }}\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a id=\"btnCancelar\" class=\"btn btn-outline-primary\" href=\"?mod={{ mod }}\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
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
    document.addEventListener('DOMContentLoaded', function () {
        try {
            const btnGuardar = document.getElementById('btnGuardar');
            const btnEliminarRegistro = document.querySelectorAll('.btnEliminarRegistro');

            btnEliminarRegistro.forEach(btn => {
                btn.addEventListener('click', eliminaRegistro);
            });
            
            if(btnGuardar != null) {
                btnGuardar.addEventListener('click', async function () { \$('#form_').sendForm(); });
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
