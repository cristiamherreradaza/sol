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
                                                            <th>Estomago</th>
                                                            <th>Medio Brazo</th>
                                                            <th>Largo Maga</th>
                                                            <?php if ($saco['altura_busto'] != 0): ?>
                                                                <th>Altura Busto</th>
                                                            <?php endif ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $saco['talla']; ?></td>
                                                            <td><?php echo $saco['largo']; ?></td>
                                                            <td><?php echo $saco['hombro']; ?></td>
                                                            <td><?php echo $saco['espalda']; ?></td>
                                                            <td><?php echo $saco['pecho']; ?></td>
                                                            <td><?php echo $saco['estomago']; ?></td>
                                                            <td><?php echo $saco['medio_brazo']; ?></td>
                                                            <td><?php echo $saco['largo_manga']; ?></td>
                                                            <?php if ($saco['altura_busto'] != 0): ?>
                                                                <td><?php echo $saco['altura_busto']; ?></td>
                                                            <?php endif ?>
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
                                                            <th>Muslo</th>
                                                            <th>Rodilla</th>
                                                            <th>Bota pie</th>
                                                            <th>Tiro delantero</th>
                                                            <th>Tiro atras</th>
                                                            <?php if ($pantalon['cadera'] != 0): ?>
                                                                <th>Cadera</th>
                                                            <?php endif ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $pantalon['largo']; ?></td>
                                                            <td><?php echo $pantalon['entre_pierna']; ?></td>
                                                            <td><?php echo $pantalon['cintura']; ?></td>
                                                            <td><?php echo $pantalon['muslo']; ?></td>
                                                            <td><?php echo $pantalon['rodilla']; ?></td>
                                                            <td><?php echo $pantalon['bota_pie']; ?></td>
                                                            <td><?php echo $pantalon['tiro_delantero']; ?></td>
                                                            <td><?php echo $pantalon['tiro_atras']; ?></td>
                                                            <?php if ($pantalon['cadera'] != 0): ?>
                                                                <td><?php echo $pantalon['cadera']; ?></td>
                                                            <?php endif ?>

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
                                                    <h4 class="mb-0 text-white">MEDIDAS FALDA</h4>
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
                                    <?php if (!empty($saco)): ?>
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
                                                            <td class="text-right"><?php echo $chaleco['modelo_nombre']; ?> </td>
                                                            <td class="text-primary">Abertura</td>
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
                                                <th class="text-center">#</th>
                                                <th>Descripcion</th>
                                                <th class="text-right">Cantidad</th>
                                                <th class="text-right">Precio Unitario</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($saco)): ?>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Saco</td>
                                                    <td class="text-right"><?php echo $saco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $saco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_saco = $saco['cantidad'] * $saco['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_saco = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon)): ?>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Pantalon</td>
                                                    <td class="text-right"><?php echo $pantalon['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $pantalon['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_pantalon = $pantalon['cantidad'] * $pantalon['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_pantalon = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco)): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Chaleco</td>
                                                    <td class="text-right"><?php echo $chaleco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $chaleco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_chaleco = $chaleco['cantidad'] * $chaleco['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_chaleco = 0 ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="float-right mt-4 text-right">
                                    <?php $sub_total = $sub_saco + $sub_pantalon + $sub_chaleco ?>
                                    <p>Sub - Total : <?php echo $sub_total ?></p>
                                    <p>Precio - Tela : <?php echo $trabajo['costo_tela'] ?> </p>
                                    <hr>
                                    <?php $total = $trabajo['costo_tela'] + $sub_total ?>
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
            © 2019 Monster Admin by wrappixel.com
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