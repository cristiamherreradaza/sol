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

        	<?php echo form_open('contratos/guarda'); ?>
        	<div class="col-lg-12">
        		<div class="card card-outline-info">
        			<div class="card-header">
        				<h4 class="mb-0 text-white">NUEVO CONTRATO</h4>
        			</div>
        			<?php //vdebug($this->session->nombre, false, false, true); 
                    ?>
        			<div class="card-body">

        				<div class="form-body">

        					<div class="modal-body">

        						<div class="row">
        							<div class="col-md-3">
        								<div class="form-group">
        									<label class="control-label">Nombre</label>
        									<input name="nombre" type="text" id="busca_grupo" class="form-control"
        										required autocomplete="off">
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Direccion</label>
        									<input name="direccion" type="text" id="direccion" class="form-control">
        								</div>
        							</div>

        							<div class="col-md-5">
        								<div class="form-group">
        									<label class="control-label">Descripcion</label>
        									<input name="descripcion" type="text" id="descripcion" class="form-control">
        								</div>
        							</div>
                                </div>

                                <div class="row">

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Celulares</label>
        									<input name="celulares" type="text" id="celulares" class="form-control">
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Fecha</label>
        									<input name="fecha" type="date" id="fecha" class="form-control"
        										value="<?php echo date('Y-m-d') ?>">
        								</div>
        							</div>

        							<div class="col-md-4">
        								<div class="form-group">
        									<label class="control-label">Cantidad Personas</label>
        									<input name="cantidad" type="text" id="cantidad" class="form-control"
        										required>
        								</div>
        							</div>

        						</div>

        						<div class="row">
        							<div class="col-md-12">
        								<div id="muestra_grupos_ajax"></div>
        							</div>
        						</div>

        						<div class="row" style="background-color: #C3E6FF;">

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Varones</label>
        									<input name="cantidad_varones" type="number" id="cantidad_varones"
        										class="form-control" min="0" step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Saco</label>
        									<input name="costo_saco_varon" onblur="sumaVarones();" type="number"
        										id="costo_saco_varon" class="form-control varones" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Pantalon</label>
        									<input name="costo_pantalon_varon" onblur="sumaVarones();" type="number"
        										id="costo_pantalon_varon" class="form-control varones" min="0"
        										step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Chaleco</label>
        									<input name="costo_chaleco_varon" onblur="sumaVarones();" type="number"
        										id="costo_chaleco_varon" class="form-control varones" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"></label>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">$. Conf.</label>
        									<input name="costo_confeccion_varon" type="text" id="costo_confeccion_varon"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Tela</label>
        									<select name="tela_propia" class="form-control custom-select">
        										<option value="NO">Sin Tela</option>
        										<option value="SI">Con Tela</option>
        									</select>
        								</div>
        							</div>

        							<div class="col-md-2">
        								<div class="form-group">
        									<label class="control-label">Marca</label>
        									<input type="text" name="marca" id="marca" class="form-control">
        								</div>
        							</div>


        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Precio Tela</label>
        									<input name="costo_tela" type="number" id="costo_tela" class="form-control"
        										min="0" step="any">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Costo Total</label>
        									<input name="total" type="number" id="total" class="form-control calculo"
        										min="0" step="any" readonly>
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Subtotal</label>
        									<input name="subtotal_varones" type="text" id="subtotal_varones"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

        						</div>

        						<div class="row" style="background-color: #FFC3C3;">

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Mujeres</label>
        									<input name="cantidad_mujeres" type="number" id="cantidad_mujeres"
        										class="form-control calculo" min="0" step="any" value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Saco</label>
        									<input name="costo_saco_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_saco_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Pantalon</label>
        									<input name="costo_pantalon_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_pantalon_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Chaleco</label>
        									<input name="costo_chaleco_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_chaleco_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Falda</label>
        									<input name="costo_falda_mujer" onblur="sumaMujeres();" type="number"
        										id="costo_falda_mujer" class="form-control mujer" min="0" step="any"
        										value="0">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label"><i class="mdi mdi-coin"></i> Conf.</label>
        									<input name="costo_confeccion_mujer" type="text" id="costo_confeccion_mujer"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

                                    <div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Tela</label>
        									<select name="tela_propia" class="form-control custom-select">
        										<option value="NO">Sin Tela</option>
        										<option value="SI">Con Tela</option>
        									</select>
        								</div>
        							</div>

        							<div class="col-md-2">
        								<div class="form-group">
        									<label class="control-label">Marca</label>
        									<input type="text" name="marca" id="marca" class="form-control">
        								</div>
        							</div>


        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Precio Tela</label>
        									<input name="costo_tela" type="number" id="costo_tela" class="form-control"
        										min="0" step="any">
        								</div>
        							</div>

        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Costo Total</label>
        									<input name="total" type="number" id="total" class="form-control calculo"
        										min="0" step="any" readonly>
        								</div>
        							</div>


        							<div class="col-md-1">
        								<div class="form-group">
        									<label class="control-label">Subtotal</label>
        									<input name="subtotal_mujeres" type="text" id="subtotal_mujeres"
        										class="form-control" min="0" step="any" readonly>
        								</div>
        							</div>

        						</div>

        					</div>

        				</div>

        				<div class="row">
        					<div class="col-md-6">
        						<button type="submit" class="btn waves-effect waves-light btn-block btn-success">Guardar
        							Trabajo</button>
        					</div>
        					<div class="col-md-6">
        						<a href="<?php echo base_url() ?>trabajos/listado_trabajos">
        							<button type="button"
        								class="btn waves-effect waves-light btn-block btn-inverse">Cancelar</button>
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
<script type="text/javascript"></script>
<script src="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>