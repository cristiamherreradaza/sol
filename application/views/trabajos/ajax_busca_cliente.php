<?php if (!empty($clientes_encontrados)) : ?>
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
                <?php foreach ($clientes_encontrados as $key => $c) : ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><?php echo $c['nombre'] ?></td>
                        <td><?php echo $c['ci'] ?></td>
                        <td><?php echo $c['celulares'] ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success" onclick="extraer_datos(<?php echo $c['id'] ?>);">ELEGIR</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="text-primary"><b>El cliente no esta registrado, puede registralo</b></div>
<?php endif ?>