<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal-horario" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-body">
                            <h3 class="card-title">HORARIO DE MARCACIONES</h3>
                            <div class="message-box">
                                <div class="message-widget">
                                    <!-- Message -->
                                    <h5 class="card-title">Ma&ntilde;ana</h5>
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-primary"><i class="mdi mdi-alarm-multiple"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Entrada Ma&ntilde;ana: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $horarios->man_ingreso ?> AM</b></h5>
                                            <h5>Marcaciones validas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: green;"><?php echo $horarios->man_desde ?> AM</b></h5>
                                            <h5>a <b style="color: green;"><?php echo $horarios->man_hasta ?> AM</b></h5>
                                            <?php $nuevahora_man = strtotime ( '+1 minute' , strtotime ( $horarios->man_hasta ) ) ; ?>
                                            <h5>Marcaciones retrasadas: &nbsp;&nbsp;&nbsp;<b style="color: red;"><?php echo date('H:i:s', $nuevahora_man); ?> AM</b> hasta las <b style="color: red;"><?php echo $horarios->man_max ?> AM</b></h5>  
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-danger"><i class="mdi mdi-food"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Salida Ma&ntilde;ana: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $horarios->man_salida ?> PM</b></h5>
                                            <h5>Marcaciones validas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: green;"><?php echo $horarios->man_salida ?> PM</b> hasta las <b style="color: green;"><?php echo $horarios->man_salida_hasta ?> PM</b></h5>
                                            <?php $nuevahora_man_sal = strtotime ( '-1 minute' , strtotime ( $horarios->man_salida ) ) ; ?>
                                            <h5>Marcaciones retrasadas: &nbsp;&nbsp;&nbsp;&nbsp;<b style="color: red;"><?php echo $horarios->man_salida_min ?> PM</b> hasta las <b style="color: red;"><?php echo date('H:i:s', $nuevahora_man_sal); ?> PM</b></h5> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <br>
                                    <h5 class="card-title">Tarde</h5>
                                    <a href="#">
                                        <div class="user-img"> <span class="round bg-success"><i class="mdi mdi-run-fast"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Entrada Tarde: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $horarios->tarde_ingreso ?> PM</b></h5>
                                            <h5>Marcaciones validas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: green;"><?php echo $horarios->tarde_desde ?> PM</b> hasta las <b style="color: green;"><?php echo $horarios->tarde_hasta ?> PM</b></h5>
                                            <?php $nuevahora_tar = strtotime ( '+1 minute' , strtotime ( $horarios->tarde_hasta ) ) ; ?>
                                            <h5>Marcaciones retrasadas: &nbsp;&nbsp;&nbsp;<b style="color: red;"><?php echo date('H:i:s', $nuevahora_tar); ?> PM</b> hasta las <b style="color: red;"><?php echo $horarios->tarde_max ?> PM</b></h5> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><span class="round"><i class="mdi mdi-seat-individual-suite"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Salida Tarde: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $horarios->tarde_salida ?> PM</b></h5>
                                            <h5>Marcaciones validas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: green;"><?php echo $horarios->tarde_salida ?> PM</b> hasta las <b style="color: green;"><?php echo $horarios->tarde_salida_hasta ?> PM</b></h5>
                                            <?php $nuevahora_tar_sal = strtotime ( '-1 minute' , strtotime ( $horarios->tarde_salida ) ) ; ?>
                                            <h5>Marcaciones retrasadas: &nbsp;&nbsp;&nbsp;<b style="color: red;"><?php echo $horarios->tarde_salida_min ?> PM</b> hasta las <b style="color: red;"><?php echo date('H:i:s', $nuevahora_tar_sal); ?> PM</b></h5> 
                                        </div>
                                    </a>
                                </div>
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

<!-- editar modal content -->
<div id="myModaledit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
            <?php echo form_open('Telas/editar'); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">FORMULARIO DE TELAS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <input type="hidden" name="idedit" id="idedit" value="">
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input name="nombreedit" type="text" id="nombreedit" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Precio por Metro</label>
                                <input name="precioedit" type="text" id="precioedit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA TELA</button>
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
                                        <th>No.</th>
                                        <th>Entrada Ma&ntilde;ana</th>
                                        <th>Salida Ma&ntilde;ana</th>
                                        <th>Entrada Tarde</th>
                                        <th>Salida Tarde</th>
                                        <th>Descuento por Hora de Retraso</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($horarioss as $hor): ?>
                                    <tr>
                                        <td><?php echo $n++ ?></td>
                                        <td><?php echo $hor->man_ingreso ?></td>
                                        <td><?php echo $hor->man_salida ?> LP.</td>
                                        <td><?php echo $hor->tarde_ingreso ?></td>
                                        <td><?php echo $hor->tarde_salida ?></td>
                                        <td><?php echo $hor->descuento_hora ?> Bs.</td>
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
                                            <button type="button" class="btn btn-info" onclick="ver()"><i class="fas fa-eye"></i></button>
                                            <button type="button" class="btn btn-warning" onclick="editar(<?php echo $hor->id ?>)"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $hor->id ?>)"><i class="fas fa-trash"></i></button>
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

    function ver()
    {
        $("#myModal").modal('show');
    }

    function cierra_modal()
    {
        $("#myModal").modal('hide');
    }

    function editar(id, nombre, precio)
    {
        $('#nombreedit').val(nombre);
        $('#precioedit').val(precio);
        $('#idedit').val(id);
        $("#myModaledit").modal('show');
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
                window.location.href = "<?php echo base_url() ?>Telas/eliminar/" + id;
            }
        })
    }

    function abre_modal(){
        $('#myModal-horario').modal('show')
        // alert("en desarrollo :v");
    }

</script>