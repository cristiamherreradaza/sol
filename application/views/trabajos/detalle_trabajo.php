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
                <div class="col-md-12">
                    <div class="card card-body printableArea">
                        <center><h1><b>TRABAJO <span class="text-info"># <?php echo $trabajo['id']; ?></span></b></h1></center>
                        <?php //vdebug($trabajo, false, false, true); ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <address>
                                        <h3>Cliente: <b class="text-info"> <?php echo $trabajo['nombre'] ?></b></h3>
                                        <h3>Carnet: <b class="text-info"> <?php echo $trabajo['ci'] ?></b></h3>
                                        <h3>Celulares: <b class="text-info"> <?php echo $trabajo['celulares'] ?></b></h3>
                                        <h3>Trabajo entregado: <b class="text-danger"> <?php echo $trabajo['entregado'] ?></b></h3>
                                    </address>
                                </div>
                                <div class="float-right text-right">
                                    <address>
                                        <h4 class="font-bold">Entrega: <?php echo fechaEs($trabajo['fecha_entrega']); ?></h4>
                                        <p class="mt-4"><b>Prueba :</b> <?php echo fechaEs($trabajo['fecha_prueba']); ?></p>
                                        <p><b>Registro :</b> <?php echo fechaEs($trabajo['fecha']); ?></p>
                                    </address>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="table-responsive" style="clear: both;">
                                            <?php if (!empty($saco)): ?>
                                                <div class="card card-outline-info">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">MEDIDAS SACO</h4>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Talle</th>
                                                            <th>Largo</th>
                                                            <th>Hombro</th>
                                                            <th>Espalda</th>
                                                            <th>Pecho</th>
                                                            <?php if ($saco['altura_busto'] != 0): ?>
                                                                <th>Altura Busto</th>
                                                            <?php endif ?>
                                                            <th>Estomago</th>
                                                            <th>Medio Brazo</th>
                                                            <th>Largo Maga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $saco['talla']; ?></td>
                                                            <td><?php echo $saco['largo']; ?></td>
                                                            <td><?php echo $saco['hombro']; ?></td>
                                                            <td><?php echo $saco['espalda']; ?></td>
                                                            <td><?php echo $saco['pecho']; ?></td>
                                                            <?php if ($saco['altura_busto'] != 0): ?>
                                                                <td><?php echo $saco['altura_busto']; ?></td>
                                                            <?php endif ?>
                                                            <td><?php echo $saco['estomago']; ?></td>
                                                            <td><?php echo $saco['medio_brazo']; ?></td>
                                                            <td><?php echo $saco['largo_manga']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon)): ?>
                                                <div class="card card-outline-success">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">MEDIDAS PANTALON</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Largo</th>
                                                            <th>Entrepierna</th>
                                                            <th>Cintura</th>
                                                            <?php if ($pantalon['cadera'] != 0): ?>
                                                                <th>Cadera</th>
                                                            <?php endif ?>
                                                            <th>Muslo</th>
                                                            <th>Rodilla</th>
                                                            <th>Bota pie</th>
                                                            <th>Tiro delantero</th>
                                                            <th>Tiro atras</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $pantalon['largo']; ?></td>
                                                            <td><?php echo $pantalon['entre_pierna']; ?></td>
                                                            <td><?php echo $pantalon['cintura']; ?></td>
                                                            <?php if ($pantalon['cadera'] != 0): ?>
                                                                <td><?php echo $pantalon['cadera']; ?></td>
                                                            <?php endif ?>
                                                            <td><?php echo $pantalon['muslo']; ?></td>
                                                            <td><?php echo $pantalon['rodilla']; ?></td>
                                                            <td><?php echo $pantalon['bota_pie']; ?></td>
                                                            <td><?php echo $pantalon['tiro_delantero']; ?></td>
                                                            <td><?php echo $pantalon['tiro_atras']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco)): ?>                                            
                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="mb-0 text-white">MEDIDAS CHALECO</h4>
                                                </div>
                                            </div>

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Largo</th>
                                                        <th>Pecho</th>
                                                        <th>Estomago</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $chaleco['largo']; ?></td>
                                                        <td><?php echo $chaleco['pecho']; ?></td>
                                                        <td><?php echo $chaleco['estomago']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php endif ?>
                                            
                                            <?php if (!empty($falda)): ?>                                            
                                            <?php //vdebug($falda, false, false, true); ?>
                                            <div class="card card-outline-warning">
                                                <div class="card-header">
                                                    <h4 class="mb-0 text-white">MEDIDAS FALDA</h4>
                                                </div>
                                            </div>

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Largo</th>
                                                        <th>Cintura</th>
                                                        <th>Cadera</th>
                                                        <th>Vasta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $falda['largo']; ?></td>
                                                        <td><?php echo $falda['cintura']; ?></td>
                                                        <td><?php echo $falda['cadera']; ?></td>
                                                        <td><?php echo $falda['vasta']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php endif ?>

                                            <?php if (!empty($jumper)): ?>                                            
                                            <?php //vdebug($jumper, false, false, true); ?>
                                            <div class="card card-outline-warning">
                                                <div class="card-header">
                                                    <h4 class="mb-0 text-white">MEDIDAS JUMPER</h4>
                                                </div>
                                            </div>

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Talle</th>
                                                        <th>Largo</th>
                                                        <th>Cintura</th>
                                                        <th>Cadera</th>
                                                        <th>Pecho</th>
                                                        <th>Estomago</th>
                                                        <th>Altura Busto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $jumper['talle']; ?></td>
                                                        <td><?php echo $jumper['largo']; ?></td>
                                                        <td><?php echo $jumper['cintura']; ?></td>
                                                        <td><?php echo $jumper['cadera']; ?></td>
                                                        <td><?php echo $jumper['pecho']; ?></td>
                                                        <td><?php echo $jumper['estomago']; ?></td>
                                                        <td><?php echo $jumper['altura_busto']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php endif ?>

                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                    <?php if (!empty($saco['modelo_nombre'])): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-info">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES SACO</h4>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-info">Modelo</td>
                                                            <td class="text-right"><?php echo $saco['modelo_nombre']; ?> </td>
                                                            <td class="text-info">Botones</td>
                                                            <td class="text-right"><?php echo $saco['botones']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Aberturas</td>
                                                            <td class="text-right"><?php echo $saco['nombre_abertura']; ?></td>
                                                            <td class="text-info">Detalle</td>
                                                            <td class="text-right"><?php echo $saco['detalle_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Color</td>
                                                            <td class="text-right"><?php echo $saco['color']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Ojal</td>
                                                            <td class="text-right"><?php echo $saco['ojal_puno']; ?></td>
                                                            <td class="text-info">Color Ojal</td>
                                                            <td class="text-right"><?php echo $saco['color_ojal']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <?php if (!empty($pantalon['modelo_nombre'])): ?>
                                        <div class="col-md-6">

                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-success">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES PANTALON</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-success">Modelo</td>
                                                            <td class="text-right"><?php echo $pantalon['modelo_nombre']; ?> </td>
                                                            <td class="text-success">PInzas</td>
                                                            <td class="text-right"><?php echo $pantalon['pinzas_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success">Bragueta</td>
                                                            <td class="text-right"><?php echo $pantalon['bragueta']; ?></td>
                                                            <td class="text-success">Bolsillo atras</td>
                                                            <td class="text-right"><?php echo $pantalon['bolsillo_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success">Bota pie</td>
                                                            <td class="text-right"><?php echo $pantalon['bota_pie_des']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>


                                <div class="row">
                                    <?php if (!empty($chaleco['modelo_nombre'])): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-primary">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES CHALECO</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-primary">Modelo</td>
                                                            <td class="text-right"><?php echo $chaleco['modelo_nombre']; ?> </td>
                                                            <td class="text-primary">Botones</td>
                                                            <td class="text-right"><?php echo $chaleco['botones']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-primary">Detalle</td>
                                                            <td class="text-right"><?php echo $chaleco['detalle_nombre']; ?></td>
                                                            <td class="text-primary">Color ojales</td>
                                                            <td class="text-right"><?php echo $chaleco['color_ojales']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <?php if (!empty($camisa)): ?>
                                        <div class="col-md-6">

                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-inverse">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES CAMISA</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Cuello</td>
                                                            <td class="text-right"><?php echo $camisa['cuello']; ?> </td>
                                                            <td>Largo Manga</td>
                                                            <td class="text-right"><?php echo $camisa['largo_manga']; ?></td>
                                                            <td>Color</td>
                                                            <td class="text-right"><?php echo $camisa['color']; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cuello combinado</td>
                                                            <td class="text-right"><?php echo $camisa['cuello_combinado']; ?></td>
                                                            <td>Cantidad</td>
                                                            <td class="text-right"><?php echo $camisa['cantidad']; ?> </td>
                                                            <td>Modelo cuello</td>
                                                            <td class="text-right"><?php echo $camisa['modelo_cuello']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="row">
                                    <?php if (!empty($falda['modelo_nombre'])): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-warning">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES FALDA</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-primary">Modelo</td>
                                                            <td class="text-right"><?php echo $falda['modelo_nombre']; ?> </td>
                                                            <td class="text-primary">Abertura</td>
                                                            <td class="text-right"><?php echo $falda['abertura_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-primary">Pretina</td>
                                                            <td class="text-right"><?php echo $falda['pretina']; ?></td>
                                                            <td class="text-primary"></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <?php if (!empty($jumper)): ?>
                                        <div class="col-md-6">

                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-warning">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES JUMPER</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-primary">Modelo</td>
                                                            <td class="text-right"><?php echo $jumper['modelo_nombre']; ?> </td>
                                                            <td class="text-primary">Abertura</td>
                                                            <td class="text-right"><?php echo $jumper['abertura_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-primary">Bolsillo</td>
                                                            <td class="text-right"><?php echo $jumper['bolsillo_nombre']; ?></td>
                                                            <td class="text-primary"></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="row">
                                    <?php if (!empty($extras)): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-inverse">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">EXTRAS</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Corbaton</td>
                                                            <td class="text-right"><?php echo $extras['corbaton']; ?> </td>
                                                            <td>Corbata Gato</td>
                                                            <td class="text-right"><?php echo $extras['corbata_gato']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Detalle</td>
                                                            <td class="text-right"><?php echo $extras['faja']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>

                                    </div>

                                <div class="table-responsive mt-5" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descripcion</th>
                                                <th class="text-right">Cantidad</th>
                                                <th class="text-right">Precio Unitario</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($saco)): ?>
                                                <tr>
                                                    <td>Saco</td>
                                                    <td class="text-right"><?php echo $saco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $saco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_saco = number_format($saco['cantidad'] * $saco['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_saco = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon['modelo_nombre'])): ?>
                                                <tr>
                                                    <td>Pantalon</td>
                                                    <td class="text-right"><?php echo $pantalon['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $pantalon['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_pantalon = number_format($pantalon['cantidad'] * $pantalon['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_pantalon = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco['modelo_nombre'])): ?>
                                                <tr>
                                                    <td>Chaleco</td>
                                                    <td class="text-right"><?php echo $chaleco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $chaleco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_chaleco = number_format($chaleco['cantidad'] * $chaleco['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_chaleco = 0 ?>
                                            <?php endif ?>

                                             <?php if (!empty($camisa['cuello'])): ?>
                                                <tr>
                                                    <td>camisa</td>
                                                    <td class="text-right"><?php echo $camisa['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $camisa['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_camisa = number_format($camisa['cantidad'] * $camisa['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($extras['trabajo_id'])): ?>
                                                <tr>
                                                    <td>extras</td>
                                                    <td class="text-right"><?php echo $extras['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $extras['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_extras = number_format($extras['cantidad'] * $extras['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($falda['modelo_nombre'])): ?>
                                                <tr>
                                                    <td>Falda</td>
                                                    <td class="text-right"><?php echo $falda['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $falda['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_falda = number_format($falda['cantidad'] * $falda['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_falda = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($jumper['modelo_nombre'])): ?>
                                                <tr>
                                                    <td>Jumper</td>
                                                    <td class="text-right"><?php echo $jumper['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $jumper['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_jumper = number_format($jumper['cantidad'] * $jumper['precio_unitario'], 2) ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_jumper = 0 ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="float-right mt-4 text-right">
                                    <?php if ($trabajo['rebaja'] != 0): ?>
                                        <h4 style="color: red;">Rebaja (<?php echo $trabajo['motivo_rebaja'] ?>) : <?php echo number_format($trabajo['rebaja'], 2); ?></h4>
                                    <?php endif ?>
                                    <p>Sub - Total : <?php echo number_format($trabajo['costo_confeccion'], 2) ?></p>
                                    <p>Precio - Tela : <?php echo number_format($trabajo['costo_tela'], 2) ;?> </p>
                                    <hr>
                                    <?php $total = $trabajo['costo_tela'] + $trabajo['costo_confeccion'] ?>
                                    <h3><b>Total :</b> <?php echo number_format($total, 2); ?></h3>
                                    <?php 
                                        $a_cuenta = ($trabajo['costo_tela']+$trabajo['costo_confeccion']) - $trabajo['saldo']
                                    ?>
                                    <h3 class="text-success"><b>Adelanto :</b> <?php echo number_format($a_cuenta, 2); ?></h3>
                                    <h3 class="text-info"><b>Saldo :</b> <?php echo number_format($trabajo['saldo'], 2); ?></h3>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- <div class="text-right">
                                    <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div> -->
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url(); ?>trabajos/impresion_cliente/<?php echo $trabajo['id'] ?>">
                                <button class="btn waves-effect waves-light btn-block btn-info" type="button"> <span><i class="fa fa-print"></i> Impresion Cliente</span> </button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button id="print" class="btn waves-effect waves-light btn-block btn-dark" type="button"> <span><i class="fa fa-print"></i> Impresion Empresa</span> </button>
                        </div>
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
        <footer class="footer">
            2020 desarrollado por GoGhu
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>public/main/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
   $(document).ready(function() {
       $("#print").click(function() {
           var mode = 'iframe'; //popup
           var close = mode == "popup";
           var options = {
               mode: mode,
               popClose: close
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>