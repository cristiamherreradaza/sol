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
								<div class="card card-outline-success">
									<div class="card-header">
										<h4 class="mb-0 text-white">INGRESOS - GASTOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
                                    <?php
                                        $atributos = array('id'=>'formulariocaja_chica');
                                        echo form_open('#', $atributos); 
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
                                                        <button type="button" class="btn waves-effect waves-light btn-block btn-success" onclick="buscaCajaChica()">GENERAR</button>
                                                    </div>
                                                </div>
                                            </div>
										</form>
										<hr>
										<div class="row">
											<div class="col-md-12">
                                                <div id="ingresos-gastos">

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
	</div>
</div>
<script>
    function buscaCajaChica(){
        if($('#formulariocaja_chica')[0].checkValidity()){
			// $('#formulario-abertura').submit();
            // Swal.fire("Excelente!", "Registro Guardado!", "success");
            var fecha_ini = $('#fecha_inicio').val();
            var fecha_fin = $('#fecha_fin').val();

            $.ajax({
                url: '<?php echo base_url(); ?>reportes/ajax_listado_caja_chica',
                type: 'get',
                
                data: {
                    fecha_ini: fecha_ini, 
                    fecha_fin: fecha_fin, 
                        
                },
                success:function(data) {
                    $('#ingresos-gastos').html(data);
                },
                // error:function(jqXHR, textStatus, errorThrown) {
                //     alerta_ci();
                // }
            });

        }else{
            $('#formulariocaja_chica')[0].reportValidity()
        }
    }

    function reporteCajaChica(){
        
        var fecha_ini = $('#fecha_inicio').val();
        var fecha_fin = $('#fecha_fin').val();

        var url = "<?php echo base_url() ?>/reportes/reporteCajaChica/"+fecha_ini+"/"+fecha_fin;

        // abrir un PDF en una pestaña nueva
        window.open(url, '_blank');
    }

</script>