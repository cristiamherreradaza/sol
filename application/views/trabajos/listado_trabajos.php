<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
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
	<footer class="footer"> 2020 desarrollado por GoGhu </footer>
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
			responsive: true,
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
</script>