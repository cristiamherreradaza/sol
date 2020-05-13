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
                        <center><h1><b>REPORTE <span class="text-info">Sueldos y Control del Personal</span></b></h1></center>
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
                                                <h4 class="mb-0 text-white">RESUMEN SUELDOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>PAGADOS</th>
                                                        <th>SIN PAGAR</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                    <tr>

                                                        <td><?php echo $pagados_total['total']; ?></td>
                                                        <td><?php echo $sin_pagar['total']; ?></td>
                                                        <td><?php echo $total_sueldos = $pagados_total['total'] + $sin_pagar['total']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">RETRASOS, ABANDONOS Y FALTAS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="columnchart_material2" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>TOTAL RETRASOS</th>
                                                        <th>TOTAL ABANDONOS</th>
                                                        <th>TOTAL FALTAS</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $control_re_ab_fa['total_atrasos']; ?></td>
                                                        <td><?php echo $total_abandonos = $control_re_ab_fa['total_aban_man'] + $control_re_ab_fa['total_aban_tar']; ?></td>
                                                        <td><?php echo $total_faltas = $control_re_ab_fa['total_fal_man'] + $control_re_ab_fa['total_fal_tar']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive" style="clear: both;">
                                        <h3>LISTADO DEL PERSONAL QUE NO FUERON PAGADOS</h3>
                                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Personal</th>
                                                        <th>Sueldo</th>
                                                        <th>Fecha</th>
                                                        <!-- <th>Monto</th> -->
                                                    </tr>
                                                </thead>
                                                <?php $n = 1; ?>
                                                <tbody>
                                                    <?php foreach ($listado_sin_pagar as $p): ?>
                                                    <tr>
                                                        <td><?php echo $n++; ?></td>
                                                        <td><?php echo $p['nombre']; ?></td>
                                                        <td><?php echo $p['total']; ?></td>
                                                        <?php setlocale(LC_ALL, 'es_ES');
                                                            $meses  = $p['mes'];
                                                            $dateObj   = DateTime::createFromFormat('!m', $meses);
                                                            $mes_es = strftime('%B', $dateObj->getTimestamp());
                                                        ?>
                                                        <td><?php echo $mes_es; ?> de <?php echo $p['anio']; ?> </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="table-responsive" style="clear: both;">
                                        <h3>LISTADO DETALLADA DE RETRASOS, ABANDONOS Y FALTAS</h3>
                                            <table id="tabla-cc" class="table display table-bordered table-striped no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Personal</th>
                                                        <th>Retrasos</th>
                                                        <th>Abandonos</th>
                                                        <th>Faltas</th>
                                                    </tr>
                                                </thead>
                                                <?php $m = 1; ?>
                                                <tbody>
                                                    <?php foreach ($lista_detallada as $c): ?>
                                                    <tr>
                                                        <td><?php echo $m++; ?></td>
                                                        <td><?php echo $c['nombre']; ?></td>
                                                        <td><?php echo $c['total_atrasos']; ?></td>
                                                        <td><?php echo $total_aba = $c['total_aban_man'] + $c['total_aban_tar']; ?></td>
                                                        <td><?php echo $total_fal = $c['total_fal_man'] + $c['total_fal_tar']; ?></td>
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
            [0, 'asc']
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });

    $('#tabla-cc').DataTable({
        responsive: true,
        "order": [
            [0, 'asc']
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
        ['-', 'PAGADOS', 'SIN PAGAR'],
        ['SUELDOS', <?php echo $pagados_total['total'] ?>, <?php echo $sin_pagar['total'] ?>],
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
        ['-', 'RETRASOS', 'ABANDONOS', 'FALTAS'],
        ['NUMERO', <?php echo $control_re_ab_fa['total_atrasos'] ?>, <?php echo $total_abandonos = $control_re_ab_fa['total_aban_man'] + $control_re_ab_fa['total_aban_tar'] ?>, <?php echo $total_faltas = $control_re_ab_fa['total_fal_man'] + $control_re_ab_fa['total_fal_tar'] ?>],
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