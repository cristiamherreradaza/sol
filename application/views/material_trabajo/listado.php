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
							<h4 class="mb-0 text-white">REGISTRO DE NUEVO MATERIAL TRABAJO</h4>
						</div>
						<div class="card-body">
                        <?php echo form_open_multipart('Material_trabajo/guarda', array('method'=>'POST')); ?>
							<div class="row">
                                <input type="hidden" name="material_id" id="material_id" value="0">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Detalle:</label>
                                        <input name="detalle" type="text" id="detalle" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Cantidad:</label>
                                        <input name="cantidad" type="number" step="any" id="cantidad" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Precio:</label>
                                        <input name="precio" type="number" step="any" id="precio" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Genero</label>
                                        <select name="genero" id="genero" class="form-control">
                                            <option value="VARON">VARON</option>
                                            <option value="MUJER">MUJER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Pieza:</label>
                                        <select name="pieza" id="pieza" class="form-control">
                                            <option value="SACO">SACO</option>
                                            <option value="PANTALON">PANTALON</option>
                                            <option value="CHALECO">CHALECO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Tipo:</label>
                                        <select name="tipo" id="tipo" class="form-control">
                                            <option value="METROS">METROS</option>
                                            <option value="UNIDADES">UNIDADES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-success">GUARDAR</button>
                                </div>
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
                        <h3 class="card-title">LISTADO DE TRABAJOS MATERIAL &nbsp;&nbsp;&nbsp;&nbsp; 
                            <button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO TRABAJO MATERIAL</button>
                        </h3>
						<?php $n=1; //vdebug($trabajos, true, false, true)  ?>
						<div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>No.</th>
										<th>Detalle</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Genero</th>
										<th>Pieza</th>
										<th>Tipo</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($trabajo_material as $traMat): ?>
									<tr>
										<td><?php echo $n++ ?></td>
										<td><?php echo $traMat->detalle ?></td>
										<td><?php echo $traMat->cantidad ?></td>
										<td><?php echo $traMat->precio ?></td>
										<td><?php echo $traMat->genero ?></td>
										<td><?php echo $traMat->pieza ?></td>
										<td><?php echo $traMat->tipo ?></td>
										<td>
                                            <button type="button" class="btn btn-warning" onclick="editar('<?=$traMat->id?>','<?=$traMat->detalle?>','<?=$traMat->cantidad?>','<?=$traMat->precio?>','<?=$traMat->genero?>','<?=$traMat->pieza?>','<?=$traMat->tipo?>')"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" onclick="eliminar('<?=$traMat->id?>','<?=$traMat->detalle?>')"><i class="fas fa-trash"></i></button>
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

    function abre_modal()
    {
        $('#detalle').val('');
        $('#cantidad').val('');
        $('#precio').val('');
        $('#genero').val('VARON');
        $('#pieza').val('SACO');
        $('#tipo').val('METROS');

        $("#myModaledit").modal('show');
    }
    
	function editar(id, detalle, cantidad, precio, genero, pieza, tipo)
    {
        $('#material_id').val(id);
        $('#detalle').val(detalle);
        $('#cantidad').val(cantidad);
        $('#precio').val(precio);
        $('#genero').val(genero);
        $('#pieza').val(pieza);
        $('#tipo').val(tipo);

        $("#myModaledit").modal('show');
    }

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
				window.location.href = "<?php echo base_url() ?>Material_trabajo/eliminar/" + id;
			}
		})
	}

</script>
