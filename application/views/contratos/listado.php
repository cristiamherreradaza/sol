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
						<h3 class="card-title">LISTADO DE CONTRATOS &nbsp;&nbsp;&nbsp;&nbsp; 
							<a href="<?php echo base_url(); ?>contratos/nuevo" type="button" class="btn btn-info"><i class="fas fa-plus"></i> NUEVO CONTRATO</a>
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
									<?php foreach ($contratos as $c): ?>
									<tr>
										<td><?php echo $c['id'] ?></td>
										<td><?php echo $c['nombre'] ?></td>
										<td><?php echo $c['celulares'] ?></td>
										<td><?php echo $c['descripcion'] ?></td>
										<td><?php echo $c['fecha'] ?></td>
										<td><?php echo $c['cantidad'] ?></td>
										<td><?php echo $c['terminado'] ?></td>
										<td>
											<a href="<?php echo base_url() ?>contratos/detalle/<?php echo $c['grupo_id'] ?>">
												<button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
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

</script>