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
                                                    <th>Precio por Unidad</th>
                                                    <th>Precio de Venta</th>
                                                    <th>Fecha</th>
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
                                                    <td><?php echo $a->precio_unidad ?></td>
                                                    <td><?php echo $a->precio_venta ?></td>
                                                    <td><?= date("Y-m-d",strtotime($a->fecha));?></td>
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

                   <!-- <div class="col-lg-6 col-md-6">
                        <div class="card card-body">
                            <h3 class="card-title">Notification</h3>
                            <div class="message-box">
                                <div class="message-widget">
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-primary"><i class="mdi mdi-email"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>You have 3 new messages</h5> <span class="mail-desc">Daniel Kristeen, Hanna Giover, Jeffry Brown</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"><span class="round bg-danger"><i class="mdi mdi-earth"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>Newsfeed available </h5> <span class="mail-desc">Todays headlines : Breakdancing Grandma Proves ..</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <span class="round bg-success"><i class="mdi mdi-currency-usd"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>2 Invoices to pay</h5> <span class="mail-desc">$3500 from Krishnan, $2000 from Akhil</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"><span class="round"><i class="mdi mdi-comment-check-outline"></i></span></div>
                                        <div class="mail-contnet">
                                            <h5>15 New comments</h5> <span class="mail-desc">Jhonny : Hey this stuff is awesome and how can i ..</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  -->
                    <!-- Column -->
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <h3 class="card-title">Vista de Stock</h3>
                                    <!-- <div class="ml-auto">
                                        <select class="custom-select">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div> -->
                                </div>
                                <!-- <div id="piechart_3d" style="width: 100%; height: 300px;"></div> -->
                                <div id="chart"></div>
                            </div>
                        </div>
                        

                        
                       <!--  <div class="bar-chart-block block">
                            <h2 class='titular'>Cantidad de los MAteriales</h2>
                            <div class='grafico bar-chart'>
                               <ul class='eje-y'>
                                <li data-ejeY='135'></li>
                                 <li data-ejeY='120'></li>
                                 <li data-ejeY='105'></li>
                                 <li data-ejeY='90'></li>
                                 <li data-ejeY='75'></li>
                                 <li data-ejeY='60'></li>
                                 <li data-ejeY='45'></li>
                                 <li data-ejeY='30'></li>
                                 <li data-ejeY='15'></li>
                                 <li data-ejeY='0'></li>
                               </ul>
                               <ul class='eje-x'>
                                <?php foreach ($compra as $val) {
                                   $venta = $this->db->query("SELECT categoria_id, SUM(cantidad) as suma
                                                                 FROM ventas
                                                                 WHERE categoria_id = $a->categoria_id
                                                                 AND estado = 1
                                                                 GROUP BY (categoria_id)")->row();
                                    if (!empty($venta)) { ?>
                                    ?>
                                 <li data-ejeX='<?php $total = $a->suma - $venta->suma;
                                echo $total;?> <?php echo $a->tipo ?>'><i><?php echo $a->nombre ?></i></li>
                                <?php }else {?>
                                    <li data-ejeX='<?php $total = $a->suma;
                                echo $total;?> <?php echo $a->tipo ?>'><i><?php echo $a->nombre ?></i></li>
                                <?php }  ?>
                                <?php } ?>
                               </ul>
                            </div>
                          </div> -->
                        <!-- <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <h3 class="card-title">Visit source</h3>
                                    <div class="ml-auto">
                                        <select class="custom-select">
                                            <option selected="">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="m-piechart" style="width:100%; height:278px"></div>
                                <div class="text-center">
                                    <ul class="list-inline mt-3">
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-success"></i>Mobile</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-primary"></i>Desktop</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-danger"></i>Tablet</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-muted"></i>Other</h6> </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

<script type="text/javascript">
    /**
 * Selector for chart element.
 */
var chartSelector = '#chart';

/**
 * Selector used to get label elements inside the rendered chart.
 * Your mileage may vary if you configure your chart different than
 * me. Use Firebug or Developer Tools to step through the SVG and
 * determine your label selector.
 */
var labelSelector = '> g:eq(1) g text';

/**
 * This is our data. For simplicity sake, doing inline and not AJAX.
 */

var data = [
  <?php foreach ($compra as $val) {
       $venta = $this->db->query("SELECT categoria_id, SUM(cantidad) as suma
                                     FROM ventas
                                     WHERE categoria_id = $val->categoria_id
                                     AND estado = 1
                                     GROUP BY (categoria_id)")->row();
      
        // $totales = $val->suma - $venta->suma;

        ?>
    [ '<?php echo $val->nombre ?>', 22],
<?php } ?>
];

// Load Google Charts 
google.load('visualization', '1.1', { packages: ['corechart', 'line'] });

// Callback when API is ready
google.setOnLoadCallback(function() {
 
  /*
   * Setup the data table with your data. 
   */
  var table = new google.visualization.DataTable({
    cols : [
      { id : 'name', label : 'Name', type : 'string' },
      { id : 'value', label : 'Value', type : 'number' }
    ]
  });
  
  // Add data to the table
  table.addRows( data );
  
  // Google Charts needs a raw element. I'm using jQuery to get the chart
  // Container, then indexing into it to get the raw element.
  var chartContainer = $(chartSelector)[0];
  
  // Create the Google Pie Chart
  var chart = new google.visualization.PieChart(chartContainer);
  
  // Draw the chart.
  chart.draw(table, { title : 'Detalles de Materiales en Almacen' });
  
  /*
   * This is the meat and potatoes of the operation. We really require
   * two things: #1) A selector that will get us a list of labels in the
   * legend, and #2) The DataTable powering the chart.  We'll cycle
   * through the labels, and use their index to lookup their value.
   * If you have some higher-level math you need to do to display a
   * different value, you can just replace my logic to get the count
   * with your's.
   */
  
  // The <svg/> element rendered by Google Charts
  var svg = $('svg', chartContainer );
  
  /*
   * Step through all the labels in the legend.
   */
  $(labelSelector, svg).each(function (i, v) {
  
    /*
     * I'm retrieving the value of the second column in my data table,
     * which contains the number that I want to display. If your logic
     * is more complicated, change this line to calculate a new total.
     */
    var total = table.getValue(i, 1);
    
    // The new label text.
    var newLabel = $(this).text() + '(' + total + ')';
    
    // Update the label text.
    $(this).text( newLabel );
  });
  
});

</script>

