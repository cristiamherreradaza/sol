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
                    <!-- <form action="<?//=base_url('aberturas/guarda'); ?>" method="POST" id="formulario-abertura"> -->
                    <?php 
        				$attributes = array('method'=>'POST', 'id' => 'formulario-separado');
                        echo form_open('Cotizacion/guarda_separado', $attributes); 
                    ?>
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">FORMULARIO DE COTIZACION</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <!-- <input type="hidden" name="ida" id="ida" value=""> -->
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">A nombre de </label>
                                            <input name="nombre" type="text" id="nombre" class="form-control" required>
											<input type="hidden" name="nuevo-edita" id="nuevo-edita">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Confeccion para Varon</h3>
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Cantidad</th>
                                                    <th>Prendas</th>
                                                    <th>Costo Real</th>
                                                    <th>Costo por Mayor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2 Piezas</td>
                                                    <td>Saco y Pantalon</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_v_1" name="costo_real_v_1"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_v_1" name="costo_mayor_v_1"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>3 Piezas</td>
                                                    <td>Saco, Pantalon y Chaleco</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_v_2" name="costo_real_v_2"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_v_2" name="costo_mayor_v_2"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Pieza</td>
                                                    <td>Camisa y Corbata</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_v_3" name="costo_real_v_3"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_v_3" name="costo_mayor_v_3"> Bs.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Confeccion para Dama</h3>
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Cantidad</th>
                                                    <th>Prendas</th>
                                                    <th>Costo Real</th>
                                                    <th>Costo por Mayor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2 Piezas</td>
                                                    <td>Saco y Pantalon</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_m_1" name="costo_real_m_1"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_m_1" name="costo_mayor_m_1"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>3 Piezas</td>
                                                    <td>Saco, Pantalon y Falda</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_m_2" name="costo_real_m_2"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_m_2" name="costo_mayor_m_2"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Pieza</td>
                                                    <td>Chaleco</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_m_3" name="costo_real_m_3"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_m_3" name="costo_mayor_m_3"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Pieza</td>
                                                    <td>Blusa</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_m_4" name="costo_real_m_4"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_m_4" name="costo_mayor_m_4"> Bs.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Metros</th>
                                                    <th>Marca</th>
                                                    <th>Precio Real por Metro</th>
                                                    <th>Precio por Mayor el Metro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1 Metro</td>
                                                    <td>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_1" name="id_tela_1"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_tela_1" name="costo_real_tela_1"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_tela_1" name="costo_mayor_tela_1"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Metro</td>
                                                    <td>
                                                    <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_2" name="id_tela_2"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.  </option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_tela_2" name="costo_real_tela_2"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_tela_2" name="costo_mayor_tela_2"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>1 Metro</td>
                                                    <td>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id_tela_3" name="id_tela_3"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input  class="form-control"  type="text" required id="costo_real_tela_3" name="costo_real_tela_3"> Bs.</td>
                                                    <td><input  class="form-control"  type="text" required id="costo_mayor_tela_3" name="costo_mayor_tela_3"> Bs.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="guardarabertura()" class="btn waves-effect waves-light btn-block btn-success">GUARDA COTIZACION</button>
                        </div>
                    </form>

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
                        <h3 class="card-title">LISTA DE COTIZACIONES CON TELA SEPARADA &nbsp;&nbsp;&nbsp;&nbsp; 
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
                                        // var_dump($cotizacion);
                                        foreach ($cotizacion as $valor) { ?>
                                        <tr>
                                            <td><?php echo $nro ++ ?></td>
                                            <td><?php echo $valor->nombre_cotizador ?></td>
                                            <td>Saco y Pantalon</td>
                                            <td><?php echo $valor->nom_tela1 ?> </td>
                                            <td><?php echo $valor->costo_real_tela_1 ?></td>
                                            <td><?php echo $valor->fecha ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" id="editar" onclick="editar('<?=$valor->id_cot?>','<?=$valor->nombre_cotizador?>','<?=$valor->costo_real_v_1?>','<?=$valor->costo_mayor_v_1?>','<?=$valor->costo_real_v_2?>','<?=$valor->costo_mayor_v_2?>','<?=$valor->costo_real_v_3?>','<?=$valor->costo_mayor_v_3?>','<?=$valor->costo_real_m_1?>','<?=$valor->costo_mayor_m_1?>','<?=$valor->costo_real_m_2?>','<?=$valor->costo_mayor_m_2?>','<?=$valor->costo_real_m_3?>','<?=$valor->costo_mayor_m_3?>','<?=$valor->costo_real_m_4?>','<?=$valor->costo_mayor_m_4?>','<?=$valor->id_tela_1?>','<?=$valor->costo_real_tela_1?>','<?=$valor->costo_mayor_tela_1?>','<?=$valor->id_tela_2?>','<?=$valor->costo_real_tela_2?>','<?=$valor->costo_mayor_tela_2?>','<?=$valor->id_tela_3?>','<?=$valor->costo_real_tela_3?>','<?=$valor->costo_mayor_tela_3?>')" ><i class="fas fa-edit"></i></button>
                                                <a type="button" href="<?php echo site_url('Cotizacion/reporte/').$valor->id ?>" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i></a>
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
<script>
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
</script>



