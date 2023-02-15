<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <link href="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">

        	<?php echo form_open('contratos/guarda'); ?>
        	<div class="col-lg-12">
        		<div class="card card-outline-info">
        			<div class="card-header">
        				<h4 class="mb-0 text-white">NUEVO CONTRATO</h4>
        			</div>
        			<?php //vdebug($this->session->nombre, false, false, true); 
                    ?>
        			<div class="card-body">

        				<div class="form-body">

        					<div class="modal-body">

        						<div class="row">
        							<div class="col-md-3">
        								<div class="form-group">
        									<label class="control-label">Nombre</label>
        									<input name="nombre" type="text" id="busca_grupo" class="form-control"
        										required autocomplete="off">
											<input type="hidden" name="grupo_id" value="0">
                                        
                                            <div id="muestra_grupos_ajax"></div>
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Direccion</label>
        									<input name="direccion" type="text" id="direccion" class="form-control">
        								</div>
        							</div>

        							<div class="col-md-5">
        								<div class="form-group">
        									<label class="control-label">Descripcion</label>
        									<input name="descripcion" type="text" id="descripcion" class="form-control">
        								</div>
        							</div>
                                </div>

                                <div class="row">

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Celulares</label>
        									<input name="celulares" type="text" id="celulares" class="form-control">
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Fecha</label>
        									<input name="fecha" type="date" id="fecha" class="form-control"
        										value="<?php echo date('Y-m-d') ?>">
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Cantidad Personas</label>
        									<input name="cantidad" type="text" id="cantidad" class="form-control">
        								</div>
        							</div>

        						</div>

        						<div class="row" style="background-color: #C3E6FF;">

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Varones</label>
        									<input name="cantidad_varones" type="number" id="cantidad_varones"
        										class="form-control" min="0" step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Saco</label>
        									<input name="costo_saco_varon" onblur="sumaVarones();" type="number"
        										id="costo_saco_varon" class="form-control varones" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Pantalon</label>
        									<input name="costo_pantalon_varon" onblur="sumaVarones();" type="number"
        										id="costo_pantalon_varon" class="form-control varones" min="0"
        										step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Chaleco</label>
        									<input name="costo_chaleco_varon" onblur="sumaVarones();" type="number"
        										id="costo_chaleco_varon" class="form-control varones" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"></label>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Conf.</label>
        									<input name="costo_confeccion_varon" type="text" id="costo_confeccion_varon"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Tela</label>
        									<select name="tela_propia_varon" class="form-control custom-select">
        										<option value="NO">Sin Tela</option>
        										<option value="SI">Con Tela</option>
        									</select>
        								</div>
        							</div>

        							<div class="col-md-2">
        								<div class="form-group">
        									<label class="control-label">Marca</label>
        									<input type="text" name="marca_tela_varon" id="marca" class="form-control">
        								</div>
        							</div>


        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Tela</label>
        									<input name="costo_tela_varon" type="number" id="costo_tela_varon" class="form-control"
        										min="0" value="0" step="any" onblur="calculaTelaVaron();">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> P. Tela</label>
        									<input name="precio_tela_varon" type="number" id="precio_tela_varon" class="form-control calculo"
        										min="0" step="any" value="0" readonly>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Total</label>
        									<input name="subtotal_varones" type="text" id="subtotal_varones"
        										class="form-control" min="0" step="any" value="0" readonly>
        								</div>
        							</div>

        						</div>

        						<div class="row" style="background-color: #FFC3C3;">

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Mujeres</label>
        									<input name="cantidad_mujeres" type="number" id="cantidad_mujeres"
        										class="form-control calculo" min="0" step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Saco</label>
        									<input name="costo_saco_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_saco_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Pantalon</label>
        									<input name="costo_pantalon_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_pantalon_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Chaleco</label>
        									<input name="costo_chaleco_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_chaleco_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Falda</label>
        									<input name="costo_falda_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_falda_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Conf.</label>
        									<input name="costo_confeccion_mujer" type="text" id="costo_confeccion_mujer"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

                                    <div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Tela</label>
        									<select name="tela_propia_mujer" class="form-control custom-select">
        										<option value="NO">Sin Tela</option>
        										<option value="SI">Con Tela</option>
        									</select>
        								</div>
        							</div>

        							<div class="col-md-2">
        								<div class="form-group">
        									<label class="control-label">Marca</label>
        									<input type="text" name="marca_tela_mujer" id="marca_tela_mujer" class="form-control">
        								</div>
        							</div>


        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Tela</label>
        									<input name="costo_tela_mujer" type="number" id="costo_tela_mujer" class="form-control"
        										min="0" value="0" step="any" onblur="calculaTelaMujer();">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> P. Tela</label>
        									<input name="precio_tela_mujer" type="number" id="precio_tela_mujer" class="form-control calculo"
        										min="0" value="0" step="any" readonly>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Total</label>
        									<input name="subtotal_mujeres" type="text" id="subtotal_mujeres"
        										class="form-control" min="0" value="0" step="any" readonly>
        								</div>
        							</div>

        						</div>

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <h3>TOTAL: <span id="total_trabajo"></span></h3>
                                    </div>
                                </div>

        					</div>

        				</div>

        				<div class="row">
        					<div class="col-md-6">
        						<button type="submit" class="btn waves-effect waves-light btn-block btn-success">Guardar
        							Trabajo</button>
        					</div>
        					<div class="col-md-6">
        						<a href="<?php echo base_url() ?>trabajos/listado_trabajos">
        							<button type="button"
        								class="btn waves-effect waves-light btn-block btn-inverse">Cancelar</button>
        						</a>
        					</div>
        				</div>

        				<!-- <div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-inverse">Cancel</button>
							</div> -->
        				</form>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Row -->
    </div>
