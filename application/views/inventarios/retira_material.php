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


                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($saco['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-info">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL SACO</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #e6f2ff;">

                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $entre_tela->nombre ?></label>
                                                          <input name="entre_tela_saco" type="number" id="entre_tela_saco" class="form-control" min="0" value="<?php echo '0.40' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $forro->nombre ?></label>
                                                          <input name="forro_saco" type="number" id="forro_saco" class="form-control" min="0" value="<?php echo '1.30' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $plaston->nombre ?></label>
                                                          <input name="plaston_saco" type="number" id="plaston_saco" class="form-control" min="0" value="<?php echo '0.40' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $hombrera_v->nombre ?></label>
                                                          <input name="hombrera_v_saco" type="number" id="hombrera_v_saco" class="form-control" min="0" value="<?php echo '2' ?>">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $pellon->nombre ?></label>
                                                          <input name="pellon_saco" type="number" id="pellon_saco" class="form-control" min="0" step="any" value="<?php echo '0.5' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $fusionable->nombre ?></label>
                                                          <input name="fusionable_saco" type="number" id="fusionable_saco" class="form-control" min="0" step="any" value="<?php echo '0.40' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $boton_g->nombre ?></label>
                                                          <input name="boton_g_saco" type="number" id="boton_g_saco" class="form-control" min="0" step="any" value="<?php echo $saco['botones']; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $boton_p->nombre ?></label>
                                                          <input name="boton_p_saco" type="number" id="boton_p_saco" class="form-control" min="0" step="any" value="<?php echo '10' ?>">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($pantalon['modelo_nombre'])): ?>
                                           
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6ffe6;">

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $bonye->nombre ?></label>
                                                              <input name="bonye_pantalon" type="number" id="bonye_pantalon" class="form-control" min="0" step="any" value="<?php echo '0.50' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $cierre->nombre ?></label>
                                                              <input name="cierre_pantalon" type="number" id="cierre_pantalon" class="form-control" min="0" step="any" value="<?php echo '1' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $pellon->nombre ?></label>
                                                              <input name="pellon_pantalon" type="number" id="pellon_pantalon" class="form-control" min="0" step="any" value="<?php echo '0.30' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $boton_g->nombre ?></label>
                                                              <input name="boton_g_pantalon" type="number" id="boton_g_pantalon" class="form-control" min="0" step="any" value="<?php echo '2' ?>">
                                                            </div>
                                                          </div>
                                                    </div>

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $boton_p->nombre ?></label>
                                                              <input name="boton_p_pantalon" type="number" id="boton_p_pantalon" class="form-control" min="0" step="any" value="<?php echo '5' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $bocha->nombre ?></label>
                                                              <input name="bocha_pantalon" type="number" id="bocha_pantalon" class="form-control" min="0" step="any" value="<?php echo '1' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $plaston->nombre ?></label>
                                                              <input name="plaston_pantalon" type="number" id="plaston_pantalon" class="form-control" min="0" step="any" value="<?php echo '6' ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo $liga->nombre ?></label>
                                                              <input name="liga_pantalon" type="number" id="liga_pantalon" class="form-control" min="0" step="any" value="<?php echo '1.2' ?>">
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
                                        <?php if (!empty($chaleco['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-primary">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $forro->nombre ?></label>
                                                          <input name="forro_chaleco" type="number" id="forro_chaleco" class="form-control" min="0" step="any" value="<?php echo '1.10' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $pellon->nombre ?></label>
                                                          <input name="pellon_chaleco" type="number" id="pellon_chaleco" class="form-control" min="0" step="any" value="<?php echo '0.30' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $hebilla->nombre ?></label>
                                                          <input name="hebilla_chaleco" type="number" id="hebilla_chaleco" class="form-control" min="0" step="any" value="<?php echo '1' ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $boton_g->nombre ?></label>
                                                          <input name="boton_g_chaleco" type="number" id="boton_g_chaleco" class="form-control" min="0" step="any" value="<?php echo '3' ?>">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo $boton_p->nombre ?></label>
                                                          <input name="boton_p_chaleco" type="number" id="boton_p_chaleco" class="form-control" min="0" step="any" value="<?php echo '2' ?>">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($camisa['modelo_nombre'])): ?>
                                           
                                            <!-- modelos pantalon -->
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
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                            <?php endif ?>
                                </div>

                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($extras['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-info">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES EXTRAS</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">ENTRE TELA</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">FORRO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">PLASTON</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">HOMBRERA</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">PELLON BLANCO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">FUSIONABLE</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">BOTON GRANDE</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">BOTON PEQUEÑO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <?php if (!empty($falda['modelo_nombre'])): ?>
                                           
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA LA FALDA</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #ffffcc;">

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
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                            <?php endif ?>
                                </div>

                                <div class="col-md-12">

                                        <div class="row">
                                        <?php if (!empty($jamper['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                                <div class="card card-outline-info">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL JAMPER</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #ffffcc;">

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">ENTRE TELA</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">FORRO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">PLASTON</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">HOMBRERA</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                    </div>

                                                    <div class="row">

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">PELLON BLANCO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">FUSIONABLE</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">BOTON GRANDE</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label">BOTON PEQUEÑO</label>
                                                          <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <div>
                                              <input type="number" id="entre_tela_saco_id" hidden value="<?php echo $entre_tela->categoria_id ?>">
                                              <input type="number" id="entre_tela_saco_pv" hidden value="<?php echo $entre_tela->precio_venta ?>">

                                              <input type="number" id="forro_saco_id" hidden value="<?php echo $forro->categoria_id ?>">
                                              <input type="number" id="forro_saco_pv" hidden value="<?php echo $forro->precio_venta ?>">

                                              <input type="number" id="plaston_saco_id" hidden value="<?php echo $plaston->categoria_id ?>">
                                              <input type="number" id="plaston_saco_pv" hidden value="<?php echo $plaston->precio_venta ?>">

                                              <input type="number" id="hombrera_v_saco_id" hidden value="<?php echo $hombrera_v->categoria_id ?>">
                                              <input type="number" id="hombrera_v_saco_pv" hidden value="<?php echo $hombrera_v->precio_venta ?>">

                                              <input type="number" id="pellon_saco_id" hidden value="<?php echo $pellon->categoria_id ?>">
                                              <input type="number" id="pellon_saco_pv" hidden value="<?php echo $pellon->precio_venta ?>">

                                              <input type="number" id="fusionable_saco_id" hidden value="<?php echo $fusionable->categoria_id ?>">
                                              <input type="number" id="fusionable_saco_pv" hidden value="<?php echo $fusionable->precio_venta ?>">

                                              <input type="number" id="boton_g_saco_id" hidden value="<?php echo $boton_g->categoria_id ?>">
                                              <input type="number" id="boton_g_saco_pv" hidden value="<?php echo $boton_g->precio_venta ?>">

                                              <input type="number" id="boton_p_saco_id" hidden value="<?php echo $boton_p->categoria_id ?>">
                                              <input type="number" id="boton_p_saco_pv" hidden value="<?php echo $boton_p->precio_venta ?>">

                                              <input type="number" id="bonye_pantalon_id" hidden value="<?php echo $bonye->categoria_id ?>">
                                              <input type="number" id="bonye_pantalon_pv" hidden value="<?php echo $bonye->precio_venta ?>">

                                              <input type="number" id="cierre_pantalon_id" hidden value="<?php echo $cierre->categoria_id ?>">
                                              <input type="number" id="cierre_pantalon_pv" hidden value="<?php echo $cierre->precio_venta ?>">

                                              <input type="number" id="pellon_pantalon_id" hidden value="<?php echo $pellon->categoria_id ?>">
                                              <input type="number" id="pellon_pantalon_pv" hidden value="<?php echo $pellon->precio_venta ?>">

                                              <input type="number" id="boton_g_pantalon_id" hidden value="<?php echo $boton_g->categoria_id ?>">
                                              <input type="number" id="boton_g_pantalon_pv" hidden value="<?php echo $boton_g->precio_venta ?>">

                                              <input type="number" id="boton_p_pantalon_id" hidden value="<?php echo $boton_p->categoria_id ?>">
                                              <input type="number" id="boton_p_pantalon_pv" hidden value="<?php echo $boton_p->precio_venta ?>">

                                              <input type="number" id="bocha_pantalon_id" hidden value="<?php echo $bocha->categoria_id ?>">
                                              <input type="number" id="bocha_pantalon_pv" hidden value="<?php echo $bocha->precio_venta ?>">

                                              <input type="number" id="plaston_pantalon_id" hidden value="<?php echo $plaston->categoria_id ?>">
                                              <input type="number" id="plaston_pantalon_pv" hidden value="<?php echo $plaston->precio_venta ?>">

                                              <input type="number" id="liga_pantalon_id" hidden value="<?php echo $liga->categoria_id ?>">
                                              <input type="number" id="liga_pantalon_pv" hidden value="<?php echo $liga->precio_venta ?>">

                                              <input type="number" id="forro_chaleco_id" hidden value="<?php echo $forro->categoria_id ?>">
                                              <input type="number" id="forro_chaleco_pv" hidden value="<?php echo $forro->precio_venta ?>">

                                              <input type="number" id="pellon_chaleco_id" hidden value="<?php echo $pellon->categoria_id ?>">
                                              <input type="number" id="pellon_chaleco_pv" hidden value="<?php echo $pellon->precio_venta ?>">

                                              <input type="number" id="hebilla_chaleco_id" hidden value="<?php echo $hebilla->categoria_id ?>">
                                              <input type="number" id="hebilla_chaleco_pv" hidden value="<?php echo $hebilla->precio_venta ?>">

                                              <input type="number" id="boton_g_chaleco_id" hidden value="<?php echo $boton_g->categoria_id ?>">
                                              <input type="number" id="boton_g_chaleco_pv" hidden value="<?php echo $boton_g->precio_venta ?>">

                                              <input type="number" id="boton_p_chaleco_id" hidden value="<?php echo $boton_p->categoria_id ?>">
                                              <input type="number" id="boton_p_chaleco_pv" hidden value="<?php echo $boton_p->precio_venta ?>">

                                        </div>

                                        
                                        </div>
                                              
                                </div>


                               <!--  <div class="table-responsive mt-5" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Descripcion</th>
                                                <th class="text-right">Cantidad</th>
                                                <th class="text-right">Precio Unitario</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($saco)): ?>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Saco</td>
                                                    <td class="text-right"><?php echo $saco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $saco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_saco = number_format($saco['cantidad'] * $saco['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_saco = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon['modelo_nombre'])): ?>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Pantalon</td>
                                                    <td class="text-right"><?php echo $pantalon['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $pantalon['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_pantalon = number_format($pantalon['cantidad'] * $pantalon['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_pantalon = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco['modelo_nombre'])): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Chaleco</td>
                                                    <td class="text-right"><?php echo $chaleco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $chaleco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_chaleco = number_format($chaleco['cantidad'] * $chaleco['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_chaleco = 0 ?>
                                            <?php endif ?>

                                             <?php if (!empty($camisa['cuello'])): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>camisa</td>
                                                    <td class="text-right"><?php echo $camisa['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $camisa['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_camisa = number_format($camisa['cantidad'] * $camisa['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($extras['trabajo_id'])): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>extras</td>
                                                    <td class="text-right"><?php echo $extras['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $extras['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_extras = number_format($extras['cantidad'] * $extras['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($falda['modelo_nombre'])): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Falda</td>
                                                    <td class="text-right"><?php echo $falda['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $falda['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_falda = number_format($falda['cantidad'] * $falda['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($jumper['modelo_nombre'])): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Jumper</td>
                                                    <td class="text-right"><?php echo $jumper['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $jumper['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_jumper = number_format($jumper['cantidad'] * $jumper['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_jumper = 0 ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>


                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                                <button class="btn waves-effect waves-light btn-block btn-info" type="button" onclick="sacar_inv();"> <span><i class="fa fa-print"></i> Guardar Orden</span> </button>
                        </div>
                        <!-- <div class="col-md-6">
                            <button id="print" class="btn waves-effect waves-light btn-block btn-dark" type="button"> <span><i class="fa fa-print"></i> Impresion Empresa</span> </button>
                        </div> -->
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

