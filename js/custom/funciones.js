const DEFAULT_HEADERS = {
	'Accept': 'application/json',
	'Content-Type': 'application/json; charset=utf-8',
};
const getUrl = window.location;
//const BASE_URL = `${getUrl.protocol}//${getUrl.host}/${getUrl.pathname.split('/')[1]}`;
const BASE_URL = `${getUrl.protocol}//${getUrl.host}`;
const $body = $('body');

function accentsSupr(data) {
	return !data ? '' : typeof data === 'string' ?
		data
			.replace(/\n/g, ' ')
			.replace(/[\u0061\u24D0\uFF41\u1E9A\u00E0\u00E1\u00E2\u1EA7\u1EA5\u1EAB\u1EA9\u00E3\u0101\u0103\u1EB1\u1EAF\u1EB5\u1EB3\u0227\u01E1\u00E4\u01DF\u1EA3\u00E5\u01FB\u01CE\u0201\u0203\u1EA1\u1EAD\u1EB7\u1E01\u0105\u2C65\u0250]/g, 'a')
			.replace(/[\u0065\u24D4\uFF45\u00E8\u00E9\u00EA\u1EC1\u1EBF\u1EC5\u1EC3\u1EBD\u0113\u1E15\u1E17\u0115\u0117\u00EB\u1EBB\u011B\u0205\u0207\u1EB9\u1EC7\u0229\u1E1D\u0119\u1E19\u1E1B\u0247\u025B\u01DD]/g, 'e')
			.replace(/[\u0069\u24D8\uFF49\u00EC\u00ED\u00EE\u0129\u012B\u012D\u00EF\u1E2F\u1EC9\u01D0\u0209\u020B\u1ECB\u012F\u1E2D\u0268\u0131]/g, 'i')
			.replace(/[\u006F\u24DE\uFF4F\u00F2\u00F3\u00F4\u1ED3\u1ED1\u1ED7\u1ED5\u00F5\u1E4D\u022D\u1E4F\u014D\u1E51\u1E53\u014F\u022F\u0231\u00F6\u022B\u1ECF\u0151\u01D2\u020D\u020F\u01A1\u1EDD\u1EDB\u1EE1\u1EDF\u1EE3\u1ECD\u1ED9\u01EB\u01ED\u00F8\u01FF\u0254\uA74B\uA74D\u0275]/g, 'o')
			.replace(/[\u0075\u24E4\uFF55\u00F9\u00FA\u00FB\u0169\u1E79\u016B\u1E7B\u016D\u00FC\u01DC\u01D8\u01D6\u01DA\u1EE7\u016F\u0171\u01D4\u0215\u0217\u01B0\u1EEB\u1EE9\u1EEF\u1EED\u1EF1\u1EE5\u1E73\u0173\u1E77\u1E75\u0289]/g, 'u')
			.replace(/[\u0041\u24B6\uFF21\u00C0\u00C1\u00C2\u1EA6\u1EA4\u1EAA\u1EA8\u00C3\u0100\u0102\u1EB0\u1EAE\u1EB4\u1EB2\u0226\u01E0\u00C4\u01DE\u1EA2\u00C5\u01FA\u01CD\u0200\u0202\u1EA0\u1EAC\u1EB6\u1E00\u0104\u023A\u2C6F]/g, 'A')
			.replace(/[\u0045\u24BA\uFF25\u00C8\u00C9\u00CA\u1EC0\u1EBE\u1EC4\u1EC2\u1EBC\u0112\u1E14\u1E16\u0114\u0116\u00CB\u1EBA\u011A\u0204\u0206\u1EB8\u1EC6\u0228\u1E1C\u0118\u1E18\u1E1A\u0190\u018E]/g, 'E')
			.replace(/[\u0049\u24BE\uFF29\u00CC\u00CD\u00CE\u0128\u012A\u012C\u0130\u00CF\u1E2E\u1EC8\u01CF\u0208\u020A\u1ECA\u012E\u1E2C\u0197]/g, 'I')
			.replace(/[\u004F\u24C4\uFF2F\u00D2\u00D3\u00D4\u1ED2\u1ED0\u1ED6\u1ED4\u00D5\u1E4C\u022C\u1E4E\u014C\u1E50\u1E52\u014E\u022E\u0230\u00D6\u022A\u1ECE\u0150\u01D1\u020C\u020E\u01A0\u1EDC\u1EDA\u1EE0\u1EDE\u1EE2\u1ECC\u1ED8\u01EA\u01EC\u00D8\u01FE\u0186\u019F\uA74A\uA74C]/g, 'O')
			.replace(/[\u0055\u24CA\uFF35\u00D9\u00DA\u00DB\u0168\u1E78\u016A\u1E7A\u016C\u00DC\u01DB\u01D7\u01D5\u01D9\u1EE6\u016E\u0170\u01D3\u0214\u0216\u01AF\u1EEA\u1EE8\u1EEE\u1EEC\u1EF0\u1EE4\u1E72\u0172\u1E76\u1E74\u0244]/g, 'U')
			.replace(/�/g, 'c')
			.replace(/�/g, 'C') : data;
};
if ($().dataTable) {
	Object.assign(DataTable.defaults, {
		processing: true,
		layout: {
			topStart: {
				features: 'search'
			},
			topEnd: {
				buttons: [
					{
						extend: 'excelHtml5',
						text: '<i class="fas fa-file-excel"></i> Excel',
					}
				]
			},
			bottom: [
				{
					features: 'info'
				},
				{
					paging: {
						boundaryNumbers: true,
						firstLast: false
					}
				}
			]
		}
	});

	$.extend(true, $.fn.dataTable.defaults, {
		language: {
			sProcessing: 'Procesando...',
			sLengthMenu: 'Mostrar _MENU_ registros',
			sZeroRecords: 'No se encontraron resultados',
			sEmptyTable: 'No se encontraron resultados',
			sInfo: '_START_ al _END_ de _TOTAL_',
			sInfoEmpty: '0 al 0 de 0',
			sInfoFiltered: '(de un total de _MAX_)',
			sSearch: '',
			searchPlaceholder: 'Búsqueda',
			oPaginate: {
				sFirst: 'Prim.',
				sLast: 'Últ.',
				sNext: 'Sig.',
				sPrevious: 'Ant.',
			},
		},
		lengthMenu: [[25, 50, 100, 150, 500, -1], [25, 50, 100, 150, 500, 'Todos']],
		pageLength: 25,
	});

	$.fn.DataTable.ext.type.search['string'] = function (data) {
		return accentsSupr(data);
	};

	$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-primary';
}

