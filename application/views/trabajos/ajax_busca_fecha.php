<?php if (!empty($pagos)): ?>
    <table id="config-table" class="table display table-bordered table-striped no-wrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Cliente</th>
                <th class="text-center">Trabajo</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th class="text-center">Monto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $p): ?>
            <tr>
                <td><?php echo $p->id; ?></td>
                <td><?php echo $p->cliente; ?></td>
                <td class="text-center">
                    <a href="<?php echo base_url() ?>trabajos/registro_pagos/<?php echo $p->trabajo ?>">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i> &nbsp;<?php echo $p->trabajo ?></button>
                    </a>
                </td>
                <td><?php echo $p->nombre; ?></td>
                <td><?php echo fechaEs($p->fecha); ?></td>
                <td class="text-right"><?php echo $p->monto; ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else: ?>
    <table class="table no-wrap">
        <tbody>
            <tr>
                <td>
                    <h3 class="text-danger">No se encuentra al Registros</h3>
                    <!-- <button type="submit" class="btn waves-effect waves-light btn-block btn-danger" onclick="cierra_datos_cabecera();">CERRAR</button> -->
                </td>
            </tr>                
        </tbody>
    </table>
<?php endif ?>
<script>
    $(function () {
		$('#myTable').DataTable();
		// responsive table
		$('#config-table').DataTable({
			searching: false,
			lengthChange: false,
			responsive: true,
			"order": [
				[0, 'desc']
			],
			"language": {
            	"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        	}
		});
	});
</script>