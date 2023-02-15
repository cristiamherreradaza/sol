<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <link href="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">

            <?php
				// $atributos = array(); 
				// echo form_open('Trabajos/guarda_trabajo') 
				echo form_open_multipart('Trabajos/guarda_trabajo')
			?>
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="mb-0 text-white">NUEVO TRABAJO</h4>
                    </div>
                    <?php //vdebug($this->session->nombre, false, false, true); 
                    ?>
                    <div class="card-body">

                        <div class="form-body">

                            <!-- <div class="row pt-3"> -->
                            <div class="row">

                                <div class="col-md-3">
                                    <input type="hidden" name="cod_cliente" id="cod_cliente">
                                    <label class="control-label">Nombre del cliente <span id="error_cliente_duplicado" style="color: #f00; display: none;"><i class="far fa-times-circle"></i> El cliente ya existe!!!</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Cristiam J. Herrera Daza" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Carnet</label>
                                        <input type="number" name="ci" id="ci" class="form-control" placeholder="Ej: 4356987">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">Celulares</label>
                                        <input type="text" name="celulares" id="celulares" class="form-control" placeholder="Ej: 73254787, 79845632">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label" style="color: #ad3939; font-weight: bold;">Genero</label>
                                        <select name="genero" id="genero" class="form-control custom-select" onchange="cambia_genero();">
                                            <option value="Varon">Varon</option>
                                            <option value="Mujer">Mujer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" style="color: #00659c; font-weight: bold;">Contrato</label>
                                        <div id="carga_contratos">
                                            <select name="grupo_id" id="grupo_id" class="form-control custom-select" onchange="extraer_datos_contrato()">
                                                <option value="">Seleccione</option>
                                                <?php foreach ($grupos as $key => $g) : ?>
                                                    <option value="<?php echo $g['id'] ?>"><?php echo $g['nombre'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="datos_cliente_ajax">

                                    </div>
                                </div>
                            </div>

							<hr>
							<div class="row mb-2">
								<div class="col-md-11">
									<botton class="btn btn-block btn-primary" onclick="pagoParcialTotal()">TOTAL / PARCIAL</botton>
									<div class="form-group" id="bloque_pago_total" style="display: none">
										<label class="control-label"><h4>Cantidad Total de la confeccion</h4></label>
										<input type="number" class="form-control" id="modalidad_pago" name="modalidad_pago" placeholder="Precio en Bs." onClick="this.select();">
									</div>			
									<input type="hidden" value="no" id="valor_input_verificador">
								</div>
								<div class="col-md-1">
									<button type="button" id="nombre_boton_btn" class="btn btn-block btn-danger"><span id="nombre_boton">NO</span></button>
								</div>
							</div>


                            <div class="row">
                                <div class="col-md-12">
									<hr>
									<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
										<li class="nav-item">
											<a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
												<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
												<span class="d-none d-lg-block">DATOS DEL SACO</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
												<i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
												<span class="d-none d-lg-block">DATOS DEL PANTALON</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
												<i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
												<span class="d-none d-lg-block">DATOS DEL CHALECO</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="#extras_jumper" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
												<i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
												<span class="d-none d-lg-block">EXTRAS / FALDAS Y JUMPER</span>
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane show active" id="home1">
											<div class="row">
												<div class="col-md-12">
													<!-- saco -->
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
																				<input name="s_talla" type="number" id="s_talla" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col-md-3">
																			<div class="form-group">
																				<label class="control-label">Largo</label>
																				<input name="s_largo" type="number" id="s_largo" class="form-control" min="0" step="any" onchange="copyDateChaleco(this)">
																			</div>
																		</div>

																		<div class="col-md-3">
																			<div class="form-group">
																				<label class="control-label">Hombro</label>
																				<input name="s_hombro" type="number" id="s_hombro" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col-md-3">
																			<div class="form-group">
																				<label class="control-label">Espalda</label>
																				<input name="s_espalda" type="number" id="s_espalda" class="form-control" min="0" step="any">
																			</div>
																		</div>

																	</div>

																	<div class="row">

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Pecho</label>
																				<input name="s_pecho" type="number" id="s_pecho" class="form-control" min="0" step="any" onchange="copyDateChaleco(this)">
																			</div>
																		</div>

																		<div class="col" id="saco_albusto" style="display: none;">
																			<div class="form-group">
																				<label class="control-label">Alt Busto</label>
																				<input name="s_abusto" type="number" id="s_abusto" class="form-control" min="0" step="any" onchange="copyDateChaleco(this)">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Estomago</label>
																				<input name="s_estomago" type="number" id="s_estomago" class="form-control" min="0" step="any" onchange="copyDateChaleco(this)">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Medio Brazo</label>
																				<input name="s_mbrazo" type="number" id="s_mbrazo" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">L. Manga</label>
																				<input name="s_lmanga" type="number" id="s_lmanga" class="form-control" min="0" step="any">
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
																				<?php //vdebug($modelos_varon, false, false, true); 
																				?>
																				<label class="control-label">Modelo</label>
																				<select name="sd_modelo" id="sd_modelo" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($modelos_varon_saco as $mv) : ?>
																						<option value="<?php echo $mv['id'] ?>"><?php echo $mv['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col-md-2">
																			<div class="form-group">
																				<label class="control-label">Botones</label>
																				<input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col-md-3">
																			<div class="form-group">
																				<label class="control-label">Aberturas</label>
																				<select name="sd_aberturas" id="sd_aberturas" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($aberturas_varon_saco as $a) : ?>
																						<option value="<?php echo $a['id'] ?>"><?php echo $a['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Detalle</label>
																				<select name="sd_detalle" id="sd_detalle" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($detalles_varon_saco as $d) : ?>
																						<option value="<?php echo $d['id'] ?>"><?php echo $d['nombre'] ?></option>
																					<?php endforeach ?>
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
																				<select name="sd_ojal" id="sd_ojal" class="form-control custom-select">
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
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Tipo de bolsillo</label>
																				<input name="tipo_bolsillo" type="text" id="tipo_bolsillo" class="form-control" placeholder="Ej: Doble, Simple">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="control-label">Imagen del modelo</label>
																				<input name="img_modelo_saco" type="file" accept="image/*" id="img_modelo_saco" class="form-control">
																			</div>
																		</div>
																	</div>

																	<div class="row">

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label"><b>Cantidad</b></label>
																				<input name="saco_cantidad" type="number" id="saco_cantidad" class="form-control saco-cal" value="1">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_saco_precio_unitario">
																				<label class="control-label"><b>Precio Unitario</b></label>
																				<input name="saco_pu" type="number" id="saco_pu" class="form-control saco-cal" placeholder="Ej: 150">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_saco_subtotal">
																				<label class="control-label"><b>Subtotal</b></label>
																				<input name="saco_subtotal" type="number" id="saco_subtotal" class="form-control" readonly>
																			</div>
																		</div>

																	</div>

																</div>
															</div>
														</div>
													</div>
													<!-- fin sacos -->
												</div>
											</div>
										</div>
										<div class="tab-pane" id="profile1">
											<div class="row">
												<div class="col-md-12">
													<!-- pantalon -->
													<div class="row">
														<!-- medidas pantalon -->
														<div class="col-md-5">
															<div class="card card-outline-success">
																<div class="card-header">
																	<h4 class="mb-0 text-white">MEDIDAS PANTALON</h4>
																</div>
																<div class="card-body" style="background-color: #e6ffe6;">

																	<div class="row">

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Largo</label>
																				<input name="p_largo" type="number" id="p_largo" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Entrepierna</label>
																				<input name="p_entrepierna" type="number" id="p_entrepierna" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Cintura</label>
																				<input name="p_cintura" type="number" id="p_cintura" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col" id="pantalon_cadera" style="display: none;">
																			<div class="form-group">
																				<label class="control-label">Cadera</label>
																				<input name="p_cadera" type="number" id="p_cadera" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Muslo</label>
																				<input name="p_muslo" type="number" id="p_muslo" class="form-control" min="0" step="any">
																			</div>
																		</div>

																	</div>

																	<div class="row">

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Rodilla</label>
																				<input name="p_rodilla" type="number" id="p_rodilla" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Bota Pie</label>
																				<input name="p_bpie" type="number" id="p_bpie" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">T. Delantero</label>
																				<input name="p_tdelantero" type="number" id="p_tdelantero" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Tiro Atras</label>
																				<input name="p_tatras" type="number" id="p_tatras" class="form-control" min="0" step="any">
																			</div>
																		</div>

																	</div>

																</div>
															</div>
														</div>
														<!-- fin medidas pantalon -->
														<!-- modelos pantalon -->
														<div class="col-md-7">
															<div class="card card-outline-success">
																<div class="card-header">
																	<h4 class="mb-0 text-white">CARACTERISTICAS PANTALON</h4>
																</div>
																<div class="card-body" style="background-color: #e6ffe6;">

																	<div class="row">

																		<div class="col">
																			<div class="form-group">
																				<?php //vdebug($modelos_varon, false, false, true); 
																				?>
																				<label class="control-label">Modelo</label>
																				<select name="pd_modelo" id="pd_modelo" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($modelos_varon_pantalon as $mvp) : ?>
																						<option value="<?php echo $mvp['id'] ?>"><?php echo $mvp['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Pinzas</label>
																				<select name="pd_pinzas" id="pd_pinzas" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($pinzas_varon_pantalon as $pvp) : ?>
																						<option value="<?php echo $pvp['id'] ?>"><?php echo $pvp['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col" id="select_bragueta" style="display: block;">
																			<div class="form-group">
																				<label class="control-label">Bragueta</label>
																				<select name="pd_bragueta" name="pd_bragueta" class="form-control custom-select">
																					<option value="Cierre">Cierre</option>
																					<option value="Boton">Boton</option>
																				</select>
																			</div>
																		</div>

																		<div class="col" id="pd_cpretina" style="display: none;">
																			<div class="form-group">
																				<label class="control-label">Pretina</label>
																				<select name="pd_pretina" id="pd_pretina" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<option value="Normal">Normal</option>
																					<option value="Ancho">Ancho</option>
																				</select>
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Bolsillo</label>
																				<select name="pd_batras" id="pd_batras" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($bolsillos_varon_pantalon as $bvp) : ?>
																						<?php if ($bvp['id'] == 1) : ?>
																							<option value="<?php echo $bvp['id'] ?>" selected><?php echo $bvp['nombre'] ?></option>
																						<?php else : ?>
																							<option value="<?php echo $bvp['id'] ?>"><?php echo $bvp['nombre'] ?></option>
																						<?php endif ?>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Bota pie</label>
																				<select name="pd_bpie" id="pd_bpie" class="form-control custom-select">
																					<option value="Normal">Normal</option>
																					<option value="Dobles">Dobles</option>
																					<option value="Abertura">Abertura</option>
																				</select>
																			</div>
																		</div>

																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label class="control-label">Imagen del modelo</label>
																				<input type="file" class="form-control" accept="image/*" id="img_modelo_pantalon" name="img_modelo_pantalon">
																			</div>
																		</div>
																	</div>

																	<div class="row">

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label"><b>Cantidad</b></label>
																				<input name="pantalon_cantidad" type="number" id="pantalon_cantidad" class="form-control" value="1">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_pantalon_precio_unitario">
																				<label class="control-label"><b>Precio Unitario</b></label>
																				<input name="pantalon_pu" type="number" id="pantalon_pu" class="form-control" placeholder="Ej: 150">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_pantalon_subtotal">
																				<label class="control-label"><b>Subtotal</b></label>
																				<input name="pantalon_subtotal" type="number" id="pantalon_subtotal" class="form-control" readonly>
																			</div>
																		</div>

																	</div>

																</div>
															</div>
														</div>
														<!-- fin medidas pantalon -->
													</div>
													<!-- fin pantalon -->
												</div>
											</div>
										</div>
										<div class="tab-pane" id="settings1">
											<div class="row">
												<div class="col-md-12">
													<!-- chalecos -->
													<div class="row">
														<!-- chaleco medidas -->
														<div class="col-md-5">
															<div class="card card-outline-primary">
																<div class="card-header">
																	<h4 class="mb-0 text-white">CHALECO</h4>
																</div>
																<div class="card-body" style="background-color: #f0e7fe;">

																	<div class="row">

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Largo</label>
																				<input name="ch_largo" type="number" id="ch_largo" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Pecho</label>
																				<input name="ch_pecho" type="number" id="ch_pecho" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col">
																			<div class="form-group">
																				<label class="control-label">Estomago</label>
																				<input name="ch_estomago" type="number" id="ch_estomago" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col" id="ch_abusto" style="display: none;">
																			<div class="form-group">
																				<label class="control-label">Altura busto</label>
																				<input name="ch_abusto" type="number" id="ch_abusto_dato" class="form-control" min="0" step="any">
																			</div>
																		</div>

																	</div>

																</div>
															</div>
														</div>
														<!-- fin chaleco medidas -->
														<!-- chalecos -->
														<div class="col-md-7">
															<div class="card card-outline-primary">
																<div class="card-header">
																	<h4 class="mb-0 text-white">CARACTERISTICAS CHALECO</h4>
																</div>
																<div class="card-body" style="background-color: #f0e7fe;">

																	<div class="row">

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Modelo</label>
																				<select name="ch_modelo" id="ch_modelo" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($modelos_varon_chalecos as $mvch) : ?>
																						<option value="<?php echo $mvch['id'] ?>"><?php echo $mvch['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Botones</label>
																				<input type="number" name="ch_botones" id="ch_botones" class="form-control" min="0" step="any">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Detalle</label>
																				<select name="ch_detalle" id="ch_detalle" class="form-control custom-select">
																					<option value="">Seleccione</option>
																					<?php foreach ($detalles_varon_chalecos as $dvch) : ?>
																						<option value="<?php echo $dvch['id'] ?>"><?php echo $dvch['nombre'] ?></option>
																					<?php endforeach ?>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Color Ojales</label>
																				<input name="ch_color" type="text" id="ch_color" class="form-control" placeholder="">
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Boton Forrado</label>
																				<select name="ch_boton_forrado" id="ch_boton_forrado" class="form-control">
																					<option value="No">No</option>
																					<option value="Si">Si</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label">Imagen del modelo</label>
																				<input type="file" class="form-control" accept="image/*" name="img_modelo_chaleco" id="img_modelo_chaleco">
																			</div>
																		</div>
																	</div>

																	<div class="row">

																		<div class="col-md-4">
																			<div class="form-group">
																				<label class="control-label"><b>Cantidad</b></label>
																				<input name="ch_cantidad" type="number" id="ch_cantidad" class="form-control" value="1">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_chaleco_precio_unitario">
																				<label class="control-label"><b>Precio Unitario</b></label>
																				<input name="ch_pu" type="number" id="ch_pu" class="form-control" placeholder="Ej: 150">
																			</div>
																		</div>

																		<div class="col-md-4">
																			<div class="form-group" id="input_chaleco_subtotal">
																				<label class="control-label"><b>Subtotal</b></label>
																				<input name="ch_subtotal" type="number" id="ch_subtotal" class="form-control" readonly>
																			</div>
																		</div>

																	</div>

																</div>
															</div>
														</div>
														<!-- fin chalecos -->
													</div>
													<!-- fin chalecos -->
												</div>
											</div>
										</div>
										<div class="tab-pane" id="extras_jumper">
											<div class="row">
												<div class="col-md-12">
													<!-- camisa y extras -->
													<div id="bloque_extras" style="display: block;">
														<div class="row">
															<!-- camisa medidas -->
															<div class="col-md-5">
																<div class="card card-outline-inverse">
																	<div class="card-header">
																		<h4 class="mb-0 text-white">CAMISA</h4>
																	</div>
																	<div class="card-body" style="background-color: #f5f5f5;">

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Cuello</label>
																					<input name="cam_cuello" type="number" id="cam_cuello" class="form-control" min="0" step="any">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Largo manga</label>
																					<input name="cam_lmanga" type="number" id="cam_lmanga" class="form-control" min="0" step="any">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Color</label>
																					<input name="cam_color" type="text" id="cam_color" class="form-control" min="0" step="any">
																				</div>
																			</div>

																		</div>
																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Modelo cuello</label>
																					<select name="cam_mcuello" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<option value="Pajarito">Pajarito</option>
																						<option value="Normal">Normal</option>
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Ancho</label>
																					<select name="cam_ancho" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<option value="Normal">Normal</option>
																						<option value="Slim">Slim</option>
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Cuello Combi</label>
																					<select name="cam_ccombinado" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<option value="Si">Si</option>
																						<option value="No">No</option>
																					</select>
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Cantidad</b></label>
																					<input name="cam_cantidad" type="number" id="cam_cantidad" class="form-control" value="1">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group" id="input_camisa_precio_unitario">
																					<label class="control-label"><b>Precio Unitario</b></label>
																					<input name="cam_pu" type="number" id="cam_pu" class="form-control" placeholder="Ej: 150">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group" id="input_camisa_subtotal">
																					<label class="control-label"><b>Subtotal</b></label>
																					<input name="cam_subtotal" type="number" id="cam_subtotal" class="form-control" readonly>
																				</div>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<!-- fin camisa medidas -->

															<!-- extras -->
															<div class="col-md-7">
																<div class="card card-outline-inverse">
																	<div class="card-header">
																		<h4 class="mb-0 text-white">EXTRAS</h4>
																	</div>
																	<div class="card-body" style="background-color: #f5f5f5;">

																		<div class="row">
																			<div class="col-md-12">
																				<div class="row">
																					<div class="col-md-6">
																						<div class="form-check">
																							<input type="checkbox" class="form-check-input" name="corbaton" id="corbaton" onclick="abreColorCaja(this)">
																							<label class="form-check-label" for="corbaton">
																								Corbaton
																							</label>
																						</div>

																						<div class="form-check">
																							<input type="checkbox" class="form-check-input" name="corbata_gato" id="corbata_gato" onclick="abreColorCaja(this)">
																							<label class="form-check-label" for="corbata_gato">
																								Corbata de Gato
																							</label>
																						</div>
																					</div>
																					<div class="col-md-6">

																						<div class="form-check">
																							<input type="checkbox" class="form-check-input" name="faja" id="faja" onclick="abreColorCaja(this)">
																							<label class="form-check-label" for="faja">
																								Faja
																							</label>
																						</div>

																						<div class="form-check">
																							<input type="checkbox" class="form-check-input" name="panuelo" id="panuelo" onclick="abreColorCaja(this)">
																							<label class="form-check-label" for="panuelo">
																								Pañuelo
																							</label>
																						</div>

																					</div>
																				</div>
																			</div>
																		</div>

																		<div class="row mt-2">
																			<div class="col">
																				<div class="form-group" style="display: none" id="input_corbaton">
																					<label class="control-label">Corbaton</label>
																					<input type="text" name="corbaton_color" id="corbaton_color" class="form-control" placeholder="Ej: Negro">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group" style="display: none" id="input_corbata_gato">
																					<label class="control-label">Corbata gato</label>
																					<input name="cg_color" type="text" id="cg_color" class="form-control" placeholder="Ej: Negro">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group" style="display: none" id="input_faja">
																					<label class="control-label">Faja</label>
																					<input name="faja_color" type="text" id="faja_color" class="form-control" placeholder="Ej: Negro">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group" style="display: none" id="input_panuelo">
																					<label class="control-label">Pañuelo</label>
																					<input name="panuelo_color" type="text" id="panuelo_color" class="form-control" placeholder="Ej: Negro">
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Cantidad</b></label>
																					<input name="ext_cantidad" type="number" id="ext_cantidad" class="form-control" value="1">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Precio Unitario</b></label>
																					<input name="ext_pu" type="number" id="ext_pu" class="form-control" placeholder="Ej: 150">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Subtotal</b></label>
																					<input name="ext_subtotal" type="number" id="ext_subtotal" class="form-control" readonly>
																				</div>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<!-- fin extras -->

														</div>
													</div>
													<!-- fin camisa y extras -->
													<!-- Falda y jumper -->
													<div id="bloque_mujer" style="display: none;">
														<div class="row">

															<!-- falda medidas -->
															<div class="col-md-5">
																<div class="card card-outline-warning">
																	<div class="card-header">
																		<h4 class="mb-0 text-white">FALDA</h4>
																	</div>
																	<div class="card-body" style="background-color: #ffffcc;">

																		<div class="row">

																			<div class="col-md-3">
																				<div class="form-group">
																					<label class="control-label">Largo</label>
																					<input name="fa_largo" type="number" id="fa_largo" class="form-control" min="0" step="any">
																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<label class="control-label">Cintura</label>
																					<input name="fa_cintura" type="number" id="fa_cintura" class="form-control" min="0" step="any">
																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<label class="control-label">Cadera</label>
																					<input name="fa_cadera" type="number" id="fa_cadera" class="form-control" min="0" step="any">
																				</div>
																			</div>

																			<div class="col-md-3">
																				<div class="form-group">
																					<label class="control-label">Vasta</label>
																					<input name="fa_vasta" type="number" id="fa_vasta" class="form-control" min="0" step="any">
																				</div>
																			</div>

																		</div>
																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Modelo</label>
																					<select name="fa_modelo" id="fa_modelo" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<?php foreach ($modelos_faldas as $m) : ?>
																							<option value="<?php echo $m['id'] ?>"><?php echo $m['nombre'] ?></option>
																						<?php endforeach ?>
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Aberturas</label>
																					<select name="fa_abertura" id="fa_abertura" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<?php foreach ($aberturas_falda as $af) : ?>
																							<option value="<?php echo $af['id'] ?>"><?php echo $af['nombre'] ?></option>
																						<?php endforeach ?>
																					</select>
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group">
																					<label class="control-label">Pretina</label>
																					<select name="fa_pretina" id="fa_pretina" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<option value="Normal">Normal</option>
																						<option value="Ancho">Ancho</option>
																					</select>
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Cantidad</b></label>
																					<input name="fa_cantidad" type="number" id="fa_cantidad" class="form-control" value="1">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Precio Unitario</b></label>
																					<input name="fa_pu" type="number" id="fa_pu" class="form-control" placeholder="Ej: 150">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Subtotal</b></label>
																					<input name="fa_subtotal" type="number" id="fa_subtotal" class="form-control" readonly>
																				</div>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<!-- fin camisa medidas -->

															<!-- jumper -->
															<div class="col-md-7">
																<div class="card card-outline-warning">
																	<div class="card-header">
																		<h4 class="mb-0 text-white">JAMPER</h4>
																	</div>
																	<div class="card-body" style="background-color: #ffffcc;">

																		<div class="row">

																			<div class="col">
																				<div class="form-group">
																					<label class="control-label">Talle</label>
																					<input type="number" name="j_talle" id="j_talle" class="form-control" step="any">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group">
																					<label class="control-label">Largo</label>
																					<input name="j_largo" type="number" id="j_largo" class="form-control" step="any">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group">
																					<label class="control-label">Cintura</label>
																					<input name="j_cintura" type="number" id="j_cintura" class="form-control" step="any">
																				</div>
																			</div>

																			<div class="col">
																				<div class="form-group">
																					<label class="control-label">Cadera</label>
																					<input name="j_cadera" type="number" id="j_cadera" class="form-control" step="any">
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Pecho</label>
																					<input type="number" name="j_pecho" id="j_pecho" class="form-control" step="any">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Estomago</label>
																					<input name="j_estomago" type="number" id="j_estomago" class="form-control" step="any">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Altura Busto</label>
																					<input name="j_abusto" type="number" id="j_abusto" class="form-control" step="any">
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Modelo</label>
																					<select name="j_modelo" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<?php foreach ($modelos_jumper as $mj) : ?>
																							<option value="<?php echo $mj['id'] ?>"><?php echo $mj['nombre'] ?></option>
																						<?php endforeach ?>
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Aberturas</label>
																					<select name="j_abertura" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<?php foreach ($aberturas_jumper as $aj) : ?>
																							<option value="<?php echo $aj['id'] ?>"><?php echo $aj['nombre'] ?></option>
																						<?php endforeach ?>
																					</select>
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label">Bolsillo</label>
																					<select name="j_bolsillo" class="form-control custom-select">
																						<option value="">Seleccione</option>
																						<?php foreach ($bolsillos_jumper as $bj) : ?>
																							<option value="<?php echo $bj['id'] ?>"><?php echo $bj['nombre'] ?></option>
																						<?php endforeach ?>
																					</select>
																				</div>
																			</div>

																		</div>

																		<div class="row">

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Cantidad</b></label>
																					<input name="jam_cantidad" type="number" id="jam_cantidad" class="form-control" value="1">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Precio Unitario</b></label>
																					<input name="jam_pu" type="number" id="jam_pu" class="form-control" placeholder="Ej: 150">
																				</div>
																			</div>

																			<div class="col-md-4">
																				<div class="form-group">
																					<label class="control-label"><b>Subtotal</b></label>
																					<input name="jam_subtotal" type="number" id="jam_subtotal" class="form-control" readonly>
																				</div>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<!-- fin jumper -->

														</div>
													</div>
													<!-- fin camisa y extras -->
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
							<hr>

                            <!-- detalles trabajo -->
                            <div class="row justify-content-md-center">
                                <div class="col-md-12">
                                    <div class="card card-outline-danger">
                                        <div class="card-header">
                                            <h4 class="mb-0 text-white">DATOS DEL TRABAJO</h4>
                                        </div>
                                        <div class="card-body" style="background-color: #f0e7fe;">

                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Registro</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Prueba</label>
                                                        <input type="date" name="fecha_prueba" id="fecha_prueba" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Hora Prueba</label>
                                                        <input type="time" id="hora_prueba" name="hora_prueba" class="form-control" value="16:00:00">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Entrega</label>
                                                        <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Hora Entrega</label>
                                                        <input type="time" id="hora_entrega" name="hora_entrega" class="form-control" value="18:00:00">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Tela</label>
                                                        <select name="tela_propia" id="tela_propia" class="form-control custom-select">
                                                            <option value="NO">Sin Tela</option>
                                                            <option value="SI">Con Tela</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Marca</label>
                                                        <input type="text" name="marca" id="marca" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group has-success">
                                                        <label class="control-label">Costo Tela</label>
                                                        <input type="number" name="costo_tela" id="costo_tela" class="form-control calculo" min="0" step="any" required>
                                                    </div>
                                                </div>

                                                <div class="col has-success">
                                                    <div class="form-group">
                                                        <label class="control-label">Costo Confeccion</label>
                                                        <input type="number" name="costo_confeccion" id="costo_confeccion" class="form-control calculo" min="0" step="any" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="control-label">Motivo Rebaja</label>
                                                        <select id="motivo_rebaja" name="motivo_rebaja" class="form-control custom-select" onchange='habilita()'>
                                                            <option value="">Seleccione</option>
                                                            <option value="Comision">Comision</option>
                                                            <option value="Familiar">Familiar</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Amistad">Amistad</option>
                                                            <option value="Cliente">Cliente</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label"><b>Rebaja</b></label>
                                                        <input type="number" name="rebaja" id="rebaja" class="form-control calculo" min="0" step="any" readonly>
                                                        <input type="hidden" name="monto_rebaja" id="monto_rebaja">
                                                        <input type="hidden" name="costo_confeccion_calculado" id="costo_confeccion_calculado">
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="form-group has-danger">
                                                        <label class="control-label"><b>TOTAL</b></label>
                                                        <input type="number" name="monto_total" id="monto_total" class="form-control calculo" min="0" step="any" readonly>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group has-warning">
                                                        <label class="control-label">A cuenta</label>
                                                        <input type="number" name="a_cuenta" id="a_cuenta" class="form-control calculo" min="0" step="any" required>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group has-primary">
                                                        <label class="control-label">Saldo</label>
                                                        <input type="number" name="saldo" id="saldo" class="form-control calculo" min="0" step="any" readonly>
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
                            <!-- fin detalles trabajo -->

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">Guardar Trabajo</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url() ?>trabajos/listado_trabajos">
                                    <button type="button" class="btn waves-effect waves-light btn-block btn-inverse">Cancelar</button>
                                </a>
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
<script type="text/javascript">
    var costo_tela = 0;
    var costo_confeccion = 0;
    var suma = 0;
    var monto_total = 0;
    var a_cuenta = 0;
    var saldo = 0;
    var subtotal_saco = 0;
    var subtotal_pantalon = 0;
    var subtotal_ch = 0;
    var subtotal_fa = 0;
    var subtotal_jam = 0;
    var subtotal_cam = 0;
    var subtotal_ext = 0;
    var costo_confeccion_calculado = 0;

    // generamos los tabs
    $('#tabsProductos div .btn').click(function () {

        var t = $(this).attr('id');

        if ($(this).hasClass('inactivo')) { 
			//preguntamos si tiene la clase inactivo 
            $('#tabsProductos div .btn').addClass('inactivo');
            $(this).removeClass('inactivo');

            $('.tabContenido').hide();
            $('#' + t + 'C').fadeIn('slow');
        }

		console.log("este tab ghaber", t);
    });

    $("#saco_pu, #saco_cantidad").keyup(function() {
        calcula_precio_saco();
    });

    function calcula_precio_saco() {
        cantidad_saco = parseFloat($("#saco_cantidad").val());
        precio_saco = parseFloat($("#saco_pu").val());
        subtotal_saco = cantidad_saco * precio_saco;

        costo_confeccion_calculado = parseFloat(subtotal_saco + subtotal_pantalon + subtotal_ch);
        $('#saco_subtotal').val(subtotal_saco);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
    }

    $("#pantalon_pu, #pantalon_cantidad").keyup(function() {
        calcula_precio_pantalon();
    });

    function calcula_precio_pantalon() {
        cantidad_pantalon = parseFloat($("#pantalon_cantidad").val());
        precio_pantalon = parseFloat($("#pantalon_pu").val());
        subtotal_pantalon = cantidad_pantalon * precio_pantalon;

        $('#pantalon_subtotal').val(subtotal_pantalon);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
    }

    $("#ch_pu, #ch_cantidad").keyup(function() {
        calcula_precio_chaleco();
    });

    function calcula_precio_chaleco() {
        cantidad_ch = parseFloat($("#ch_cantidad").val());
        precio_ch = parseFloat($("#ch_pu").val());
        subtotal_ch = cantidad_ch * precio_ch;

        $('#ch_subtotal').val(subtotal_ch);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);

    }

    $("#cam_pu, #cam_cantidad").keyup(function() {
        calcula_precio_camisa();
    });

    function calcula_precio_camisa() {
        cantidad_cam = parseFloat($("#cam_cantidad").val());
        precio_cam = parseFloat($("#cam_pu").val());
        subtotal_cam = cantidad_cam * precio_cam;

        $('#cam_subtotal').val(subtotal_cam);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam);
    }

    $("#ext_pu, #ext_cantidad").keyup(function() {
        calcula_precio_extras();
    });

    function calcula_precio_extras() {
        cantidad_ext = parseFloat($("#ext_cantidad").val());
        precio_ext = parseFloat($("#ext_pu").val());
        subtotal_ext = cantidad_ext * precio_ext;

        $('#ext_subtotal').val(subtotal_ext);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam + subtotal_ext)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam + subtotal_ext);
    }

    $("#fa_pu, #fa_cantidad").keyup(function() {
        calcula_precio_falda();
    });

    function calcula_precio_falda() {
        cantidad_fa = parseFloat($("#fa_cantidad").val());
        precio_fa = parseFloat($("#fa_pu").val());
        subtotal_fa = cantidad_fa * precio_fa;

        $('#fa_subtotal').val(subtotal_fa);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa);
    }

    $("#jam_pu, jam_cantidad").keyup(function() {
        calcula_precio_jumper();
    });

    function calcula_precio_jumper() {
        cantidad_jam = parseFloat($("#jam_cantidad").val());
        precio_jam = parseFloat($("#jam_pu").val());
        subtotal_jam = cantidad_jam * precio_jam;

        $('#jam_subtotal').val(subtotal_jam);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa + subtotal_jam)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa + subtotal_jam);
    }

    $("#costo_confeccion").keyup(function() {
        ccc = parseFloat($("#costo_confeccion_calculado").val());
        cc = parseFloat($("#costo_confeccion").val());

        if (cc < ccc) {
            calculo_rebaja = ccc - cc;
            $('#rebaja').val(calculo_rebaja);
        } else {
            $('#rebaja').val(0);
        }
    });


    // $(".calculo").change(function() {
    $(".calculo").on("change paste keyup", function() {


        costo_tela = parseFloat($("#costo_tela").val());
        costo_confeccion = parseFloat($("#costo_confeccion").val());
        suma = costo_tela + costo_confeccion;

        var obj = document.getElementById('rebaja');
        if(obj.getAttribute("readonly") == null){
            var rebaja = $('#rebaja').val()
            suma = suma - rebaja;
        }

        $("#monto_total").val(suma);

        a_cuenta = parseFloat($("#a_cuenta").val());
        saldo = suma - a_cuenta

        

        $("#saldo").val(saldo);
        // console.log("Costo: "+suma);
        // console.log("Costo de tela: "+costo_tela);
    });

    function cambia_genero() {
        
        var genero = $("#genero").val();
        console.log(genero);
        if (genero == 'Mujer') {
            $("#saco_albusto").show('slow');
            $("#pantalon_cadera").show('slow');
            $("#pd_cpretina").show('slow');
            $("#ch_abusto").show('slow');
            $("#bloque_extras").hide('slow');
            $("#bloque_mujer").show('slow');
            $("#select_bragueta").show('slow');

            // invocamos los contratos para mujer
            // $.ajax({
            //     url: '<?php echo base_url() ?>Contratos/ajaxContratos/Mujer',
            //     type: 'GET',
            //     success: function(data) {
            //         $("#carga_contratos").html(data);
            //     }
            // });

        } else {
            $("#saco_albusto").hide('slow');
            $("#pantalon_cadera").hide('slow');
            $("#pd_cpretina").hide('slow');
            $("#ch_abusto").hide('slow');
            $("#bloque_extras").show('slow');
            $("#bloque_mujer").hide('slow');
            $("#select_bragueta").hide('slow');

            // invocamos los contratos para val
            // $.ajax({
            //     url: '<?php echo base_url() ?>Contratos/ajaxContratos/Varon',
            //     type: 'GET',
            //     success: function(data) {
            //         $("#carga_contratos").html(data);
            //     }
            // });

        }
    }

    $("#nombre").on("change paste keyup", function() {
        $("#datos_cliente_ajax").show('toggle');

        nombre_cliente = $('#nombre').val();

        // console.log(nombre_cliente);
        if (nombre_cliente.length > 2) {
            $.ajax({
                url: '<?php echo base_url() ?>Trabajos/ajax_busca_cliente/' + nombre_cliente,
                type: 'GET',
                success: function(data) {
                    $("#datos_cliente_ajax").html(data);
                }
            });
        }

    });

    function extraer_datos(id_cliente) {

        $("#datos_cliente_ajax").hide('toggle');

        $.ajax({
            url: '<?php echo base_url() ?>Trabajos/ajax_medidas_cliente/' + id_cliente,
            type: 'GET',
            success: function(data) {
                // dv.html(data);
                datos_cliente = JSON.parse(data);
                console.log(datos_cliente);
                // console.log(datos_cliente.cliente.nombre);
                // iw

                $("#cod_cliente").val(datos_cliente.cliente.id);
                $("#nombre").val(datos_cliente.cliente.nombre);
                $("#ci").val(datos_cliente.cliente.ci);
                $("#celulares").val(datos_cliente.cliente.celulares);

                if (datos_cliente.sacos != null) {
                    $("#s_talla").val(datos_cliente.sacos.talla);
                    $("#s_largo").val(datos_cliente.sacos.largo);
                    $("#s_hombro").val(datos_cliente.sacos.hombro);
                    $("#s_espalda").val(datos_cliente.sacos.espalda);
                    $("#s_pecho").val(datos_cliente.sacos.pecho);
                    $("#s_estomago").val(datos_cliente.sacos.estomago);
                    $("#s_mbrazo").val(datos_cliente.sacos.medio_brazo);
                    $("#s_lmanga").val(datos_cliente.sacos.largo_manga);
                    $("#s_abusto").val(datos_cliente.sacos.altura_busto);
                }

                if (datos_cliente.pantalones != null) {
                    $("#p_largo").val(datos_cliente.pantalones.largo);
                    $("#p_entrepierna").val(datos_cliente.pantalones.entre_pierna);
                    $("#p_cintura").val(datos_cliente.pantalones.cintura);
                    $("#p_muslo").val(datos_cliente.pantalones.muslo);
                    $("#p_rodilla").val(datos_cliente.pantalones.rodilla);
                    $("#p_bpie").val(datos_cliente.pantalones.bota_pie);
                    $("#p_tdelantero").val(datos_cliente.pantalones.tiro_delantero);
                    $("#p_tatras").val(datos_cliente.pantalones.tiro_atras);
                    $("#p_cadera").val(datos_cliente.pantalones.cadera);
                }
                if (datos_cliente.chalecos != null) {
                    // console.log('entre a chalecos');
                    $("#ch_largo").val(datos_cliente.chalecos.largo);
                    $("#ch_pecho").val(datos_cliente.chalecos.pecho);
                    $("#ch_estomago").val(datos_cliente.chalecos.estomago);
                    $("#ch_abusto_dato").val(datos_cliente.chalecos.altura_busto);
                    // console.log(datos_cliente.chalecos.altura_busto);
                }
                if (datos_cliente.faldas != null) {
                    $("#fa_largo").val(datos_cliente.faldas.largo);
                    $("#fa_cintura").val(datos_cliente.faldas.cintura);
                    $("#fa_cadera").val(datos_cliente.faldas.cadera);
                    $("#fa_vasta").val(datos_cliente.faldas.vasta);
                }
            }
        });
    }

    // validamos que el cliente no se repita en el contrato
    function valida_cliente_contrato(contrato_id) {
        var cliente_id = $('#cod_cliente').val();
        // console.log('entro');
        if (cliente_id) {
            // alert('entro');
            $.ajax({
                url: '<?php echo base_url() ?>contratos/ajax_valida_cliente/' + cliente_id + '/' + contrato_id,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        $("#contrato_id").val("");
                        swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'El cliente ya esta en el contrato!',
                            // footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                }
            });
        }

    }


    // extrae datos del contrato y setea form
    function extraer_datos_contrato() {
        var grupo_id = $("#grupo_id").val();

        // valida_cliente_contrato(grupo_id);
        // var cliente_id = $("#cod_cliente").val();
        // console.log(grupo_id);  

        $.ajax({
            url: '<?php echo base_url() ?>contratos/ajax_extrae_modelos/' + grupo_id,
            type: 'GET',
            success: function(data) {
                datos_modelos = JSON.parse(data);

				// console.log(datos_modelos);

                // $("#grupo_id").val(datos_modelos.grupo.grupo_id);

                // console.log(datos_modelos.grupo);

                // $("#saco_pu").val(datos_modelos.contrato.costo_saco);
                // $("#pantalon_pu").val(datos_modelos.contrato.costo_pantalon);
                // $("#ch_pu").val(datos_modelos.contrato.costo_chaleco);
                // $("#fa_pu").val(datos_modelos.contrato.costo_falda);
                // calcula_precio_saco();
                // calcula_precio_pantalon();
                // calcula_precio_chaleco();
                // calcula_precio_falda();

                //llenamos datos del trabajo
                // $("#costo_tela").val(datos_modelos.contrato.costo_tela);
                // $("#monto_total").val(datos_modelos.contrato.total);
                // $("#tela_propia").val(datos_modelos.contrato.tela_propia);
                // $("#marca").val(datos_modelos.contrato.marca);
                //fin llenamos datos del trabajo

                if (datos_modelos.sacos != null) {
                    $("#sd_modelo").val(datos_modelos.sacos.modelo_id);
                    $("#sd_botones").val(datos_modelos.sacos.botones);
                    $("#sd_aberturas").val(datos_modelos.sacos.abertura_id);
                    $("#sd_detalle").val(datos_modelos.sacos.detalle_id);
                    $("#sd_color").val(datos_modelos.sacos.color);
                    $("#sd_ojal").val(datos_modelos.sacos.ojal_puno);
                    $("#sd_color_ojal").val(datos_modelos.sacos.color_ojal);
                } else {
                    $("#sd_modelo").val("");
                    $("#sd_botones").val("");
                    $("#sd_aberturas").val("");
                    $("#sd_detalle").val("");
                    $("#sd_color").val("");
                    $("#sd_ojal").val("");
                    $("#sd_color_ojal").val("");
                }

                if (datos_modelos.pantalones != null) {
                    $("#pd_modelo").val(datos_modelos.pantalones.modelo_id);
                    $("#pd_pinzas").val(datos_modelos.pantalones.pinza_id);
                    $("#pd_bragueta").val(datos_modelos.pantalones.bragueta);
                    $("#pd_batras").val(datos_modelos.pantalones.bolsillo_id);
                    $("#pd_bpie").val(datos_modelos.pantalones.bota_pie_des);
                    $("#pd_pretina").val(datos_modelos.pantalones.pretina);
                } else {
                    $("#pd_modelo").val("");
                    $("#pd_botones").val("");
                    $("#pd_bragueta").val("");
                    $("#pd_batras").val("");
                    $("#pd_bpie").val("");
                    $("#pd_pretina").val("");
                }

                if (datos_modelos.chalecos != null) {
                    $("#ch_modelo").val(datos_modelos.chalecos.modelo_id);
                    $("#ch_botones").val(datos_modelos.chalecos.botones);
                    $("#ch_detalle").val(datos_modelos.chalecos.detalle_id);
                    $("#ch_color").val(datos_modelos.chalecos.color_ojales);
                } else {
                    $("#ch_modelo").val("");
                    $("#ch_botones").val("");
                    $("#ch_detalle").val("");
                    $("#ch_color").val("");
                }

                if (datos_modelos.faldas != null) {
                    $("#fa_modelo").val(datos_modelos.faldas.modelo_id);
                    $("#fa_abertura").val(datos_modelos.faldas.abertura_id);
                    $("#fa_pretina").val(datos_modelos.faldas.pretina);
                } else {
                    $("#fa_modelo").val("");
                    $("#fa_abertura").val("");
                    $("#fa_pretina").val("");
                }

            }
        });

    }

    function habilita(){
        // alert('en desarrollo :v');
        if($('#motivo_rebaja').val() == ''){
            suma = parseInt($("#rebaja").val()) + parseInt($("#monto_total").val());
            $("#monto_total").val(suma);

            $("#saldo").val(parseInt($("#monto_total").val()) - parseInt($("#a_cuenta").val()));
            
            $("#rebaja").val(0);
            $("#rebaja").attr("readonly", true); 
        }else{
            $("#rebaja").attr("readonly", false); 
        }
    }

    function copyDateChaleco(dato){

        if(dato.id == 's_largo'){
            $('#ch_largo').val(dato.value);
        }else if(dato.id == 's_pecho'){
            $('#ch_pecho').val(dato.value);
        }else if(dato.id == 's_estomago'){
            $('#ch_estomago').val(dato.value);
        }else{
            $('#ch_abusto_dato').val(dato.value);
        }

    }

    // $("#rebaja").on("change paste keyup", function() {
    //     // $("#raza-modal").val($("#raza_id").val());
    //     console.log($('#rebaja').val());
    //     console.log($('#monto_total').val());
    //     console.log('------------');
    // });

    // fin extrae datos del contrato

	function abreColorCaja(input){
		if (document.getElementById(input.id).checked)
			$('#input_'+input.id).show('toggle');
		else
			$('#input_'+input.id).hide('toggle');
	}

	function modificaModalidadDePago(select){
		if(select.value === "total"){
			// saco
			$('#input_saco_precio_unitario').hide('toggle');
			$('#input_saco_subtotal').hide('toggle');
			// pantalon
			$('#input_pantalon_precio_unitario').hide('toggle');
			$('#input_pantalon_subtotal').hide('toggle');
			// chaleco
			$('#input_chaleco_precio_unitario').hide('toggle');
			$('#input_chaleco_subtotal').hide('toggle');
			// camisa
			$('#input_camisa_precio_unitario').hide('toggle');
			$('#input_camisa_subtotal').hide('toggle');

			// caja de precio
			$('#input_precio_total').show('toggle')
		}else{
			// saco
			$('#input_saco_precio_unitario').show('toggle');
			$('#input_saco_subtotal').show('toggle');
			// pantalon
			$('#input_pantalon_precio_unitario').show('toggle');
			$('#input_pantalon_subtotal').show('toggle');
			// chaleco
			$('#input_chaleco_precio_unitario').show('toggle');
			$('#input_chaleco_subtotal').show('toggle');
			// camisa
			$('#input_camisa_precio_unitario').show('toggle');
			$('#input_camisa_subtotal').show('toggle');

			// caja de precio
			$('#input_precio_total').hide('toggle')
		}
	}

	function pagoParcialTotal(){

		$('#bloque_pago_total').toggle('show');
		let valor = $('#valor_input_verificador').val();

		if(valor === 'no'){
			$('#nombre_boton').text("SI");
			$('#valor_input_verificador').val('si');
			$('#nombre_boton_btn').removeClass('btn-danger');
			$('#nombre_boton_btn').addClass('btn-success');

			// saco
			$('#input_saco_precio_unitario').hide('toggle');
			$('#input_saco_subtotal').hide('toggle');
			// pantalon
			$('#input_pantalon_precio_unitario').hide('toggle');
			$('#input_pantalon_subtotal').hide('toggle');
			// chaleco
			$('#input_chaleco_precio_unitario').hide('toggle');
			$('#input_chaleco_subtotal').hide('toggle');
			// camisa
			$('#input_camisa_precio_unitario').hide('toggle');
			$('#input_camisa_subtotal').hide('toggle');

			// seteamos el apo del valor total a 0
			$('#modalidad_pago').val(0)
		}
		else{
			$('#nombre_boton').text("NO");
			$('#valor_input_verificador').val('no');
			$('#nombre_boton_btn').removeClass('btn-success');
			$('#nombre_boton_btn').addClass('btn-danger');

			// saco
			$('#input_saco_precio_unitario').show('toggle');
			$('#input_saco_subtotal').show('toggle');
			// pantalon
			$('#input_pantalon_precio_unitario').show('toggle');
			$('#input_pantalon_subtotal').show('toggle');
			// chaleco
			$('#input_chaleco_precio_unitario').show('toggle');
			$('#input_chaleco_subtotal').show('toggle');
			// camisa
			$('#input_camisa_precio_unitario').show('toggle');
			$('#input_camisa_subtotal').show('toggle');
		}
	}
	
</script>
<script src="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
