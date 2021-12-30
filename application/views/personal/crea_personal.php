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
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo form_open_multipart('Personal/guarda', array('method'=>'POST')); ?>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre Completo</label>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Carnet de Identidad</label>
                                                                <input type="numeric" class="form-control" name="carnet" id="carnet" required>
                                                                <div class="valid-feedback">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Direccion</label>
                                                                <input type="text" class="form-control" name="direccion" id="direccion" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Horario</label>
                                                                <select name="horario" id="horario" class="form-control">
                                                                    <?php
                                                                        foreach($horarios as $h){
                                                                        ?>
                                                                            <option value="<?=$h->id?>"><?=$h->descripcion?> (<?=$h->man_ingreso?>-<?=$h->man_salida?>) A (<?=$h->tarde_ingreso?>-<?=$h->tarde_salida?>)</option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Numero de Celular</label>
                                                                <input type="numeric" class="form-control" name="celulares" id="celulares" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Fecha de Ingreso</label>
                                                                <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Sueldo (Bs.)</label>
                                                                    <input type="numeric" class="form-control" name="sueldo" id="sueldo" required>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                                                        </div>
                                                    </div>                                            
                                                </form>
                                            </div>
                                        </div>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    </div>
</div>
                <!-- ============================================================== -->

