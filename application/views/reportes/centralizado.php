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
                        <center><h1><b>REPORTE <span class="text-info">CENTRALIZADO</span></b></h1></center>
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
                                                <h4 class="mb-0 text-white">INGRESOS POR TRABAJOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Trabajos</td>
                                                                <td class="text-center"><?php echo $trabajos_cantidad['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($trabajos_totales['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Trabajos por cobrar</td>
                                                                <td class="text-center"><?php echo $cantidad_deudores['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($monto_deudores['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Efectivo Cobrado</th>
                                                                <td class="text-center"></td>
                                                                <?php $trabajos_por_cobrar = $trabajos_totales['total']-$monto_deudores['total'] ?>
                                                                <th class="text-right"><?php echo number_format($trabajos_por_cobrar, 2) ?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-outline-danger">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">GASTOS CAJACHICA</h4>
                                            </div>
                                            <div class="card-body">
                                                <table class="table no-wrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripcion</th>
                                                            <th class="text-center">Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Gastos</td>
                                                            <td class="text-center"><?php echo number_format($ingresos_gastos_cc['gastos'], 2); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ingresos</td>
                                                            <td class="text-center"><?php echo number_format($ingresos_gastos_cc['ingreso']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Saldo Caja</th>
                                                            <?php $saldo_caja_chica = $ingresos_gastos_cc['gastos']-$ingresos_gastos_cc['ingreso'] ?>
                                                            <th class="text-center"><?php echo number_format($saldo_caja_chica, 2); ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">INGRESOS POR CONTRATOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Contratos</td>
                                                                <td class="text-center"><?php echo $ingresos_contratos['cantidad']; ?></td>
                                                                <td class="text-right"><?php echo number_format($ingresos_contratos['total'], 2) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="card card-outline-success">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">INGRESOS POR TRABAJOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Trabajos</td>
                                                                <td class="text-center"><?php echo $trabajos_cantidad['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($trabajos_totales['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Trabajos por cobrar</td>
                                                                <td class="text-center"><?php echo $cantidad_deudores['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($monto_deudores['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Efectivo Cobrado</th>
                                                                <td class="text-center"></td>
                                                                <?php $trabajos_por_cobrar = $trabajos_totales['total']-$monto_deudores['total'] ?>
                                                                <th class="text-right"><?php echo number_format($trabajos_por_cobrar, 2) ?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">TRABAJOS ENTREGADOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <table class="table no-wrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Descripcion</th>
                                                            <th class="text-center">Cantidad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Trabajos</td>
                                                            <td class="text-center"><?php echo $trabajos_cantidad['total']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trabajos entregados</td>
                                                            <?php $trabajos_por_terminar = $trabajos_cantidad['total']-$trabajos_no_entregados['total'] ?>
                                                            <td class="text-center"><?php echo $trabajos_por_terminar; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Trabajos por terminar</th>
                                                            <th class="text-center"><?php echo $trabajos_no_entregados['total']; ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>

                                <!-- REPORTES SOBRE LOS INVENTARIOS -->
                                
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="card card-outline-primary">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">COMPRA Y VENTA DE INVENTARIOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Compra</td>
                                                                <td class="text-center"><?php echo $cantidad_compra['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($valor_compra['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Venta</td>
                                                                <td class="text-center"><?php echo $venta_compra['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($valor_venta['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Saldo</th>
                                                                <td class="text-center"></td>
                                                                <?php $inventarios_totales = $valor_compra['total']-$valor_venta['total'] ?>
                                                                <th class="text-right"><?php echo number_format($inventarios_totales, 2) ?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-outline-warning">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">PAGO DE SALARIOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Salario de Empleados</td>
                                                                <td class="text-center"><?php echo $cantidad_empleados['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($sueldo_empleados['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Descuento a Empleados</td>
                                                                <td class="text-center"><?php echo $cantidad_descuentos['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($descuento_empleados['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Saldo</th>
                                                                <td class="text-center"></td>
                                                                <?php $sueldos_totales = $sueldo_empleados['total']-$descuento_empleados['total'] ?>
                                                                <th class="text-right"><?php echo number_format($sueldos_totales, 2) ?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">
                                    <div class="card card-outline-danger">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">COSTOS Y PRODUCCION</h4>
                                            </div>
                                            <div class="card-body">
                                                <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Trabajos</td>
                                                                <td class="text-center"><?php echo $costo_produccion['cant_tra']; ?></td>
                                                                <td class="text-right"><?php echo number_format($costo_produccion['precio'], 2) ?></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>Descuento a Empleados</td>
                                                                <td class="text-center"><?php echo $cantidad_descuentos['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($descuento_empleados['total'], 2) ?></td>
                                                            </tr> -->
                                                            <tr>
                                                                <th>Total</th>
                                                                <td class="text-center"></td>
                                                                <?//php $sueldos_totales = $sueldo_empleados['total']-$descuento_empleados['total'] ?>
                                                                <th class="text-right"><?php echo number_format($costo_produccion['precio'], 2) ?></th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>

                                   <!--  <div class="col-md-4">

                                        <div class="card card-outline-danger">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">INGRESOS POR CONTRATOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <th class="text-right">Monto</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Contratos</td>
                                                                <td class="text-center"><?php echo $ingresos_contratos['cantidad']; ?></td>
                                                                <td class="text-right"><?php echo number_format($ingresos_contratos['total'], 2) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div> -->

                                </div>

                                <!-- HASTA AQUI -->

                                

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