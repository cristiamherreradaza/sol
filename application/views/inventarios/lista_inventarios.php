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
                                                                <input type="text" name="categoria_id-agregar" id="categoria_id-agregar">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Detalle</label>
                                                                <input type="text" name="detalle-agregar"id="detalle-agregar" class="form-control" required>
                                                            </div>
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
                                                                <input type="hidden" name="categoria_id" id="categoria_id">
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
            <div class="modal-dialog">
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
                                                                <input name="tipo-producto" type="text" id="tipo-producto" class="form-control" required>
                                                            </div>
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
                        <h3 class="card-title">LISTA DE INVENTARIOS &nbsp;&nbsp;&nbsp;&nbsp;
                        </h3>
                        <div class="table-responsive m-t-40" id="tabla">
                                <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Material</th>
                                            <th>Cantidad en Inventario</th>
                                            <th>Acciones</th>
                                            <!-- <th>Precio de Venta</th> -->
                                            <!-- <th>Precio Total</th> -->
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
                                            <td>
                                                <button class="btn btn-warning" onclick="editar_material('<?=$a->id?>', '<?=$a->nombre?>','<?=$a->tipo?>')" title="Editar <?=$a->nombre?>"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-info" onclick="ver_material('<?=$a->id?>')" title="Ver <?=$a->nombre?>"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-danger" onclick="quitar('<?=$a->id?>', '<?=$a->nombre?>')" title="Editar <?=$a->nombre?>"><i class="fas fa-minus-circle"></i></button>
                                                <button class="btn btn-success" onclick="add('<?=$a->id?>', '<?=$a->nombre?>','<?=$a->tipo?>')" title="Editar <?=$a->nombre?>"><i class="fas fa-plus-circle"></i></button>
                                            </td>
                                            <!-- <td><?php echo $valores->precio_unidad ?></td>
                                            <td><?php echo $valores->precio_venta ?></td> -->
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
            <!-- <div class="col-lg-6">
                <div class="col-md-12">
                  <div class="card card-outline-success">
                      <div class="card-header">
                          <h4 class="mb-0 text-white">RESUMEN INGRESOS DE INVENTARIO</h4>
                      </div>
                      <div class="card-body">
                          <div id="piechart_3d" style="width: 100%; height: 300px;"></div>
                          <br>
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-outline-primary">
                      <div class="card-header">
                          <h4 class="mb-0 text-white">RESUMEN SALIDA DE INVENTARIO</h4>
                      </div>
                      <div class="card-body">
                          <div id="piechart" style="width: 100%; height: 300px;"></div>
                          <br>
                      </div>
                    </div>
                </div>
            </div> -->
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
                [0, 'asc']
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

    function quitar(categoria_id, nombre){
        $("#nombre-categoria").text(nombre);
        $("#categoria_id").val(categoria_id);
        $("#myModalSacarItem").modal('show');
    }

    function SacarProducto(){
        // alert("En desarrollo :v");
        if($('#formulario-saca-producto')[0].checkValidity()){
			$('#formulario-saca-producto').submit();
            Swal.fire("Excelente!", "Registro Guardado!", "success");
        }else{
            $('#formulario-saca-producto')[0].reportValidity()
        }
    }

    function add(categoria_id, nombre){
        $("#nombre-categoria").text(nombre);
        $("#categoria_id-agregar").val(categoria_id);
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
</script>
    

