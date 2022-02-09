<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"	href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                    <div class="card card-body">
                        <center><h1><b>REPORTE <span class="text-info">DEUDORES</span></b></h1></center>
                        <?php //vdebug($tela_confeccion, false, false, true); ?>
                        <hr>
                        <div class="row">
                            
                            <!-- <p>&nbsp;</p> -->

                            <div class="col-md-12">
                                <!-- <div class="row">
                                    <div class="col-md-6">

                                        <div class="card card-outline-success">
                                            <div class="card-header">
                                                <h4 class="mb-0 text-white">POR CLIENTE</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="piechart_3d" style="width: 100%; height: 300px;"></div>
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th>MONTO</th>
                                                    </tr>
                                                    <?php foreach ($clientes as $c): ?>
                                                        <tr>
                                                            <td><?php echo $c['nombre']; ?></td>
                                                            <td><?php echo $c['saldo_total']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

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
                                                        <td><?php echo $total_entregados['total']; ?></td>
                                                        <td><?php echo $total_sin_entregar; ?></td>
                                                        <td><?php echo $total['total']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div> -->

                                <div class="table-responsive mt-5" style="clear: both;">
                                <?php //vdebug($entregados, false, false, true); ?>
        							<table id="config-table" class="table display table-bordered table-striped no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <!-- <th class="text-center">TRABAJO</th> -->
                                                <th class="text-center">CLIENTE</th>
                                                <!-- <th class="text-center">FECHA</th> -->
                                                <th class="text-center">TOTAL</th>
                                                <!-- <th class="text-center">ENTREGADO</th> -->
                                                <th class="text-center">DIAS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($deudores as $key => $d): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key ?></td>
                                                    <!-- <td class="text-center"><?php echo $d['id'] ?></td> -->
                                                    <td class="text-left"><?php echo $d['nombre']; ?></td>
                                                    <!-- <td class="text-center"><?php echo $d['fecha']; ?></td> -->
                                                    <td class="text-center"><?php echo $d['saldo']; ?></td>
                                                    <!-- <td class="text-center"><?php echo $d['entregado']; ?></td> -->
                                                    <td class="text-center"><?php echo $d['dias']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="printableArea" hidden>
                        <center><h1><b>REPORTE <span class="text-info">DEUDORES</span></b></h1></center>
                        <?php //vdebug($tela_confeccion, false, false, true); ?>
                        <hr>
                        <table id="" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <!-- <th class="text-center">TRABAJO</th> -->
                                    <th class="text-center">CLIENTE</th>
                                    <!-- <th class="text-center">FECHA</th> -->
                                    <th class="text-center">TOTAL</th>
                                    <!-- <th class="text-center">ENTREGADO</th> -->
                                    <th class="text-center">DIAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($deudores as $key => $d): ?>
                                    <tr>
                                        <td class="text-center"><?php echo ++$key ?></td>
                                        <!-- <td class="text-center"><?php echo $d['id'] ?></td> -->
                                        <td class="text-left"><?php echo $d['nombre']; ?></td>
                                        <!-- <td class="text-center"><?php echo $d['fecha']; ?></td> -->
                                        <td class="text-center"><?php echo $d['saldo']; ?></td>
                                        <!-- <td class="text-center"><?php echo $d['entregado']; ?></td> -->
                                        <td class="text-center"><?php echo $d['dias']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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

<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
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
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['MONTOS',   'TOTALES'],
        <?php foreach ($clientes as $c): ?>
            ['<?php echo $c['nombre'] ?>', <?php echo $c['saldo_total'] ?>],
        <?php endforeach; ?>
    ]);

    var options = {
      is3D: true,
      chartArea:{width:'90%',height:'100%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script> -->

<script type="text/javascript">
    // google.charts.load('current', {'packages':['corechart']});
    // google.charts.setOnLoadCallback(drawChart);

    // function drawChart() {

    // var data = google.visualization.arrayToDataTable([
    //     ['MONTOS', 'TOTALES'],
    //     ['ENTREGADOS', <?php echo $total_entregados['total'] ?>],
    //     ['SIN ENTREGAR', <?php echo $total_sin_entregar ?>]
    // ]);

    // var options = {
    //   // title: 'My Daily Activities'
    //     chartArea:{width:'90%',height:'100%'}
    // };

    // var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    // chart.draw(data, options);
    // }

    $(function () {
		// $('#config-table').DataTable();
		// responsive table
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