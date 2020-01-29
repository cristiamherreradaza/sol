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
						<h4 class="card-title">Listado de trabajos </h4>
						<h6 class="card-subtitle">Trabajos</h6>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Cliente</th>
										<th>Celular</th>
										<th>Fecha Prueba</th>
										<th>Fecha Entrega</th>
										<th>$. Tela</th>
										<th>$.Conf</th>
										<th>Total</th>
										<th>Saldo</th>
										<th>Ent</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($trabajos as $t): ?>
									<tr>
										<td><?php echo $t['id'] ?></td>
										<td><?php echo $t['nombre'] ?></td>
										<td><?php echo $t['celulares'] ?></td>
										<td><?php echo $t['fecha_prueba'] ?></td>
										<td><?php echo $t['fecha_entrega'] ?></td>
										<td align="right"><?php echo $t['costo_tela'] ?></td>
										<td align="right"><?php echo $t['costo_confeccion'] ?></td>
										<td align="right"><?php echo $t['total'] ?></td>
										<td align="right"><?php echo $t['saldo'] ?></td>
										<td><?php echo $t['entregado'] ?></td>
										<td>
											<a href="<?php echo base_url() ?>Trabajos/detalle_trabajo/<?php echo $t['id'] ?>">
												<button type="button" class="btn btn-warning"><i class="fas fa-eye"></i></button>
											</a>
											<a href="<?php echo base_url() ?>Trabajos/registro_pagos/<?php echo $t['id'] ?>">
												<button type="button" class="btn btn-success"><i class="fas fa-money-bill-alt"></i></button>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script>
	$(function () {
		$('#myTable').DataTable();
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

</script>
