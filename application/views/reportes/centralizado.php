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
                    <center><h1><b>REPORTE <span class="text-info">CENTRALIZADO</span></b></h1></center>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-6">
                    DESDE: <b class="text-info"> <?php echo fechaEs($inicio); ?></b>
                </div>
                <div class="col-md-6">
                    HASTA: <b class="text-info"> <?php echo fechaEs($fin); ?></b>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="col-md-6">
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body printableArea">
                        <div class="row">
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
                                                                <td>Trabajos con deudas</td>
                                                                <td class="text-center"><?php echo $cantidad_deudores['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($monto_deudores['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Trabajos pagados</td>
                                                                <td class="text-center"><?php echo $cantidad_pagados['total']; ?></td>
                                                                <td class="text-right"><?php echo number_format($trabajos_totales['total'], 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total trabajos</th>
                                                                <td class="text-center"><?=$cantidad_deudores['total']+$cantidad_pagados['total']?></td>
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
                                                <h4 class="mb-0 text-white">CANTIDAD DE CONTRATOS</h4>
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
                                                <h4 class="mb-0 text-white">INGRESOS POR TRABAJOS POR GENEROS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Descripcion</th>
                                                                <th class="text-center">Cantidad</th>
                                                                <!-- <th class="text-right">Monto</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Varones</td>
                                                                <td class="text-center"><?php echo $cantidad_varones['total']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mujeres</td>
                                                                <td class="text-center"><?php echo $cantidad_mujeres['total']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th class="text-center"><?=$cantidad_varones['total']+$cantidad_mujeres['total']?></th>
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
                                                                <th class="text-right">Materiales</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $cantidadCP = 0;
                                                                $MontoCP = 0;
                                                                $canMat = 0;
                                                                $costo_produccion1 = $costo_produccion;
                                                                foreach ($costo_produccion as $cp){
                                                                ?>
                                                                    <tr>
                                                                        <td><?=$cp->tipo?></td>
                                                                        <td class="text-center"><?=$cp->cant_tra?></td>
                                                                        <td class="text-right"><?=$cp->precio?></td>
                                                                        <?php
                                                                        $prenda = strtoupper($cp->tipo);
                                                                        $query = "SELECT SUM(salida) as total 
                                                                            FROM movimientos 
                                                                            WHERE confeccion = '$prenda' AND fecha BETWEEN '$inicio' AND '$fin'";
                                                                            $totalMaterial = $this->db->query($query)->result_array();
                                                                            $canMatSa = ($totalMaterial[0]['total'] != null)? $totalMaterial[0]['total'] : 0;
                                                                        ?>
                                                                        <td class="text-right"><?=number_format($canMatSa,2)?></td>
                                                                    </tr>    
                                                                <?php
                                                                    $cantidadCP = $cantidadCP + $cp->cant_tra;
                                                                    $MontoCP = $MontoCP + $cp->precio;
                                                                    $canMat = $canMat + $totalMaterial[0]['total'];
                                                                }
                                                            ?>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th class="text-center"><?=$cantidadCP?></td>
                                                                <th class="text-right"><?=number_format($MontoCP,2)?></td>
                                                                <th class="text-right"><?=$canMat?></th>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline-info">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white text-center">INGRESOS, GASTOS, SALDOS</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Ingreso</th>
                                                                <th class="text-center">Gasto</th>
                                                                <th class="text-right">Saldo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><?=$ingresos_totales?> Bs.</td>
                                                                <td class="text-center"><?php echo $gasto_total; ?></td>
                                                                <td class="text-right"><?php echo number_format($ingresos_totales-$gasto_total, 2) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button onclick="reportePdf('<?=$inicio?>', '<?=$fin?>')" type="button" class="btn btn-block btn-success">IMPRIMIR REPORTE</button>
                                    </div>
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
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart1);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            // ['Trabajo Con Deuda',<?//=$tra_deuda?>],
            // ['Trabajo Pagados',<?//=$tra_pagado?>]
          ['Varones',  <?=$cantidad_varones['total']?>],
        //   ['Watch TV', 2],
          ['Mujeres',    <?=$cantidad_mujeres['total']?>]
        ]);

        var options = {
            title: 'Cantidad de Mujeres Varones',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }


    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php
                foreach ($costo_produccion1 as $pro){
                ?>
                    ['<?=$pro->tipo?>',     <?=$pro->cant_tra?>],
                <?php
                }
            ?>
            // ['Work',     11],
            // ['Eat',      2]
        ]);

        var options = {
            title: 'Productos Cantidad',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }

    function reportePdf(inifecha, finfecha) {
        var url = "<?php echo base_url() ?>Reportes/reportePdf/"+inifecha+"/"+finfecha;

        window.open(url, '_blank');
    }
</script>