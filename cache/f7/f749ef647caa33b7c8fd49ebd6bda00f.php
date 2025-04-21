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

/* @modules/categorias.twig */
class __TwigTemplate_a353f4d29bdeeda99700c5525b5eab53 extends Template
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
        $this->parent = $this->loadTemplate("@views/body.twig", "@modules/categorias.twig", 1);
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
    const entity = 'Categorias';
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
                        <th>NOMBRE (ES)</th>
                        <th>NOMBRE (EN)</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 31
                yield "                    <tr 
                        data-id=\"";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 32), "html", null, true);
                yield "\" 
                    >
                        <td>";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "codigo", [], "any", false, false, false, 34), "html", null, true);
                yield "</td>
                        <td>";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_es", [], "any", false, false, false, 35), "html", null, true);
                yield "</td>
                        <td>";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_en", [], "any", false, false, false, 36), "html", null, true);
                yield "</td>
                        <td class=\"text-center\">
                            <div class=\"btn-group\" role=\"group\">
                                <a class=\"btn btn-outline-primary btn-circle btn-sm\" href=\"?mod=";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 39), "html", null, true);
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
            // line 45
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 48
($context["module"] ?? null) == "form")) {
            // line 49
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 50
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Categorias\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <div class=\"form-floating mb-3\">
                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Español\" value=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_es", [], "any", false, false, false, 54), "html", null, true);
            yield "\">
                        <label for=\"nombre_es\" class=\"control-label col-form-label\">Nombre (Español)</label>
                    </div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"form-floating mb-3\">
                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Ingles\" value=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_en", [], "any", false, false, false, 60), "html", null, true);
            yield "\">
                        <label for=\"nombre_en\" class=\"control-label col-form-label\">Nombre (Ingles)</label>
                    </div>
                </div>
            </div>
            ";
            // line 65
            if (($context["showAudit"] ?? null)) {
                // line 66
                yield "            <div class=\"card-body\">
                <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
                <div class=\"col-sm-3\"><strong>CREADO POR: </strong>";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 68), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 69), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 70), "html", null, true);
                yield "</div>
                <div class=\"col-sm-3\"><strong>FECHA: </strong>";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 71), "html", null, true);
                yield "</div>
                </div>
            </div>
            <hr>
            ";
            }
            // line 76
            yield "            <div class=\"card-body\">
                <div class=\"action-form\">
                    <div class=\"form-group mb-0 text-center\">
                        <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 79), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"logo_path\" name=\"logo_path\" value=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_logo"] ?? null), "html", null, true);
            yield "\">
                        <input type=\"hidden\" id=\"foto_path\" name=\"foto_path\" value=\"";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["ruta_fotos"] ?? null), "html", null, true);
            yield "\">
                        <button id=\"btnGuardar\" class=\"btn btn-outline-primary\" type=\"button\" form=\"form_\" data-mod=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> Guardar</button>
                        <a id=\"btnCancelar\" class=\"btn btn-outline-primary\" href=\"?mod=";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
            yield "\"><span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> Cerrar</a>
                    </div>
                </div>
            </div>
        </form>
        ";
        } else {
            // line 89
            yield "        <div class=\"alert alert-warning\"> Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield " </div>
        ";
        }
        // line 91
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 94
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 95
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
                                
                                const formData = new FormData();
                                formData.append('action', 'delete');
                                formData.append('entity', entity);
                                formData.append('id', id);
                                
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
        return "@modules/categorias.twig";
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
        return array (  248 => 95,  241 => 94,  234 => 91,  228 => 89,  219 => 83,  215 => 82,  211 => 81,  207 => 80,  203 => 79,  198 => 76,  190 => 71,  186 => 70,  182 => 69,  178 => 68,  174 => 66,  172 => 65,  164 => 60,  155 => 54,  149 => 50,  146 => 49,  144 => 48,  139 => 45,  125 => 39,  119 => 36,  115 => 35,  111 => 34,  106 => 32,  103 => 31,  99 => 30,  81 => 15,  76 => 12,  74 => 11,  69 => 9,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends '@views/body.twig' %}

{% block content %}
<script>
    const mod = '{{ mod }}';
    const entity = 'Categorias';
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
                        <th>NOMBRE (ES)</th>
                        <th>NOMBRE (EN)</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    {% for data in Content %}
                    <tr 
                        data-id=\"{{ data.id }}\" 
                    >
                        <td>{{ data.codigo }}</td>
                        <td>{{ data.nombre_es }}</td>
                        <td>{{ data.nombre_en }}</td>
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
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\" data-entity=\"Categorias\">
            <div class=\"row mb-3\">
                <div class=\"col-sm-6\">
                    <div class=\"form-floating mb-3\">
                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Español\" value=\"{{ data.nombre_es }}\">
                        <label for=\"nombre_es\" class=\"control-label col-form-label\">Nombre (Español)</label>
                    </div>
                </div>
                <div class=\"col-sm-6\">
                    <div class=\"form-floating mb-3\">
                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Ingles\" value=\"{{ data.nombre_en }}\">
                        <label for=\"nombre_en\" class=\"control-label col-form-label\">Nombre (Ingles)</label>
                    </div>
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
                                
                                const formData = new FormData();
                                formData.append('action', 'delete');
                                formData.append('entity', entity);
                                formData.append('id', id);
                                
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
{% endblock %}", "@modules/categorias.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\categorias.twig");
    }
}
