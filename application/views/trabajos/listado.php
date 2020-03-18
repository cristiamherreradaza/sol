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
						<div class="table-responsive m-t-40">
							<table id="listado_trabajos" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Cliente</th>
										<th>Celular</th>
										<!-- <th>Fecha Prueba</th>
										<th>Fecha Entrega</th>
										<th>$. Tela</th>
										<th>$.Conf</th>
										<th>Total</th>
										<th>Saldo</th>
										<th>Ent</th> -->
										<th>Acciones</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									
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
$(document).ready(function(){  

	$.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

	var dataTable = $('#listado_trabajos').DataTable({  
		"processing":true,  
		"serverSide":true,  
		"order":[],  
		"ajax":{  
			url:"<?php echo base_url().'trabajos/get_trabajos'; ?>",  
			type:"POST"  
		},  
		"columnDefs":[  
			{  
					"targets":[0, 3, 4],  
					"orderable":false,  
			},  
		],  
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
