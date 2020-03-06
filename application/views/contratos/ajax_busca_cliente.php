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
                            <span class="label label-success" onclick="extraer_datos(<?php echo $c['id'] ?>)">ELEGIR</span>
                            <!-- <button type="button" class="btn btn-success"><i class="fas fa-check"></i></button> -->
                        </td>
                    </tr>                
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>&nbsp;</h3>
    <h3>El cliente no esta registrado</h3>
<?php endif ?>