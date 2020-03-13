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
                            <h4 class="mb-0 text-white">DETALLE DEL CONTRATO</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <table class="table table-bordered no-wrap">
                                        <tr>
                                            <td><span class="font-bold">Nombre: </span> <?php echo $contrato['nombre'] ?></td>
                                            <td><span class="font-bold">Celulares: </span> <?php echo $contrato['celulares'] ?></td>
                                            <td><span class="font-bold">Descripcion: </span> <?php echo $contrato['descripcion'] ?></td>
                                            <td><span class="font-bold">Fecha: </span> <?php echo $contrato['fecha'] ?></td>
                                            <td><span class="font-bold">Cantidad: </span> <?php echo $contrato['cantidad'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-bold">Precio Saco: </span> <?php echo $contrato['costo_saco'] ?></td>
                                            <td><span class="font-bold">Precio Pantalon: </span> <?php echo $contrato['costo_pantalon'] ?></td>
                                            <td><span class="font-bold">Precio Chaleco: </span> <?php echo $contrato['costo_chaleco'] ?></td>
                                            <td><span class="font-bold">Precio Falda: </span> <?php echo $contrato['costo_falda'] ?></td>
                                            <td><span class="font-bold">Precio Confeccion: </span> <?php echo $contrato['costo_confeccion'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-bold">Tela Propia: </span> <?php echo $contrato['tela_propia'] ?></td>
                                            <td><span class="font-bold">Marca: </span> <?php echo $contrato['marca'] ?></td>
                                            <td><span class="font-bold">Costo Tela: </span> <?php echo $contrato['costo_tela'] ?></td>
                                            <td><span class="font-bold">Precio Total: </span> <?php echo $contrato['total'] ?></td>
                                            <td><span class="font-bold">Precio Contrato</span> <?php echo $contrato['total']*$contrato['cantidad'] ?> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card card-outline-primary">                                
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