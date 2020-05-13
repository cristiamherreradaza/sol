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
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-body">
                            <h3 class="card-title">HORARIO DE MARCACIONES</h3>
                            <div class="message-box">
                                <div class="message-widget">
                                    <!-- Message -->
                                    <h5 class="card-title">Ma&ntilde;ana</h5>
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-primary"><i class="mdi mdi-alarm-multiple"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Entrada Ma&ntilde;ana</h5>
                                            <span >De horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->man_desde ?> AM</b></span> 
                                            <br>
                                            <span >Hasta horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->man_hasta ?> AM</b></span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-danger"><i class="mdi mdi-food"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Salida Ma&ntilde;ana</h5>
                                            <span >De horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->man_salida ?> AM</b></span> 
                                            <br>
                                            <span >Hasta horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->man_salida_hasta ?> AM</b></span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <br>
                                    <h5 class="card-title">Tarde</h5>
                                    <a href="#">
                                        <div class="user-img"> <span class="round bg-success"><i class="mdi mdi-run-fast"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Entrada Tarde</h5>
                                             <span >De horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->tarde_desde ?> AM</b></span> 
                                            <br>
                                            <span >Hasta horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->tarde_hasta ?> AM</b></span> 
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><span class="round"><i class="mdi mdi-seat-individual-suite"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Salida Tarde</h5>
                                             <span >De horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->tarde_salida ?> AM</b></span> 
                                            <br>
                                            <span >Hasta horas: &nbsp;&nbsp;&nbsp;<b> <?php echo $horarios->tarde_salida_hasta ?> AM</b></span> 
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

