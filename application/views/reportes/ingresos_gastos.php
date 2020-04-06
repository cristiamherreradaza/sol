<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                                                <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>INGRESOS</th>
                                                        <th>SALDOS</th>
                                                        <th>COBRADO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $total_ingresos_trabajos['total']; ?></td>
                                                        <td><?php echo $total_ingresos_trabajos['saldo']; ?></td>
                                                        <td><?php echo $total_ingresos_trabajos['total']-$total_ingresos_trabajos['saldo']; ?></td>
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

                                </div>

                                <div class="table-responsive mt-5" style="clear: both;">
                                <?php //vdebug($entregados, false, false, true); ?>
                                <h3>LISTADO DE LOS TRABAJOS</h3>
                                    <table class="table display table-bordered table-striped no-wrap" id="config-table">
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
                                                <th class="text-center">ACCIONES</th>
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
                                                    <td class="text-right">
                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
$(function () {
    $('#config-table').DataTable({
        responsive: true,
        "order": [
            [0, 'desc']
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
});
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['-', 'INGRESOS', 'SALDOS'],
        ['TRABAJOS', <?php echo $total_ingresos_trabajos['total'] ?>, <?php echo $total_ingresos_trabajos['saldo'] ?>],
    ]);

    var options = {
        chart: {
            chartArea:{width:'90%',height:'100%'}
        },
        hAxis: {format: 'currency'},
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>