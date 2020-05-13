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
       <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">LISTA DE COTIZACIONES CON TELA INCLUIDA &nbsp;&nbsp;&nbsp;&nbsp; 
                        </h3>
                        <div class="table-responsive m-t-40" id="tabla">
                                <table id="config_table" class="table display table-bordered table-striped no-wrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nombre</th>
                                            <th>Prendas</th>
                                            <th>Tela</th>
                                            <th>Precio Total</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nro = 1;
                                        foreach ($cotizacion as $valor) { ?>
                                        <tr>
                                            <td><?php echo $nro ++ ?></td>
                                            <td><?php echo $valor->nombre ?></td>
                                            <td>Saco y Pantalon</td>
                                            <td><?php echo $valor->nom_tela1 ?> </td>
                                            <td><?php echo $valor->prec_1 ?></td>
                                            <td><?php echo $valor->fecha ?></td>
                                            <td>
                                                <a type="button" href="<?php echo site_url('Cotizacion/membrete/').$valor->id ?>" target="_blank" class="btn btn-warning"><i class="fas fa-file-pdf"></i></a>
                                                <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $valor->id ?>)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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
<<script>
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
            window.location.href = "<?php echo base_url() ?>Cotizacion/eliminar_unido/"+id;
          }
        })
    }
</script>



