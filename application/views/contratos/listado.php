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

	$(".calculo").keyup(function(){

		var saco = parseFloat($("#costo_saco").val());
		var pantalon = parseFloat($("#costo_pantalon").val());
		var chaleco = parseFloat($("#costo_chaleco").val());
		var falda = parseFloat($("#costo_falda").val());
		costo_confeccion = saco + pantalon + chaleco + falda;
		$("#costo_confeccion").val(costo_confeccion);
	});

	$("#costo_tela").keyup(function(){
		var costo_confeccion = parseFloat($("#costo_confeccion").val());
		var costo_tela = parseFloat($("#costo_tela").val());
		total = costo_confeccion+costo_tela;
		$("#total").val(total);
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

	function sumaVarones(){

		var arrayVarones = document.getElementsByClassName('varones');

		var tot=0;
		for(var i=0;i<arrayVarones.length;i++){
			if(parseInt(arrayVarones[i].value))
				tot += parseInt(arrayVarones[i].value);
		}
		document.getElementById('costo_confeccion_varon').value = tot;
		
		let subtotalVarones = tot * parseInt(document.getElementById('cantidad_varones').value);

		document.getElementById('subtotal_varones').value = subtotalVarones;
	}

	function sumaMujeres(){

		var arrayMujeres = document.getElementsByClassName('mujer');

		var tot=0;
		for(var i=0;i<arrayMujeres.length;i++){
			if(parseInt(arrayMujeres[i].value))
				tot += parseInt(arrayMujeres[i].value);
		}
		document.getElementById('costo_confeccion_mujer').value = tot;
		
		let subtotalVarones = tot * parseInt(document.getElementById('cantidad_mujeres').value);

		document.getElementById('subtotal_mujeres').value = subtotalVarones;
	}

	calculeTela(){

	}

</script>