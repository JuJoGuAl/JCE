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
                yield "                    <tr 
                        data-id=\"";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 29), "html", null, true);
                yield "\" 
                        data-foto=\"";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "foto", [], "any", false, false, false, 30), "html", null, true);
                yield "\" 
                        data-logo=\"";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "logo", [], "any", false, false, false, 31), "html", null, true);
                yield "\"
                    >
                        <td>";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "codigo", [], "any", false, false, false, 33), "html", null, true);
                yield "</td>
                        <td>";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "nombre", [], "any", false, false, false, 34), "html", null, true);
                yield "</td>
                        <td>";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_es", [], "any", false, false, false, 35), "html", null, true);
                yield "</td>
                        <td>";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "descripcion_en", [], "any", false, false, false, 36), "html", null, true);
                yield "</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\" href=\"?mod=";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["marca"], "id", [], "any", false, false, false, 39), "html", null, true);
                yield "\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                                <a class=\"btn btn-outline-primary btn-circle btn-sm btnEliminarRegistro\" href=\"javascript:void(0)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"fas fa-trash\"></i></a>
                            </div>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['marca'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 48
($context["module"] ?? null) == "form")) {
            // line 49
            yield "        ";
            $context["marca"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 50
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Marcas\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"nombre\" name=\"nombre\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "nombre", [], "any", false, false, false, 54), "html", null, true);
            yield "\">
                        <label for=\"nombre\" class=\"control-label col-form-label\">Nombre de la Marca</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Español\">";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_es", [], "any", false, false, false, 62), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripcion (Español)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-12\">
                    <div class=\"form-floating mb-3\">
                        <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descricíon de la marca en Ingles\">";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "descripcion_en", [], "any", false, false, false, 70), "html", null, true);
            yield "</textarea>
                        <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripcion (Ingles)</label>
                    </div>
                </div>
            </div>
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <label for=\"logo\" class=\"form-label\">Logo</label>
                    <input type=\"file\" name=\"logo\" id=\"logo\" class=\"form-control\" accept=\"image/*\" value=\"";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "logo", [], "any", false, false, false, 78), "html", null, true);
            yield "\">
                </div>
                <div class=\"col-sm-6\">
                    <label for=\"foto\" class=\"form-label\">Foto</label>
                    <input type=\"file\" name=\"foto\" id=\"foto\" class=\"form-control\" accept=\"image/*\" value=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "foto", [], "any", false, false, false, 82), "html", null, true);
            yield "\">
                </div>
            </div>
            <div class=\"row my-5\">
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Logo Actual</span>
                    <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "logo", [], "any", false, false, false, 88), "html", null, true);
            yield "\" />
                    ";
            // line 89
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "logo", [], "any", false, false, false, 89))) {
                // line 90
                yield "                    <img src=\"../";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_logo"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "logo", [], "any", false, false, false, 90)), "html", null, true);
                yield "\" alt=\"Logo\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    ";
            } else {
                // line 92
                yield "                    <span class=\"text-muted\">No hay logo cargado</span>
                    ";
            }
            // line 94
            yield "                </div>
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Foto Actual</span>
                    <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "foto", [], "any", false, false, false, 97), "html", null, true);
            yield "\" />
                    ";
            // line 98
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "foto", [], "any", false, false, false, 98))) {
                // line 99
                yield "                    <img src=\"../";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["ruta_fotos"] ?? null) . CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "foto", [], "any", false, false, false, 99)), "html", null, true);
                yield "\" alt=\"Foto\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    ";
            } else {
                // line 101
                yield "                    <span class=\"text-muted\">No hay logo cargado</span>
                    ";
            }
            // line 103
            yield "                </div>
            </div>
            
            ";
            // line 106
            if (($context["showAudit"] ?? null)) {
                // line 107
                yield "            <div class=\"card-body\">
                <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
                <div class=\"col-sm-3\"><strong>CREADO POR: </strong>";
                // line 109
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "creacion_usuario", [], "any", false, false, false, 109), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "creacion_fecha", [], "any", false, false, false, 110), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>";
                // line 111
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 111), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 112), "html", null, true);
                yield "</div>
                </div>
            </div>
            <hr>
            ";
            }
            // line 117
            yield "            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["marca"] ?? null), "id", [], "any", false, false, false, 120), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
            yield "\">
                        <button id=\"btnGuardar\" class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a id=\"btnCancelar\" class=\"btn btn-outline-primary\" href=\"?mod=";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
                    </div>
                </div>
            </div>
        </form>
        ";
        } else {
            // line 130
            yield "        <div class=\"alert alert-warning\"> Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield " </div>
        ";
        }
        // line 132
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 135
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 136
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
                                formData.append('entity', 'Marcas');
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
                                const botones = { ACEPTAR: { btnClass: 'btn-success', action: function(){ document.location.href=\"./?mod=marcas\"; } }};
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
        return array (  328 => 136,  321 => 135,  314 => 132,  308 => 130,  299 => 124,  295 => 123,  291 => 122,  287 => 121,  283 => 120,  278 => 117,  270 => 112,  266 => 111,  262 => 110,  258 => 109,  254 => 107,  252 => 106,  247 => 103,  243 => 101,  237 => 99,  235 => 98,  231 => 97,  226 => 94,  222 => 92,  216 => 90,  214 => 89,  210 => 88,  201 => 82,  194 => 78,  183 => 70,  172 => 62,  161 => 54,  155 => 50,  152 => 49,  150 => 48,  145 => 45,  131 => 39,  125 => 36,  121 => 35,  117 => 34,  113 => 33,  108 => 31,  104 => 30,  100 => 29,  97 => 28,  93 => 27,  74 => 11,  69 => 8,  67 => 7,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
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
                    <tr 
                        data-id=\"{{ marca.id }}\" 
                        data-foto=\"{{ marca.foto }}\" 
                        data-logo=\"{{ marca.logo }}\"
                    >
                        <td>{{ marca.codigo }}</td>
                        <td>{{ marca.nombre }}</td>
                        <td>{{ marca.descripcion_es }}</td>
                        <td>{{ marca.descripcion_en }}</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\" href=\"?mod={{ mod }}&id={{ marca.id }}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver\"><i class=\"fas fa-search\"></i></a>
                                <a class=\"btn btn-outline-primary btn-circle btn-sm btnEliminarRegistro\" href=\"javascript:void(0)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"fas fa-trash\"></i></a>
                            </div>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
        {% elseif module == 'form' %}
        {% set marca = Content[0] %}
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Marcas\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-8\">
                    <div class=\"form-floating mb-3 mb-md-0\">
                        <input type=\"text\" class=\"form-control validar\" id=\"nombre\" name=\"nombre\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"{{ marca.nombre }}\">
                        <label for=\"nombre\" class=\"control-label col-form-label\">Nombre de la Marca</label>
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
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <label for=\"logo\" class=\"form-label\">Logo</label>
                    <input type=\"file\" name=\"logo\" id=\"logo\" class=\"form-control\" accept=\"image/*\" value=\"{{ marca.logo }}\">
                </div>
                <div class=\"col-sm-6\">
                    <label for=\"foto\" class=\"form-label\">Foto</label>
                    <input type=\"file\" name=\"foto\" id=\"foto\" class=\"form-control\" accept=\"image/*\" value=\"{{ marca.foto }}\">
                </div>
            </div>
            <div class=\"row my-5\">
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Logo Actual</span>
                    <input type=\"hidden\" name=\"logo_actual\" id=\"logo_actual\" value=\"{{ marca.logo }}\" />
                    {% if marca.logo is not empty %}
                    <img src=\"../{{ ruta_logo ~ marca.logo }}\" alt=\"Logo\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    {% else %}
                    <span class=\"text-muted\">No hay logo cargado</span>
                    {% endif %}
                </div>
                <div class=\"col-sm-6\">
                    <span class=\"form-label\">Foto Actual</span>
                    <input type=\"hidden\" name=\"foto_actual\" id=\"foto_actual\" value=\"{{ marca.foto }}\" />
                    {% if marca.foto is not empty %}
                    <img src=\"../{{ ruta_fotos ~ marca.foto }}\" alt=\"Foto\" class=\"img-fluid\" style=\"max-width: 100px; max-height: 100px;\">
                    {% else %}
                    <span class=\"text-muted\">No hay logo cargado</span>
                    {% endif %}
                </div>
            </div>
            
            {% if showAudit %}
            <div class=\"card-body\">
                <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
                <div class=\"col-sm-3\"><strong>CREADO POR: </strong>{{ marca.creacion_usuario }}</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ marca.creacion_fecha }}</div>
                <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>{{ marca.actualizacion_usuario }}</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ marca.actualizacion_fecha }}</div>
                </div>
            </div>
            <hr>
            {% endif %}
            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"{{ marca.id }}\">
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
                                formData.append('entity', 'Marcas');
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
                                const botones = { ACEPTAR: { btnClass: 'btn-success', action: function(){ document.location.href=\"./?mod=marcas\"; } }};
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
