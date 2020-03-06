<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<?php echo form_open('contratos/guarda'); ?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel" onclick="function_jquery();">FORMULARIO DE ABERTURA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="hidden" name="ida" id="ida" value="">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombre" type="text" id="busca_grupo" class="form-control" required autocomplete="off">
								<div id="muestra_grupos_ajax"></div>
							</div>
						</div>

						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Direccion</label>
								<input name="direccion" type="text" id="direccion" class="form-control">
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
								<input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d') ?>">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Cantidad</label>
								<input name="cantidad" type="text" id="cantidad" class="form-control" required>
							</div>
						</div>
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA CONTRATO</button>
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
						<h3 class="card-title">LISTADO DE CONTRATOS &nbsp;&nbsp;&nbsp;&nbsp; 
							<button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO CONTRATO</button>
						</h3>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Celulares</th>
										<th>Direccion</th>
										<th>Fecha</th>
										<th>Cantidad</th>
										<th>Finalizado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($contratos as $c): ?>
									<tr>
										<td><?php echo $c['id'] ?></td>
										<td><?php echo $c['nombre'] ?></td>
										<td><?php echo $c['celulares'] ?></td>
										<td><?php echo $c['direccion'] ?></td>
										<td><?php echo $c['fecha'] ?></td>
										<td><?php echo $c['cantidad'] ?></td>
										<td><?php echo $c['terminado'] ?></td>
										<td>
											<a href="<?php echo base_url() ?>Trabajos/detalle_trabajo/<?php echo $c['id'] ?>">
												<button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
											</a>

											<a href="<?php echo base_url() ?>Trabajos/registro_pagos/<?php echo $c['id'] ?>">
												<button type="button" class="btn btn-success"><i class="fas fa-star"></i></button>
											</a>

											<a href="<?php echo base_url() ?>Trabajos/form_edicion/<?php echo $c['id'] ?>">
												<button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
											</a>

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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>

	$(document).on('keyup', '#busca_grupo', function(e){
	  nombre_grupo = $('#busca_grupo').val();
	  if (nombre_grupo.length > 3) {
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

	});

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