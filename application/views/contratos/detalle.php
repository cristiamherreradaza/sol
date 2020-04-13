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

            <!-- inicio modal grupo content -->
            <div id="modal_grupo" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <!-- <form action="<?php //echo base_url() ?>aberturas/guarda" method="POST"> -->
                        <?php echo form_open('contratos/edita_grupo'); ?>
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">FORMULARIO DE GRUPO</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <input type="hidden" name="ida" id="ida" value="">
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <input type="hidden" name="grupo_id" value="<?php echo $grupo['id'] ?>">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nombre</label>
                                            <input name="nombre" type="text" id="nombre" class="form-control" value="<?php echo $grupo['nombre'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Celulares</label>
                                            <input name="celulares" type="text" id="celulares" class="form-control" value="<?php echo $grupo['celulares'] ?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Direccion</label>
                                            <input name="direccion" type="text" id="direccion" class="form-control" value="<?php echo $grupo['direccion'] ?>" >
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA ABERTURA</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- fin modal grupo -->

            <!-- inicio modal content -->
            <div id="modal_edita_contrato" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <?php echo form_open('contratos/edita_contrato'); ?>
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel" onclick="function_jquery();">FORMULARIO DE CONTRATO</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="contrato_id" id="contrato_id" value="">
                                            <input type="hidden" name="contrato_grupo_id" id="contrato_grupo_id" value="">

                                            <label class="control-label">Descripcion Contrato</label>
                                            <input name="descripcion" type="text" id="descripcion" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Fecha</label>
                                            <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Cantidad</label>
                                            <input name="cantidad" type="text" id="cantidad" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Precio Saco</label>
                                        <input name="costo_saco" type="number" id="costo_saco" class="form-control calculo" min="0" step="any" required>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Precio Pantalon</label>
                                        <input name="costo_pantalon" type="number" id="costo_pantalon" class="form-control calculo" min="0" step="any" required>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Precio Chaleco</label>
                                        <input name="costo_chaleco" type="number" id="costo_chaleco" class="form-control calculo" min="0" step="any" required>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Precio Falda</label>
                                        <input name="costo_falda" type="number" id="costo_falda" class="form-control calculo" min="0" step="any" required>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Costo Confeccion</label>
                                        <input name="costo_confeccion" type="number" id="costo_confeccion" class="form-control calculo" min="0" step="any" readonly>
                                      </div>
                                    </div>
                                    
                                </div>

                                <div class="row">

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Tela</label>
                                        <select name="tela_propia" class="form-control custom-select">
                                          <option value="NO">Sin Tela</option>
                                          <option value="SI">Con Tela</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Marca</label>
                                        <input type="text" name="marca" id="marca" class="form-control">
                                      </div>
                                    </div>


                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Precio Tela</label>
                                        <input name="costo_tela" type="number" id="costo_tela" class="form-control" min="0" step="any">
                                      </div>
                                    </div>

                                    <div class="col">
                                      <div class="form-group">
                                        <label class="control-label">Costo Total</label>
                                        <input name="total" type="number" id="total" class="form-control calculo" min="0" step="any" readonly>
                                      </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA CONTRATO</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- fin modal -->

            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="mb-0 text-white">INFORMACION DEL CONTRATO</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <table class="table table-bordered no-wrap">
                                        <tr>
                                            <td><span class="font-bold">Nombre: </span> <?php echo $grupo['nombre'] ?></td>
                                            <td><span class="font-bold">Celulares: </span> <?php echo $grupo['celulares'] ?></td>
                                            <td><span class="font-bold">Direccion: </span> <?php echo $grupo['direccion'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" onclick="edita_grupo()"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline-primary">                                
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">DETALLE DEL CONTRATO</h4>
                                    </div>
                                    <?php 
                                        $contratos_json = json_encode($contratos); 
                                        // vdebug($contratos_json, false, false, true); 
                                    ?>

                                        <table class="table table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>
                                                    <th>Fecha</th>
                                                    <th>Cantidad</th>
                                                    <th>P. Saco</th>
                                                    <th>P. Pantalon</th>
                                                    <th>P. Chaleco</th>
                                                    <th>P. Falda</th>
                                                    <th>Tela Propia</th>
                                                    <th>Marca</th>
                                                    <th>P. Confec.</th>
                                                    <th>P. Tela</th>
                                                    <th>Total</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $cantidad_personas = 0; 
                                                    $precio_saco       = 0; 
                                                    $precio_pantalon   = 0; 
                                                    $precio_chaleco    = 0; 
                                                    $precio_falda      = 0; 
                                                    $costo_confeccion  = 0; 
                                                    $costo_tela        = 0; 
                                                    $costo_total       = 0; 
                                                ?>
                                                <?php foreach ($contratos as $key => $c): ?>
                                                <?php 
                                                    $cantidad_personas += $c['cantidad'];
                                                    $precio_saco       += $c['costo_saco'];
                                                    $precio_pantalon   += $c['costo_pantalon'];
                                                    $precio_chaleco    += $c['costo_chaleco'];
                                                    $precio_falda      += $c['costo_falda'];
                                                    $costo_confeccion  += $c['costo_confeccion'];
                                                    $costo_tela        += $c['costo_tela'];
                                                    $costo_total       += $c['total'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $c['descripcion'] ?></td>
                                                        <td><?php echo $c['fecha'] ?></td>
                                                        <td><?php echo $c['cantidad'] ?></td>
                                                        <td><?php echo $c['costo_saco'] ?></td>
                                                        <td><?php echo $c['costo_pantalon'] ?></td>
                                                        <td><?php echo $c['costo_chaleco'] ?></td>
                                                        <td><?php echo $c['costo_falda'] ?></td>
                                                        <td><?php echo $c['tela_propia'] ?></td>
                                                        <td><?php echo $c['marca'] ?></td>
                                                        <td><?php echo $c['costo_confeccion'] ?></td>
                                                        <td><?php echo $c['costo_tela'] ?></td>
                                                        <td><?php echo $c['total'] ?></td>
                                                        <td align="left">
                                                            <button type="button" class="btn btn-warning" onclick="edita_detalle_contrato(<?php echo $c['id'] ?>)"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger" onclick="elimina_contrato(<?php echo $c['id'] ?>, '<?php echo $c['descripcion'] ?>', <?php echo $c['grupo_id'] ?>)"><i class="fas fa-times"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <th><?php echo $cantidad_personas; ?></th>
                                                    <th><?php echo $precio_saco; ?></th>
                                                    <th><?php echo $precio_pantalon; ?></th>
                                                    <th><?php echo $precio_chaleco; ?></th>
                                                    <th><?php echo $precio_falda; ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo $costo_confeccion; ?></th>
                                                    <th><?php echo $costo_tela; ?></th>
                                                    <th class="text-info" style="font-size: 16pt;"><?php echo $costo_total; ?></th>
                                                    <td style="width: 5%;"></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline-success">                                
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">LISTADO DE PERSONAS</h4>
                                    </div>
                                    <?php //vdebug($trabajos, false, false, true); ?>

                                        <table class="table table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Total</th>
                                                    <th>Rebaja</th>
                                                    <th>Motivo</th>
                                                    <th>Entregado</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($trabajos as $key => $t): ?>
                                                    <tr>
                                                        <td><?php echo $t['nombre'] ?></td>
                                                        <td><?php echo $t['total'] ?></td>
                                                        <td><?php echo $t['rebaja'] ?></td>
                                                        <td><?php echo $t['motivo_rebaja'] ?></td>
                                                        <td><?php echo $t['entregado'] ?></td>
                                                        <td align="left">
                                                            <button type="button" class="btn btn-danger" onclick="elimina_persona_contrato(<?php echo $t['id'] ?>, '<?php echo $t['nombre'] ?>', <?php echo $t['grupo_id'] ?>)"><i class="fas fa-times"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function elimina_persona_contrato(id, nombre, grupo_id){
        //console.log(id_pago);
        Swal.fire({
          title: 'Quieres borrar '+nombre+'?',
          text: "Luego no podras recuperarlo!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro!',
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Excelente!',
              'La persona fue borrada.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>contratos/elimina_persona_contrato/"+id+"/"+grupo_id;
          }
        })
    }

    function elimina_contrato(id, nombre, grupo_id){
        // console.log(id + nombre + grupo_id);
        Swal.fire({
          title: 'Quieres borrar '+nombre+'?',
          text: "Luego no podras recuperarlo!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, estoy seguro!',
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Excelente!',
              'La persona fue borrada.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>contratos/elimina/"+id+"/"+grupo_id;
          }
        })
    }

    function edita_grupo()
    {
        $("#modal_grupo").modal('show');
    }

    function edita_detalle_contrato(contrato_id)
    {
        var contrato = '<?php echo $contratos_json; ?>';
        var obj_contrato = JSON.parse(contrato);
        console.log(obj_contrato);

        $.each(obj_contrato, function(key, element){
            if(element['id']==contrato_id)
            {
                $("#contrato_id").val(element['id']);
                $("#contrato_grupo_id").val(element['grupo_id']);
                $("#descripcion").val(element['descripcion']);
                $("#fecha").val(element['fecha']);
                $("#cantidad").val(element['cantidad']);
                $("#costo_saco").val(element['costo_saco']);
                $("#costo_pantalon").val(element['costo_pantalon']);
                $("#costo_chaleco").val(element['costo_chaleco']);
                $("#costo_falda").val(element['costo_falda']);
                $("#costo_confeccion").val(element['costo_confeccion']);
                $("#tela_propia").val(element['tela_propia']);
                $("#marca").val(element['marca']);
                $("#costo_tela").val(element['costo_tela']);
                $("#total").val(element['total']);
            }
            // console.log(key+' : '+element['id']);
        });

        // console.log($.getJSON(contrato));

        $("#modal_edita_contrato").modal('show');
    }

    $(".calculo").keyup(function(){

        var saco = parseFloat($("#costo_saco").val());
        var pantalon = parseFloat($("#costo_pantalon").val());
        var chaleco = parseFloat($("#costo_chaleco").val());
        var falda = parseFloat($("#costo_falda").val());
        costo_confeccion = saco + pantalon + chaleco + falda;
        $("#costo_confeccion").val(costo_confeccion);

        var costo_confeccion = parseFloat($("#costo_confeccion").val());
        var costo_tela = parseFloat($("#costo_tela").val());
        total = costo_confeccion+costo_tela;
        $("#total").val(total);

    });

    $("#costo_tela").keyup(function(){
        var costo_confeccion = parseFloat($("#costo_confeccion").val());
        var costo_tela = parseFloat($("#costo_tela").val());
        total = costo_confeccion+costo_tela;
        $("#total").val(total);
    });

</script>