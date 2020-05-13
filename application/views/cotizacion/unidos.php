<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
<link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

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
			<div class="col-12">
				<!-- table responsive -->
				<div class="card">
                    <div class="card-body">
                    	<?php echo form_open('Cotizacion/guarda', array('method'=>'POST')); ?>
                    	<h2 class="modal-title" id="myModalLabel">COTIZACI&Oacute;N CONFECCI&Oacute;N Y TELA</h2>
                    		<!-- <form class="form"> -->
                                    <div class="form-group mt-5 row">
                                        <label for="example-text-input" class="col-form-label" >A Nombre de:</label>
                                        <div class="col-6">
                                            <input class="form-control" type="text" id="nombre" required name="nombre">
                                        </div>
                                    </div>
                        <h3 class="modal-title" id="myModalLabel">Confecci&oacute;n y tela para Var&oacute;n</h3>
                        <div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>Cantidad</th>
										<th>Prendas</th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id1" name="id1"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
				                        </th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id2" name="id2"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id3" name="id3"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2</td>
										<td>Saco y Pantalon</td>
										<td><input type="text" required id="pre_1" name="pre_1"> Bs.</td>
										<td><input type="text" required id="pre_2" name="pre_2"> Bs.</td>
										<td><input type="text" required id="pre_3" name="pre_3"> Bs.</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Saco, Pantalon y Chaleco</td>
										<td><input type="text" required id="pre_4" name="pre_4"> Bs.</td>
										<td><input type="text" required id="pre_5" name="pre_5"> Bs.</td>
										<td><input type="text" required id="pre_6" name="pre_6"> Bs.</td>
									</tr>
								</tbody>
							</table>
						</div>

						<h3 class="modal-title" id="myModalLabel">Confecci&oacute;n y tela para Dama</h3>
                        <div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>Cantidad</th>
										<th>Prendas</th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id4" name="id4" />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option data-nombre1="<?php echo $te->nombre; ?>" value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
				                        </th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id5" name="id5"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</th>
										<th>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id6" name="id6"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2</td>
										<td>Saco y Pantalon</td>
										<td><input type="text" required id="pre_7" name="pre_7"> Bs.</td>
										<td><input type="text" required id="pre_8" name="pre_8"> Bs.</td>
										<td><input type="text" required id="pre_9" name="pre_9"> Bs.</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Saco, Pantalon y Falda</td>
										<td><input type="text" required id="prec_1" name="prec_1"> Bs.</td>
										<td><input type="text" required id="prec_2" name="prec_2"> Bs.</td>
										<td><input type="text" required id="prec_3" name="prec_3"> Bs.</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
                            <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GENERAR COTIZACION</button>
                        </div>

						</form>

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
	<footer class="footer"> 2020 desarrollado por GoGhu </footer>
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script>
     $('#id1').on('change', function(e){
        var id = e.target.value;
        $('#id4').val(id);
        });

     $('#id2').on('change', function(e){
        var id = e.target.value;
        $('#id5').val(id);
        });

     $('#id3').on('change', function(e){
        var id = e.target.value;
        $('#id6').val(id);
        });
</script>
<script>
     function guarda()
	{
		var nombre = $('#nombre').val();
		var id1 = $('#id1').val();
		var id2 = $('#id2').val();
		var id3 = $('#id3').val();
		var pre_1 = $('#pre_1').val();
		var pre_2 = $('#pre_2').val();
		var pre_3 = $('#pre_3').val();
		var pre_4 = $('#pre_4').val();
		var pre_5 = $('#pre_5').val();
		var pre_6 = $('#pre_6').val();
		var id4 = $('#id4').val();
		var id5 = $('#id5').val();
		var id6 = $('#id6').val();
		var pre_7 = $('#pre_7').val();
		var pre_8 = $('#pre_8').val();
		var pre_9 = $('#pre_9').val();
		var prec_1 = $('#prec_1').val();
		var prec_2 = $('#prec_2').val();
		var prec_3 = $('#prec_3').val();
		
	}
</script>