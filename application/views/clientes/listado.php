<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
			<?php echo form_open('clientes/guarda'); ?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORMULARIO DE BOLSILLOS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="hidden" name="ida" id="ida" value="">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombre" type="text" id="nombre" class="form-control" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Carnet</label>
								<input name="carnet" type="text" id="carnet" class="form-control" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Celulares</label>
								<input name="celulares" type="text" id="celulares" class="form-control" >
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Genero</label>
								<select name="genero" id="genero" class="form-control custom-select" >
									<option value="Varon">VARON</option>
									<option value="Mujer">MUJER</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input name="email" type="text" id="email" class="form-control" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Direccion</label>
								<input name="direccion" type="text" id="direccion" class="form-control" >
							</div>
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA CLIENTE</button>
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
						<h3 class="card-title">LISTADO DE CLIENTES &nbsp;&nbsp;&nbsp;&nbsp; 
							<button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO CLIENTE</button>
						</h3>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Carnet</th>
										<th>Celulares</th>
										<th>Genero</th>
										<th>Email</th>
										<th>Direccion</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($clientes as $c): ?>
									<tr>
										<td><?php echo $c['id'] ?></td>
										<td><?php echo $c['nombre'] ?></td>
										<td><?php echo $c['ci'] ?></td>
										<td><?php echo $c['celulares'] ?></td>
										<td><?php echo $c['genero'] ?></td>
										<td><?php echo $c['email'] ?></td>
										<td><?php echo $c['direccion'] ?></td>
										<td>
											<button type="button" class="btn btn-warning" onclick="edita()"><i class="fas fa-edit"></i></button>
											<?php 
												$consulta_trabajos = $this->db->get_where('trabajos', array('cliente_id'=>$c['id']))->row();
												// vdebug($consulta_trabajos, false, false, true);
												// echo $consulta_trabajos->id;
											?>
											<?php if ($consulta_trabajos == NULL ): ?>
												<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $c['id'] ?>, '<?php echo $c['nombre'] ?>')"><i class="fas fa-trash"></i>
												</button>
											<?php endif ?>
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
		// $('#myTable').DataTable();
		// responsive table
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

	function edita()
	{
		var table = $('#config-table').DataTable();
		$('#config-table tbody').on( 'click', 'tr', function () {
		    var fila = table.row( this ).data();
		    // console.log( fila[1] );
		    $('#ida').val(fila[0]);
		    $('#nombre').val(fila[1]);
		    $('#carnet').val(fila[2]);
		    $('#celulares').val(fila[3]);
		    $('#genero').val(fila[4]);
		    $('#email').val(fila[5]);
		    $('#direccion').val(fila[6]);
		} );
		$("#myModal").modal('show');
	}

	function abre_modal()
	{
		$('#ida').val("");
		$('#nombre').val("");
		$('#carnet').val("");
		$('#celulares').val("");
		$('#genero').val("");
		$('#email').val("");
		$('#direccion').val("");
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
				window.location.href = "<?php echo base_url() ?>clientes/eliminar/" + id;
			}
		})
	}

</script>