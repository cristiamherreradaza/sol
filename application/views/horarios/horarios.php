<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal-horario" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open('Personal/guarda_horario'); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">FORMULARIO DE HORARIOS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <input type="hidden" name="horario_id" id="horario_id" value="0">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Descripcion</label><br>
                                <input name="descripcion" type="text" placeholder="Horario de la Mañana..." id="descripcion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Entrada Mañana</label><br>
                                 <input name="entrada_maniana" type="time" value="08:00" id="entrada_maniana" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Salida Mañana</label><br>
                                 <input name="salida_maniana" type="time" value="12:30" id="salida_maniana" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Entrada Tarde</label>
                                <input name="entrada_tarde" type="time" value="14:00" id="entrada_tarde" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Salida Tarde</label>
                                <input name="salida_tarde" type="time" value="20:00" id="salida_tarde" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA HORARIO</button>
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
                         <?php $n=1; //vdebug($trabajos, true, false, true)  ?>
                        <h3 class="card-title">LISTA DE HORARIOS &nbsp;&nbsp;&nbsp;&nbsp; 
                            <button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO HORARIO</button></h3>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <tr>
                                        <!-- <th>No.</th> -->
                                        <th>Descripcion</th>
                                        <th>Entrada Ma&ntilde;ana</th>
                                        <th>Salida Ma&ntilde;ana</th>
                                        <th>Entrada Tarde</th>
                                        <th>Salida Tarde</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($horarioss as $hor): ?>
                                    <tr>
                                        <!-- <td><?php echo $n++ ?></td> -->
                                        <td><?=$hor->descripcion?></td>
                                        <td><?php echo $hor->man_ingreso ?></td>
                                        <td><?php echo $hor->man_salida ?></td>
                                        <td><?php echo $hor->tarde_ingreso ?></td>
                                        <td><?php echo $hor->tarde_salida ?></td>
                                        <?php if ($hor->estado == 1) { ?>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="pagado(<?php echo $hor->id ?>)">ACTIVO</button>
                                        </td>
                                        <?php } else { ?>
                                        <td>
                                            <button type="button" class="btn btn-danger">INACTIVO</button>
                                        </td>
                                        <?php } ?> 
                                        <td>
                                            <button type="button" class="btn btn-warning" onclick="editar('<?=$hor->id ?>', '<?=$hor->descripcion ?>', '<?=$hor->man_ingreso ?>', '<?=$hor->man_salida ?>', '<?=$hor->tarde_ingreso ?>', '<?=$hor->tarde_salida ?>')"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" onclick="eliminar('<?=$hor->id ?>', '<?=$hor->descripcion ?>')"><i class="fas fa-trash"></i></button>
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
        $('#myModal-horario').modal('show')
    }

    // function cierra_modal()
    // {
    //     $("#myModal").modal('hide');
    // }

    function editar(id, descripcion,  entrada_maniana, salida_maniana, entrada_tarde, salida_tarde)
    {
        $('#horario_id').val(id);
        $('#descripcion').val(descripcion);
        $('#entrada_maniana').val(entrada_maniana);
        $('#salida_maniana').val(salida_maniana);
        $('#entrada_tarde').val(entrada_tarde);
        $('#salida_tarde').val(salida_tarde);

        $("#myModal-horario").modal('show');
    }


    function eliminar(id, nombre) {
        //console.log(id_pago);
        Swal.fire({
            title: 'Quieres borrar ' + nombre + '?',
            text: "Luego no podras recuperarlo!",
            type: 'question',
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
                window.location.href = "<?php echo base_url() ?>Personal/eliminar_horario/" + id;
            }
        })
    }

    

</script>