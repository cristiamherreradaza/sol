<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" type="text/css">


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
<!-- vertical wizard -->
                 <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <h2 class="card-title">Sueldos de Trabajadores</h2>
                                    <div class="ml-auto">
                                        <div class="col-12">
                                            <h2 class="mb-0" align="center">Reporte a la fecha</h2>
                                            <h3 style="align-content: center; color: blue;"><?php echo fechaEs($fecha); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        <!-- <h2 class="mb-0">March 2019</h2> -->
                                        <h4 class="font-light mt-0">Suma Total de Sueldos a Pagar</h4>
                                        <div class="display-6 text-info"><?php echo $totales->total; ?> Bs.</div>
                                    </div>
                                    
                                </div>
                                <?php $n = 1; ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nombres</th>
                                            <th>N° Carnet</th>
                                            <th>Sueldo</th>
                                            <th>Descuentos</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($consulta as $valor) {
                                            # code...
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $n++; ?></td>
                                            <td class="txt-oflo"><?php echo $valor->nombre; ?></td>
                                            <td class="txt-oflo"><?php echo $valor->ci; ?></td>
                                            <td class="txt-oflo"><?php echo $valor->sueldo; ?> Bs.</td>
                                            <td><?php echo $valor->descuentos; ?> Bs.</td>
                                            <?php if ($valor->descuentos == 0) { ?>
                                            <td><span class="label label-success label-rouded"><?php echo $valor->total ?> Bs</span></td>
                                            <?php } else { ?>
                                            <td><span class="label label-warning label-rouded"><?php echo $valor->total ?> Bs</span></td>
                                            <?php } ?> 
                                            <?php if ($valor->estado == 'No') { ?>
                                            <td>
                                                <button type="button" class="btn btn-info" onclick="pagado(<?php echo $valor->id ?>)">PAGAR</button>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <button type="button" class="btn btn-danger">PAGADO</button>
                                            </td>
                                            <?php } ?> 
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Row -->
    </div>
</div>
                <!-- ============================================================== -->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    function pagado($id){
        var id = $id;
        // alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>Control_Asistencia/pagar',
            type: 'GET',
            dataType: 'json',
            data: {param1: id},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                if (data.estado == 'Pagado') {
                    swal.fire({
                        type: 'success',
                        title: 'Bien...',
                        text: 'Se Pago Exitosamente!',
                      })
                    setTimeout(function(){ window.location.href = "<?php echo base_url() ?>Control_Asistencia/consulta/" + data.fecha; }, 3000);
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                alerta_ci();
            }
        });
    }

</script>

