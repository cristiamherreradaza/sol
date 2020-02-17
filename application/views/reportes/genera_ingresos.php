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
                        <center><h1><b>REPORTE <span class="text-info">INGRESOS</span></b></h1></center>
                        <?php //vdebug($trabajo, false, false, true); ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <address>
                                        <h3>DESDE: <b class="text-info"> <?php echo $inicio; ?></b></h3>
                                        <h3>FIN: <b class="text-info"> <?php echo $fin; ?></b></h3>
                                    </address>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="table-responsive mt-5" style="clear: both;">
                                <?php //vdebug($trabajos, false, false, true); ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">CLIENTE</th>
                                                <th class="text-center">REGISTRO</th>
                                                <th class="text-center">PRUEBA</th>
                                                <th class="text-center">ENTREGA</th>
                                                <th class="text-center">$. TELA</th>
                                                <th class="text-center">$. CONFECCION</th>
                                                <th class="text-center">TOTAL</th>
                                                <th class="text-center">$. SALDO</th>
                                                <th class="text-center">ENTREGADO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($trabajos as $key => $t): ?>
                                                <tr>
                                                    <td class="text-center">#</td>
                                                    <td><?php echo $t['nombre'] ?></td>
                                                    <td class="text-right"><?php echo $t['fecha']; ?></td>
                                                    <td class="text-right"><?php echo $t['fecha_prueba']; ?></td>
                                                    <td class="text-right"><?php echo $t['fecha_entrega']; ?></td>
                                                    <td class="text-right"><?php echo $t['costo_tela']; ?></td>
                                                    <td class="text-right"><?php echo $t['costo_confeccion']; ?></td>
                                                    <td class="text-right"><?php echo $t['total']; ?></td>
                                                    <td class="text-right"><?php echo $t['saldo']; ?></td>
                                                    <td class="text-right"><?php echo $t['entregado']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url(); ?>trabajos/impresion_cliente/1">
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
               popClose: close
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>