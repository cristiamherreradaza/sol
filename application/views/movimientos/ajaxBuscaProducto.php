<!-- <table id="config-table" class="table display table-bordered table-striped no-wrap"> -->
<table id="productos-table" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre Completo</th>
            <th>Tipo</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productos as $pro): ?>
        <tr>
            <td><?php echo $pro->id ?></td>
            <td><?php echo $pro->nombre ?></td>
            <td><?php echo $pro->tipo ?></td>
            <?php
                $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $pro->id AND almacen_id = $almacen AND  borrado is null")->result();
                $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $pro->id AND almacen_id = $almacen AND  borrado is null")->result();

                $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;
            ?>
            <td>
                <?=$cantidadTotal?>
            </td>

            <td>
            <?php
            if($cantidadTotal > 0){
                ?>
                <button type="button" class="btnSelecciona btn btn-info"><i class="fas fa-plus"></i></button>
                <?php
            }
            ?>    
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script>

    // $(function () {
    //     $('#myTable').DataTable();
    //     // responsive table
    //     $('#config-table').DataTable({
    //         responsive: true,
            
    //         "order": [
    //             [0, 'asc']
    //         ],
    //         "language": {
    //             "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    //         }
    //     });
    // });
    $(document).ready(function () {
        $("#productos-table").on('click', '.btnSelecciona', function () {

            $("#table-productos").hide('slow');
            $("#busca_producto").val("");

            var currentRow = $(this).closest("tr");

            var id          = currentRow.find("td:eq(0)").text();
            var nombre      = currentRow.find("td:eq(1)").text();
            var tipo        = currentRow.find("td:eq(2)").text();
            var stock       = currentRow.find("td:eq(3)").text();
        
            // console.log(id)

            let buscaItem = itemsPedidoArray.lastIndexOf(id);
            if(buscaItem < 0)
            {
                itemsPedidoArray.push(id);  
                t.row.add([
                    id,
                    nombre,
                    stock,
                    `<input type="number" class="form-control" value="1" min="1" max="`+stock+`" name="item[` + id + `]" required>`,
                    // `<input type="number" class="form-control" value="1" min="1" max="`+stock+`" name="item[]" required>`,
                    tipo,
                    '<button type="button" class="btnElimina btn btn-danger" title="Eliminar marca"><i class="fas fa-trash-alt"></i></button>'
                ]).draw(false);
            }

        });

    });

    
</script>