const clear_log = function () {
	$('.is-invalid').removeClass("is-invalid");
	$('.is-valid').removeClass("is-valid");
}
const dialog = function (_msj, _class, _funcion, _elemetsArray, _btn) {
	if (typeof _funcion === "undefined" || _funcion === null || _funcion === false) {
		_funcion = false;
	}
	$('.jconfirm').remove();

	var button_class;
	var dialog_class;
	var dialog_icon;

	if (_class.toUpperCase() == 'ERROR') {
		dialog_class = 'red';
		button_class = `btn-${dialog_class}`;
		clas = "danger";
		dialog_icon = "fa fa-times";
	} else if (_class.toUpperCase() == 'INFO') {
		dialog_class = 'blue';
		button_class = `btn-${dialog_class}`;
		clas = "info";
		dialog_icon = "fa fa-exclamation-circle"
	} else if (_class.toUpperCase() == 'WARNING') {
		dialog_class = 'orange';
		button_class = `btn-${dialog_class}`;
		clas = "warning";
		dialog_icon = "fa fa-exclamation-triangle"
	} else if (_class.toUpperCase() == 'SUCCESS') {
		dialog_class = 'green';
		button_class = `btn-${dialog_class}`;
		clas = "success";
		dialog_icon = "fa fa-check-circle"
	}

	let botones = "";

	if (_funcion) {
		botones = { OK: { btnClass: button_class, action: function () { _funcion.apply(null, _elemetsArray); } }, CANCELAR: function () { } };
	} else {
		botones = { CERRAR: { btnClass: button_class, action: function () { } } };
	}

	if (_btn !== undefined) {
		botones = _btn;
	}

	$.confirm({
		icon: dialog_icon,
		//theme: 'bootstrap',
		type: dialog_class,
		typeAnimated: true,
		title: 'Mensaje del Sistema',
		content: _msj,
		buttons: botones,
		onContentReady: function () {
			$(".jconfirm-buttons button:last").focus()
		}
	});
}
const fetchCall = async (endPoint, methodType = 'GET', jsonData = null, customHeaders = {}) => {
	try {
		const combinedHeaders = { ...DEFAULT_HEADERS, ...customHeaders };
		const fetchOptions = {
			method: methodType,
			headers: combinedHeaders,
		};

		if (['POST', 'PUT', 'PATCH'].includes(methodType.toUpperCase()) && jsonData) {
			fetchOptions.body = JSON.stringify(jsonData);
		}
		const response = await fetch(`${BASE_URL}${endPoint}`, fetchOptions);

		if (!response.ok) {
			if (response.status != 404) {
				const errorData = await response.json();
				throw errorData;
			}
			throw `Error ${response.status}: ${response.statusText}`;
		}
		return await response.json();
	} catch (error) {
		throw error;
	}
};

