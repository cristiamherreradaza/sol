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
                        echo form_open('Cotizacion/guarda', $attributes); 
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
                                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Cantidad</th>
                                                    <th>Prendas</th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id1" name="id1"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id2" name="id2"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id3" name="id3"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Saco y Pantalon</td>
                                                    <td><input type="text" required id="pre_1" name="pre_1"> Bs.</td>
                                                    <td><input type="text" required id="pre_2" name="pre_2"> Bs.</td>
                                                    <td><input type="text" required id="pre_3" name="pre_3"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Saco, Pantalon y Chaleco</td>
                                                    <td><input type="text" required id="pre_4" name="pre_4"> Bs.</td>
                                                    <td><input type="text" required id="pre_5" name="pre_5"> Bs.</td>
                                                    <td><input type="text" required id="pre_6" name="pre_6"> Bs.</td>
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
                                                    <th>Cantidad</th>
                                                    <th>Prendas</th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id4" name="id4" />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option data-nombre1="<?php echo $te->nombre; ?>" value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id5" name="id5"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="col-md-10 mb-3">
                                                                <select class="form-control custom-select" data-style="btn-primary" required id="id6" name="id6"  />
                                                                    <option>Seleccionar una Tela</option>
                                                                <?php foreach($telas as $te){ ?>
                                                                    <option value="<?php echo $te->id; ?>"><?php echo $te->nombre; ?> <?php echo $te->precio; ?> Bs.</option>
                                                                <?php } ?>
                                                                </select>   
                                                            <div class="invalid-feedback">
                                                                Please provide a valid city.
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Saco y Pantalon</td>
                                                    <td><input type="text" required id="pre_7" name="pre_7"> Bs.</td>
                                                    <td><input type="text" required id="pre_8" name="pre_8"> Bs.</td>
                                                    <td><input type="text" required id="pre_9" name="pre_9"> Bs.</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Saco, Pantalon y Falda</td>
                                                    <td><input type="text" required id="prec_1" name="prec_1"> Bs.</td>
                                                    <td><input type="text" required id="prec_2" name="prec_2"> Bs.</td>
                                                    <td><input type="text" required id="prec_3" name="prec_3"> Bs.</td>
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
                                                <button type="button" class="btn btn-warning" onclick="edita('<?=$valor->id?>','<?=$valor->nombre?>','<?=$valor->tela_id_1?>','<?=$valor->tela_id_2?>','<?=$valor->tela_id_3?>','<?=$valor->prec_1?>','<?=$valor->prec_2?>','<?=$valor->prec_3?>','<?=$valor->prec_4?>','<?=$valor->prec_5?>','<?=$valor->prec_6?>','<?=$valor->tela_id_4?>','<?=$valor->tela_id_5?>','<?=$valor->tela_id_6?>','<?=$valor->prec_7?>','<?=$valor->prec_8?>','<?=$valor->prec_9?>','<?=$valor->precio_1?>','<?=$valor->precio_2?>','<?=$valor->precio_3?>')"><i class="fas fa-edit"></i></button>
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

    $('#id1').on('change', function(e){
        var id = e.target.value;
        $('#id4').val(id);
    });

    $('#id2').on('change', function(e){
        var id = e.target.value;
        $('#id5').val(id);
    });

    $('#id3').on('change', function(e){
        var id = e.target.value;
        $('#id6').val(id);
    });
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

    function edita(id, nombre, tela_id_1, tela_id_2, tela_id_3, prec_1, prec_2, prec_3, prec_4, prec_5, prec_6, tela_id_4, tela_id_5, tela_id_6, prec_7, prec_8, prec_9, precio_1, precio_2, precio_3){
        $('#myModal-edita').modal('show');
        $('#nuevo-edita').val(id);
        $('#nombre').val(nombre);
        $('#id1').val(tela_id_1);
        $('#id2').val(tela_id_2);
        $('#id3').val(tela_id_3);
        $('#pre_1').val(prec_1);
        $('#pre_2').val(prec_2);
        $('#pre_3').val(prec_3);
        $('#pre_4').val(prec_4);
        $('#pre_5').val(prec_5);
        $('#pre_6').val(prec_6);
        $('#id4').val(tela_id_4);
        $('#id5').val(tela_id_5);
        $('#id6').val(tela_id_6);
        $('#pre_7').val(prec_7);
        $('#pre_8').val(prec_8);
        $('#pre_9').val(prec_9);
        $('#prec_1').val(precio_1);
        $('#prec_2').val(precio_2);
        $('#prec_3').val(precio_3);
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



