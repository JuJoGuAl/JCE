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
            'contenido' => [$this, 'block_contenido'],
            'list_module' => [$this, 'block_list_module'],
            'form_module' => [$this, 'block_form_module'],
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
    public function block_contenido(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<div class=\"container-fluid px-4\">
<h1 class=\"my-4\">";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_name"] ?? null), "html", null, true);
        yield "</h1>
<p>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_descrip"] ?? null), "html", null, true);
        yield "</p>
<div class=\"card mb-4\">
    <div class=\"card-header\">";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_subname"] ?? null), "html", null, true);
        yield "</div>
    <div class=\"card-body\">
    ";
        // line 10
        yield from $this->unwrap()->yieldBlock('list_module', $context, $blocks);
        // line 45
        yield "    ";
        yield from $this->unwrap()->yieldBlock('form_module', $context, $blocks);
        // line 100
        yield "    </div>
</div>
</div>
";
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_list_module(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 11
        yield "    <div class=\"row mb-4\">
        <div class=\"col-md-3 col-sm-6\">
        <div class=\"button-group\">
            <a class=\"btn btn-primary\" href=\"?mod=";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "&id=0\" data-id=\"0\">
            <span class=\"btn-label\"><i class=\"fas fa-plus\"></i></span> NUEVO
            </a>
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
            <th class=\"noexportar\">OPC</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            yield "            <tr>
            <td>";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "codigo", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
            <td>";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "nombre", [], "any", false, false, false, 35), "html", null, true);
            yield "</td>
            <td>";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "descripcion_es", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
            <td>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "descripcion_en", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
            <td>";
            // line 38
            yield CoreExtension::getAttribute($this->env, $this->source, $context["item"], "actions", [], "any", false, false, false, 38);
            yield "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        yield "        </tbody>
        </table>
    </div>
    ";
        yield from [];
    }

    // line 45
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_module(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 46
        yield "    <div class=\"card-body\">
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\">
        <div class=\"row mb-3\">
            <div class=\"col-sm-8\">
            <div class=\"form-floating mb-3 mb-md-0\">
                <input type=\"text\" class=\"form-control validar\" id=\"dato\" name=\"dato\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["nombre"] ?? null), "html", null, true);
        yield "\" ";
        yield ((($context["read"] ?? null)) ? ("readonly") : (""));
        yield ">
                <label for=\"dato\" class=\"control-label col-form-label\">Nombre de la Marca</label>
            </div>
            </div>
        </div>
        <div class=\"row mb-3\">
            <div class=\"col-sm-12\">
            <div class=\"form-floating mb-3\">
                <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descripción de la marca en Español\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["descripcion_es"] ?? null), "html", null, true);
        yield "</textarea>
                <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripción (Español)</label>
            </div>
            </div>
        </div>
        <div class=\"row mb-3\">
            <div class=\"col-sm-12\">
            <div class=\"form-floating mb-3\">
                <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descripción de la marca en Inglés\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["descripcion_en"] ?? null), "html", null, true);
        yield "</textarea>
                <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripción (Inglés)</label>
            </div>
            </div>
        </div>
        ";
        // line 72
        if (($context["aud_data"] ?? null)) {
            // line 73
            yield "        <div class=\"card-body\">
            <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
            <div class=\"col-sm-3\"><strong>CREADO POR: </strong>";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["crea_user"] ?? null), "html", null, true);
            yield "</div>
            <div class=\"col-sm-3\"><strong>FECHA: </strong>";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["crea_date"] ?? null), "html", null, true);
            yield "</div>
            <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_user"] ?? null), "html", null, true);
            yield "</div>
            <div class=\"col-sm-3\"><strong>FECHA: </strong>";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod_date"] ?? null), "html", null, true);
            yield "</div>
            </div>
        </div>
        <hr>
        ";
        }
        // line 83
        yield "        <div class=\"card-body\">
            <div class=\"action-form\">
            <div class=\"form-group mb-0 text-center\">
                <input type=\"hidden\" id=\"accion\" name=\"accion\" value=\"";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["accion"] ?? null), "html", null, true);
        yield "\">
                <input type=\"hidden\" id=\"id\" name=\"id\" value=\"";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["codigo"] ?? null), "html", null, true);
        yield "\">
                <button class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "\">
                <span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> GUARDAR
                </button>
                <a class=\"btn btn-primary\" href=\"../adm/?mod=";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mod"] ?? null), "html", null, true);
        yield "\">
                <span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> CERRAR
                </a>
            </div>
            </div>
        </div>
        </form>
    </div>
    ";
        yield from [];
    }

    // line 105
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 106
        yield "<script>
