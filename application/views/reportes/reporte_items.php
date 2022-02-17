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
						<h4 class="mb-0 text-white">REPORTES DE PRODUCTOS</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-outline-success">
									<div class="card-header">
										<h4 class="mb-0 text-white">ITEMS</h4>
									</div>
									<div class="card-body" style="background-color: #e6f2ff;">
                                    <?php
                                        $atributos = array('id'=>'formulariocaja_chica');
                                        echo form_open('#', $atributos); 
                                    ?>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Inicio</label>
                                                        <input name="fecha_inicio" type="date" id="fecha_inicio" class="form-control" value="<?=date('Y-m-d')?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha Fin</label>
                                                        <input name="fecha_fin" type="date" id="fecha_fin" class="form-control" value="<?=date('Y-m-d')?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Almacen</label>
                                                        <select name="almacen" id="almacen" class="form-control">
                                                            <option value="todos">Todos</option>
                                                            <?php
                                                                foreach($almacenes as $al){
                                                                ?>
                                                                <option value="<?=$al->id?>"><?=$al->nombre?></option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipos</label>
                                                        <select name="tipo" id="tipo" class="form-control">
                                                            <option value="ingreso">Ingreso</option>
                                                            <option value="salida">Salida</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
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
                                                <div id="ingresos-productos">

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
            var fecha_fin = $('#fecha_fin').val();
            var almacen   = $('#almacen').val();
            var tipo      = $('#tipo').val();

            $.ajax({
                url: '<?php echo base_url(); ?>reportes/ajax_items',
                type: 'get',
                data: {
                    fecha_ini: fecha_ini, 
                    fecha_fin: fecha_fin, 
                    almacen  : almacen,
                    tipo     : tipo      
                },
                success:function(data) {
                    $('#ingresos-productos').html(data);
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