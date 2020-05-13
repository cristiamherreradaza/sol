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
						<h4 class="mb-0 text-white">REPORTES</h4>
					</div>
					<div class="card-body">

						<div class="row">

							<div class="col-md-6">
								<div class="card card-outline-success">
									<div class="card-header">
										<h4 class="mb-0 text-white">CENTRALIZADO</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
										<?php echo form_open('Reportes/centralizado') ?>

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
</div>