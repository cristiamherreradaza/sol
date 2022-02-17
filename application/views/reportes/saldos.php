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
						<h4 class="mb-0 text-white">REPORTES DE SALDOS</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-outline-success">
									<div class="card-header">
										<h4 class="mb-0 text-white">SALDOS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
                                    <?php
                                        $atributos = array('id'=>'formulariocaja_chica');
                                        echo form_open('#', $atributos); 
                                    ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Hasta la fecha</label>
                                                        <input name="fecha_inicio" type="date" id="fecha_inicio" class="form-control" value="<?=date('Y-m-d')?>"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label>
                                                        <button type="button" class="btn btn-block btn-success" onclick="buscaCajaChica()">GENERAR</button>
                                                    </div>
                                                </div>
                                            </div>
										</form>
										<hr>
										<div class="row">
											<div class="col-md-12">
                                                <div id="saldos">

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
            
            var fecha_ini = $('#fecha_inicio').val();

            $.ajax({
                url: '<?php echo base_url(); ?>reportes/ajax_saldos',
                type: 'get',
                data: {
                    fecha_ini: fecha_ini,
                },
                success:function(data) {
                    $('#saldos').html(data);
                },
                // error:function(jqXHR, textStatus, errorThrown) {
                //     alerta_ci();
                // }
            });

        }else{
            $('#formulariocaja_chica')[0].reportValidity()
        }
    }

    function reporteProductoPdf(){
        
        var fecha_inig = $('#fecha_inicio').val();
        var fecha_fing = $('#fecha_fin').val();
        var almaceng   = $('#almacen').val();
        var tipog      = $('#tipo').val();

        var url = "<?php echo base_url() ?>/reportes/reporteProductoPdf/"+fecha_inig+"/"+fecha_fing+"/"+almaceng+"/"+tipog;

        // abrir un PDF en una pestaña nueva
        window.open(url, '_blank');
    }

</script>