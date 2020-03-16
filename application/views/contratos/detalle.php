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
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline-primary">                                
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">DATOS DE PERSONAS</h4>
                                    </div>
                                    <?php //vdebug($trabajos, false, false, true); ?>

                                        <table class="table table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Descripcion</th>
                                                    <th>Fecha</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio Saco</th>
                                                    <th>Precio Pantalon</th>
                                                    <th>Precio Chaleco</th>
                                                    <th>Precio Falda</th>
                                                    <th>Tela Propia</th>
                                                    <th>Marca</th>
                                                    <th>Costo Confeccion</th>
                                                    <th>Costo Tela</th>
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
                                                            <!-- <button type="button" class="btn btn-danger" onclick="alerta(<?php //echo $p['id'] ?>, <?php //echo $p['monto'] ?>, <?php //echo $p['trabajo_id'] ?>)"><i class="fas fa-times"></i></button> -->
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
                                                    <th><?php echo $costo_total; ?></th>
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
                                                            <!-- <button type="button" class="btn btn-danger" onclick="alerta(<?php //echo $p['id'] ?>, <?php //echo $p['monto'] ?>, <?php //echo $p['trabajo_id'] ?>)"><i class="fas fa-times"></i></button> -->
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
    function alerta(id_pago, monto, id_trabajo){
        //console.log(id_pago);
        Swal.fire({
          title: 'Quieres borrar '+monto+'?',
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
              'Tu monto fue borrado.',
              'success'
            );
            // console.log("el id es "+id_pago);
            window.location.href = "<?php echo base_url() ?>trabajos/borra_pago/"+id_pago+"/"+id_trabajo;
          }
        })
    }
</script>