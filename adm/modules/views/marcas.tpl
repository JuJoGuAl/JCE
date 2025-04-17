<!-- START BLOCK : module -->
<div class="container-fluid px-4">
  <h1 class="my-4">{mod_name}</h1>
  <p>{mod_descrip}</p>
  <div class="card mb-4">
    <div class="card-header">{mod_subname}</div>
    <div class="card-body">
      <!-- START BLOCK : list_module -->
      <div class="row mb-4">
        <div class="col-md-3 col-sm-6">
          <div class="button-group">
            <a class="btn btn-primary" href="?mod={mod}&id=0" data-id="0"><span class="btn-label"><i
                  class="fas fa-plus"></i></span> NUEVO</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover datatables">
          <thead>
            <tr>
              <th>CODIGO</th>
              <th>MARCA</th>
              <th>DESCRIPCION (ES)</th>
              <th>DESCRIPCION (EN)</th>
              <th class="noexportar">OPC</th>
            </tr>
          </thead>
          <tbody>
            <!-- START BLOCK : data -->
            <tr>
              <td>{codigo}</td>
              <td>{nombre}</td>
              <td>{descripcion_es}</td>
              <td>{descripcion_en}</td>
              <td>{actions}</td>
            </tr>
            <!-- END BLOCK : data -->
          </tbody>
        </table>
      </div>
      <!-- END BLOCK : list_module -->
      <!-- START BLOCK : form_module -->
      <div class="card-body">
        <form role="form" name="form_" id="form_" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-sm-8">
              <div class="form-floating mb-3 mb-md-0">
                <input type="text" class="form-control validar" id="dato" name="dato" maxlength="100" placeholder="Ingrese el Nombre de la Marca" value="{nombre}" {read}>
                <label for="dato" class="control-label col-form-label">Nombre de la Marca</label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-floating mb-3">
                <textarea id="descripcion_es" name="descripcion_es" class="form-control h-100 validar" rows="4" placeholder="Ingrese la descricíon de la marca en Español">{descripcion_es}</textarea>
                <label for="descripcion_es" class="control-label col-form-label">Descripcion (Español)</label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-12">
              <div class="form-floating mb-3">
                <textarea id="descripcion_en" name="descripcion_en" class="form-control h-100 validar" rows="4" placeholder="Ingrese la descricíon de la marca en Ingles">{descripcion_en}</textarea>
                <label for="descripcion_en" class="control-label col-form-label">Descripcion (Ingles)</label>
              </div>
            </div>
          </div>
          <!-- START BLOCK : aud_data -->
          <div class="card-body">
            <div class="row" style="font-size: 12px; text-align: justify;">
              <div class="col-sm-3"><strong>CREADO POR: </strong>{crea_user}</div>
              <div class="col-sm-3"><strong>FECHA: </strong>{crea_date}</div>
              <div class="col-sm-3"><strong>MODIFICADO POR: </strong>{mod_user}</div>
              <div class="col-sm-3"><strong>FECHA: </strong>{mod_date}</div>
            </div>
          </div>
          <hr>
          <!-- END BLOCK : aud_data -->
          <div class="card-body">
            <div class="action-form">
              <div class="form-group mb-0 text-center">
                <input type="hidden" id="accion" name="accion" value="{accion}">
                <input type="hidden" id="id" name="id" value="{codigo}">
                <button class="btn btn-primary" type="button" form="form_" data-mod="{mod}"><span class="btn-label"><i class="fas fa-save"></i></span> GUARDAR</button>
                <a class="btn btn-primary" href="../adm/?mod={mod}"><span class="btn-label"><i class="fas fa-sign-out-alt"></i></span> CERRAR</a>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- END BLOCK : form_module -->
    </div>
  </div>
</div>
<!-- START BLOCK : data_js -->
<script>
  $(function () {
    {script}
  });
</script>
<!-- END BLOCK : data_js -->
<script>
  $('button[form]').click(function () {
    $('#form_').sendForm();
  });
  $('#tipo').change(function () {
    var $listas = $(".listas_valores");
    var $table = $("#lista_details");
    if ($(this).val() == 2) {
      $table.addClass("validar");
      $listas.show()
    } else {
      $table.removeClass("validar");
      $listas.hide();
    }
  });
  $("#btn_add_list").click(function () {
    var $table = $("#lista_details");
    var count = ($table.find("tbody tr").length) + 1;
    tr = `<tr>
      <td>
        `+ count + `
        <input type="hidden" id="cvalor[`+ count + `]" name="cvalor[` + count + `]" value="0">
      </td>
      <td><input type="text" class="form-control" id="text[`+ count + `]" name="text[` + count + `]"></td>
      <td><button type="button" class="btn btn-sm btn-outline-primary btn-circle bt_del"><i class="fas fa-trash-alt"></i></button></td>
    </tr>`;
    $table.find("tbody").append(tr);
  });
</script>
<!-- END BLOCK : module -->