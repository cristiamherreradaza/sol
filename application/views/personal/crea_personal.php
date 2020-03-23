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

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Registro de Personal</h3>
                                <h5 class="card-title">Datos del Personal</h5>
                                <!--<form class="needs-validation" action="Usuario/registra" method="POST">-->


                                    <?php echo form_open_multipart('Personal/guarda', array('method'=>'POST')); ?>

                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <center class="mt-4">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <label for="input-file-now-custom-1"></label>
                                                                    <div class="mt-4 text-center"> <img src="<?php echo base_url(); ?>public/assets/images/users/usuarios.png" alt="user" class="img-circle" width="200">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                                <div class="card">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Datos Personales</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Datos de Usuario</a> </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                       
                                                        <div class="tab-pane active" id="settings" role="tabpanel">
                                                            <div class="card-body">
                                                                    <div class="form-row">

                                                                        <div class="col-md-8 mb-3">
                                                                            <label for="validationCustom01">Nombre Completo</label>
                                                                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <div class="form-row">

                                                                         <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Carnet de Identidad</label>
                                                                            <input type="numeric" class="form-control" name="carnet" id="carnet" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Direccion</label>
                                                                            <input type="text" class="form-control" name="direccion" id="direccion" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="form-row">

                                                                        <div class="col-md-4 mb-3">
                                                                            <label for="validationCustom01">Numero de Celular</label>
                                                                            <input type="numeric" class="form-control" name="celulares" id="celulares" required>
                                                                            <div class="valid-feedback">
                                                                                Looks good!
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="profile" role="tabpanel">
                                                            <div class="card-body">
                                                                <div class="form-row">

                                                                    <div class="col-md-4 mb-3">
                                                                        <label for="validationCustom01">Fecha de Ingreso</label>
                                                                        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
                                                                        <div class="valid-feedback">
                                                                            Looks good!
                                                                        </div>
                                                                    </div>
                                                                   <div class="col-md-4 mb-3">
                                                                        <label for="validationCustom01">Sueldo (Bs.)</label>
                                                                        <input type="numeric" class="form-control" name="sueldo" id="sueldo" required>
                                                                        <div class="valid-feedback">
                                                                            Looks good!
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                        </div>

                                        
                                    </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
    </div>
</div>
                <!-- ============================================================== -->

