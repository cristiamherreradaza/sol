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
                    <div class="card card-body printableArea">
                        <center><h1><b>MATERIALES PERTENECIENTES AL TRABAJO N° <?php echo $trabajo['id']; ?></b></h1></center>
                        <?php //vdebug($trabajo, false, false, true); ?>
                        <hr>
                        <?php echo form_open_multipart('Inventarios_Venta/guarda_retiro', array('method'=>'POST')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <address>
                                        <h3>Cliente: <b class="text-info"> <?php echo $trabajo['nombre'] ?></b></h3>
                                    </address>
                                </div>
                                <div class="float-right text-right">
                                    <address>

                                        <h4 class="font-bold">Fecha: <?php echo date("Y-m-d"); 
                                        //date("Y-m-d H:i:s");
                                        ?></h4>
                                    </address>
                                </div>
                            </div>

							<input type="text" name="trabajo_id" id="trabajo_id" hidden value="<?php echo $trabajo['id']; ?>">
							<!-- <input type="text" name="cliente_id" id="cliente_id" hidden value="<?php echo $trabajo['cliente_id'] ?>"> -->
							<input type="text" name="fecha" id="fecha" hidden value="<?php echo date("Y-m-d") ?>">
							<!-- INICIO DATOS PARA EL VARON -->
							<?php if (!empty($saco_varon->cantidad)) { ?>
                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($saco_varon->cantidad)): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-info">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL SACO (cantidad <?php echo $saco_varon->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #e6f2ff;">

                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo "ENTRE TELA (Metros)" ?></label>
                                                          <input name="etsv" type="number" id="etsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*0.40; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                          <input name="fsv" type="number" id="fsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*1.30; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PLASTON (Metros)' ?></label>
                                                          <input name="psv" type="number" id="psv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*0.40; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'HOMBRERA DE VARON (Unidades)' ?></label>
                                                          <input name="hsv" type="number" id="hsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*2; ?>">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                          <input name="pesv" type="number" id="pesv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*0.5; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'TELA FUSIONABLE (Metros)' ?></label>
                                                          <input name="tfsv" type="number" id="tfsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*0.40; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                          <input name="bgsv" type="number" id="bgsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*4; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                          <input name="bpsv" type="number" id="bpsv" class="form-control" min="0" step="any" value="<?php echo $saco_varon->cantidad*10; ?>">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($pantalon_varon->cantidad)): ?>
                                           
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON (cantidad <?php echo $pantalon_varon->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6ffe6;">

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BONYE (Metros)' ?></label>
                                                              <input name="bpv" type="number" id="bpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*0.50; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                              <input name="cpv" type="number" id="cpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                              <input name="pbpv" type="number" id="pbpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*0.30; ?>">
                                                            </div>
                                                          </div>

                                                          <!-- <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                              <input name="bgpv" type="number" id="bgpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*2; ?>">
                                                            </div>
                                                          </div> -->
                                                    </div>

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                              <input name="bppv" type="number" id="bppv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*5; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BROCHE (Unidades)' ?></label>
                                                              <input name="bropv" type="number" id="bropv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PLASTON (Metros)' ?></label>
                                                              <input name="ppv" type="number" id="ppv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*6; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'LIGA (Metros)' ?></label>
                                                              <input name="lpv" type="number" id="lpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1.2; ?>">
                                                            </div>
                                                          </div>

                                                    </div>

                                                </div>
                                              </div>
                                            </div>
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                            <?php endif ?>
                                </div>

                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($chaleco_varon->cantidad)): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-primary">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO (cantidad <?php echo $chaleco_varon->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                          <input name="fcv" type="number" id="fcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*1.10; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                          <input name="pcv" type="number" id="pcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*0.30; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'HEVILLA (Unidades)' ?></label>
                                                          <input name="hcv" type="number" id="hcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*1; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                          <input name="bgcv" type="number" id="bgcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*3; ?>">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                          <input name="bpcv" type="number" id="bpcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*2; ?>">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <!-- <?php if (!empty($camisa['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">CAMISA</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">BONYE</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">CIERRE</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">PELLON BLANCO</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">BOTON</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>
                                                    </div>

                                                    <div class="row">
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">BOCHA</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">PLASTON</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">LIGA</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                    </div>

                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                            <?php endif ?> -->
                                </div>
                            <!-- FIN DE DATOS DEL VARON -->
							<?php } else { ?>
							
							<!-- INICIO DATOS PARA LA MUJER -->

                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($saco_mujer->cantidad)): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-info">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL SACO (cantidad <?php echo $saco_mujer->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #e6f2ff;">

                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                          <input name="fsm" type="number" id="fsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*1.10; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'TELA FUSIONABLE (Metros)' ?></label>
                                                          <input name="fusm" type="number" id="fusm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.30; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                          <input name="psm" type="number" id="psm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.10; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'TAFETA (Metros)' ?></label>
                                                          <input name="tsm" type="number" id="tsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.20; ?>">
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'HOMBRERA DE MUJER (Unidades)' ?></label>
                                                          <input name="hmsm" type="number" id="hmsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*2; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                          <input name="bgsm" type="number" id="bgsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*4; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                          <input name="bpsm" type="number" id="bpsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*10; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($pantalon_mujer->cantidad)): ?>
                                           
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON (cantidad <?php echo $pantalon_mujer->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6ffe6;">

                                                    <div class="row">
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                              <input name="cpm" type="number" id="cpm" class="form-control" min="0" step="any" value="<?php echo $pantalon_mujer->cantidad*1; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON PARA PRETINA (Metros)' ?></label>
                                                              <input name="pppm" type="number" id="pppm" class="form-control" min="0" step="any" value="<?php echo $pantalon_mujer->cantidad*3.50; ?>">
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                            <?php endif ?>
                                </div>

                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($falda_mujer->cantidad)): ?>
                                            <div class="col-md-6">
                                            	<div class="card card-outline-primary">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA LA FALDA (cantidad <?php echo $falda_mujer->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                          <input name="cfm" type="number" id="cfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*1; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'TAFETA (Metros)' ?></label>
                                                          <input name="tfm" type="number" id="tfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*0.50; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-5">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PELLON PARA PRETINA (Metros)' ?></label>
                                                          <input name="ppfm" type="number" id="ppfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*3.50; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($chaleco_mujer->cantidad)): ?>
                                           
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-inverse">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO (cantidad <?php echo $chaleco_mujer->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6f2ff;">

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                              <input name="fcm" type="number" id="fcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*0.50; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                              <input name="pbcm" type="number" id="pbcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*0.20; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                              <input name="bpcm" type="number" id="bpcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*5; ?>">
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                            <?php endif ?>
                                </div>
							<?php } ?>
							<!-- FIN DATOS PARA LA MUJER -->
                        </div>
                        <div class="col-md-6">
                                <button class="btn waves-effect waves-light btn-block btn-info" type="submit"> <span><i class="fa fa-print"></i> Guardar</span> </button>
                        </div>
                    </div>
               		</form>

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
        <footer class="footer">
            2020 desarrollado por GoGhu
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>public/main/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
   $(document).ready(function() {
       $("#print").click(function() {
           var mode = 'iframe'; //popup
           var close = mode == "popup";
           var options = {
               mode: mode,
               popClose: close
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>

<script>
   function sacar_inv(){

        var entre_tela_saco_pv = $("#entre_tela_saco_pv").val();
        var entre_tela_saco = $("#entre_tela_saco").val();
        var entre_tela_saco_id = $("#entre_tela_saco_id").val();



        var forro_saco = $("#forro_saco").val();
        var plaston_saco = $("#plaston_saco").val();
        var hombrera_v_saco = $("#hombrera_v_saco").val();
        var pellon_saco = $("#pellon_saco").val();
        var fusionable_saco = $("#fusionable_saco").val();
        var boton_g_saco = $("#boton_g_saco").val();
        var boton_p_saco = $("#boton_p_saco").val();
        var bonye_pantalon = $("#bonye_pantalon").val();
        var cierre_pantalon = $("#cierre_pantalon").val();
        var pellon_pantalon = $("#pellon_pantalon").val();
        var boton_g_pantalon = $("#boton_g_pantalon").val();
        var boton_p_pantalon = $("#boton_p_pantalon").val();
        var bocha_pantalon = $("#bocha_pantalon").val();
        var plaston_pantalon = $("#plaston_pantalon").val();
        var liga_pantalon = $("#liga_pantalon").val();
        var forro_chaleco = $("#forro_chaleco").val();
        var pellon_chaleco = $("#pellon_chaleco").val();
        var hebilla_chaleco = $("#hebilla_chaleco").val();
        var boton_g_chaleco = $("#boton_g_chaleco").val();
        var boton_p_chaleco = $("#boton_p_chaleco").val();


   }
</script>

