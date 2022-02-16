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
                                <th>Ingreso</th>
                                <th>Almacen</th>
                                <th>Observacion</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($productos as $pro): ?>
                            <tr>
                              <td><?php echo $pro->producto_id; ?></td>
                              <td><?php echo $pro->ingreso; ?></td>
                              <td><?php echo $pro->almacen_id; ?></td>
                              <td><?php echo $pro->descripcion; ?></td>
                              <td><?php echo $pro->fecha; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-block btn-info"  onclick="reporteCajaChica()">IMPRIMIR</button>
    </div>
</div>
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