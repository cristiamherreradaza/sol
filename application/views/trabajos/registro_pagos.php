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
                            <h4 class="mb-0 text-white">REGISTRO DE PAGO</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <table class="table table-bordered no-wrap">
                                        <tr>
                                            <td><span class="font-bold">Nombre: </span> <?php echo $trabajo['nombre'] ?></td>
                                            <td><span class="font-bold">Celulares: </span> <?php echo $trabajo['celulares'] ?></td>
                                            <td><span class="font-bold">F. Entrega: </span> <?php echo $trabajo['fecha_entrega'] ?></td>
                                            <td><span class="font-bold">F. Prueba: </span> <?php echo $trabajo['fecha_prueba'] ?></td>
                                            <td><span class="font-bold">Entregado: </span> <?php echo $trabajo['entregado'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <?php
                                    if($trabajo['saldo'] != 0.00){
                                    ?>
                                    <!-- <form action="<?php //echo base_url() ?>Trabajos/guarda_pago" method="POST"> -->
                                    <?php echo form_open('trabajos/guarda_pago'); ?>
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label">Monto </label>
                                                    <input type="hidden" name="trabajo_id" value="<?php echo $trabajo['id'] ?>">
                                                    <input type="hidden" name="cliente_id" value="<?php echo $trabajo['cliente_id'] ?>">
                                                    <input type="number" name="monto" id="monto" class="form-control" placeholder="Ej: 200" step="any" max="<?php echo $trabajo['saldo']; ?>" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha </label>
                                                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                            <?php
                                                $valor = '';
                                                if($trabajo['entregado'] == 'Si'){
                                                    $valor = 'checked';
                                                }
                                            ?>
                                            <input type="checkbox" class="custom-control-input" id="checkbox0" name="entregado" value="si" <?=$valor?>>
                                            <label class="custom-control-label" for="checkbox0">Entregar trabajo</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA PAGO</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">                                            
                                            <a 
                                                href="<?php echo base_url() ?>trabajos/impresion_recibo/<?php echo $trabajo['id']; ?>"
                                                class="btn waves-effect waves-light btn-block btn-info"
                                            >
                                                IMPRIME RECIBO
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-9">
                                    <div class="card card-outline-primary">                                
                                    <div class="card-header">
                                        <h4 class="mb-0 text-white">LISTADO DE PAGOS</h4>
                                    </div>
                                    <?php //vdebug($pagos, false, false, true) ?>
                                    <?php $total=0; ?>
                                        <table class="table table-striped no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Usuario</th>
                                                    <th>Monto</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pagos as $p): ?>
                                                <?php $total += $p['monto']; ?>
                                                    <tr>
                                                        <td><?php echo fechaEs($p['fecha']); ?></td>
                                                        <td><?php echo $p['nombre']; ?></td>
                                                        <td><?php echo $p['monto']; ?></td>
                                                        <td></td>
                                                        <td align="left">
                                                            <button type="button" class="btn btn-danger" onclick="alerta(<?php echo $p['id'] ?>, <?php echo $p['monto'] ?>, <?php echo $p['trabajo_id'] ?>)"><i class="fas fa-times"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-info">Costo Total: <?php echo $trabajo['total'] ?></th>
                                                    <th align="right"></th>
                                                    <th><?php echo $total; ?></th>
                                                    <th><span class="text-danger">Saldo: <?php echo $trabajo['saldo']; ?></span></th>
                                                </tr>
                                            </tfoot>
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