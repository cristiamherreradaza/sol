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

			<div class="col-lg-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="mb-0 text-white">REPORTES DE TRABAJO</h4>
					</div>
					<div class="card-body">

						<div class="row">

							<div class="col-md-12">
								<div class="card card-outline-primary">
									<div class="card-header">
										<h4 class="mb-0 text-white">TRABAJOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
										<?php 
                                        $atributos = array('id'=>'form_trabajos');
										echo form_open('reportes/genera_ingresos',$atributos) 
										?>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Inicio</label>
													<input name="fecha_inicio" type="date" id="fecha_inicio" class="form-control" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Fin</label>
													<input name="fecha_fin" type="date" id="fecha_fin" class="form-control" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">&nbsp;</label>
													<button type="submit" class="btn waves-effect waves-light btn-block btn-success">GENERAR</button>
												</div>
											</div>

										</div>

										</form>
										<hr>
										<div class="row">
											<div class="col-md-12">
												<!-- <a href="<?php echo base_url() ?>reportes/reporte_deudas"> -->
													<button type="button" class="btn waves-effect waves-light btn-block btn-dark" onclick="GeneraDeudas()">GENERA DEUDAS</button>
												<!-- </a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="row">
							<div class="col-md-6">
								<button type="submit" class="btn waves-effect waves-light btn-block btn-success">Guardar Trabajo</button>
							</div>
							<div class="col-md-6">
								<button type="button" class="btn waves-effect waves-light btn-block btn-inverse">Cancelar</button>
							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function GeneraDeudas(){
		if($('#form_trabajos')[0].checkValidity()){
			var fecha_ini = $('#fecha_inicio').val();
			var fecha_fin = $('#fecha_fin').val();

			window.location.href = "<?php echo base_url() ?>reportes/reporte_deudas/"+fecha_ini+"/"+fecha_fin;

		}else{
			$('#form_trabajos')[0].reportValidity()
		}
	}
</script>