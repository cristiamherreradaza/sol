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
                                                <td style="text-align: center;"><h6><b>TRABAJO <span class="text-info"># <?php echo $trabajo['id']; ?></span></b></h6></td>
                                                <td style="text-align: center;"><h6><b>RECIBO <span class="text-info"># <?php echo $pagos[0]['id']; ?></span></b></h6></td>
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
                                        <table class="table detalle" border="0">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Usuario</th>
                                                    <th>Monto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pagos as $p): ?>
                                                <?php $total += $p['monto']; ?>
                                                    <tr>
                                                        <td><?php echo fechaEs($p['fecha']); ?></td>
                                                        <td></td>
                                                        <td class="text-right"><?php echo number_format($p['monto'], 2); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td class="text-right">Total Adelanto</td>
                                                    <td></td>
                                                    <td class="text-right"><?php echo number_format($total, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Costo Trabajo</td>
                                                    <td></td>
                                                    <td class="text-right"><?php echo number_format($trabajo['total'], 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><b>Saldo</b></td>
                                                    <td></td>
                                                    <?php //$saldo = $total[] ?>
                                                    <td class="text-right"><b><?php echo number_format($trabajo['total']-$total, 2); ?></b></td>
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
               popClose: close,
               popWd: 802,
               extraCss: ('color: red'),
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>