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
                    <td><span class="label label-danger">admin</span> </td>
                </tr>                
            <?php endforeach ?>
        </tbody>
    </table>
