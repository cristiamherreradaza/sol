<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">


<!-- inicio modal content -->
<div id="myModalVer" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="d-flex align-items-center flex-row mt-4">
                                    <div class="p-2 display-6 text-dark"> <img src="<?php echo base_url(); ?>public/assets/images/reportes/icono.png"><span> Detalle de Material</span></div>
                                </div>
                                <hr/>
                                <table class="table no-border">
                                    <tr id="nombreVer">

                                    </tr>
                                    <tr id="cantidadVer">

                                    </tr>
                                    <tr id="precio_ventaVer">
                                        
                                    </tr>
                                    <tr id="precio_totalVer">
                                        
                                    </tr>
                                    <tr id="detalleVer">
                                        
                                    </tr>
                                    <tr id="fechaVer">
                                        
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
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
          <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">EDITAR REGISTRO</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-body">

                                                <div>
                                                    <input type="text" name="idEdit" id="idEdit" hidden>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="control-label">Material</label>
                                                        <select name="categorias" id="categoriasEdit" required class="select2" style="width: 100%">
                                                            <option class="prueba" value=""></option>
                                                            <?php 
                                                            foreach ($categorias as $val) {
                                                            ?>
                                                            <option value="<?php echo $val->id ?>"><?php echo $val->nombre ?></option>
                                                            <?php } ?>
                                                        </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Cantidad</label>
                                                            <input type="number" class="form-control" required step="0.1" id="cantidadEdit" name="cantidadedit">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Precio de Venta</label>
                                                            <input type="number" class="form-control" step="0.1" id="precio_ventaEdit" name="precio_venta">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Precio Total</label>
                                                            <input type="number" class="form-control" required step="0.01" id="precio_totalEdit" name="precio_total">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Fecha</label>
                                                            <input type="date" class="form-control" id="fechaEdit" name="fechaEdit" value="<?php echo date('Y-m-d');?>">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <!--/span-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Detalle</label>
                                                            <input type="text" class="form-control" id="detalleEdit" name="detalle">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn waves-effect waves-light btn-block btn-success" onclick="editar1();">GUARDA</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->

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
         <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">SACAR MATERIAL</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-body">

                                                <div class="col-md-12 mb-3">
                                                    <label class="control-label">Material</label>
                                                        <select name="categorias" id="categorias" required class="select2" style="width: 100%">
                                                            <option value="">SELECCIONE</option>
                                                            <?php 
                                                            foreach ($categorias as $val) {
                                                            ?>
                                                            <option value="<?php echo $val->id ?>"><?php echo $val->nombre ?></option>
                                                            <?php } ?>
                                                        </select>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group-1">
                                                            <label>Cantidad en </label>
                                                            <input type="number" class="form-control" required step="0.1" id="cantidad" name="cantidad">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Precio de Venta</label>
                                                            <input type="number" class="form-control" readonly step="0.1" id="precio_venta" name="precio_venta">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Precio Total</label>
                                                            <input type="number" class="form-control" readonly step="0.01" id="precio_total" name="precio_total">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Fecha</label>
                                                            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d');?>">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    
                                                    <!--/span-->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Detalle</label>
                                                            <input type="text" class="form-control" id="detalle" name="detalle">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn waves-effect waves-light btn-block btn-success" onclick="guarda();">GUARDA</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row -->
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php //vdebug($trabajos, true, false, true) ?>
                                <h3 class="card-title">LISTA DE MATERIALES SACADOS &nbsp;&nbsp;&nbsp;&nbsp; 
                                </h3>
                                <div class="table-responsive m-t-40" id="tabla">
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Material</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Venta</th>
                                                    <th>Precio Total</th>
                                                    <th>Fecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nro = 1;
                                                 foreach ($ventas as $a): 
                                                    $datos = $this->db->get_where('categorias', array('id' => $a->categoria_id,'estado' => 1))->row();
                                                    ?>
                                                <tr>
                                                    <td><?php echo $nro ++ ?></td>
                                                    <td><?php echo $datos->nombre ?></td>
                                                    <td><?php echo $a->cantidad ?> <?php echo $datos->tipo ?></td>
                                                    <td><?php echo $a->precio_venta ?></td>
                                                    <td><?php echo $a->precio_total ?></td>
                                                    <td><?= date("Y-m-d",strtotime($a->fecha));?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" onclick="ver(<?php echo $a->id ?>, '<?php echo $datos->nombre ?>', '<?php echo $a->cantidad ?>', '<?php echo $datos->tipo ?>', '<?php echo $a->precio_venta ?>', '<?php echo $a->precio_total ?>', '<?php echo $a->detalle ?>', '<?= date("Y-m-d",strtotime($a->fecha));?>')"><i class="fas fa-eye"></i></button>
                                                        <button type="button" class="btn btn-warning" onclick="editar(<?php echo $a->id ?>, '<?php echo $a->categoria_id ?>', '<?php echo $datos->nombre ?>', '<?php echo $a->cantidad ?>', '<?php echo $datos->tipo ?>', '<?php echo $a->precio_venta ?>', '<?php echo $a->precio_total ?>', '<?php echo $a->detalle ?>', '<?= date("Y-m-d",strtotime($a->fecha));?>')"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $a->id ?>, '<?php echo $datos->nombre ?>')"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
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
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/dff/dff.js" type="text/javascript"></script>

