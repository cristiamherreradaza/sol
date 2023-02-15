<?php if (!empty($trabajos)): ?>
    <table id="config-table" class="table display table-bordered table-striped no-wrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Cliente</th>
                <th>Celular</th>
                <th>Fecha Prueba</th>
                <th>Fecha Entrega</th>
                <th>$. Tela</th>
                <th>$.Conf</th>
                <th>Total</th>
                <th>Saldo</th>
                <th>Ent</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // var_dump($trabajos);
            // exit;
            foreach ($trabajos as $t): ?>
            <tr>
                <td><?php echo $t['id'] ?></td>
                <td><?php echo $t['nombre'] ?></td>
                <td><?php echo $t['celulares'] ?></td>
                <td><?php echo $t['fecha_prueba'] ?></td>
                <td><?php echo $t['fecha_entrega'] ?></td>
                <td align="right"><?php echo $t['costo_tela'] ?></td>
                <td align="right"><?php echo $t['costo_confeccion'] ?></td>
                <td align="right"><?php echo $t['total'] ?></td>
                <td align="right"><?php echo $t['saldo'] ?></td>
                <td><?php echo $t['entregado'] ?></td>
                <td>
                    <a href="<?php echo base_url() ?>Trabajos/detalle_trabajo/<?php echo $t['id'] ?>">
                        <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
                    </a>

                    <a href="<?php echo base_url() ?>Trabajos/registro_pagos/<?php echo $t['id'] ?>">
                        <button type="button" class="btn btn-success"><i class="fas fa-dollar-sign"></i></button>
                    </a>

                    <a href="<?php echo base_url() ?>Trabajos/form_edicion/<?php echo $t['id'] ?>">
                        <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    </a>
					
                    <a href="<?php echo base_url() ?>Inventarios_Venta/retira_material/<?php echo $t['id'] ?>">
						<button type="button" class="btn btn-dark"><i class="fas fa-cart-arrow-down"></i></button>
					</a>
				
					<button type="button" class="btn btn-primary" onclick="abreModalCambiaLugar(<?=$t['id']?>)"><i class="fas fa-tag"></i></button>

					<button type="button" class="btn btn-danger" onclick="eliminar(<?php echo $t['id'] ?>, '<?php echo $t['nombre'] ?>')"><i class="fas fa-trash"></i></button>
                </td>
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
			responsive: true,
			// paging: false,
			searching: false,
			lengthChange: false,
			"order": [
				[0, 'desc']
			],
			"language": {
            	"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        	}
		});
	});
</script>
