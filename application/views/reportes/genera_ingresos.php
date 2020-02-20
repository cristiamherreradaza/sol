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
                        <?php //vdebug($tela_confeccion, false, false, true); ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    DESDE: <b class="text-info"> <?php echo fechaEs($inicio); ?></b>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    HASTA: <b class="text-info"> <?php echo fechaEs($fin); ?></b>
                                </div>
                            </div>
                            <p>&nbsp;</p>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="card card-outline-success">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">RESUMEN INGRESOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="piechart_3d" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>INGRESOS</th>
                                                        <th>SALDOS</th>
                                                        <th>COBRADO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $totales['total']; ?></td>
                                                        <td><?php echo $totales['saldo']; ?></td>
                                                        <td><?php echo $totales['total']-$totales['saldo']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">POR TIPO</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="donutchart" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>TELA</th>
                                                        <th>CONFECCION</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $tela_confeccion['tela']; ?></td>
                                                        <td><?php echo $tela_confeccion['confeccion']; ?></td>
                                                        <td><?php echo $tela_confeccion['confeccion']+$tela_confeccion['tela']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-outline-primary">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">ENTREGADOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="piechart" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ENTREGADOS</th>
                                                        <th>NO ENTREGADOS</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $entregados['cantidad']; ?></td>
                                                        <td><?php echo $no_entregados['cantidad']; ?></td>
                                                        <td><?php echo $entregados['cantidad']+$no_entregados['cantidad']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="table-responsive mt-5" style="clear: both;">
                                <?php //vdebug($entregados, false, false, true); ?>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['MONTOS',   'TOTALES'],
      ['INGRESOS', <?php echo $totales['total'] ?>],
      ['SALDOS',   <?php echo $totales['saldo'] ?>]
    ]);

    var options = {
      is3D: true,
      chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['MONTOS', 'TOTALES'],
        ['TELA', <?php echo $tela_confeccion['tela']; ?>],
        ['CONFECCION', <?php echo $tela_confeccion['confeccion']; ?>]
    ]);

    var options = {
        pieHole: 0.4,
        chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['MONTOS', 'TOTALES'],
      ['ENTREGADOS', <?php echo $entregados['cantidad'] ?>],
      ['SIN ENTREGAR', <?php echo $no_entregados['cantidad'] ?>]
      ]);

    var options = {
      // title: 'My Daily Activities'
      chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }
</script>