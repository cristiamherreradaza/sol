var room = 1;

function education_fields(json_modelo_saco, aberturas_varon_saco, detalles_varon_saco, telas) {
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + room);
    // var rdiv = 'removeclass' + room;

    // divtest.innerHTML = '<form class="row"><div class="col-sm-3"><div class="form-group"><input type="text" class="form-control" id="Schoolname" name="Schoolname" placeholder="School Name"></div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="Age" name="Age" placeholder="Age"> </div></div><div class="col-sm-2"> <div class="form-group"> <input type="text" class="form-control" id="Degree" name="Degree" placeholder="Degree"> </div></div><div class="col-sm-3"> <div class="form-group"> <select class="form-control" id="educationDate" name="educationDate"> <option>Date</option> <option value="2015">2015</option> <option value="2016">2016</option> <option value="2017">2017</option> <option value="2018">2018</option> </select> </div></div><div class="col-sm-2"> <div class="form-group"> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button> </div></div></form>';
    // divtest.innerHTML = '<form class="row">'+
    // divtest.innerHTML = '<hr>'+
	// 					'<div class="row">'+
	// 						'<div class="col-md-3">'+
	// 							'<div class="form-group">'+
	// 								'<input type="text" class="form-control" id="Schoolname'+room+'" name="Schoolname[]" placeholder="School Name">'+
	// 							'</div>'+
	// 						'</div>'+
	// 						'<div class="col-md-3">'+
	// 							'<div class="form-group">'+
	// 								'<input type="text" class="form-control" id="Age'+room+'" name="Age[]" placeholder="Age">'+
	// 							'</div>'+
	// 						'</div>'+
	// 						'<div class="col-md-3">'+
	// 							'<div class="form-group">'+
	// 								'<input type="text" class="form-control" id="Degree'+room+'" name="Degree[]" placeholder="Degree">'+
	// 							'</div>'+
	// 						'</div>'+
	// 						'<div class="col-md-2">'+
	// 							'<div class="form-group">'+
	// 								'<select class="form-control" id="educationDate'+room+'" name="educationDate[]">'+
	// 									'<option>Date</option>'+
	// 									'<option value="2015">2015</option>'+
	// 									'<option value="2016">2016</option>'+
	// 									'<option value="2017">2017</option>'+
	// 									'<option value="2018">2018</option>'+
	// 								'</select>'+
	// 							'</div>'+
	// 						'</div>'+
	// 						'<div class="col-md-1">'+
	// 							'<div class="form-group">'+
	// 								'<button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i></button>'+
	// 							'</div>'+
	// 						'</div>'+
	// 					'</div>';

	// console.log(modelo_saco.toString());
	// alert(modelo_saco);
	// console.log(modelo_saco, json_modelo_saco);
	// console.log(json_modelo_saco);

	var  option_sacos = '<option value="">Seleccione</option>';
	json_modelo_saco.forEach(element => {
		option_sacos = option_sacos + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_aberturas_varon_saco = '<option value="">Seleccione</option>';
	aberturas_varon_saco.forEach(element => {
		option_aberturas_varon_saco = option_aberturas_varon_saco + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_detalles_varon_saco = '<option value="">Seleccione</option>';
	detalles_varon_saco.forEach(element => {
		option_detalles_varon_saco = option_detalles_varon_saco + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_telas = '';
	telas.forEach(element => {
		option_telas = option_telas + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	divtest.innerHTML = '<hr>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Modelo</label>'+
									'<select name="sd_modelo[]" id="sd_modelo'+room+'" class="form-control ">'+
										option_sacos+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group">'+
									'<label class="control-label">Botones</label>'+
									'<input name="sd_botones[]" type="number" id="sd_botones'+room+'" class="form-control" min="0" step="any">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Aberturas</label>'+
									'<select name="sd_aberturas[]" id="sd_aberturas'+room+'" class="form-control ">'+
									option_aberturas_varon_saco+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<div class="form-group">'+
									'<label class="control-label">Detalle</label>'+
									'<select name="sd_detalle[]" id="sd_detalle'+room+'" class="form-control ">'+
									option_detalles_varon_saco+
									'</select>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Color</label>'+
									'<input name="sd_color[]" type="text" id="sd_color'+room+'" class="form-control" placeholder="Ej: Plomo">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Ojal Pu&ntilde;o</label>'+
									'<select name="sd_ojal[]" id="sd_ojal'+room+'" class="form-control ">'+
										'<option value="Si">Si</option>'+
										'<option value="No">No</option>'+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Color Ojal</label>'+
									'<input name="sd_color_ojal[]" type="text" id="sd_color_ojal'+room+'" class="form-control" placeholder="Ej: Gris">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Tipo de bolsillo</label>'+
									'<input name="tipo_bolsillo[]" type="text" id="tipo_bolsillo'+room+'" class="form-control" placeholder="Ej: Doble, Simple">'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Marca de la tela</label>'+
									'<select name="marca_tela_saco[]" id="marca_tela_saco'+room+'" class="form-control ">'+
										option_telas+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<div class="form-group">'+
									'<label class="control-label">Imagen del modelo</label>'+
									'<input name="img_modelo_saco[]" type="file" accept="image/*" id="img_modelo_saco'+room+'" class="form-control">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label"><b>Cantidad</b></label>'+
									'<input name="saco_cantidad[]" type="number" id="saco_cantidad'+room+'" class="form-control saco-cal" value="1">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2"'+
								'<div class="form-group" style="margin-top:32px;">'+
									'<button class="btn btn-danger btn-block" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-trash"></i></button>'+
								'</div>'+
							'</div>'+
						+'</div>';
    objTo.appendChild(divtest);
	actualizaCampo(room);
}

function remove_education_fields(rid) {
    $('.removeclass' + rid).remove();
    room--;
	actualizaCampo(room);
}

function actualizaCampo(num){
	$('#numero_sacos').val(num);
}

// PARA EL PANTALON
var roomPantalon = 1;

function education_fields_pantalones(json_modelo_pantalon, json_pinzas_varon_pantalon, json_bolsillos_varon_pantalon, telas) {
    roomPantalon++;
    var objTo = document.getElementById('education_fields_pantalones')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclassPantalones" + roomPantalon);

	var  option_modelo_pantalon = '<option value="">Seleccione</option>';
	json_modelo_pantalon.forEach(element => {
		option_modelo_pantalon = option_modelo_pantalon + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_json_pinzas_varon_pantalon = '<option value="">Seleccione</option>';
	json_pinzas_varon_pantalon.forEach(element => {
		option_json_pinzas_varon_pantalon = option_json_pinzas_varon_pantalon + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_json_bolsillos_varon_pantalon = '<option value="">Seleccione</option>';
	json_bolsillos_varon_pantalon.forEach(element => {
		option_json_bolsillos_varon_pantalon = option_json_bolsillos_varon_pantalon + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_telas = '';
	telas.forEach(element => {
		option_telas = option_telas + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	divtest.innerHTML = '<hr>'+
						'<div class="row">'+
							'<div class="col">'+
								'<div class="form-group">'+
									'<label class="control-label">Modelo</label>'+
									'<select name="pd_modelo[]" id="pd_modelo'+roomPantalon+'" class="form-control ">'+
										option_modelo_pantalon+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col">'+
								'<div class="form-group">'+
									'<label class="control-label">Pinzas</label>'+
									'<select name="pd_pinzas[]" id="pd_pinzas'+roomPantalon+'" class="form-control ">'+
									option_json_pinzas_varon_pantalon+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col">'+
								'<div class="form-group">'+
									'<label class="control-label">Bragueta</label>'+
									'<select name="pd_bragueta[]" id="pd_bragueta'+roomPantalon+'" class="form-control ">'+
									'<option value="Cierre">Cierre</option>'+
									'<option value="Boton">Boton</option>'+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col" style="display: none;">'+
								'<div class="form-group">'+
									'<label class="control-label">Pretina</label>'+
									'<select name="pd_pretina[]" id="pd_pretina'+roomPantalon+'" class="form-control ">'+
									'<option value="">Seleccione</option>'+
									'<option value="Normal">Normal</option>'+
									'<option value="Ancho">Ancho</option>'+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col">'+
								'<div class="form-group">'+
									'<label class="control-label">Bolsillo</label>'+
									'<select name="pd_batras[]" id="pd_batras'+roomPantalon+'" class="form-control ">'+
									option_json_bolsillos_varon_pantalon+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col">'+
								'<div class="form-group">'+
									'<label class="control-label">Bota pie</label>'+
									'<select name="pd_bpie[]" id="pd_bpie'+roomPantalon+'" class="form-control ">'+
									'<option value="Normal">Normal</option>'+
									'<option value="Dobles">Dobles</option>'+
									'<option value="Abertura">Abertura</option>'+
									'</select>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Bolsillo</label>'+
									'<select name="marca_tela_pantalon[]" id="marca_tela_pantalon'+roomPantalon+'" class="form-control ">'+
									option_telas+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-5">'+
								'<div class="form-group">'+
									'<label class="control-label">Imagen del modelo</label>'+
									'<input type="file" class="form-control" accept="image/*" id="img_modelo_pantalon'+roomPantalon+'" name="img_modelo_pantalon[]">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group">'+
									'<label class="control-label"><b>Cantidad</b></label>'+
									'<input name="pantalon_cantidad[]" type="number" id="pantalon_cantidad'+roomPantalon+'" class="form-control" value="1">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group" style="margin-top:32px;">'+
									'<button class="btn btn-danger btn-block" type="button" onclick="remove_education_fields_pantalon(' + roomPantalon + ');"> <i class="fa fa-trash"></i></button>'+
								'</div>'+
							'</div>'+
						'</div>';
    objTo.appendChild(divtest);
	actualizaCampoPantalon(roomPantalon);
}

function remove_education_fields_pantalon(rid) {
    $('.removeclassPantalones' + rid).remove();
    roomPantalon--;
	actualizaCampoPantalon(roomPantalon);
}

function actualizaCampoPantalon(num){
	$('#numero_chalecos').val(num);
}


// PARA LOS CHALECOS
var roomChaleco = 1;

function education_fields_chalecos(json_modelos_varon_chalecos, json_detalles_varon_chalecos, telas) {
    roomChaleco++;
    var objTo = document.getElementById('education_fields_chalecos')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclassChaleco" + roomChaleco);

	var  option_modelos_varon_chalecos = '<option value="">Seleccione</option>';
	json_modelos_varon_chalecos.forEach(element => {
		option_modelos_varon_chalecos = option_modelos_varon_chalecos + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_detalles_varon_chalecos = '<option value="">Seleccione</option>';
	json_detalles_varon_chalecos.forEach(element => {
		option_detalles_varon_chalecos = option_detalles_varon_chalecos + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	var  option_telas = '';
	telas.forEach(element => {
		option_telas = option_telas + '<option value="'+element.id+'">'+element.nombre+'</option>'
	});

	divtest.innerHTML = '<hr>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Modelo</label>'+
									'<select name="ch_modelo[]" id="ch_modelo'+roomChaleco+'" class="form-control ">'+
										option_modelos_varon_chalecos+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Botones</label>'+
									'<input name="ch_botones[]" type="number" id="ch_botones'+roomChaleco+'" class="form-control" min="0" step="any">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Detalle</label>'+
									'<select name="ch_detalle[]" id="ch_detalle'+roomChaleco+'" class="form-control">'+
									option_detalles_varon_chalecos+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Color Ojales</label>'+
									'<input name="ch_color[]" type="text" id="ch_color'+roomChaleco+'" class="form-control" min="0" step="any">'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label class="control-label">Detalle</label>'+
									'<select name="marca_tela_chaleco[]" id="marca_tela_chaleco'+roomChaleco+'" class="form-control">'+
									option_telas+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group">'+
									'<label class="control-label">Boton Forrado</label>'+
									'<select name="ch_boton_forrado[]" id="ch_boton_forrado'+roomChaleco+'" class="form-control">'+
									'<option value="No">No</option>'+
									'<option value="Si">Si</option>'+
									'</select>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<div class="form-group">'+
									'<label class="control-label">Imagen del modelo</label>'+
									'<input type="file" class="form-control" accept="image/*" id="img_modelo_chaleco'+roomChaleco+'" name="img_modelo_chaleco[]">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-2">'+
								'<div class="form-group">'+
									'<label class="control-label"><b>Cantidad</b></label>'+
									'<input name="ch_cantidad[]" type="number" id="ch_cantidad'+roomChaleco+'" class="form-control" value="1">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-1">'+
								'<div class="form-group" style="margin-top:32px;">'+
									'<button class="btn btn-danger btn-block" type="button" onclick="remove_education_fields_chaleco(' + roomChaleco + ');"> <i class="fa fa-trash"></i></button>'+
								'</div>'+
							'</div>'+
						'</div>';
    objTo.appendChild(divtest);
	actualizaCampoChaleco(roomChaleco);
}

function remove_education_fields_chaleco(rid) {
    $('.removeclassChaleco' + rid).remove();
    roomChaleco--;
	actualizaCampoChaleco(roomChaleco);
}

function actualizaCampoChaleco(num){
	$('#numero_chalecos').val(num);
}