<script>
     $('#categorias').on('change', function(e){
        var id = e.target.value;
            $.ajax({
                url: '<?php echo base_url(); ?>Inventarios_Venta/ajax_verifica_categoria/',
                type: 'GET',
                dataType: 'json',
                data: { param1: id },
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    if (data.estado == 'no') {
                        // $('#tipo').val(data.tipo);
                        Swal.fire(
                          'No tiene ningun registro',
                          'Con el material '+ data.nombre,
                          'info'
                        )
                    }
                    // else{
                    //     $('.form-group-1').html('<label>Cantidad en '+ data.tipo +'</label><input type="number" class="form-control" required step="0.1" id="cantidad" name="cantidad">');
                    // }
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    alerta_ci();
                }
            });
        });
</script>

<script>
     $('#cantidad').on('change', function(e){
        var cantidad = e.target.value;
        // alert(cantidad);
        var categorias = $("#categorias").val();
            $.ajax({
                url: '<?php echo base_url(); ?>Inventarios_Venta/ajax_verifica_cantidad/',
                type: 'GET',
                dataType: 'json',
                data: { param1: cantidad, param2: categorias },
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    if (data.estado == 'no') {
                        // $('#tipo').val(data.tipo);
                        Swal.fire(
                          'No tiene el material requerido',
                          'Solo cuenta con '+ data.valor + ' ' + data.tipo,
                          'info'
                        )
                        }
                        else{
                            $('#precio_venta').val(data.precio_venta);
                            $('#precio_total').val(data.precio_total);
                        }
                    
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    alerta_ci();
                }
            });
        });
</script>
<script>
     $('#precio_unidad').on('change', function(e){
        var precio_unidad = e.target.value;
        var stock = $("#stock").val();
        var total = precio_unidad * stock;

        $('#precio_total').val(total);
            
        });
</script>
<script>
     $('#cantidadEdit').on('change', function(e){
        var cantidad = e.target.value;
        var precio_venta = $("#precio_ventaEdit").val();
        var total = cantidad * precio_venta;

        $('#precio_totalEdit').val(total);
            
        });
</script>
<script>
     $('#precio_ventaEdit').on('change', function(e){
        var precio_venta = e.target.value;
        var cantidad = $("#cantidadEdit").val();
        var total = cantidad * precio_venta;

        $('#precio_totalEdit').val(total);
        });
</script>

