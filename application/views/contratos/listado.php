<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal NUEVO CONTRATO content -->
<div id="myModalNuevoContrato" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<?php 
				$atributos = array('id'=>'formularioContrato');
				echo form_open('contratos/guarda', $atributos); 
			?>
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORMULARIO DE NUEVO CONTRATO</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<input type="text" name="grupo_id" id="grupo_id" value="0">
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input name="nombre" type="text" id="nombre" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Direccion</label>
								<input name="direccion" type="text" id="direccion" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
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
								<input name="cantidad" type="text" id="cantidad" class="form-control"
									required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="guardarContrato()" class="btn waves-effect waves-light btn-block btn-success">GUARDA CONTRATO</button>
				</div>
			</form>

		</div>
		<!-- /.modal-content -->
	</div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal NUEVO CONTRATO -->


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
							<button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVA CONTRATO</button>
						</h3>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre</th>
										<th>Celulares</th>
										<th>Descripcion</th>
										<th>Fecha</th>
										<th>Cantidad</th>
										<th>Finalizado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($contratos as $c){
										?>
										<tr>
											<td><?php echo $c['id']?></td>
											<td><?php echo $c['nombre']?></td>
											<td><?php echo $c['celulares']?></td>
											<td><?php echo $c['direccion']?></td>
											<td><?php echo $c['created_at']?></td>
											<td><?php echo $c['cantidad']?></td>
											<td><?php echo $c['terminado']?></td>
											<td>
												<a href="<?php echo base_url() ?>contratos/detalle/<?php  echo $c['id'] ?>">
													<button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
												</a>
											</td>
										</tr>
										<?php
										}
									?>

									
									<!-- <?php// foreach ($contratos as $c): ?>
									<tr>
										<td><?php // echo $c['id'] ?></td>
										<td><?php // echo $c['nombre'] ?></td>
										<td><?php // echo $c['celulares'] ?></td>
										<td><?php // echo $c['descripcion'] ?></td>
										<td><?php // echo $c['fecha'] ?></td>
										<td><?php // echo $c['cantidad'] ?></td>
										<td><?php // echo $c['terminado'] ?></td>
										<td>
											<a href="<?php // echo base_url() ?>contratos/detalle/<?php // echo $c['grupo_id'] ?>">
												<button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
											</a>
										</td>
									</tr>
									<?php // endforeach ?> -->
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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
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

	function abre_modal(){
		$('#myModalNuevoContrato').modal('show');
	}

	function guardarContrato(){
		if($('#formularioContrato')[0].checkValidity()){
			$('#formularioContrato').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formularioContrato')[0].reportValidity()
        }
	}

</script>
