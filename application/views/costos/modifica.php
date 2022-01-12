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

                <div class="col-md-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="mb-0 text-white">COSTOS DE OPERACION</h4>
                        </div>

                        <div class="card-body">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo form_open('costos/guarda'); ?>
                                        <div class="row">
                                            <div class="table-responsive">
                                            <?php //vdebug($costos, false, true, false); ?>
                                                <table class="table table-striped no-wrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripcion</th>
                                                            <th class="text-center">Varon</th>
                                                            <th class="text-center">Mujer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Saco</td>
                                                            <td>
                                                                <input type="number" name="saco_varon" id="saco_varon" class="form-control" step="any" min="0" value="<?php echo $costos[0]->varon ?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="saco_mujer" id="saco_mujer" class="form-control" placeholder="Ej: 200" step="any" min="0" value="<?php echo $costos[0]->mujer ?>" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pantalon</td>
                                                            <td>
                                                                <input type="number" name="pantalon_varon" id="pantalon_varon" class="form-control" step="any" min="0" value="<?php echo $costos[1]->varon ?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="pantalon_mujer" id="pantalon_mujer" class="form-control" placeholder="Ej: 200" step="any" min="0" value="<?php echo $costos[1]->mujer ?>" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chaleco</td>
                                                            <td>
                                                                <input type="number" name="chaleco_varon" id="chaleco_varon" class="form-control" step="any" min="0" value="<?php echo $costos[2]->varon ?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="chaleco_mujer" id="chaleco_mujer" class="form-control" placeholder="Ej: 200" step="any" min="0" value="<?php echo $costos[2]->mujer ?>" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Camisa</td>
                                                            <td>
                                                                <input type="number" name="camisa" id="camisa" class="form-control" step="any" min="0" value="<?php echo $costos[4]->varon ?>" required>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Falda</td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                <input type="number" name="falda" id="falda" class="form-control" placeholder="Ej: 200" step="any" min="0" value="<?php echo $costos[3]->mujer ?>" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumper</td>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                <input type="number" name="jumper" id="jumper" class="form-control" placeholder="Ej: 200" step="any" min="0" value="<?php echo $costos[8]->mujer ?>" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Corbaton</td>
                                                            <td>
                                                                <input type="number" name="corbaton" id="corbaton" class="form-control" step="any" min="0" value="<?php echo $costos[5]->varon ?>" required>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gato</td>
                                                            <td>
                                                                <input type="number" name="gato" id="gato" class="form-control" step="any" min="0" value="<?php echo $costos[6]->varon ?>" required>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr><tr>
                                                            <td>Faja</td>
                                                            <td>
                                                                <input type="number" name="faja" id="faja" class="form-control" step="any" min="0" value="<?php echo $costos[7]->varon ?>" required>
                                                            </td>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDAR</button>
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