<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ITEMS - PRODUCTOS</h4>
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                    <th>Item</th>
                                <?php
                                    foreach ($almacenes as $al){
                                    ?>
                                    <th><?=$al->nombre?></th>
                                    <?php
                                    }
                                ?>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($productos as $pro): ?>
                            <tr>
                                <td><?=$pro->nombre?></td>
                                <?php
                                $total = 0;
                                foreach($almacenes as $al){

                                    $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $pro->id AND  borrado is null AND fecha BETWEEN '2020-01-01' AND '$fecha' AND almacen_id = $al->id")->result();
                                    $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $pro->id AND  borrado is null AND fecha BETWEEN '2020-01-01' AND '$fecha' AND almacen_id = $al->id")->result();

                                    $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;

                                ?>
                                    <td><?=$cantidadTotal." ".$pro->tipo?></td>
                                <?php
                                $total = $total + $cantidadTotal;
                                }
                                ?>
                                <td><?=$total." ".$pro->tipo?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <button class="btn btn-block btn-info"  onclick="reporteProductoPdf()">IMPRIMIR</button>
    </div>
</div> -->
<!-- This is data table -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function () {

    var table = $('#config-table').DataTable({
      orderCellsTop: true, 
      fixedHeader: true,
      "oLanguage": {
        "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      }
    });
});

</script>