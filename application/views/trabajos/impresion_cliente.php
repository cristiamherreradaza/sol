   <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <style type="text/css">
        .impresion td{
         font-size: 10pt;
        }

        .detalle td{
         font-size: 9pt;
         padding: 2px 0 2px 5px;
        }
    </style>

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
                        <div class="row">
                            <!-- <table style="width: 302px; color: red; font-size: 8pt;" border="0"> -->
                            <table style="width: 302px;" class="impresion" border="0">
                                <tr>
                                    <td>
                                        <table border="0" class="impresion">
                                            <tr>
                                                <td colspan="2" style="text-align: center;"><h4><b>TRABAJO <span class="text-info"># <?php echo $trabajo['id']; ?></span></b></h4></td>
                                            </tr>
                                            <tr>
                                                <td><b>Cliente: </b></td>
                                                <td><?php echo $trabajo['nombre'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Carnet: </b></td>
                                                <td><?php echo $trabajo['ci'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Celulares: </b></td>
                                                <td><?php echo $trabajo['celulares'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Entrega: </b></td>
                                                <td><?php echo fechaEs($trabajo['fecha_entrega']); ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Entregado: </b></td>
                                                <td><?php echo $trabajo['entregado'] ?></td>
                                            </tr>
                                        </table>

                                        <?php if (!empty($saco['modelo_nombre'])): ?>
                                            <br />
                                            <b>DETALLE SACO</b>

                                            <table border="0" class="table detalle">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-info">Modelo</td>
                                                        <td class="text-right"><?php echo $saco['modelo_nombre']; ?> </td>
                                                        <td class="text-info">Botones</td>
                                                        <td class="text-right"><?php echo $saco['botones']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-info">Aber</td>
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
                                        <?php endif ?>

                                        <?php if (!empty($saco['modelo_nombre'])): ?>
                                            <br />
                                            <b>DETALLE PANTALON</b>

                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <?php if (!empty($chaleco['modelo_nombre'])): ?>
                                            <br />
                                            <b>DETALLE CHALECO</b>
                                            
                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <?php if (!empty($camisa)): ?>
                                            <br />
                                            <b>CAMISA</b>
                                            
                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <?php if (!empty($falda)): ?>
                                            <br />
                                            <b>FALDA</b>
                                            
                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <?php if (!empty($falda)): ?>
                                            <br />
                                            <b>JUMPER</b>
                                            
                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <?php if (!empty($extras)): ?>
                                            <br />
                                            <b>EXTRAS</b>
                                            
                                            <table class="table detalle">
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
                                        <?php endif ?>

                                        <table class="table detalle">
                                            <thead>
                                                <tr>
                                                    <th>Descrip</th>
                                                    <th class="text-right">Cant</th>
                                                    <th class="text-right">P/U</th>
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
                                                            <?php echo $sub_saco = $saco['cantidad'] * $saco['precio_unitario'] ?>
                                                        </td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php $sub_saco = 0 ?>
                                                <?php endif ?>

                                                <?php if (!empty($pantalon)): ?>
                                                    <tr>
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
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">SUB TOTAL</td>
                                                    <td class="text-right"><?php echo $trabajo['costo_confeccion'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">TELA</td>
                                                    <td class="text-right"><?php echo $trabajo['costo_tela'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>TOTAL</b></td>
                                                    <td class="text-right"><b><?php echo $trabajo['total'] ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">ADELANTO</td>
                                                    <?php $saldo_impresion = $trabajo['total']-$trabajo['saldo'] ?>
                                                    <td class="text-right"><?php echo $saldo_impresion; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>SALDO</b></td>
                                                    <td class="text-right"><b><?php echo $trabajo['saldo'] ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                </tr>
                            </table>

                        </div>

                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="print" class="btn waves-effect waves-light btn-block btn-info" type="button"> <span><i class="fa fa-print"></i> Imprimir</span> </button>
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
<script src="<?php echo base_url(); ?>public/main/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
   $(document).ready(function() {
       $("#print").click(function() {
           var mode = 'iframe'; //popup
           var close = mode == "popup";
           var options = {
               mode: mode,
               popClose: close,
               popWd: 802,
               extraCss: ('color: red'),
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>