/**
 * @returns Convierte los objetos en datatable (Siempre y cuando sea tabla).
 */
$.fn.setDatatable = function () {
	if (this.length > 0) {
		let opciones_temp = {
			destroy: true,
		}
		this.each(function () {
			var $obj = $(this);
			if ($obj.is('table')) {
				$obj.find('thead').addClass("bg-primary text-white text-capitalize");
				$obj.find("thead th").addClass("align-middle");

				opciones_temp.order = [[0, 'des']];
				opciones_temp.ordering = $obj.is("[data-dt_ordering]") ? $obj.data("dt_ordering") : true;
				opciones_temp.pageLength = $obj.is("[data-dt_page_lenght]") ? $obj.data("dt_page_lenght") : 25;
				opciones_temp.paging = $obj.is("[data-dt_paging]") ? $obj.data("dt_paging") : true;
				opciones_temp.searching = $obj.is("[data-dt_search]") ? $obj.data("dt_search") : true;
				opciones_temp.info = $obj.is("[data-dt_info]") ? $obj.data("dt_info") : true;

				var btn_buscar = $obj.data("dt_hide_search") != undefined && $obj.data("dt_hide_search") ? '' : 'f';
				//opciones_temp.dom = 'B<"row my-3 flex-wrap"<"col-md-6 col-sm-12 left"l><"col-md-6 col-sm-12 right"'+btn_buscar+'>>rtip';

				let opciones = {
					...opciones_temp,
					initComplete: function () {
						if ($obj.is("[data-dt_filter_index]")) {
							var cont = 0;
							var obj_list = $obj.data("dt_filter_index");
							var columns = [];
							for (let i = 0; i < obj_list.length; i++) {
								columns.push(obj_list[i].index);
							}
							this.api().columns(columns).every(function () {
								var column = this;
								var select = $(obj_list[cont].ddl).on("input", function () {
									var val = $.fn.dataTable.util.escapeRegex($(this).val());
									column
										.search($.fn.DataTable.ext.type.search.string(val), true, false)
										.draw();
								});
								if (select.prop("nodeName") == "SELECT") {
									select.append('<option  value="">TODOS</option>');
									var selects_array = [];
									column.data().unique().sort().each(function (d, j) {
										selects_array.push(d);
									});
									selects_array.forEach(function (valor) {
										select.append('<option  value="' + valor + '">' + valor + '</option>')
									});
								}
								cont = cont + 1;
							});
						}
					}
				}
				$obj.DataTable(opciones);
			} else {
				console.warn('El objeto no es del tipo TABLA, no se puede incializar DataTable');
			}
		});
	}
}

/**
 * @returns Si los objetos son mayor a (1) retorna una lista de Objetos con valores, de lo contrario retorna valor
 */
$.fn.getValue = function () {
	var response = {};
	if(this.length > 0){
		var valor = '';
		valor = ($(this).is('input') || $(this).is('select') || $(this).is('textarea')) ? $(this).val() : $(this).text();
		valor = $(this).attr("_unmaskedValue") != undefined ? $(this).attr("_unmaskedValue") : valor;
		valor = $(this)[0].hasOwnProperty('mask') ? $(this)[0]["mask"]["_unmaskedValue"] : valor;
		valor = $(this).hasClass('numero') ? parseInt(valor) : valor;
		valor = $(this).hasClass('basico') ? parseFloat(valor) : valor;
		if (this.length > 1) {
			this.each(function(index){
				var temp = {};
				valor = $(this)[0].hasOwnProperty('mask') ? $(this)[0]["mask"]["_unmaskedValue"] : valor;
				valor = $(this).hasClass('numero') ? parseInt(valor) : valor;
				valor = $(this).hasClass('basico') ? parseFloat(valor) : valor;
				temp["id"] = $(this).prop('id');
				temp["nodeName"] = $(this).prop('nodeName');
				temp["value"] = valor
				response[index] = temp;
			});
		}else{
			var response = valor
		}
	}else{
		response = "";
	}
	return response;
}

