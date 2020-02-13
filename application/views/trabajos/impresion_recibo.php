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
                                                <td><b>Registro: </b></td>
                                                <td><?php echo fechaEs($trabajo['fecha']); ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Entregado: </b></td>
                                                <td><?php echo $trabajo['entregado'] ?></td>
                                            </tr>
                                        </table>

                                        <?php $total=0; ?>
                                        <table class="table detalle">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Usuario</th>
                                                    <th>A cuenta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pagos as $p): ?>
                                                <?php $total += $p['monto']; ?>
                                                    <tr>
                                                        <td><?php echo fechaEs($p['fecha']); ?></td>
                                                        <td></td>
                                                        <td><?php echo $p['monto']; ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-info">Costo Total: <?php echo $trabajo['total'] ?></th>
                                                    <th align="right"></th>
                                                    <th><?php echo $total; ?></th>
                                                    <!-- <th><span class="text-danger">Saldo: <?php echo $trabajo['saldo']; ?></span></th> -->
                                                </tr>
                                            </tfoot>
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