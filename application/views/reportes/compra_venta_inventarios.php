<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                        <center><h1><b>REPORTE <span class="text-info">INGRESO Y SALIDA DE INVENTARIOS</span></b></h1></center>
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
                                                <h4 class="mb-0 text-white">RESUMEN INGRESOS DE INVENTARIO</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="piechart_3d" style="width: 100%; height: 300px;"></div>
                                                <br>
                                                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                                    <thead>
                                                    <?php $n = 1 ; ?>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NOMBRE</th>
                                                        <th>STOCK</th>
                                                        <th>PRECIO UNIDAD</th>
                                                        <th>PRECIO TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($detalle_compras as $dc): ?>
                                                        <tr>
                                                            <td><?php echo $n++ ?> </td>
                                                            <td><?php echo $dc['nombre']; ?></td>
                                                            <td><?php echo $dc['stock']; ?></td>
                                                            <td><?php echo $dc['precio_unidad']; ?></td>
                                                            <td><?php echo $dc['precio_total']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

                                        <div class="card card-outline-primary">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">RESUMEN SALIDA DE INVENTARIO</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="piechart" style="width: 100%; height: 300px;"></div>
                                                <br>
                                                <table id="tabla-cc" class="table display table-bordered table-striped">
                                                    <thead>
                                                        <?php $n = 1 ; ?>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>NOMBRE</th>
                                                            <th>STOCK</th>
                                                            <th>PRECIO VENTA</th>
                                                            <th>PRECIO TOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($detalle_ventas as $ve): ?>
                                                            <tr>
                                                                <td><?php echo $n++ ?> </td>
                                                                <td><?php echo $ve['nombre']; ?></td>
                                                                <td><?php echo $ve['cantidad']; ?></td>
                                                                <td><?php echo $ve['precio_venta']; ?></td>
                                                                <td><?php echo $ve['precio_total']; ?></td>
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
<script>

  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['MONTOS',   'TOTALES'],
        <?php foreach ($compras as $c): ?>
            ['<?php echo $c['nombre'] ?>', <?php echo $c['total'] ?>],
        <?php endforeach; ?>
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
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['MONTOS', 'TOTALES'],
        <?php foreach ($ventas as $v): ?>
            ['<?php echo $v['nombre'] ?>', <?php echo $v['total'] ?>],
        <?php endforeach; ?>
    ]);

    var options = {
      // title: 'My Daily Activities'
        chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
    }
</script>