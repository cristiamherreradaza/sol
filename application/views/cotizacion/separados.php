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
                    	<?php echo form_open('Cotizacion/guarda_separado', array('method'=>'POST')); ?>
                    	<h2 class="modal-title" id="myModalLabel">COTIZACI&Oacute;N, CONFECCI&Oacute;N Y TELA POR SEPARADO</h2>
                    		<!-- <form class="form"> -->
                                    <div class="form-group mt-5 row">
                                        <label for="example-text-input" class="col-form-label" >A Nombre de:</label>
                                        <div class="col-6">
                                            <input class="form-control" type="text" id="nombre" required name="nombre">
											<input type="text" name="nuevo-edita" value="0">
                                        </div>
                                    </div>
                        <h3 class="modal-title" id="myModalLabel">Confecci&oacute;n para Var&oacute;n</h3>
                        <div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>Cantidad</th>
										<th>Prendas</th>
										<th>Costo Real</th>
										<th>Costo por Mayor</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2 Piezas</td>
										<td>Saco y Pantalon</td>
										<td><input class="form-control"  type="text" required id="costo_real_v_1" name="costo_real_v_1"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_v_1" name="costo_mayor_v_1"> Bs.</td>
									</tr>
									<tr>
										<td>3 Piezas</td>
										<td>Saco, Pantalon y Chaleco</td>
										<td><input class="form-control"  type="text" required id="costo_real_v_2" name="costo_real_v_2"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_v_2" name="costo_mayor_v_2"> Bs.</td>
									</tr>
									<tr>
										<td>1 Pieza</td>
										<td>Camisa y Corbata</td>
										<td><input class="form-control"  type="text" required id="costo_real_v_3" name="costo_real_v_3"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_v_3" name="costo_mayor_v_3"> Bs.</td>
									</tr>
								</tbody>
							</table>
						</div>

						<h3 class="modal-title" id="myModalLabel">Confecci&oacute;n para Dama</h3>
                        <div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>Cantidad</th>
										<th>Prendas</th>
										<th>Costo Real</th>
										<th>Costo por Mayor</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2 Piezas</td>
										<td>Saco y Pantalon</td>
										<td><input class="form-control"  type="text" required id="costo_real_m_1" name="costo_real_m_1"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_m_1" name="costo_mayor_m_1"> Bs.</td>
									</tr>
									<tr>
										<td>3 Piezas</td>
										<td>Saco, Pantalon y Falda</td>
										<td><input class="form-control"  type="text" required id="costo_real_m_2" name="costo_real_m_2"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_m_2" name="costo_mayor_m_2"> Bs.</td>
									</tr>
									<tr>
										<td>1 Pieza</td>
										<td>Chaleco</td>
										<td><input class="form-control"  type="text" required id="costo_real_m_3" name="costo_real_m_3"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_m_3" name="costo_mayor_m_3"> Bs.</td>
									</tr>
									<tr>
										<td>1 Pieza</td>
										<td>Blusa</td>
										<td><input class="form-control"  type="text" required id="costo_real_m_4" name="costo_real_m_4"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_m_4" name="costo_mayor_m_4"> Bs.</td>
									</tr>
								</tbody>
							</table>
						</div>
						<h3 class="modal-title" id="myModalLabel">Telas</h3>
                        <div class="table-responsive m-t-40">
							<table id="config-table" class="table display table-bordered table-striped no-wrap">
								<thead>
									<tr>
										<th>Metros</th>
										<th>Marca</th>
										<th>Precio Real por Metro</th>
										<th>Precio por Mayor el Metro</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1 Metro</td>
										<td>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_1" name="id_tela_1"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</td>
										<td><input class="form-control"  type="text" required id="costo_real_tela_1" name="costo_real_tela_1"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_tela_1" name="costo_mayor_tela_1"> Bs.</td>
									</tr>
									<tr>
										<td>1 Metro</td>
										<td>
										<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_2" name="id_tela_2"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.  </option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
				                        </td>
										<td><input class="form-control"  type="text" required id="costo_real_tela_2" name="costo_real_tela_2"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_tela_2" name="costo_mayor_tela_2"> Bs.</td>
									</tr>
									<tr>
										<td>1 Metro</td>
										<td>
											<div class="col-md-10 mb-3">
				                                    <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_3" name="id_tela_3"  />
				                                        <option>Seleccionar una Tela</option>
				                                    <?php foreach($telas as $te){ ?>
				                                        <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
				                                    <?php } ?>
				                                    </select>   
				                                <div class="invalid-feedback">
				                                    Please provide a valid city.
				                                </div>
				                            </div>
										</td>
										<td><input class="form-control"  type="text" required id="costo_real_tela_3" name="costo_real_tela_3"> Bs.</td>
										<td><input class="form-control"  type="text" required id="costo_mayor_tela_3" name="costo_mayor_tela_3"> Bs.</td>
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
	$('#id_tela_1').on('change', function(e){
        var id = $('#precio_tela_1').data("precio1");
        console.log(id);
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