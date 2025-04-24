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
                        <th>Categoría</th>
                        <th>Nombre (ES)</th>
                        <th>Nombre (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["Content"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 37
                yield "                    <tr data-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 37), "html", null, true);
                yield "\">
                        <td>";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "codigo", [], "any", false, false, false, 38), "html", null, true);
                yield "</td>
                        <td>";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_es", [], "any", false, false, false, 39), "html", null, true);
                yield "</td>
                        <td>";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "nombre_en", [], "any", false, false, false, 40), "html", null, true);
                yield "</td>
                        <td class=\"columna-acciones\">
                            <div class=\"btn-group\">
                                <a class=\"btn btn-sm btn-outline-primary\" href=\"?mod=";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
                yield "&id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["data"], "id", [], "any", false, false, false, 43), "html", null, true);
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
            // line 53
            yield "                </tbody>
            </table>
        </div>
        ";
        } elseif ((        // line 56
($context["module"] ?? null) == "form")) {
            // line 57
            yield "        ";
            $context["data"] = (($_v0 = ($context["Content"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[0] ?? null) : null);
            // line 58
            yield "        <form role=\"form\" name=\"form_\" id=\"form_\" data-entity=\"Categorias\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Categoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Español\" value=\"";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_es", [], "any", false, false, false, 70), "html", null, true);
            yield "\">
                                        <label for=\"nombre_es\" class=\"control-label col-form-label\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Ingles\" value=\"";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "nombre_en", [], "any", false, false, false, 76), "html", null, true);
            yield "\">
                                        <label for=\"nombre_en\" class=\"control-label col-form-label\">Nombre (Ingles)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
                    <!-- Auditoría -->
                    ";
            // line 88
            if (($context["showAudit"] ?? null)) {
                // line 89
                yield "                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de Auditoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"small text-muted\">
                                <div class=\"mb-2\">
                                    <strong>Creado por:</strong><br>
                                    ";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_usuario", [], "any", false, false, false, 97), "html", null, true);
                yield "<br>
                                    ";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "creacion_fecha", [], "any", false, false, false, 98), "html", null, true);
                yield "
                                </div>
                                <div>
                                    <strong>Modificado por:</strong><br>
                                    ";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_usuario", [], "any", false, false, false, 102), "html", null, true);
                yield "<br>
                                    ";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "actualizacion_fecha", [], "any", false, false, false, 103), "html", null, true);
                yield "
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            // line 109
            yield "                </div>
            </div>

            <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 112), "html", null, true);
            yield "\">
        </form>
        ";
        } else {
            // line 115
            yield "        <div class=\"alert alert-warning\">Operación no válida: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["module"] ?? null), "html", null, true);
            yield "</div>
        ";
        }
        // line 117
        yield "    </div>
</div>
";
        yield from [];
    }

    // line 121
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 122
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
        return array (  272 => 122,  265 => 121,  258 => 117,  252 => 115,  246 => 112,  241 => 109,  232 => 103,  228 => 102,  221 => 98,  217 => 97,  207 => 89,  205 => 88,  190 => 76,  181 => 70,  167 => 58,  164 => 57,  162 => 56,  157 => 53,  139 => 43,  133 => 40,  129 => 39,  125 => 38,  120 => 37,  116 => 36,  99 => 22,  95 => 20,  93 => 19,  89 => 17,  83 => 14,  79 => 13,  76 => 12,  74 => 11,  70 => 10,  62 => 5,  59 => 4,  52 => 3,  41 => 1,);
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
                        <th>Categoría</th>
                        <th>Nombre (ES)</th>
                        <th>Nombre (EN)</th>
                        <th class=\"columna-acciones\">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {% for data in Content %}
                    <tr data-id=\"{{ data.id }}\">
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
        <form role=\"form\" name=\"form_\" id=\"form_\" data-entity=\"Categorias\">
            <div class=\"row\">
                <div class=\"col-md-8\">
                    <!-- Sección Principal -->
                    <div class=\"card mb-4\">
                        <div class=\"card-header\">
                            <h5 class=\"card-title mb-0\">Información de la Categoría</h5>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row mb-3\">
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_es\" name=\"nombre_es\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Español\" value=\"{{ data.nombre_es }}\">
                                        <label for=\"nombre_es\" class=\"control-label col-form-label\">Nombre (Español)</label>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <div class=\"form-floating mb-3\">
                                        <input id=\"nombre_en\" name=\"nombre_en\" class=\"form-control validar\" placeholder=\"Ingrese el nombre de la Categoria en Ingles\" value=\"{{ data.nombre_en }}\">
                                        <label for=\"nombre_en\" class=\"control-label col-form-label\">Nombre (Ingles)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=\"col-md-4\">
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
