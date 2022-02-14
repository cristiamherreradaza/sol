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

       <!-- modal de ingrso de material -->
        <div id="modal-ingrega-material" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline-info">
                                <div class="card-header">
                                    <h4 class="mb-0 text-white">FORMULARIO DE REGISTRO DE PRODUCTO</h4>
                                </div>
                                <div class="card-body">
                                <?php 
                                    $attributes = array('method'=>'POST', 'id' => 'formulario-agregar-producto-legal');
                                    echo form_open('Movimiento/agregarProductoLegal', $attributes); 
                                ?>
                                        <div class="form-body">
                                            <input type="hidden" name="producto_id" id="producto_id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cantidad</label>
                                                        <input type="number" class="form-control" required step="0.1" id="stock" name="stock">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Precio por Unidad</label>
                                                        <input type="number" class="form-control" step="0.1" id="precio_unidad" name="precio_unidad">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Precio de Venta</label>
                                                        <input type="number" class="form-control" step="0.1" id="precio_venta" name="precio_venta">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Precio Total</label>
                                                        <input type="number" class="form-control" required step="0.01" id="precio_total" name="precio_total">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha</label>
                                                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d');?>">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Detalle</label>
                                                        <input type="text" class="form-control" id="detalle" name="detalle">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="control-label">Almacen</label>
                                                    <select name="almacen_id" id="almacen_id" class="form-control">
                                                        <?php
                                                        foreach ($almacenes as $al){
                                                        ?>
                                                        <option  value="<?=$al->id?>" <?php $seleccionado  =  ($al->id == $this->session->almacen_id)? 'selected' : ''; echo $seleccionado?>><?=$al->nombre?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn waves-effect waves-light btn-block btn-success" onclick="guardaProductoLegal();">GUARDA</button>
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
       <!-- end modal de ingrso de material -->


        <!-- MODAL AGREGAR ITEM -->
        <div id="myModalAgregarItem" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center">Agregar Producto "<span class="text-info" id="nombre-categoria"></span>"</h2>
                                        <hr/>
                                        <!-- <form action="<?//=base_url('aberturas/guarda'); ?>" method="POST" id="formulario-abertura"> -->
                                        <?php 
                                            $attributes = array('method'=>'POST', 'id' => 'formulario-agregar-producto');
                                            echo form_open('Movimiento/agregarProducto', $attributes); 
                                        ?>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Cantidad</label>
                                                                <input type="number" name="cantidad-agregar" id="cantidad-agregar" class="form-control" required>
                                                                <input type="hidden" name="producto_id-agregar" id="producto_id-agregar">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Detalle</label>
                                                                <input type="text" name="detalle-agregar"id="detalle-agregar" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="control-label">Almacen</label>
                                                            <select name="almacen_id-agregar" id="almacen_id-agregar" class="form-control">
                                                                <?php
                                                                foreach ($almacenes as $al){
                                                                ?>
                                                                <option  value="<?=$al->id?>" <?php $seleccionado  =  ($al->id == $this->session->almacen_id)? 'selected' : ''; echo $seleccionado?>><?=$al->nombre?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="AgregarProducto()" class="btn waves-effect waves-light btn-block btn-success">AGREGAR PRODUCTO</button>
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
        <!-- END MODAL AGREGAR ITEM -->

        <!-- MODAL SACAR ITEM -->
        <div id="myModalSacarItem" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center">Sacar Produto "<span class="text-info" id="nombre-categoria"></span>"</h2>
                                        <hr/>
                                        <!-- <form action="<?//=base_url('aberturas/guarda'); ?>" method="POST" id="formulario-abertura"> -->
                                        <?php 
                                            $attributes = array('method'=>'POST', 'id' => 'formulario-saca-producto');
                                            echo form_open('Movimiento/sacaProducto', $attributes); 
                                        ?>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Cantidad</label>
                                                                <input type="number" name="cantidad-sacado" id="cantidad-sacado" class="form-control" required>
                                                                <input type="hidden" name="producto_id" id="producto_id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Detalle</label>
                                                                <input name="detalle-quitar" type="text" id="detalle-quitar" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="SacarProducto()" class="btn waves-effect waves-light btn-block btn-danger">SACAR PRODUCTO</button>
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
        <!-- END MODAL SACAR ITEM -->

        <div id="myModalEditar" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center">Formulario de Producto</h2>
                                        <hr/>
                                        <!-- <form action="<?//=base_url('aberturas/guarda'); ?>" method="POST" id="formulario-abertura"> -->
                                        <?php 
                                            $attributes = array('method'=>'POST', 'id' => 'formulario-producto');
                                            echo form_open('inventarios_Compra/guardarProducto', $attributes); 
                                        ?>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre del Producto</label>
                                                                <input name="nombre-producto" type="text" id="nombre-producto" class="form-control" required>
                                                                <input type="hidden" name="producto-edita" id="producto-edita">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Tipo</label>
                                                                <!-- <input name="tipo-producto" type="text" id="tipo-producto" class="form-control" required> -->
                                                                <select name="tipo-producto" id="tipo-producto" class="form-control" required>
                                                                    <option value="METROS">METROS</option>
                                                                    <option value="UNIDADES">UNIDADES</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="control-label">Cantidad</label>
                                                            <input name="cantidad-producto-edita" type="number" id="cantidad-producto-edita" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Precio por unidad</label>
                                                            <input name="preciounidad-edita" type="number" id="preciounidad-edita" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Precio por venta</label>
                                                            <input name="precioventa-edita" type="number" id="precioventa-edita" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label">Precio Total</label>
                                                            <input name="preciototal-edita" type="number" id="preciototal-edita" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="control-label">Fecha</label>
                                                            <input name="fecha-edita" type="date" id="fecha-edita" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="control-label">Detalle</label>
                                                            <input name="detalle-edita" type="text" id="detalle-edita" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="control-label">Almacen</label>
                                                            <select name="almacen_id-edita" id="almacen_id-edita" class="form-control">
                                                                <?php
                                                                foreach ($almacenes as $al){
                                                                ?>
                                                                <option  value="<?=$al->id?>" <?php $seleccionado  =  ($al->id == $this->session->almacen_id)? 'selected' : ''; echo $seleccionado?>><?=$al->nombre?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="guardarProducto()" class="btn waves-effect waves-light btn-block btn-success">GUARDA PRODUCTO</button>
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

        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">LISTA DE ITEMS &nbsp;&nbsp;&nbsp;&nbsp;</h3>
                            </div>
                            <div class="col-md-6 align-right">
                                <button class="btn btn-success btn-block" onclick="nuevoItem()"> + Nuevo Item</button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive m-t-40" id="tabla">
                                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Material</th>
                                            <th>Cantidad en Inventario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($productos as  $pro){

                                    		    $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $pro->id AND  borrado is null")->result();
                                    		    $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $pro->id AND  borrado is null")->result();

                                                $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;
                                            ?>
                                            <tr>
                                                <td><?=$pro->id?></td>
                                                <td><?=$pro->nombre?></td>
                                                <td>
                                                    <?php
                                                        if($cantidadTotal > 0){
                                                            echo $cantidadTotal." ". $pro->tipo;
                                                        }else{
                                                           echo 0 ." ". $pro->tipo; 
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning" onclick="editar_material('<?=$pro->id?>', '<?=$pro->nombre?>','<?=$pro->tipo?>')" title="Editar <?=$pro->nombre?>"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-info" onclick="ver_material('<?=$pro->id?>')" title="Ver <?=$pro->nombre?>"><i class="fas fa-eye"></i></button>
                                                    <button class="btn btn-dark" onclick="agregarProductoLegal('<?=$pro->id?>')"><i class=" fas fa-chevron-circle-down"></i></button>
                                                    <button class="btn btn-danger" onclick="quitar('<?=$pro->id?>', '<?=$pro->nombre?>')" title="Editar <?=$pro->nombre?>"><i class="fas fa-minus-circle"></i></button>
                                                    <button class="btn btn-success" onclick="add('<?=$pro->id?>', '<?=$pro->nombre?>','<?=$pro->tipo?>')" title="Editar <?=$pro->nombre?>"><i class="fas fa-plus-circle"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        ?>
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
<script src="<?php echo base_url(); ?>public/main/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<!-- ============================================================== -->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
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
<script>
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

    });

    function ver_material(id){
        window.location.href = "<?php echo base_url().'Inventarios_Compra/verMaterial/' ?>"+id;
    }

    function editar_material(id, nombre, tipo){
        // alert(id);
        $('#nombre-producto').val(nombre);
        $('#tipo-producto').val(tipo);
        $('#producto-edita').val(id);
        $('#myModalEditar').modal('show')
    }

    function guardarProducto(){
        // alert("En desarrollo :v");
        if($('#formulario-producto')[0].checkValidity()){
			$('#formulario-producto').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-producto')[0].reportValidity()
        }
    }

    function quitar(producto_id, nombre){
        $("#nombre-categoria").text(nombre);
        $("#producto_id").val(producto_id);
        $("#myModalSacarItem").modal('show');
    }

    function SacarProducto(){
        
        if($('#formulario-saca-producto')[0].checkValidity()){
			$('#formulario-saca-producto').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-saca-producto')[0].reportValidity()
        }
    }

    function add(producto_id, nombre){
        $("#nombre-categoria").text(nombre);
        $("#producto_id-agregar").val(producto_id);
        $("#myModalAgregarItem").modal('show');
    }

    function AgregarProducto(){
        // alert("En desarrollo :v");
        if($('#formulario-agregar-producto')[0].checkValidity()){
			$('#formulario-agregar-producto').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-agregar-producto')[0].reportValidity()
        }
    }

    function agregarProductoLegal(id){
        $("#producto_id").val(id);
        $('#modal-ingrega-material').modal('show');
    }

    $('#precio_unidad').on('change', function(e){
        var precio_unidad = e.target.value;
        var stock = $("#stock").val();
        var total = precio_unidad * stock;
        $('#precio_total').val(total);
        console.log(stock);
    });

    function guardaProductoLegal(){
        if($('#formulario-agregar-producto-legal')[0].checkValidity()){
			$('#formulario-agregar-producto-legal').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-agregar-producto-legal')[0].reportValidity()
        }
    }

    function nuevoItem(){
        $('#producto-edita').val('0');
        $('#nombre-producto').val('');
        $('#tipo-producto').val('METROS');
        $('#cantidad-producto-edita').val('');
        $('#myModalEditar').modal('show');
    }

    $('#preciounidad-edita').on('change', function(e){
        var precio_unidad = e.target.value;
        var stock = $("#cantidad-producto-edita").val();
        var total = precio_unidad * stock;
        $('#preciototal-edita').val(total);
    });
</script>
    

