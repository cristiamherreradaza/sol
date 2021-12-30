<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">


<!-- inicio modal content -->
<div id="myModaledit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Row -->	
			<div class="row">
				<div class="col-lg-12">
					<div class="card card-outline-info">
						<div class="card-header">
							<h4 class="mb-0 text-white">EDITAR REGISTRO</h4>
						</div>
						<div class="card-body">
								<?php echo form_open_multipart('Personal/editar', array('method'=>'POST')); ?>

							<div class="row">
								<!-- Column -->
								<div>
									<input type="text" name="id" id="id" hidden>
								</div>
								<!-- Column -->
								<!-- Column -->
								<div class="col-lg-12 col-xlg-12 col-md-7">
									<div class="card">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs profile-tab" role="tablist">
											<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Datos Personales</a> </li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											
											<div class="tab-pane active" id="settings" role="tabpanel">
												<div class="card-body">
													<div class="form-row">

														<div class="col-md-12 mb-3">
															<label for="validationCustom01">Nombre Completo</label>
															<input type="text" class="form-control" name="nombre" id="nombre" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
														
													</div>

													<div class="form-row">

															<div class="col-md-6 mb-3">
															<label for="validationCustom01">Carnet de Identidad</label>
															<input type="numeric" class="form-control" name="carnet" id="carnet" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
														<div class="col-md-6 mb-3">
															<label for="validationCustom01">Numero de Celular</label>
															<input type="numeric" class="form-control" name="celulares" id="celulares" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
														
														
													</div>
													<div class="form-row">

														<div class="col-md-8 mb-3">
															<label for="validationCustom01">Direccion</label>
															<input type="text" class="form-control" name="direccion" id="direccion" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
														<div class="col-md-4 mb-3">
															<label for="validationCustom01">Horario</label>
															<select name="horario" id="horario" class="form-control">
															<?php
																foreach($horarios as $h){
																?>
																	<option value="<?=$h->id?>"><?=$h->descripcion?> (<?=$h->man_ingreso?>-<?=$h->man_salida?>) A (<?=$h->tarde_ingreso?>-<?=$h->tarde_salida?>)</option>
																<?php
																}
															?>
															</select>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>

													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3">
															<label for="validationCustom01">Fecha de Ingreso</label>
															<input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
														<div class="col-md-6 mb-3">
															<label for="validationCustom01">Sueldo (Bs.)</label>
															<input type="numeric" class="form-control" name="sueldo" id="sueldo" required>
															<div class="valid-feedback">
																Looks good!
															</div>
														</div>
													</div>
												</div>
												<button class="btn btn-primary btn-block" type="submit">Registrar</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Column -->
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Row -->
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
						<?php $n=1; //vdebug($trabajos, true, false, true)  ?>
						<h4 class="card-title">LISTA DEL PERSONAL</h4>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre Completo</th>
										<th>Carnet</th>
										<th>Direccion</th>
										<th>Celular</th>
										<th>Fecha de Ingreso</th>
										<th>Sueldo</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($personal as $per): ?>
									<tr>
										<td><?php echo $n++ ?></td>
										<td><?php echo $per->nombre ?></td>
										<td><?php echo $per->carnet ?> LP.</td>
										<td><?php echo $per->direccion ?></td>
										<td><?php echo $per->celulares ?></td>
										<td><?php echo $per->fecha_ingreso ?></td>
										<td><?php echo $per->sueldo ?></td>
										<td>
                                           
                                            <button type="button" class="btn btn-warning" onclick="editar(<?php echo $per->id ?>, '<?php echo $per->nombre ?>', '<?php echo $per->carnet ?>', '<?php echo $per->direccion ?>', '<?php echo $per->celulares ?>', '<?php echo $per->fecha_ingreso ?>', '<?php echo $per->sueldo ?>', '<?php echo $per->horario_id ?>')"><i class="fas fa-edit"></i></button>
                                            <!-- <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $per->id ?>)"><i class="fas fa-trash"></i></button> -->
                                            <?php if ($per->estado == 1) {  ?>
                                             <a type="button" class="btn btn-success" href="<?= base_url('Personal/baja/'. $per->id); ?>"><i class="fas fa-toggle-on"></i></a>
                                         	<?php }
                                         	else { ?>
                                         		<a type="button" class="btn btn-danger" href="<?= base_url('Personal/alta/'. $per->id); ?>"><i class="fas fa-toggle-off"></i></a>
                                         	<?php } ?>
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
<script type="text/javascript">
	function editar(id, nombre, carnet, direccion, celulares, fecha_ingreso, sueldo, horario)
    {
      
        $('#id').val(id)
        $('#nombre').val(nombre)
        $('#carnet').val(carnet)
        $('#direccion').val(direccion)
        $('#celulares').val(celulares)
        $('#fecha_ingreso').val(fecha_ingreso)
        $('#sueldo').val(sueldo)
		$('#horario').val(horario)
        $("#myModaledit").modal('show');
    }
</script>

<script type="text/javascript">
	function baja(id)
    {
      
        $('#id').val(id)
        $('#nombre').val(nombre)
        $('#carnet').val(carnet)
        $('#direccion').val(direccion)
        $('#celulares').val(celulares)
        $('#fecha_ingreso').val(fecha_ingreso)
        $('#sueldo').val(sueldo)
        $("#myModaledit").modal('show');
    }

    function alta(id)
    {
      
        $('#id').val(id)
        $('#nombre').val(nombre)
        $('#carnet').val(carnet)
        $('#direccion').val(direccion)
        $('#celulares').val(celulares)
        $('#fecha_ingreso').val(fecha_ingreso)
        $('#sueldo').val(sueldo)
        $("#myModaledit").modal('show');
    }
</script>

<script>
	$(function () {
		$('#myTable').DataTable();
		// responsive table
		$('#config-table').DataTable({
			responsive: true,
			"order": [
				[0, 'asc']
			],
			"language": {
            	"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        	}
		});
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

</script>
