<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" type="text/css">


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">
                    <div class="col-6">
                        <!-- table responsive -->
                        <div class="card">
                            <div class="card-body">
                                <?php $n=1; //vdebug($trabajos, true, false, true)  ?>
                                <h4 class="card-title">LISTA DE HORARIOS</h4>
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
                                                <!-- <th>Acciones</th> -->
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
                                                <td><?php echo $hor->descuento_hora ?></td>
                                                <?php if ($hor->estado == 1) { ?>
                                                <td><span class="label label-success label-rouded">ACTIVO</span></td>
                                                <?php } else {?>
                                                <td><span class="label label-danger label-rouded">INACTIVO</span></td>
                                                <?php } ?>
                                               
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6 col-md-6">
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
                                            <h5>Marcaciones validas: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: green;"><?php echo $horarios->man_desde ?> AM</b> hasta las <b style="color: green;"><?php echo $horarios->man_hasta ?> AM</b></h5>
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
                    <!-- Column -->
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <h3 class="card-title">Visit source</h3>
                                    <div class="ml-auto">
                                        <select class="custom-select">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="m-piechart" style="width:100%; height:278px"></div>
                                <div class="text-center">
                                    <ul class="list-inline mt-3">
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-success"></i>Mobile</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-primary"></i>Desktop</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-danger"></i>Tablet</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-muted"></i>Other</h6> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Row -->
    </div>
</div>
                <!-- ============================================================== -->
<script>
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
</script>
