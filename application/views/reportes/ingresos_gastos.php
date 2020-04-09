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
                                    <div class="col-md-6">

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
                                                        <td><?php echo $ingreso_neto = $total_ingresos_trabajos['total']-$total_ingresos_trabajos['saldo']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">INGRESOS VS GASTOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="columnchart_material2" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>INGRESOS NETO</th>
                                                        <th>GASTOS</th>
                                                        <th>SALDO</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $ingreso_neto; ?></td>
                                                        <td><?php echo $total_gastos['total']; ?></td>
                                                        <td><?php echo $ingreso_neto-$total_gastos['total']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive" style="clear: both;">
                                        <h3>LISTADO DE LOS PAGOS</h3>
                                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Cliente</th>
                                                        <th class="text-center">Trabajo</th>
                                                        <th>Fecha</th>
                                                        <th class="text-center">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($listado_pagos as $p): ?>
                                                    <tr>
                                                        <td><?php echo $p->id; ?></td>
                                                        <td><?php echo $p->cliente; ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo base_url() ?>trabajos/registro_pagos/<?php echo $p->trabajo ?>">
                                                                <button type="button" class="btn btn-info"><i class="fas fa-eye"></i> &nbsp;<?php echo $p->trabajo ?></button>
                                                            </a>
                                                        </td>
                                                        <td><?php echo fechaEs($p->fecha); ?></td>
                                                        <td class="text-right"><?php echo $p->monto; ?></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="table-responsive" style="clear: both;">
                                        <h3>LISTADO GASTOS</h3>
                                            <table id="tabla-cc" class="table display table-bordered table-striped no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Usuario</th>
                                                        <th>Descripcion</th>
                                                        <th>Fecha</th>
                                                        <th class="text-center">Monto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($listado_cajachica as $c): ?>
                                                    <tr>
                                                        <td><?php echo $c->id; ?></td>
                                                        <td><?php echo $c->nombre; ?></td>
                                                        <td><?php echo $c->descripcion; ?></td>
                                                        <td><?php echo fechaEs($c->fecha); ?></td>
                                                        <td class="text-right"><?php echo $c->salida; ?></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

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

    $('#tabla-cc').DataTable({
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
        vAxis: {format: 'currency'},
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data2 = google.visualization.arrayToDataTable([
        ['-', 'INGRESOS', 'GASTOS'],
        ['TRABAJOS', <?php echo $ingreso_neto ?>, <?php echo $total_gastos['total'] ?>],
    ]);

    var options2 = {
        chart: {
            chartArea:{width:'90%',height:'100%'}
        },
        vAxis: {format: 'currency'},
    };

    var chart2 = new google.charts.Bar(document.getElementById('columnchart_material2'));

    chart2.draw(data2, google.charts.Bar.convertOptions(options2));
    }
</script>