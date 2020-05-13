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
						<h4 class="mb-0 text-white">SUELDOS</h4>
					</div>
					<div class="card-body">

						<div class="row">

							<div class="col-md-6">
								<div class="card card-outline-primary">
									<div class="card-header">
										<h4 class="mb-0 text-white">CONSULTA SUELDOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
										<form>
											
										<!-- <?php echo form_open('Control_Asistencia/consulta') ?> -->

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Mes Correspondiente</label>
													<input name="fecha_consulta" type="date" id="fecha_consulta" class="form-control" required>
												</div>
											</div>


											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">&nbsp;</label>
													<button type="button" onclick="verifica()" class="btn waves-effect waves-light btn-block btn-success">GENERAR</button>
												</div>
											</div>

										</div>

										</form>
										<hr>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="card card-outline-success">
									<div class="card-header">
										<h4 class="mb-0 text-white">GENERAR SUELDOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">

										<!-- <?php echo form_open('reportes/ingresos_gastos') ?> -->
										<form>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mes corresponiente</label>
														<input name="fecha_genera" type="date" id="fecha_genera" class="form-control" required>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">&nbsp;</label>
														<button type="button" onclick="verifica_genera()" class="btn waves-effect waves-light btn-block btn-success">GENERAR</button>
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
<script>
	function verifica(){
		var fecha = $('#fecha_consulta').val();
		if (fecha == '') {
			Swal.fire({
				      type: 'error',
				      title: 'Oops...',
				      text: 'No ingreso ninguna fecha'
				    })
		} else {
			$.ajax({
	                url: '<?php echo base_url(); ?>Control_Asistencia/verifica_fecha/',
	                type: 'get',
	                dataType: 'json',
	                data: {param1: fecha},
	                success:function(data, textStatus, jqXHR) {
	                    if (data.estado == 'Si') {
	                        window.location.href = "<?php echo base_url() ?>Control_Asistencia/consulta/"+fecha;
	                    } else {
	                    	Swal.fire({
						      type: 'error',
						      title: 'Oops...',
						      text: 'No existe el registrado de fecha '+ fecha
						    })
	                    }
	                },
	                error:function(jqXHR, textStatus, errorThrown) {
	                    alerta_ci();
	                }
	            });
		}
	}

	function verifica_genera(){
		var fecha = $('#fecha_genera').val();
		if (fecha == '') {
			Swal.fire({
				      type: 'error',
				      title: 'Oops...',
				      text: 'No ingreso ninguna fecha'
				    })
		} else {
			$.ajax({
	                url: '<?php echo base_url(); ?>Control_Asistencia/verifica_genera/',
	                type: 'get',
	                dataType: 'json',
	                data: {param1: fecha},
	                success:function(data, textStatus, jqXHR) {
	                    if (data.estado == 'No') {
	                        window.location.href = "<?php echo base_url() ?>Control_Asistencia/lista_pagos/"+fecha;
	                    } else {
	                    	Swal.fire({
						      type: 'error',
						      title: 'Oops...',
						      text: 'Ya existe el registrado de fecha '+ fecha
						    })
	                    }
	                },
	                error:function(jqXHR, textStatus, errorThrown) {
	                    alerta_ci();
	                }
	            });
		}
	}
</script>