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
                            <div class="col-md-6">
                                <div class="float-left">
                                    <address>
                                        <h6>Cliente: <b class="text-info"> <?php echo $trabajo['nombre'] ?></b></h6>
                                        <h6>Carnet: <b class="text-info"> <?php echo $trabajo['ci'] ?></b></h6>
                                        <h6>Celulares: <b class="text-info"> <?php echo $trabajo['celulares'] ?></b></h6>
                                        <h6>Trabajo entregado: <b class="text-danger"> <?php echo $trabajo['entregado'] ?></b></h6>
                                    </address>
                                </div>
                                <div class="float-right text-right">
                                    <address>
                                        <h5 class="font-bold">Entrega: <?php echo fechaEs($trabajo['fecha_entrega']); ?></h5>
                                        <p class="mt-4"><b>Prueba :</b> <?php echo fechaEs($trabajo['fecha_prueba']); ?></p>
                                    </address>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <div id="bloque_descripcion" style="display: block;">
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
                            </div>


                            <div class="col-md-12">
                                <div class="float-right mt-4 text-right">
                                    <?php $sub_total = $sub_saco + $sub_pantalon + $sub_chaleco ?>
                                    <p>Sub - Total : <?php echo $sub_total ?></p>
                                    <p>Precio - Tela : <?php echo $trabajo['costo_tela'] ?> </p>
                                    <hr>
                                    <h3><b>Total :</b> <?php echo $trabajo['costo_tela'] + $sub_total ?></h3>
                                    <h3 class="text-info"><b>Saldo :</b> <?php echo $trabajo['saldo'] ?></h3>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- <div class="text-right">
                                    <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div> -->
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                            <!-- comenzamos el formulario -->
                                <div class="form-body">
                                    <div class="row pt-3">
                                        <div class="col-md-5">
                                            <input type="hidden" name="cod_cliente" id="cod_cliente">
                                            <label class="control-label">Nombre del cliente</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    placeholder="Ej: Cristiam J. Herrera Daza"
                                                    aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- fin formulario -->
                            <div class="col-md-9">
                                                    
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