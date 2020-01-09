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
		<!-- Row -->
		<div class="row">

      <!-- modal clientes -->
      <!-- sample modal content -->
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myLargeModalLabel">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <h4>Overflowing text to show scroll behavior</h4>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
              <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- fin modal clientes -->

      <?php echo form_open('Trabajos/guarda_trabajo')?>
      <div class="col-lg-12">
        <div class="card card-outline-info">
         <div class="card-header">
          <h4 class="mb-0 text-white">NUEVO TRABAJO</h4>
        </div>
        <div class="card-body">

          <form action="#">
           <div class="form-body">
            <div class="row pt-3">

             <div class="col-md-5">
              <label class="control-label">Nombre</label>
              <div class="input-group mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Cristiam Herrera Daza">
                <div class="input-group-append">
                  <button class="btn btn-info" type="button" onclick="cargarmodal('<?php echo base_url();?>trabajos/ajax_listado_clientes');" class="model_img img-fluid">Buscar</button>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label class="control-label">CI</label>
                <input type="number" name="ci" id="ci" class="form-control" placeholder="Ej: 4356987">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
               <label class="control-label">Celulares</label>
               <input type="text" name="celulares" id="celulares" class="form-control" placeholder="Ej: 73254787, 79845632">
             </div>
           </div>

           <div class="col-md-2">
            <div class="form-group">
              <label class="control-label" style="color: #ad3939; font-weight: bold;">Genero</label>
              <select name="genero" class="form-control custom-select">
                <option value="Varon">Varon</option>
                <option value="Mujer">Mujer</option>
              </select>
            </div>
          </div>
                  <!-- <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label">Fecha</label>
                      <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div> -->
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn waves-effect waves-light btn-block btn-dark">Varon</button>
                  </div>
                  <!-- <div class="col-md-6">
                    <button type="button" class="btn waves-effect waves-light btn-block btn-danger">Mujer</button>
                  </div> -->
                </div>

                <div id="bloque_varon" style="display: block;">

                  <p></p>
                  <div class="row">
                    <!-- medidas saco -->
                    <div class="col-md-5">
                      <div class="card card-outline-info">
                        <div class="card-header">
                          <h4 class="mb-0 text-white">MEDIDAS SACO</h4>
                        </div>
                        <div class="card-body" style="background-color: #e6f2ff;">

                          <div class="row">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Talle</label>
                                <input name="s_talla" type="number" id="talla" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Largo</label>
                                <input name="s_largo" type="number" id="largo" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Hombro</label>
                                <input name="s_hombro" type="number" id="hombro" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Espalda</label>
                                <input name="s_espalda" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                          </div>

                          <div class="row">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Pecho</label>
                                <input name="s_pecho" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Estomago</label>
                                <input name="s_estomago" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Medio Brazo</label>
                                <input name="s_mbrazo" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">L. Manga</label>
                                <input name="s_lmanga" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- fin medidas saco -->

                    <!-- inicia modelos sacos -->
                    <div class="col-md-7">
                      <div class="card card-outline-info">
                        <div class="card-header">
                          <h4 class="mb-0 text-white">CARACTERISTICAS SACO</h4>
                        </div>
                        <div class="card-body" style="background-color: #e6f2ff;">

                          <div class="row">

                            <div class="col-md-3">
                              <div class="form-group">
                                <?php //vdebug($modelos_varon, false, false, true); ?>
                                <label class="control-label">Modelo</label>
                                <select name="sd_modelo" class="form-control custom-select">
                                  <option value="">Seleccione</option>
                                  <?php foreach ($modelos_varon_saco as $mv):?>
                                    <option value="<?php echo $mv['id']?>"><?php echo $mv['nombre']?></option>
                                  <?php endforeach?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <label class="control-label">Botones</label>
                                <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" value="0" step="any">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Aberturas</label>
                                <select name="sd_aberturas" class="form-control custom-select">
                                  <option value="">Seleccione</option>
                                  <?php foreach ($aberturas_varon_saco as $a):?>
                                    <option value="<?php echo $a['id']?>"><?php echo $a['nombre']?></option>
                                  <?php endforeach?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Detalle</label>
                                <select name="sd_detalle" class="form-control custom-select">
                                  <option value="">Seleccione</option>
                                  <?php foreach ($detalles_varon_saco as $d):?>
                                    <option value="<?php echo $d['id']?>"><?php echo $d['nombre']?></option>
                                  <?php endforeach?>
                                </select>
                              </div>
                            </div>

                          </div>

                          <div class="row">

                            <div class="col">
                              <div class="form-group">
                                <label class="control-label">Color</label>
                                <input name="sd_color" type="text" id="sd_color" class="form-control" placeholder="Ej: Plomo">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <label class="control-label">Ojal Pu&ntilde;o</label>
                                <select name="sd_ojal" class="form-control custom-select">
                                  <option value="Si">Si</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>

                            <div class="col">
                              <div class="form-group">
                                <label class="control-label">Color Ojal</label>
                                <input name="sd_color_ojal" type="text" id="sd_color_ojal" class="form-control" placeholder="Ej: Gris">
                              </div>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- fin modelos sacos -->

                  </div>
                  <div class="row">

                    <!-- medidas pantalon -->
                    <div class="col-md-5">
                      <div class="card card-outline-success">
                        <div class="card-header">
                          <h4 class="mb-0 text-white">PANTALON</h4></div>
                          <div class="card-body" style="background-color: #e6ffe6;">

                            <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Largo</label>
                                  <input name="p_largo" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Entrepierna</label>
                                  <input name="p_entrepierna" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Cintura</label>
                                  <input name="p_cintura" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Muslo</label>
                                  <input name="p_muslo" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                            </div>

                            <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Rodilla</label>
                                  <input name="p_rodilla" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Bota Pie</label>
                                  <input name="p_bpie" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Tiro Delantero</label>
                                  <input name="p_tdelantero" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Tiro Atras</label>
                                  <input name="p_tatras" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- fin medidas pantalon -->

                      <!-- medidas pantalon -->
                      <div class="col-md-7">
                        <div class="card card-outline-success">
                          <div class="card-header">
                            <h4 class="mb-0 text-white">PANTALON</h4>
                          </div>
                          <div class="card-body" style="background-color: #e6ffe6;">

                            <div class="row">

                              <div class="col">
                                <div class="form-group">
                                  <?php //vdebug($modelos_varon, false, false, true); ?>
                                  <label class="control-label">Modelo</label>
                                  <select name="pd_modelo" class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($modelos_varon_pantalon as $mvp):?>
                                      <option value="<?php echo $mvp['id']?>"><?php echo $mvp['nombre']?></option>
                                    <?php endforeach?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Pinzas</label>
                                  <select name="pd_pinzas" class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($pinzas_varon_pantalon as $pvp):?>
                                      <option value="<?php echo $pvp['id']?>"><?php echo $pvp['nombre']?></option>
                                    <?php endforeach?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bragueta</label>
                                  <select name="pd_bragueta" class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <option value="">Cierre</option>
                                    <option value="">Boton</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Bolsillo atras</label>
                                  <select name="pd_batras" class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($bolsillos_varon_pantalon as $bvp):?>
                                      <option value="<?php echo $bvp['id']?>"><?php echo $bvp['nombre']?></option>
                                    <?php endforeach?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bota pie</label>
                                  <select name="pd_bpie" class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <option value="">Normal</option>
                                    <option value="">Dobles</option>
                                  </select>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- fin medidas pantalon -->

                    </div>

                    <div class="row">

                      <!-- chaleco medidas -->
                      <div class="col-md-5">
                        <div class="card card-outline-primary">
                          <div class="card-header">
                            <h4 class="mb-0 text-white">CHALECO</h4></div>
                            <div class="card-body" style="background-color: #f0e7fe;">

                              <div class="row">

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Largo</label>
                                    <input name="c_largo" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Pecho</label>
                                    <input name="c_pecho" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Estomago</label>
                                    <input name="c_estomago" type="number" id="firstName" class="form-control" min="0" value="0" step="any">
                                  </div>
                                </div>

                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- fin chaleco medidas -->

                        <!-- modelos chalecos -->
                        <div class="col-md-7">
                          <div class="card card-outline-primary">
                            <div class="card-header">
                              <h4 class="mb-0 text-white">CHALECO</h4>
                            </div>
                            <div class="card-body" style="background-color: #f0e7fe;">

                              <div class="row">

                                <div class="col">
                                  <div class="form-group">
                                    <?php //vdebug($modelos_varon, false, false, true); ?>
                                    <label class="control-label">Modelo</label>
                                    <select name="ch_modelo" class="form-control custom-select">
                                      <option value="">Seleccione</option>
                                      <?php foreach ($modelos_varon_chalecos as $mvch):?>
                                        <option value="<?php echo $mvch['id']?>"><?php echo $mvch['nombre']?></option>
                                      <?php endforeach?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label class="control-label">Botones</label>
                                    <input type="number" id="ch_botones" class="form-control" min="0" value="0" step="any">
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="control-label">Detalle</label>
                                    <select name="sd_detalle" class="form-control custom-select">
                                      <option value="">Seleccione</option>
                                      <?php foreach ($detalles_varon_saco as $d):?>
                                        <option value="<?php echo $d['id']?>"><?php echo $d['nombre']?></option>
                                      <?php endforeach?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="form-group">
                                    <label class="control-label">Color</label>
                                    <input name="sd_color" type="text" id="sd_color" class="form-control" placeholder="">
                                  </div>
                                </div>

                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- fin modelos chalecos -->

                      </div>

                      <!-- modelos chalecos -->
                      <div class="row">

                      </div>
                      <!-- modelos chalecos -->

                      <!-- monto total -->
                      <div class="row justify-content-md-center">
                        <div class="col-md-12">
                          <div class="card card-outline-danger">
                            <div class="card-header">
                              <h4 class="mb-0 text-white">DATOS DEL TRABAJO</h4>
                            </div>
                            <div class="card-body" style="background-color: #f0e7fe;">

                              <div class="row">

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Fecha Registro</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d');?>">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Fecha Prueba</label>
                                    <input type="date" name="fecha_prueba" id="fecha" class="form-control" value="<?php echo date('Y-m-d');?>">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Tela Propia</label>
                                    <select name="tela_propia" class="form-control custom-select">
                                      <option value="NO">NO</option>
                                      <option value="SI">SI</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Marca</label>
                                    <input type="text" name="marca" id="fecha" class="form-control">
                                  </div>
                                </div>
                                </div>
                                <div class="row">

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label class="control-label">Costo Tela</label>
                                    <input type="number" name="costo_tela" id="fecha" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label class="control-label">Costo Confeccion</label>
                                    <input type="number" name="costo_confeccion" id="fecha" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label class="control-label">Total</label>
                                    <input type="number" name="monto" id="fecha" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">A cuenta</label>
                                    <input type="number" name="confec" id="fecha" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label class="control-label">Saldo</label>
                                    <input type="number" name="confec" id="fecha" class="form-control">
                                  </div>
                                </div>

                              </div>

                              <!-- <div class="row">
                                <div class="col-md-10">
                                </div>
                                <div class="col-md-2">
                                  <div class="float-right"><div style="color: #000000; font-weight: bold;font-size: 16pt">TOTAL : <span id="precio_total">1500</span></div></div><br>
                                </div>
                              </div> -->

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- fin monto total -->

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-success">Guardar Trabajo</button>
                      </div>
                      <div class="col-md-6">
                        <button type="button" class="btn waves-effect waves-light btn-block btn-inverse">Cancelar</button>
                      </div>
                    </div>

							<!-- <div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-inverse">Cancel</button>
							</div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Row -->
	</div>
</div>