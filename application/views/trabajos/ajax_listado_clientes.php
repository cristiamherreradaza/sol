<link href="<?php echo base_url(); ?>/public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/css/responsive.dataTables.min.css">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Clientes</h4>
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-bordered table-striped no-wrap">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>CI</th>
                                <th>Celular</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($clientes as $c): ?>
                            <tr>
                              <td><?php echo $c['nombre']; ?></td>
                              <td><?php echo $c['ci']; ?></td>
                              <td><?php echo $c['celulares']; ?></td>
                              <td>
                                <button type="button" class="btn btn-info" onclick="escogido(<?= $c['id'] ?>)"><i class="fas fa-check"></i></button>
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
<!-- This is data table -->
<script src="<?php echo base_url(); ?>/public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#config-table thead tr')
        .clone(true)
        .appendTo('#config-table thead');
    $('#config-table thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

    var table = $('#config-table').DataTable({
      orderCellsTop: true, 
      fixedHeader: true,
      "oLanguage": {
        "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      }
    });
});

function escogido(idCliente){
  console.log('Es '+idCliente);
   // $("#div_barra_cargando").modal('hide');
   $("#myModal").modal('hide');
}

</script>