/**
 * @returns Si los objetos son mayor a (1) retorna una lista de Objetos con valores, de lo contrario retorna texto del Label
 */
$.fn.getLabel = function () {
	var response = {};
	if(this.length > 0){
		if (this.length > 1) {
			this.each(function(index){
				var temp = {};
				temp["id"] = $(this).prop('id');
				temp["label_text"] = $("label[for='"+temp["id"]+"']").text();
				temp["label_obj"] = $("label[for='"+temp["id"]+"']");
				response[index] = temp;
			});
		}else{
			var response = $("label[for='"+$(this).prop('id')+"']").text();
		}
	}
	return response;
}

/**
 * @returns Retorna un Boolean indicando si los objetos del Selector poseen valor.
 * Si existe un Invalido, detiene la validacion y retorna el valor
 */
$.fn.valObj = function(){
	var valido = true;
	if(this.length > 0){
		this.each(function(){
			var label=$(this).getLabel(), val = $(this).getValue();
			if (val!==''){
				$(this).removeClass("is-invalid");
				valido =  valido && true;
			}else{
				$(this).addClass("is-invalid");
				dialog("El campo <strong>"+label+"</strong> es obligatorio","ERROR");
				valido =  valido && false;
				return false;
			}
		});
	}
	return valido;
}

/**
 * @returns Retorna un Boolean indicando si los objetos del Selector son números
 * si _positive es true, la validacion asume que debe ser mayor a 0
 * Si existe un Invalido, detiene la validacion y retorna el valor
 */
$.fn.valNumber = function(_positive){
	var valido = true;
	if(this.length>0){
		this.each(function(){
			var label=$(this).getLabel(), val = $(this).getValue();
			if (val!==''){
				if(_positive && val<=0){
					$(this).addClass("is-invalid");
					dialog("El campo <strong>"+label+"</strong> debe ser mayor a 0","ERROR");
					valido =  valido && false;
					return false;
				}else if(val.match(RegExp_number)) {
					$(this).removeClass("is-invalid");
					valido =  valido && true;
				}else{
					$(this).addClass("is-invalid");
					dialog("El campo <strong>"+label+"</strong> debe ser numerico","ERROR");
					valido =  valido && false;
					return false;
				}
			}else{
				$(this).addClass("is-invalid");
				dialog("El campo <strong>"+label+"</strong> es obligatorio","ERROR");
				valido =  valido && false;
				return false;
			}
		});
	}
	return valido;
}

/**
 * @returns Retorna un Boolean indicando si los objetos del Selector son del tipo Fecha / Fecha Hora
 * Si existe un Invalido, detiene la validacion y retorna el valor
 */
$.fn.valDateTime = function() {
	var valido = true;
	if(this.length > 0){
		this.each(function(){
			var label=$(this).getLabel(), val = $(this).getValue();
			var $obj = $(this), $label = $('label[for="'+$obj.prop('id')+'"]');
			if($label.parent().find(".input-group-text").text() !== ""){
				label += ' '+$label.parent().find(".input-group-text").text().trim();
			}
			if($obj.attr('type')=='datetime-local'){
				$obj.removeClass("is-invalid");
				valido = valido && true;
			}else{
				if(val.match(RegExp_datesTimes)){
					valido = valido && true;
					$obj.removeClass("is-invalid");
				}else{
					valido = valido && false;
					$obj.addClass("is-invalid");
					dialog("El campo <strong>" + label + "</strong> no es una fecha válida", "ERROR");
					return false;
				}
			}
		});
	}
	return valido;
};

/**
 * @returns Retorna un Boolean indicando si los objetos del Selector (tablas) posee Rows en el Body.
 * Si existe un Invalido, detiene la validacion y retorna el valor
 */
