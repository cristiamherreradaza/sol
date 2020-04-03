<?php if (!empty($clientes_encontrados)): ?>
    <div class="table-responsive">
        <table class="table no-wrap">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Carnet</th>
                    <th>Celular</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes_encontrados as $key => $c): ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><?php echo $c['nombre'] ?></td>
                        <td><?php echo $c['ci'] ?></td>
                        <td><?php echo $c['celulares'] ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>trabajos/detalle_trabajos_cliente/<?php echo $c['id'] ?>">
                                <span class="label label-success">ELEGIR</span>
                            </a>
                        </td>
                    </tr>                
                <?php endforeach ?>
            </tbody>
        </table>
        <button type="submit" class="btn waves-effect waves-light btn-block btn-danger" onclick="cierra_datos_cabecera();">CERRAR</button>
    </div>
<?php else: ?>
    <table class="table no-wrap">
        <tbody>
            <tr>
                <td>
                    <h3>No se encuentra al cliente</h3>
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-danger" onclick="cierra_datos_cabecera();">CERRAR</button>
                </td>
            </tr>                
        </tbody>
    </table>
<?php endif ?>