\$(function () {
    ";
        // line 108
        yield ($context["script"] ?? null);
        yield "
});

\$('button[form]').click(function () {
    \$('#form_').sendForm();
});

\$('#tipo').change(function () {
    var \$listas = \$(\".listas_valores\");
    var \$table = \$(\"#lista_details\");
    if (\$(this).val() == 2) {
    \$table.addClass(\"validar\");
    \$listas.show();
    } else {
    \$table.removeClass(\"validar\");
    \$listas.hide();
    }
});

\$(\"#btn_add_list\").click(function () {
    var \$table = \$(\"#lista_details\");
    var count = (\$table.find(\"tbody tr\").length) + 1;
    var tr = `
    <tr>
        <td>\${count}<input type=\"hidden\" id=\"cvalor[\${count}]\" name=\"cvalor[\${count}]\" value=\"0\"></td>
        <td><input type=\"text\" class=\"form-control\" id=\"text[\${count}]\" name=\"text[\${count}]\"></td>
        <td><button type=\"button\" class=\"btn btn-sm btn-outline-primary btn-circle bt_del\"><i class=\"fas fa-trash-alt\"></i></button></td>
    </tr>`;
    \$table.find(\"tbody\").append(tr);
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
        return array (  280 => 108,  276 => 106,  269 => 105,  255 => 91,  249 => 88,  245 => 87,  241 => 86,  236 => 83,  228 => 78,  224 => 77,  220 => 76,  216 => 75,  212 => 73,  210 => 72,  202 => 67,  191 => 59,  178 => 51,  171 => 46,  164 => 45,  156 => 41,  147 => 38,  143 => 37,  139 => 36,  135 => 35,  131 => 34,  128 => 33,  124 => 32,  103 => 14,  98 => 11,  91 => 10,  83 => 100,  80 => 45,  78 => 10,  73 => 8,  68 => 6,  64 => 5,  61 => 4,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"@views/body.twig\" %}

{% block contenido %}
<div class=\"container-fluid px-4\">
<h1 class=\"my-4\">{{ mod_name }}</h1>
<p>{{ mod_descrip }}</p>
<div class=\"card mb-4\">
    <div class=\"card-header\">{{ mod_subname }}</div>
    <div class=\"card-body\">
    {% block list_module %}
    <div class=\"row mb-4\">
        <div class=\"col-md-3 col-sm-6\">
        <div class=\"button-group\">
            <a class=\"btn btn-primary\" href=\"?mod={{ mod }}&id=0\" data-id=\"0\">
            <span class=\"btn-label\"><i class=\"fas fa-plus\"></i></span> NUEVO
            </a>
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
            <th class=\"noexportar\">OPC</th>
            </tr>
        </thead>
        <tbody>
            {% for item in data %}
            <tr>
            <td>{{ item.codigo }}</td>
            <td>{{ item.nombre }}</td>
            <td>{{ item.descripcion_es }}</td>
            <td>{{ item.descripcion_en }}</td>
            <td>{{ item.actions|raw }}</td>
            </tr>
            {% endfor %}
        </tbody>
        </table>
    </div>
    {% endblock %}
    {% block form_module %}
    <div class=\"card-body\">
        <form role=\"form\" name=\"form_\" id=\"form_\" enctype=\"multipart/form-data\">
        <div class=\"row mb-3\">
            <div class=\"col-sm-8\">
            <div class=\"form-floating mb-3 mb-md-0\">
                <input type=\"text\" class=\"form-control validar\" id=\"dato\" name=\"dato\" maxlength=\"100\" placeholder=\"Ingrese el Nombre de la Marca\" value=\"{{ nombre }}\" {{ read ? 'readonly' : '' }}>
                <label for=\"dato\" class=\"control-label col-form-label\">Nombre de la Marca</label>
            </div>
            </div>
        </div>
        <div class=\"row mb-3\">
            <div class=\"col-sm-12\">
            <div class=\"form-floating mb-3\">
                <textarea id=\"descripcion_es\" name=\"descripcion_es\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descripción de la marca en Español\">{{ descripcion_es }}</textarea>
                <label for=\"descripcion_es\" class=\"control-label col-form-label\">Descripción (Español)</label>
            </div>
            </div>
        </div>
        <div class=\"row mb-3\">
            <div class=\"col-sm-12\">
            <div class=\"form-floating mb-3\">
                <textarea id=\"descripcion_en\" name=\"descripcion_en\" class=\"form-control h-100 validar\" rows=\"4\" placeholder=\"Ingrese la descripción de la marca en Inglés\">{{ descripcion_en }}</textarea>
                <label for=\"descripcion_en\" class=\"control-label col-form-label\">Descripción (Inglés)</label>
            </div>
            </div>
        </div>
        {% if aud_data %}
        <div class=\"card-body\">
            <div class=\"row\" style=\"font-size: 12px; text-align: justify;\">
            <div class=\"col-sm-3\"><strong>CREADO POR: </strong>{{ crea_user }}</div>
            <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ crea_date }}</div>
            <div class=\"col-sm-3\"><strong>MODIFICADO POR: </strong>{{ mod_user }}</div>
            <div class=\"col-sm-3\"><strong>FECHA: </strong>{{ mod_date }}</div>
            </div>
        </div>
        <hr>
        {% endif %}
        <div class=\"card-body\">
            <div class=\"action-form\">
            <div class=\"form-group mb-0 text-center\">
                <input type=\"hidden\" id=\"accion\" name=\"accion\" value=\"{{ accion }}\">
                <input type=\"hidden\" id=\"id\" name=\"id\" value=\"{{ codigo }}\">
                <button class=\"btn btn-primary\" type=\"button\" form=\"form_\" data-mod=\"{{ mod }}\">
                <span class=\"btn-label\"><i class=\"fas fa-save\"></i></span> GUARDAR
                </button>
                <a class=\"btn btn-primary\" href=\"../adm/?mod={{ mod }}\">
                <span class=\"btn-label\"><i class=\"fas fa-sign-out-alt\"></i></span> CERRAR
                </a>
            </div>
            </div>
        </div>
        </form>
    </div>
    {% endblock %}
    </div>
</div>
</div>
{% endblock %}

{% block scripts %}
<script>
\$(function () {
    {{ script|raw }}
});

\$('button[form]').click(function () {
    \$('#form_').sendForm();
});

\$('#tipo').change(function () {
    var \$listas = \$(\".listas_valores\");
    var \$table = \$(\"#lista_details\");
    if (\$(this).val() == 2) {
    \$table.addClass(\"validar\");
    \$listas.show();
    } else {
    \$table.removeClass(\"validar\");
    \$listas.hide();
    }
});

\$(\"#btn_add_list\").click(function () {
    var \$table = \$(\"#lista_details\");
    var count = (\$table.find(\"tbody tr\").length) + 1;
    var tr = `
    <tr>
        <td>\${count}<input type=\"hidden\" id=\"cvalor[\${count}]\" name=\"cvalor[\${count}]\" value=\"0\"></td>
        <td><input type=\"text\" class=\"form-control\" id=\"text[\${count}]\" name=\"text[\${count}]\"></td>
        <td><button type=\"button\" class=\"btn btn-sm btn-outline-primary btn-circle bt_del\"><i class=\"fas fa-trash-alt\"></i></button></td>
    </tr>`;
    \$table.find(\"tbody\").append(tr);
});
</script>
{% endblock %}", "@modules/marcas.twig", "C:\\laragon\\www\\jce\\adm\\modules\\views\\marcas.twig");
    }
}