$.fn.valTable = function(){
	var valido = true;
	if(this.length>0){
		this.each(function(){
			var $obj = $(this);
			if ($obj.prop('nodeName') == "TABLE"){
				var label=$(this).getLabel();
				if ($obj.find('tbody tr').length <= 0) {
					var mensaje = "Debe seleccionar al menos un detalle";
					mensaje += (label !== undefined) ? " PARA <strong>"+label+"</strong>" : "";
					dialog(mensaje,"ERROR");
					valido =  valido && false;
					return false;
				}
			}else{
				dialog("El objeto <strong>"+$obj.prop('id')+"</strong> no es una TABLA","ERROR");
				valido =  valido && false;
				return false;
			}
		});
	}
	return valido;
}

/**
 * @returns Retorna un Boolean indicando si los objetos del Selector (selects) poseen un valor diferente a -1
 * Si existe un Invalido, detiene la validacion y retorna el valor
 */
$.fn.valList = function(){
	var valido = true;
	if(this.length > 0){
		this.each(function(){
			var $obj = $(this);
			if ($obj.prop('nodeName') == "SELECT"){
				var label=$(this).getLabel();
				if ($obj.val() == "-1") {
					$obj.addClass("is-invalid");
					dialog("Debe seleccionar una opción para <strong>"+label+"</strong>","ERROR");
					valido =  valido && false;
					return false;
				}
			}else{
				dialog("El objeto <strong>"+$obj.prop('id')+"</strong> no es una lista de valores!","ERROR");
				valido =  valido && false;
				return false;
			}
		});
	}
	return valido;
}

/**
 * @returns Retorna un Boolean indicando si los objetos del Formulario cumplen la Validacion
 */
$.fn.valForm = function(){
	var valido=true;
	if(this.length > 0){
		$(this).find('.is-valid, .is-invalid').removeClass("is-valid").removeClass("is-invalid");
		$(this).find('.validar').each(function(){
			var $obj = $(this);
			if(!$obj.hasClass("table")){
				valido = valido && $obj.valObj();
			}
			if($obj.hasClass("numeric") && $obj.hasClass("positive")){
				valido = valido && $obj.valNumber(true);
			}else if ($obj.hasClass("numeric")){
				valido = valido && $obj.valNumber();
			}else if($obj.hasClass("dates") || $obj.hasClass("datetimes")){
				valido = valido && $obj.valDateTime();
			}else if($obj.hasClass("table")){
				valido = valido && $obj.valTable();
			}else if($obj.hasClass("list")){
				valido = valido &&  $obj.valList();
			}/*else if($obj.hasClass("rut")){
				valido = valido && IsRut(id);
			}else if($obj.hasClass("mail")){
				valido = valido && validMail(id);
			}*/
		});
	}
	return valido;
}

$.fn.sendForm = async function (){
	try{
		if(this.length == 1){
			const $obj = $(this);
			const id = $obj.attr('id');
			if ($obj.valForm()) {
				$(".preloader").fadeIn();
				const mod = $obj.find('button[form]').attr('data-mod').toLowerCase();
				const form = document.getElementById(id); 
				const formData = new FormData(form);
				const datos = {};
				for (let [name, value] of formData.entries()) {
					const input = form.querySelector(`[name="${name}"]`);
					if (input && input.id) {
						datos[input.id] = value;
					}
				}
				Object.assign(datos, {["mod"]: mod});
				const datas = await fetchCall(`./modules/controllers/${mod}.php`, 'POST', datos);
				if (datas.title != "SUCCESS") {
					if (datas.content == -1) {
						$(".preloader").fadeOut();
						document.location.href="./?response=e45ee7ce7e88149af8dd32b27f9512ce";
					}
					dialog(datas.content, datas.title);
					return;
				}
				const botones = { ACEPTAR: { btnClass: 'btn-success', action: function(){ document.location.href="./?mod="+mod; } }};
				dialog(datas.content,datas.title,null,null,botones);
			}
		}else{
			dialog("Este método no se puede ejecutar en multiples objetos o no existe ningun FORM asociado","ERROR");
		}
	}catch (error) {
		const mensaje = `Error al procesar la petición: ${error}`;
		dialog(mensaje, 'error');
	}
}