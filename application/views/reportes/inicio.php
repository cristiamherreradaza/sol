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

							<div class="col-md-6">
								<div class="card card-outline-primary">
									<div class="card-header">
										<h4 class="mb-0 text-white">INGRESOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
										<?php echo form_open('reportes/genera_ingresos') ?>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Inicio</label>
													<input name="fecha_inicio" type="date" id="fecha_inicio" class="form-control" min="0"
														step="any">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Fin</label>
													<input name="fecha_fin" type="date" id="fecha_fin" class="form-control" min="0" step="any">
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
												<button type="submit" class="btn waves-effect waves-light btn-block btn-dark">GENERA DEUDAS</button>
											</div>


											 <select id="selectCountry">
													<option value="usa">USA</option>
													<option value="uk">UK</option>
													<option value="bm">Bermuda</option>
													<option value="swedish">Sweden</option>
												</select>
												<pre id="output"></pre>
												<script type="text/javascript"> </script>
											
										</div>
									</div>
								</div>
							</div>

			                <!-- <div class="col-md-6">
								<div class="card card-outline-primary">
									<div class="card-header">
										<h4 class="mb-0 text-white">INGRESOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
										<?php //echo form_open('reportes/genera_ingresos') ?>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Inicio</label>
													<input name="fecha_inicio" type="date" id="fecha_inicio" class="form-control" min="0"
														step="any">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Fin</label>
													<input name="fecha_fin" type="date" id="fecha_fin" class="form-control" min="0" step="any">
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
									</div>
								</div>
							</div> -->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$("#selectCountry").change(function (e) {
	$("#output").html("Loading...");
	var country = $("#selectCountry").val();
	var calendarUrl = 'https://www.googleapis.com/calendar/v3/calendars/en.' + country + '%23holiday%40group.v.calendar.google.com/events?key=AIzaSyDBgV5Zaou2iKcm-gAhbLClUfUHJ-jJF4s';
	$.getJSON(calendarUrl).success(function (data) {
		console.log(data);
		$("#output").empty();
		for (item in data.items) {
			$("#output").append("<hr><h3>" + data.items[item].summary + "<h3>" + "<h4>" + data.items[item].start.date + "<h4>");
		}
	}).error(function (error) {
		$("#output").html("An error occurnetworking.");
	})
});
$("#selectCountry").trigger("change");
</script>