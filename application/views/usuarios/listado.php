<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
			<?php echo form_open('usuarios/guarda'); ?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORMULARIO DE USUARIOS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="hidden" name="ida" id="ida" value="">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombre" type="text" id="nombre" class="form-control" required>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="control-label">Celulares</label>
								<input name="celulares" type="text" id="celulares" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Direccion</label>
								<input name="direccion" type="text" id="direccion" class="form-control">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input name="email" type="text" id="email" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Rol</label>
								<select name="rol" id="rol" class="form-control custom-select" required>
									<option value="Almacenero">ALMACENERO</option>
									<option value="Operario">OPERARIO</option>
									<option value="Administrador">ADMINISTRADOR</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Usuario</label>
								<input name="usuario" type="text" id="usuario" class="form-control" required>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input name="pass" type="text" id="pass" class="form-control" required>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA USUARIO</button>
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
						<h3 class="card-title">LISTADO DE USUARIOS &nbsp;&nbsp;&nbsp;&nbsp; 
							<button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO USUARIO</button>
						</h3>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Usuario</th>
										<th>Rol</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($usuarios as $u): ?>
									<tr>
										<td><?php echo $u['id'] ?></td>
										<td><?php echo $u['nombre'] ?></td>
										<td><?php echo $u['usuario'] ?></td>
										<td><?php echo $u['rol'] ?></td>
										<td>
											<button type="button" class="btn btn-warning" onclick="editar(<?php echo $u['id'] ?>, '<?php echo $u['nombre'] ?>', '<?php echo $u['celulares'] ?>', '<?php echo $u['direccion'] ?>', '<?php echo $u['email'] ?>', '<?php echo $u['usuario'] ?>', '<?php echo $u['rol'] ?>')"><i class="fas fa-edit"></i></button>
											<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $u['id'] ?>, '<?php echo $u['nombre'] ?>')"><i class="fas fa-trash"></i></button>
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
	<footer class="footer"> © 2019 Monster Admin by wrappixel.com </footer>
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

</script>