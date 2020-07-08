<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
			<?php echo form_open('Telas/guarda'); ?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORMULARIO DE TELAS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="hidden" name="ida" id="ida" value="">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombre" type="text" id="nombre" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Precio por Metro</label>
								<input name="precio" type="text" id="precio" class="form-control" required>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA TELA</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->

<!-- editar modal content -->
<div id="myModaledit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
			<?php echo form_open('Telas/editar'); ?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORMULARIO DE TELAS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="hidden" name="idedit" id="idedit" value="">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombreedit" type="text" id="nombreedit" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Precio por Metro</label>
								<input name="precioedit" type="text" id="precioedit" class="form-control" required>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA TELA</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->

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
						<h3 class="card-title">LISTADO DE TELAS &nbsp;&nbsp;&nbsp;&nbsp; 
							<button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVA TELA</button></h3>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Precio por Metro</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($telas as $p): ?>
									<tr>
										<td><?php echo $p->id ?></td>
										<td><?php echo $p->nombre ?></td>
										<td><?php echo $p->precio ?> Bs.</td>
										<td>
											<button type="button" class="btn btn-warning" onclick="editar(<?php echo $p->id ?>, '<?php echo $p->nombre ?>', '<?php echo $p->precio ?>')"><i class="fas fa-edit"></i></button>
											<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $p->id ?>, '<?php echo $p->nombre ?>')"><i class="fas fa-trash"></i></button>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script>
	$(function () {
		$('#config-table').DataTable({
			responsive: true,
			"order": [
				[0, 'desc']
			],
			"language": {
            	"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        	}
		});
	});

	function abre_modal()
	{
		$('#nombre').val("");
		$('#precio').val("");
		$("#myModal").modal('show');
	}

	function cierra_modal()
	{
		$("#myModal").modal('hide');
	}

	function editar(id, nombre, precio)
	{
		$('#nombreedit').val(nombre);
		$('#precioedit').val(precio);
		$('#idedit').val(id);
		$("#myModaledit").modal('show');
	}


	function eliminar(id, nombre) {
		//console.log(id_pago);
		Swal.fire({
			title: 'Quieres borrar ' + nombre + '?',
			text: "Luego no podras recuperarlo!",
			type: 'question',
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
				window.location.href = "<?php echo base_url() ?>Telas/eliminar/" + id;
			}
		})
	}

</script>