<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

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
                                                    <td><?php $total = $a->suma - $venta->suma;
                                                        echo $total;?> <?php echo $a->tipo ?></td>
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
                                <div id="m-piechart" style="width:100%; height:278px"></div>
                                <div class="text-center">
                                    <ul class="list-inline mt-3">
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-success"></i>FORRO</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-primary"></i>TAFETA</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-danger"></i>BONYE</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-muted"></i>PELLON</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-warning"></i>ENTRE TELA</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-dark"></i>HOMBRERA (VARON)</h6> </li>
                                        <li>
                                            <h6 class="text-muted"><i class="fa fa-circle mr-1 text-ligth"></i>HILO</h6> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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

