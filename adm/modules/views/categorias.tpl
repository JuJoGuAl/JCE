<!-- START BLOCK : module -->
<div class="page-breadcrumb bg-white">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
            <h5 class="font-medium text-uppercase mb-0">{mod}</h5>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
            <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                <ol class="breadcrumb mb-0 justify-content-end p-0 bg-white">
                    <li class="breadcrumb-item active" aria-current="page">{mod}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="material-card card">
        <div class="card-body">
          <h4 class="card-title">{mod_name}</h4>
          <!-- START BLOCK : list_module -->
          <div class="row">
            <!-- START BLOCK : data_new -->
              <div class="col-md-3 col-sm-6">
                <label class="col-form-label"><br></label>
                <div class="button-group">
                  <a class="btn btn-outline-primary" href="?mod={mod}&id=0" data-id="0"><span class="btn-label"><i class="fas fa-plus"></i></span> NUEVO</a>
                </div>
              </div>
            <!-- END BLOCK : data_new -->
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label class="col-form-label" for="ddlTipo">TIPO </label>
                <select id="ddlTipo" class="form-control custom-select"></select>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label class="col-form-label" for="ddlComunidad">COMUNIDAD </label>
                <select id="ddlComunidad" class="form-control custom-select"></select>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label class="col-form-label" for="ddlEstatus">ESTATUS </label>
                <select id="ddlEstatus" class="form-control custom-select"></select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body pt-1">
          <div class="table-responsive">
            <table class="table table-bordered table-hover datatables" data-dt_filter_index='[{"index":"2", "ddl":"#ddlTipo"},{"index":"3", "ddl":"#ddlComunidad"},{"index":"4", "ddl":"#ddlEstatus"}]'>
              <thead>
                <tr>
                  <th>CODIGO</th>
                  <th>DESCRIPCION</th>
                  <th>TIPO</th>
                  <th>COMUNIDAD</th>
                  <th>ESTATUS</th>
                  <th class="noexportar">OPC</th>
                </tr>
              </thead>
              <tbody>
                <!-- START BLOCK : data -->
                <tr>
                  <td>{codigo}</td>
                  <td>{caracteristica}</td>
                  <td>{tipo_def}</td>
                  <td>{comu_def}</td>
                  <td>{ESTATUS}</td>
                  <td>{actions}</td>
                </tr>
                <!-- END BLOCK : data -->
              </tbody>
            </table>
          </div>
        </div>
        <!-- END BLOCK : list_module -->
        <!-- START BLOCK : form_module -->
        </div>
        <form role="form" name="form_" id="form_" enctype="multipart/form-data">
          <div class="card-body pt-1">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="dato" class="control-label col-form-label">CARACTERISTICA</label>
                  <input type="text" class="form-control validar" id="dato" name="dato" maxlength="100" placeholder="ASIGNE UN NOMBRE PARA LA CARACTERISTICA" value="{caracteristica}" {read}>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="form-group">
                  <label for="estatus">TIPO</label>
                  <select class="form-control validar list" id="tipo" name="tipo">
                    <!-- START BLOCK : tipo_det -->
                    <option value="{code}" {selected}>{valor}</option>
                    <!-- END BLOCK : tipo_det -->
                  </select>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="form-group">
                  <label for="estatus">COMUNIDAD</label>
                  <select class="form-control validar list" id="comunidad" name="comunidad">
                    <!-- START BLOCK : com_det -->
                    <option value="{code}" {selected}>{valor}</option>
                    <!-- END BLOCK : com_det -->
                  </select>
                </div>
              </div>
              <!-- START BLOCK : st_block -->
              <div class="col-md-4 col-sm-6">
                <div class="form-group">
                  <label for="estatus">ESTATUS</label>
                  <select class="form-control validar list" id="estatus" name="estatus">
                    <option value="-1">SELECCIONE...</option>
                    <!-- START BLOCK : st_det -->
                    <option value="{code}" {selected}>{valor}</option>
                    <!-- END BLOCK : st_det -->
                  </select>
                </div>
              </div>
              <!-- END BLOCK : st_block -->
            </div>
            <div class="row listas_valores">
              <div class="col-12">
                <div class="card-body p-1">
                  <h5 class="card-title">VALORES DE LISTA</h5>
                  <div class="button-group">
                    <button id="btn_add_list" type="button" class="btn btn-sm btn-outline-primary"><span class="btn-label"><i class="fas fa-plus"></i></span> NUEVO</button>
                  </div>
                </div>
                <div class="card-body p-1">
                  <div class="table-responsive">
                    <label for="lista_details" style="display: none;">LISTAS DE VALORES</label>
                    <table id="lista_details" class="table table-bordered table-hover validar">
                      <thead>
                        <tr>
                          <th width="50px">#</th>
                          <th>DESCRIPCION</th>
                          <th width="100px">OPCION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- START BLOCK : lista_det -->
                        <tr>
                          <td>{count}<input type="hidden" id="cvalor[{count}]" name="cvalor[{count}]" value="{codigo}"></td>
                          <td><input type="text" class="form-control" id="text[{count}]" name="text[{count}]" value="{valor}"></td>
                          <td><button type="button" class="btn btn-sm btn-outline-primary btn-circle bt_del"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                        <!-- END BLOCK : lista_det -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
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
                <!-- START BLOCK : btn_save -->
                <button class="btn btn-outline-primary" type="button" form="form_" data-mod="{mod}"><span class="btn-label"><i class="fas fa-save"></i></span> GUARDAR</button>
                <!-- END BLOCK : btn_save -->
                <a class="btn btn-outline-primary" href="../adm/?mod={mod}"><span class="btn-label"><i class="fas fa-sign-out-alt"></i></span> CERRAR</a>
              </div>
            </div>
          </div>
        </form>
        <!-- END BLOCK : form_module -->
      </div>
    </div>
  </div>
</div>
<script>
  jQuery(function () {
    jQuery('#tipo').trigger("change");
    {script}
  });
  jQuery('button[form]').click(function(){
    var $table = jQuery("#lista_details");
    var valido=true;
    if($table.is(":visible")){
      $table.find("tbody tr").each(function(){
        valido = valido && (jQuery(this).find("input").getValue()=="" ? false : true);
      });
    }
    if ($table.is(":visible") && !valido){
      dialog("AL MENOS UNA LINEA DE LA TABLA <strong>VALORES DE LISTA</strong> ESTA EN BLANCO","ERROR");
    }else{
      jQuery('#form_').sendForm();
    }
  });
  jQuery('#tipo').change(function(){
    var $listas = jQuery(".listas_valores");
    var $table = jQuery("#lista_details");
    if(jQuery(this).val() == 2){
      $table.addClass("validar");
      $listas.show()
    }else{
      $table.removeClass("validar");
      $listas.hide();
    }
  });
  jQuery("#btn_add_list").click(function(){
    var $table = jQuery("#lista_details");
    var count = ($table.find("tbody tr").length) + 1;
    tr=`<tr>
      <td>
        `+count+`
        <input type="hidden" id="cvalor[`+count+`]" name="cvalor[`+count+`]" value="0">
      </td>
      <td><input type="text" class="form-control" id="text[`+count+`]" name="text[`+count+`]"></td>
      <td><button type="button" class="btn btn-sm btn-outline-primary btn-circle bt_del"><i class="fas fa-trash-alt"></i></button></td>
    </tr>`;
    $table.find("tbody").append(tr);
  });
</script>
<!-- END BLOCK : module -->