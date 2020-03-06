   <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    
    <!-- inicia modal -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
                <?php echo form_open('bolsillos/guarda'); ?>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">FORMULARIO DE CAJA CHICA</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <input type="hidden" name="ida" id="ida" value="">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Monto</label>
                                    <input name="monto" type="number" id="monto" class="form-control" step="any" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Fecha</label>
                                    <input name="fecha" type="date" id="fecha" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Descripcion</label>
                                    <input name="descripcion" type="text" id="descripcion" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA TRANSACCION</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- fin modal -->

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="mb-0 text-white">CAJA CHICA</h4>
                        </div>

                        <div class="card-body">
                            <!-- <div class="row">

                                <div class="col-md-12">
                                    <table class="table table-bordered no-wrap">
                                        <tr>
                                            <td><span class="font-bold">Nombre: </span> <?php //echo $trabajo['nombre'] ?></td>
                                            <td><span class="font-bold">Celulares: </span> <?php //echo $trabajo['celulares'] ?></td>
                                            <td><span class="font-bold">F. Entrega: </span> <?php //echo $trabajo['fecha_entrega'] ?></td>
                                            <td><span class="font-bold">F. Prueba: </span> <?php //echo $trabajo['fecha_prueba'] ?></td>
                                            <td><span class="font-bold">Entregado: </span> <?php //echo $trabajo['entregado'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div> -->
                            <div class="row">

                                <div class="col-md-3">
                                    <!-- <form action="<?php //echo base_url() ?>Trabajos/guarda_pago" method="POST"> -->
                                    <?php echo form_open('cajachica/guarda'); ?>
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Monto </label>
                                                    <input type="number" name="monto" id="monto" class="form-control" placeholder="Ej: 200" step="any" min="0" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha </label>
                                                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Tipo</label>
                                                    <select name="tipo" class="form-control custom-select">
                                                        <option value="Gasto">Gasto</option>
                                                        <option value="Ingreso">Ingreso</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label">Descripcion </label>
                                                    <input type="text" name="descripcion" id="descripcion" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">REGISTRA TRANSACCION</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-9">
                                    <div class="card card-outline-primary">                                
                                        <div class="card-header">
                                            <h4 class="mb-0 text-white">TRANSACCIONES DEL DIA</h4>
                                        </div>
                                        <?php //vdebug($caja, false, false, true) ?>
                                        <?php if (!empty($caja)): ?>
                                            <?php $total=0; ?>
                                            <table id="config-table"
                                                class="table display table-bordered table-striped no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>FECHA</th>
                                                        <th>DESCRIPCION</th>
                                                        <!-- <th>USUARIO</th> -->
                                                        <th>INGRESO</th>
                                                        <th>GASTO</th>
                                                        <th style="width: 5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($caja as $c): ?>
                                                    <tr>
                                                        <td><?php echo $c['id'] ?></td>
                                                        <td><?php echo $c['fecha'] ?></td>
                                                        <td><?php echo $c['descripcion'] ?></td>
                                                        <!-- <td><?php //echo $c['usuario_id'] ?></td> -->
                                                        <td><?php echo $c['ingreso'] ?></td>
                                                        <td><?php echo $c['salida'] ?></td>
                                                        <td>
                                                            <!-- <button type="button" class="btn btn-warning"
                                                                onclick="editar(<?php //echo $c['id'] ?>, '<?php //echo $c['ingreso'] ?>', '<?php //echo $c['salida'] ?>')"><i
                                                                    class="fas fa-edit"></i></button> -->
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="eliminar(<?php echo $c['id'] ?>, '<?php echo $c['descripcion'] ?>')"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        <?php else: ?>
                                            <h3>No tiene registros aun</h3>
                                        <?php endif ?>
                                    </div>

                                    </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


	function eliminar(id, descripcion) {

		// console.log(id_pago);
		Swal.fire({
			title: 'Quieres borrar ' + descripcion + '?',
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
				window.location.href = "<?php echo base_url() ?>cajachica/eliminar/" + id;
			}
		})
	}


</script>