</div>
<script type="text/javascript">
    /*$(document).on('keyup', '#busca_grupo', function(e){
	  nombre_grupo = $('#busca_grupo').val();
	  if (nombre_grupo.length > 3) {

        $("#muestra_grupos_ajax").show('slow');

	    // console.log(nombre_grupo.length);
	    // var pagina   = $(this).attr('data-pagina');
	    // var dv       = $(this).parents('.gale-archi-ajax');
	    // var idposmod = dv.attr('data-idposimod');

	    $.ajax({
	      url: '<?php echo base_url() ?>contratos/ajax_busca_grupo/' + nombre_grupo,
	      type: 'GET',
	      success: function (data) {
	        $("#muestra_grupos_ajax").html(data);
	      }
	    });
	  }

	});*/

	$(".calculo").keyup(function(){

		var saco = parseFloat($("#costo_saco").val());
		var pantalon = parseFloat($("#costo_pantalon").val());
		var chaleco = parseFloat($("#costo_chaleco").val());
		var falda = parseFloat($("#costo_falda").val());
		costo_confeccion = saco + pantalon + chaleco + falda;
		$("#costo_confeccion").val(costo_confeccion);
	});

	$("#costo_tela").keyup(function(){
		var costo_confeccion = parseFloat($("#costo_confeccion").val());
		var costo_tela = parseFloat($("#costo_tela").val());
		total = costo_confeccion+costo_tela;
		$("#total").val(total);
	});

	

	function abre_modal()
	{
		$('#nombre').val("");
		$('#tipo').val("saco");
		$('#genero').val("varon");
		$('#ida').val("");
		$("#myModal").modal('show');

	}

	function cierra_modal()
	{
		$("#myModal").modal('hide');
	}

	function editar(id, nombre, tipo, genero)
	{
		$('#nombre').val(nombre);
		$('#tipo').val(tipo);
		$('#genero').val(genero);
		$('#ida').val(id);
		$("#myModal").modal('show');
	}

	function eliminar(id, nombre) {
		//console.log(id_pago);
		Swal.fire({
			title: 'Quieres borrar ' + nombre + '?',
			text: "Luego no podras recuperarlo!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, estoy seguro!',
			cancelButtonText: "Cancelar",
		}).then((result) => {
			if (result.value) {
				Swal.fire(
					'Excelente!',
					'Tu monto fue borrado.',
					'success'
				);
				// console.log("el id es "+id_pago);
				window.location.href = "<?php echo base_url() ?>aberturas/eliminar/" + id;
			}
		})
	}

	function sumaVarones(){

		var arrayVarones = document.getElementsByClassName('varones');

		var tot=0;
		for(var i=0;i<arrayVarones.length;i++){
			if(parseInt(arrayVarones[i].value))
				tot += parseInt(arrayVarones[i].value);
		}
		document.getElementById('costo_confeccion_varon').value = tot;
		
		let subtotalVarones = tot * parseInt(document.getElementById('cantidad_varones').value);

		document.getElementById('subtotal_varones').value = subtotalVarones;

		calculaTotalTrabajo();
	}

	function sumaMujeres(){

		var arrayMujeres = document.getElementsByClassName('mujer');

		var tot=0;
		for(var i=0;i<arrayMujeres.length;i++){
			if(parseInt(arrayMujeres[i].value))
				tot += parseInt(arrayMujeres[i].value);
		}
		document.getElementById('costo_confeccion_mujer').value = tot;
		
		let subtotalVarones = tot * parseInt(document.getElementById('cantidad_mujeres').value);

		document.getElementById('subtotal_mujeres').value = subtotalVarones;

		calculaTotalTrabajo();

	}

    function calculaTelaVaron(){

        let precioConfeccionVaron = parseInt(document.getElementById('subtotal_varones').value);

        let precioTelaVaron = parseInt(document.getElementById('costo_tela_varon').value);
        let cantidadVarones = parseInt(document.getElementById('cantidad_varones').value);

        let costoTelaVaron = precioTelaVaron*cantidadVarones;

        let costoSubtotalVarones = precioConfeccionVaron+costoTelaVaron;

        document.getElementById('precio_tela_varon').value = costoTelaVaron;
        document.getElementById('subtotal_varones').value = costoSubtotalVarones;

		calculaTotalTrabajo();


        // console.log(precioTelaVaron, cantidadVarones);
    }

    function calculaTelaMujer(){

        let precioConfeccionMujer = parseInt(document.getElementById('subtotal_mujeres').value);

        let precioTelaMujer = parseInt(document.getElementById('costo_tela_mujer').value);
        let cantidadMujeres = parseInt(document.getElementById('cantidad_mujeres').value);

        let costoTelaMujer = precioTelaMujer*cantidadMujeres;

        let costoSubtotalMujeres = precioConfeccionMujer+costoTelaMujer;

        document.getElementById('precio_tela_mujer').value = costoTelaMujer;
        document.getElementById('subtotal_mujeres').value = costoSubtotalMujeres;

		calculaTotalTrabajo();

        // console.log(precioTelaVaron, cantidadVarones);
    }

	function calculaTotalTrabajo(){

		let subtotalMujeres = parseInt(document.getElementById('subtotal_mujeres').value);
		let subtotalVarones = parseInt(document.getElementById('subtotal_varones').value);

		let totalTrabajo = subtotalMujeres + subtotalVarones;

		document.getElementById('total_trabajo').innerHTML = totalTrabajo;

			
	}
</script>
