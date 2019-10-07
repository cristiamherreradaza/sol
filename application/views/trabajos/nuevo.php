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


			<div class="col-lg-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="mb-0 text-white">NUEVO TRABAJO</h4>
					</div>
					<div class="card-body">

						<form action="#">
							<div class="form-body">
								<div class="row pt-3">

									<div class="col-md-4">
                    <label class="control-label">Nombre</label>
                    <div class="input-group mb-3">
                        <input type="text" name="nombre" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" onclick="cargarmodal('<?php echo base_url(); ?>trabajos/ajax_listado_clientes');" class="model_img img-fluid">Buscar</button>
                        </div>
                    </div>
									</div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label">CI</label>
                      <input type="text" id="firstName" class="form-control" placeholder="John doe">
                    </div>
                  </div>

                  <div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Celular</label>
											<input type="text" id="nombre" class="form-control" placeholder="John doe">
                    </div>
									</div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label">Genero</label>
                      <select class="form-control custom-select">
                        <option value="">Varon</option>
                        <option value="">Mujer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="control-label">Fecha</label>
                      <input type="date" id="firstName" class="form-control" placeholder="John doe">
                    </div>
                  </div>
								</div>

                <div class="row">
                  <div class="col-md-6">
                    <button type="button" class="btn waves-effect waves-light btn-block btn-dark">Varon</button>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn waves-effect waves-light btn-block btn-danger">Mujer</button>
                  </div>
                </div>

                <div id="bloque_varon" style="display: block;">

                  <h3>Varon</h3>
                  <div class="row">
                  
                    <div class="col-md-6">
                      <div class="card card-outline-info">
                          <div class="card-header">
                              <h4 class="mb-0 text-white">SACO</h4>
                          </div>
                          <div class="card-body" style="background-color: #e6f2ff;">

                            <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Talla</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Largo</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Hombro</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Espalda</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                          <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Pecho</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Estomago</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Medio Brazo</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">L. Manga</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="card card-outline-success">
                          <div class="card-header">
                              <h4 class="mb-0 text-white">PANTALON</h4></div>
                          <div class="card-body" style="background-color: #e6ffe6;">

                            <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Largo</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Entrepierna</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Cintura</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Muslo</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                          <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Rodilla</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Bota Pie</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Tiro Delantero</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Tiro Atras</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                      <div class="card card-outline-primary">
                          <div class="card-header">
                              <h4 class="mb-0 text-white">CHALECO</h4></div>
                          <div class="card-body" style="background-color: #f0e7fe;">

                            <div class="row">

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Largo</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Pecho</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="control-label">Estomago</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                      </div>
                    </div>
                  </div>
                </div>

                <!-- inicia modelos sacos -->
                <div class="row">
                    <div class="col-md-12">
                      <div class="card card-outline-info">
                          <div class="card-header">
                              <h4 class="mb-0 text-white">SACO</h4>
                          </div>
                          <div class="card-body" style="background-color: #e6f2ff;">

                            <div class="row">

                              <div class="col">
                                <div class="form-group">
                                  <?php //vdebug($modelos_varon, false, false, true); ?>
                                  <label class="control-label">Modelo</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($modelos_varon_saco as $mv): ?>
                                      <option value="<?php echo $mv['id'] ?>"><?php echo $mv['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Botones</label>
                                  <input type="number" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Aberturas</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($aberturas_varon_saco as $a): ?>
                                      <option value="<?php echo $a['id'] ?>"><?php echo $a['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Detalle</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($detalles_varon_saco as $d): ?>
                                      <option value="<?php echo $d['id'] ?>"><?php echo $d['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Color</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Ojal Puno</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Color</label>
                                  <input type="text" id="firstName" class="form-control" placeholder="">
                                </div>
                              </div>

                          </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- fin modelos sacos -->

                <!-- inicia modelos pantalon -->
                <div class="row">
                    <div class="col-md-12">
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
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($modelos_varon_pantalon as $mvp): ?>
                                      <option value="<?php echo $mvp['id'] ?>"><?php echo $mvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Pinzas</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($pinzas_varon_pantalon as $pvp): ?>
                                      <option value="<?php echo $pvp['id'] ?>"><?php echo $pvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bragueta</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <option value="">Cierre</option>
                                    <option value="">Boton</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Bolsillo atras</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($bolsillos_varon_pantalon as $bvp): ?>
                                      <option value="<?php echo $bvp['id'] ?>"><?php echo $bvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bota pie</label>
                                  <select class="form-control custom-select">
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
                </div>
                <!-- fin modelos pantalon -->

                <!-- modelos chalecos -->
                <div class="row">
                    <div class="col-md-12">
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
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($modelos_varon_pantalon as $mvp): ?>
                                      <option value="<?php echo $mvp['id'] ?>"><?php echo $mvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Pinzas</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($pinzas_varon_pantalon as $pvp): ?>
                                      <option value="<?php echo $pvp['id'] ?>"><?php echo $pvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bragueta</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <option value="">Cierre</option>
                                    <option value="">Boton</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col">
                                <div class="form-group">
                                  <label class="control-label">Bolsillo atras</label>
                                  <select class="form-control custom-select">
                                    <option value="">Seleccione</option>
                                    <?php foreach ($bolsillos_varon_pantalon as $bvp): ?>
                                      <option value="<?php echo $bvp['id'] ?>"><?php echo $bvp['nombre'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="control-label">Bota pie</label>
                                  <select class="form-control custom-select">
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
                </div>
                <!-- modelos chalecos -->

							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<button type="button" class="btn btn-inverse">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Row -->
	</div>
</div>
