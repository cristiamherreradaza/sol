<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- editar modal content -->
<div id="myModaledit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
            <?php echo form_open('Personal/guarda_descuento'); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">FORMULARIO DE DESCUENTO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <input type="text" name="descuento_id" id="descuento_id" value="0">
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Descripcion</label>
                                <input name="descripcion" type="text" id="descripcion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Minutos</label>
                                <input name="minutos" type="number" id="minutos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Descueto por minutos Bs.</label>
                                <input name="descuento" type="number" id="descuento" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDAR</button>
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
                        <h3 class="card-title">LISTA DE DESCEUNTOS &nbsp;&nbsp;&nbsp;&nbsp; 
                            <button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVO DESCUENTO</button></h3>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Descripcion</th>
                                        <th>Minutos</th>
                                        <th>Descuentos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($descuentos as $des): ?>
                                    <tr>
                                        <td><?php echo $n++ ?></td>
                                        <td><?php echo $des->descripcion ?></td>
                                        <td><?php echo $des->minutos ?></td>
                                        <td><?php echo $des->descuento ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" onclick="editar('<?php echo $des->id ?>','<?=$des->descripcion?>','<?=$des->minutos?>','<?=$des->descuento?>')"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" onclick="eliminar('<?php echo $des->id ?>', '<?=$des->descripcion?>')"><i class="fas fa-trash"></i></button>
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
    <footer class="footer"> <?=date('Y')?> desarrollado por GoGhu </footer>
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
        $('#descuento_id').val('');
        $('#descripcion').val('');
        $('#minutos').val('');
        $('#descuento').val('');

        $('#myModaledit').modal('show');
    }


    function editar(id, descripcion, minutos, descuento)
    {   
        $('#descuento_id').val(id);
        $('#descripcion').val(descripcion);
        $('#minutos').val(minutos);
        $('#descuento').val(descuento);
        $("#myModaledit").modal('show');
    }

    function eliminar(id, nombre) {
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
                window.location.href = "<?php echo base_url() ?>Personal/eliminar_descuento/" + id;
            }
        })
    }

    // function ver()
    // {
    //     $("#myModal").modal('show');
    // }

    // function cierra_modal()
    // {
    //     $("#myModal").modal('hide');
    // }
    
    // function abre_modal(){
    //     $('#myModal-horario').modal('show')
    // }

</script>