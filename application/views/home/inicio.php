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
        <!-- inicio modal content -->
        <div id="myModal-edita" class="modal bs-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <h1>aqui vendra los modal</h1>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- fin modal -->
       <!-- Row -->  
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-xlg-4">
                                <div class="card">
                                    <div class="box p-2 rounded bg-info text-center">
                                        <h1 class="font-weight-light text-white"><?=$cant_total_clientes?></h1>
                                        <h6 class="text-white">Cantidad Total de Clientes</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-4">
                                <div class="card">
                                    <div class="box p-2 rounded bg-primary text-center">
                                        <h1 class="font-weight-light text-white"><?=$cant_total_trabajos_esteMes?></h1>
                                        <h6 class="text-white">Cantidad de Trabajos del Mes Actual</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-4">
                                <div class="card">
                                    <div class="box p-2 rounded bg-success text-center">
                                        <h1 class="font-weight-light text-white"><?=$cat_tot_trab_mes_mo_entregados?></h1>
                                        <h6 class="text-white">Cantidad de Trabajos sin entregar del Mes Actual </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div id="top_x_div" style="width: 800px; height: 600px;"></div>                                 -->
                                <div id="top_x_div" style="width: 800px; height: 300px;"></div>                                
                            </div>
                        </div> 
                        <br>                                              
                        <div class="row">
                            <div class="col-md-6">
                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="donutchart" style="width: 900px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      
<script>
    $(function () {
        $('#config_table').DataTable({
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
<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart1);

    function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
        ['Move', 'Cantidad de Trabajos'],
        ["Enero", <?=$Enero?>],
        ["Febrero", <?=$Febrero?>],
        ["Marzo", <?=$Marzo?>],
        ["Abril", <?=$Abril?>],
        ['Mayo', <?=$Mayo?>],
        ['Junio', <?=$Junio?>],
        ['Julio', <?=$Julio?>],
        ['Agosto', <?=$Agosto?>],
        ['Septiembre', <?=$Septiembre?>],
        ['Octubre', <?=$Octubre?>],
        ['Noviembre', <?=$Noviembre?>],
        ['Diciembre', <?=$Diciembre?>],
    ]);

    var options = {
        width: 1400,
        legend: { position: 'none' },
        chart: {
        title: 'Cantidad de trabajos por mes de la Gestion '+<?=date('Y')?>,
        subtitle: 'popularity by percentage' },
        axes: {
        x: {
            0: { side: 'top', label: 'White to move'} // Top x-axis.
        }
        },
        bar: { groupWidth: "90%" }
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    // Convert the Classic options to Material options.
    chart.draw(data, google.charts.Bar.convertOptions(options));
    };



    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Trabajo Con Deuda',<?=$tra_deuda?>],
        ['Trabajo Pagados',<?=$tra_pagado?>]
    //   ['Commute',  2],
    //   ['Watch TV', 2],
    //   ['Sleep',    7]
    ]);

    var options = {
        title: 'Trabajos pagados o con Deudas',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
    }


    function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2]
        // ['Commute',  2],
        // ['Watch TV', 2],
        // ['Sleep',    7]
    ]);

    var options = {
        title: 'My Daily Activities',
        pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
    }



</script>
<!-- <script>
	function eliminar(id){

        Swal.fire({
          title: 'Quieres borrar?',
          text: "Luego no podras recuperarlo!",
          type: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro!',
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Excelente!',
               'fue borrado.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>Cotizacion/eliminar_separado/"+id;
          }
        })
    }

    function editar(id,nombre,costo_real_v_1,costo_mayor_v_1,costo_real_v_2,costo_mayor_v_2,costo_real_v_3,costo_mayor_v_3,costo_real_m_1,costo_mayor_m_1,costo_real_m_2,costo_mayor_m_2,costo_real_m_3,costo_mayor_m_3,costo_real_m_4,costo_mayor_m_4,id_tela_1,costo_real_tela_1,costo_mayor_tela_1,id_tela_2,costo_real_tela_2,costo_mayor_tela_2,id_tela_3,costo_real_tela_3,costo_mayor_tela_3){
        // alert("en desarrollo :v");
        $('#myModal-edita').modal('show');
        $('#nuevo-edita').val(id);
        $('#nombre').val(nombre);
        $('#costo_real_v_1').val(costo_real_v_1);
        $('#costo_mayor_v_1').val(costo_mayor_v_1);
        $('#costo_real_v_2').val(costo_real_v_2);
        $('#costo_mayor_v_2').val(costo_mayor_v_2);
        $('#costo_real_v_3').val(costo_real_v_3);
        $('#costo_mayor_v_3').val(costo_mayor_v_3);
        $('#costo_real_m_1').val(costo_real_m_1);
        $('#costo_mayor_m_1').val(costo_mayor_m_1);
        $('#costo_real_m_2').val(costo_real_m_2);
        $('#costo_mayor_m_2').val(costo_mayor_m_2);
        $('#costo_real_m_3').val(costo_real_m_3);
        $('#costo_mayor_m_3').val(costo_mayor_m_3);
        $('#costo_real_m_4').val(costo_real_m_4);
        $('#costo_mayor_m_4').val(costo_mayor_m_4);
        $('#id_tela_1').val(id_tela_1);
        $('#costo_real_tela_1').val(costo_real_tela_1);
        $('#costo_mayor_tela_1').val(costo_mayor_tela_1);
        $('#id_tela_2').val(id_tela_2);
        $('#costo_real_tela_2').val(costo_real_tela_2);
        $('#costo_mayor_tela_2').val(costo_mayor_tela_2);
        $('#id_tela_3').val(id_tela_3);
        $('#costo_real_tela_3').val(costo_real_tela_3);
        $('#costo_mayor_tela_3').val(costo_mayor_tela_3);
    }

    function guardarabertura(){
        if($('#formulario-separado')[0].checkValidity()){
			$('#formulario-separado').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-separado')[0].reportValidity()
        }
    }
</script> -->