<script>
   function guarda(){
        var categorias = $("#categorias").val();
        var cantidad = $("#cantidad").val();
        var precio_venta = $("#precio_venta").val();
        var precio_total = $("#precio_total").val();
        var fecha = $("#fecha").val();
        var detalle = $("#detalle").val();

        if (categorias ==='' || fecha ===''){
            Swal.fire(
                  'Debe llenar los datos requeridos',
                  'Antes de Guardar',
                  'info'
                )
        }else
        {
            $.ajax({
                url: '<?php echo base_url(); ?>Inventarios_Venta/guarda/',
                type: 'get',
                dataType: 'json',
                data: {param1: categorias, param2: cantidad, param3: precio_venta, param4: precio_total, param5: fecha, param6: detalle },
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    if (data.estado == 'registrado') {
                        // window.location.href = "<?php echo base_url() ?>Inventarios_Compra/";
                        // $('#config-table').dataTable()._fnAjaxUpdate();
                        // $("#config-table").dataTable().fnReloadAjax();
                        alerta_bien();
                        // setInterval(
                        //     function(){
                        //         window.location.href = "<?php echo base_url() ?>Inventarios_Compra/";
                        //         },7000
                        // );
                        
                    }
                },
                error:function(jqXHR, textStatus, errorThrown) {
                    alerta_ci();
                }
            });
        }
    }
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
    function editar(id, categoria_id, nombre, cantidad, tipo, precio_venta, precio_total, detalle, fecha)
    {
      
        $('#categoriasEdit').html('<option class="prueba" value="' + categoria_id + '"> ' + nombre + ' </option>');
        $('#idEdit').val(id)
        // $('#categoriasEdit').val(categoria_id)
        $('#cantidadEdit').val(cantidad)
        $('#precio_ventaEdit').val(precio_venta)
        $('#precio_totalEdit').val(precio_total)
        $('#fechaEdit').val(fecha)
        $('#detalleEdit').val(detalle)
        $("#myModaledit").modal('show');
    }

    function ver(id, nombre, cantidad, tipo, precio_venta, precio_total, detalle, fecha)
    {
        $('#nombreVer').html('<td>Material</td><td class="font-medium">' + nombre + '</td>');
        $('#cantidadVer').html('<td>Cantidad</td><td class="font-medium">' + cantidad + ' ' + tipo  + '</td>');
        $('#precio_ventaVer').html('<td>Precio de Venta</td><td class="font-medium">' + precio_venta + ' Bs.</td>');
        $('#precio_totalVer').html('<td>Precio Total</td><td class="font-medium">' + precio_total + ' Bs.</td>');
        $('#detalleVer').html('<td>Detalle</td><td class="font-medium">' + detalle + ' </td>');
        $('#fechaVer').html('<td>Fecha de Salida</td><td class="font-medium">' + fecha + ' </td>');
        $("#myModalVer").modal('show');
    }

    function editar1(){

        var id = $("#idEdit").val();
        var categorias = $("#categoriasEdit").val();
        var cantidad = $("#cantidadEdit").val();
        var precio_venta = $("#precio_ventaEdit").val();
        var precio_total = $("#precio_totalEdit").val();
        var fecha = $("#fechaEdit").val();
        var detalle = $("#detalleEdit").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        // alert(tipo);

        Swal.fire({
          title: 'Estas seguro que quieres editarlo',
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
              'Fue editado exitosamente.',
              'success'
            );

            $.ajax({
                url: '<?php echo base_url(); ?>Inventarios_Venta/editar1/',
                type: 'GET',
                dataType: 'json',
                data: {csrfName: csrfHash, param1: id, param2: categorias, param3: cantidad, param4: precio_venta, param5: precio_total, param6: fecha, param7: detalle },
                // data: {param1: cod_catastral},
                success:function(data, textStatus, jqXHR) {
                    if (data.estado == 'editado') {
                        window.location.href = "<?php echo base_url() ?>Inventarios_Venta/";
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
               nombre + ' fue borrado.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>Inventarios_Venta/eliminar/"+id;
          }
        })
    }

</script>

<script>
function alerta(){
    var nombre = $('#nombre').val();

    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'El material '+ nombre + ', ya se encuentra registrado.',
      footer: '<a href>Solo se puede registrar una sola vez!</a>'
    })

}
</script>

<script>
function alerta_bien(){

    Swal.fire({
          title: 'Exito',
          text: "Se ingreso el Material correctamente!",
          type: 'success',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK!',
        }).then((result) => {
          if (result.value) {
            window.location.href = "<?php echo base_url() ?>Inventarios_Venta/";
          }
          else{
            window.location.href = "<?php echo base_url() ?>Inventarios_Venta/";
          }
        })


}
</script>


<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
       //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>

<script>

