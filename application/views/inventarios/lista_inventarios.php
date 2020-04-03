<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<!-- chartist CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/assets/plugins/css-chart/css-chart.css" rel="stylesheet">

<!--This page css - Morris CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/morrisjs/morris.css" rel="stylesheet">





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
       <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">LISTA DE INVENTARIOS &nbsp;&nbsp;&nbsp;&nbsp; 
                                </h3>
                                <div class="table-responsive m-t-40" id="tabla">
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Material</th>
                                                    <th>Cantidad</th>
                                                    <!-- <th>Precio por Unidad</th> -->
                                                    <th>Precio de Venta</th>
                                                    <!-- <th>Fecha</th> -->
                                                    <!-- <th>Acciones</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nro = 1;
                                                 foreach ($compra as $a): 
                                                    $venta = $this->db->query("SELECT categoria_id, SUM(cantidad) as suma
                                                                                         FROM ventas
                                                                                         WHERE categoria_id = $a->categoria_id
                                                                                         AND estado = 1
                                                                                         GROUP BY (categoria_id)")->row();
                                                    $mayor = $this->db->query("SELECT MAX(id) as nro_mayor
                                                                                         FROM compras
                                                                                         WHERE categoria_id = $a->categoria_id
                                                                                         AND estado = 1")->row();
                                                    $valores = $this->db->query("SELECT *
                                                                                         FROM compras
                                                                                         WHERE id = $mayor->nro_mayor
                                                                                         AND estado = 1")->row();

                                                    ?>
                                                <tr>
                                                    <td><?php echo $nro ++ ?></td>
                                                    <td><?php echo $a->nombre ?></td>
                                                    <?php if (!empty($venta)) { ?>
                                                    <td><?php $total = $a->suma - $venta->suma;
                                                        echo $total;?> <?php echo $a->tipo ?></td>
                                                    <?php }else {?>
                                                    <td><?php $total = $a->suma;
                                                        echo $total;?> <?php echo $a->tipo ?></td>
                                                    <?php }  ?>
                                                    <!-- <td><?php echo $valores->precio_unidad ?></td> -->
                                                    <td><?php echo $valores->precio_venta ?></td>
                                                    <!-- <td><?= date("Y-m-d",strtotime($a->fecha));?></td> -->
                                                    <!-- <td>
                                                        <button type="button" class="btn btn-info" onclick="ver(<?php echo $a->id ?>, '<?php echo $datos->nombre ?>', '<?php echo $a->stock ?>', '<?php echo $datos->tipo ?>', '<?php echo $a->precio_unidad ?>', '<?php echo $a->precio_venta ?>', '<?php echo $a->precio_total ?>', '<?php echo $a->detalle ?>', '<?= date("Y-m-d",strtotime($a->fecha));?>')"><i class="fas fa-eye"></i></button>
                                                        <button type="button" class="btn btn-warning" onclick="editar(<?php echo $a->id ?>, '<?php echo $a->categoria_id ?>', '<?php echo $datos->nombre ?>', '<?php echo $a->stock ?>', '<?php echo $datos->tipo ?>', '<?php echo $a->precio_unidad ?>', '<?php echo $a->precio_venta ?>', '<?php echo $a->precio_total ?>', '<?php echo $a->detalle ?>', '<?= date("Y-m-d",strtotime($a->fecha));?>')"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $a->id ?>, '<?php echo $a->categoria_id ?>')"><i class="fas fa-trash"></i></button>
                                                    </td> -->
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="piechart" style="width: 100%; height: 300px;"></div>
                                <table class="table table-hover">
                                    <tr>
                                        <th>ENTREGADOS</th>
                                        <th>NO ENTREGADOS</th>
                                        <th>TOTAL</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo 'hola' ?></td>
                                        <td><?php echo 'soy' ?></td>
                                        <td><?php echo 'cristian' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer"> 2020 desarrollado por GoGhu </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
 <!-- ============================================================== -->
<script src="<?php echo base_url(); ?>public/assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- Chart JS -->
<script src="<?php echo base_url(); ?>public/assets/plugins/echarts/echarts-all.js"></script>
<!-- Flot Charts JavaScript -->
<script src="<?php echo base_url(); ?>public/assets/plugins/flot/excanvas.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>public/main/js/dashboard3.js"></script>
<!-- ============================================================== -->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script>
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

    });
</script>

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
            ['<?php echo 'rodrigo' ?>', <?php echo '20' ?>],
    ]);

    var options = {
      is3D: true,
      chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>


