<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">

<!-- inicio modal content -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <form action="<?php echo base_url() ?>Materiales/guarda" method="POST"> -->
            <?php echo form_open('Materiales/guarda', array('method'=>'POST')); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">FORMULARIO DE NUEVO MATERIAL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input name="nombre" type="text" id="nombre" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control custom-select" required>
                                    <option value="METROS">METROS</option>
                                    <option value="UNIDADES">UNIDADES</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA MATERIAL</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->

<!-- inicio modal content -->
<div id="myModaledit" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <form action="<?php echo base_url() ?>Materiales/editar" method="POST"> -->
            <?php echo form_open('Materiales/editar', array('method'=>'POST')); ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">FORMULARIO DE NUEVO MATERIAL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" name="id" id="idedit" hidden>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input name="nombre" type="text" id="nombreedit" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <select name="tipo" id="tipoedit" class="form-control custom-select" required>
                                    <option value="METROS">METROS</option>
                                    <option value="UNIDADES">UNIDADES</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn waves-effect waves-light btn-block btn-success" onclick="editar1()">EDITAR MATERIAL</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->

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
            <div class="col-12">
                <!-- table responsive -->
                <div class="card">
                    <div class="card-body">
                        <?php //vdebug($trabajos, true, false, true) ?>
                        <h3 class="card-title">LISTADO DE MATERIALES &nbsp;&nbsp;&nbsp;&nbsp; 
                            <button type="button" class="btn btn-info" onclick="abre_modal();"><i class="fas fa-plus"></i> NUEVA MATERIAL</button>
                        </h3>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nro = 1;
                                     foreach ($categorias as $a): ?>
                                    <tr>
                                        <td><?php echo $nro ++ ?></td>
                                        <td><?php echo $a->nombre ?></td>
                                        <td><?php echo $a->tipo ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" onclick="editar(<?php echo $a->id ?>, '<?php echo $a->nombre ?>', '<?php echo $a->tipo ?>')"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $a->id ?>, '<?php echo $a->nombre ?>')"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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
    <footer class="footer"> © 2019 Monster Admin by wrappixel.com </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script>
    $(function () {
        $('#config-table').DataTable({
            responsive: true,
            "order": [
                [0, 'des']
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });

    });

    function abre_modal()
    {
        $('#nombre').val("");
        $('#tipo').val("falda");
        $('#genero').val("varon");
        $("#myModal").modal('show');

    }

    function cierra_modal()
    {
        $("#myModal").modal('hide');
    }

    function editar(id, nombre, tipo)
    {
        $('#idedit').val(id)
        $('#nombreedit').val(nombre)
        $('#tipoedit').val(tipo)
        $("#myModaledit").modal('show');
    }

    function editar1(){
        var id = $("#idedit").val();
        var nombre = $("#nombreedit").val();
        var tipo = $("#tipoedit").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        // alert(tipo);

        Swal.fire({
          title: 'Estas seguro que quieres editarlo',
          text: "Luego no podras recuperarlo!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro!',
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Excelente!',
              'Fue editado exitosamente.',
              'success'
            );

            $.ajax({
                url: '<?php echo base_url(); ?>Materiales/editar1/',
                type: 'GET',
                dataType: 'json',
                data: {csrfName: csrfHash, param1: id, param2: nombre, param3: tipo },
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    if (data.estado == 'editado') {
                        window.location.href = "<?php echo base_url() ?>Materiales/categorias/";
                    }
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    alerta_ci();
                }
            });

            
          }
        })
    }

    function eliminar(id, nombre){

        Swal.fire({
          title: 'Quieres borrar '+nombre+'?',
          text: "Luego no podras recuperarlo!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro!',
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Excelente!',
               nombre + ' fue borrado.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>Materiales/eliminar/"+id;
          }
        })
    }

</script>

<script>
function alerta(){
    var nombre = $('#nombre').val();

    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'El material '+ nombre + ', ya se encuentra registrado.',
      footer: '<a href>Solo se puede registrar una sola vez!</a>'
    })

}
</script>

<script type="text/javascript">
$('#nombre').on('change', function(e){
    
        var nombre = $("#nombre").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Materiales/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: nombre},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                if (data.estado == 'registrado') {
                    alerta();
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                alerta_ci();
            }
        });
  });
   
</script>
