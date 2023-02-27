<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">


<!-- inicio modal LOCALIZACION content -->
<div id="myModalLocalizacion" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<?php 
				$atributos = array('id'=>'formularioContrato');
				echo form_open('contratos/guarda', $atributos); 
			?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">LOCALIZACION DE TRABAJO POR PRENDA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<!-- <input type="text" name="gruSpo_id" id="grupo_id" value="0"> -->
				</div>
				<div class="modal-body">
					<div id="bloque_localizacion_trabajo">

					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" onclick="guardarDetallePrendas()" class="btn waves-effect waves-light btn-block btn-success">GUARDA</button> -->
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal LOCALIZACION -->


<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		
		<div class="row">
			<div class="col-12">
				<!-- table responsive -->
				<div class="card">
					<div class="card-body">
						<?php //vdebug($trabajos, true, false, true) ?>
						<h4 class="card-title">LISTADO DE TRABAJOS</h4>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Numero</label>
									<input type="number" name="numero" id="numero" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Cliente</label>
									<input type="text" name="cliente" id="cliente" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Celular</label>
									<input type="number" name="celular" id="celular" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Fecha Prueba</label>
									<input type="date" name="fecha_prueba" id="fecha_prueba" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label">Fecha Entrega</label>
									<input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<p style="margin-top: 30px;"></p>
								<button class="btn btn-block btn-success" onclick="buscaTrabajo()">BUSCAR</button>
							</div>
						</div>
						<div class="table-responsive m-t-40">
							<div id="tabla-trabajos">

							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<footer class="footer"> <?=date('Y')?> desarrollado por GoGhu </footer>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>

	$(function () {
		$('#myTable').DataTable();
		// responsive table
		$('#config-table').DataTable({
			// responsive: false,
			// paging: false,
			searching: false,
			lengthChange: false,

			"order": [
				[0, 'desc']
			],
			"language": {
            	"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        	}
		});

		buscaTrabajo();
	});

	function eliminar(id, nombre) {
		//console.log(id_pago);
		Swal.fire({
			title: 'Quieres borrar el trabajo de ' + nombre + '?',
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
					'El trabajo fue borrado.',
					'success'
				);
				// console.log("el id es "+id_pago);
				window.location.href = "<?php echo base_url() ?>trabajos/eliminar/" + id;
			}
		})
	}

	function alerta(id){
		Swal.fire({
     	 type: 'error',
     	 title: 'Oops...',
     	 text: 'Ya se saco el material para el trabajo N° '+ id ,
     	 footer: '<a href>Solo se puede sacar una sola vez!</a>'
  	  })
	}

	function buscaTrabajo(){
		var numero = $('#numero').val();
		var cliente = $('#cliente').val();
		var celular = $('#celular').val();
		var fecha_prueba = $('#fecha_prueba').val();
		var fecha_entrega = $('#fecha_entrega').val();

		// invocamos los contratos para mujer
		$.ajax({
			url: '<?php echo base_url() ?>Trabajos/ajaxListado',
			type: 'GET',
			data: {
				numero: numero,
				cliente:  cliente,
				celular: celular,
				fecha_prueba: fecha_prueba,
				fecha_entrega: fecha_entrega
			},
			success: function(data) {
				$("#tabla-trabajos").html(data);
			}
		});
		// console.log('en desarrollo :v');

	}

	function abreModalCambiaLugar(trabajo){

		$.ajax({
			url: '<?php echo base_url() ?>Trabajos/ajaxDetalleLocalizacion/',
			type: 'GET',
			data: {
				trabajo_id: trabajo
			},
			success: function(data) {
				$("#bloque_localizacion_trabajo").html(data);
			}
		});

		$('#myModalLocalizacion').modal('show');

	}

	function guardaEstadoUbicacion(prenda, detalle, d_prenda_id){

		var valor = $('#'+prenda+'_'+detalle).val();

		$.ajax({
			url: '<?php echo base_url() ?>Trabajos/guardaEstadoUbicacion/',
			type: 'GET',
			dataType: 'json',
			data: {
				tipo_prenda:  prenda,
				tipo_detalle: detalle,
				campo_valor:  valor,
				prenda_id:    d_prenda_id
			},
			success: function(data) {
				if(data.respuesta === 'success')
					$('#_'+data.prenda+'_'+data.campo).show('toggle');
			}
		});
	}
	
	function asignarPrenda(prenda, prenda_id, tipo, key){

		Swal.fire({
			title: 'Estas seguro de '+tipo+' la prenda?',
			text: "No podras recuperarlo!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, estoy seguro!',
			cancelButtonText: "Cancelar",
		}).then((result) => {
			if (result.value) {

				var persona = $('#persona_destinada_'+prenda+'_'+key).val();

				// console.log(prenda, prenda_id, tipo, persona);

				if(persona === ''){
					Swal.fire(
						'Error!',
						'Debe seleccionar una persona.',
						'error'
					);
				}else{
					$.ajax({
						url: '<?php echo base_url() ?>Trabajos/asignarPrenda/',
						type: 'GET',
						dataType: 'json',
						data: {
							persona_id: persona,
							prenda_id:  prenda_id,
							prenda: 	prenda,
							tipo: 		tipo,
							// campo_valor:  valor,
							// prenda_id:    d_prenda_id
						},
						success: function(data) {
							if(data.respuesta === 'success'){
								Swal.fire(
									'Excelente!',
									'Se asignno con exito el trabajo.',
									'success'
								);

								setTimeout(function(){
									$('#myModalLocalizacion').modal('hide');
								},2000); // el tiempo a que pasara antes de ejecutar el codigo
							}
						}
					});
				}
			}
		})
	}
</script>
