<?php if (!empty($grupos)): ?>
    <?php $obj_grupo = json_encode($grupos); ?>
    <div class="table-responsive">
        <table class="table no-wrap">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grupos as $key => $c): ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><?php echo $c['nombre'] ?></td>
                        <td>
                            <span class="label label-success" onclick="escoje_grupo(<?php echo $c['id'] ?>)">ELEGIR</span>
                            <!-- <span class="label label-success" onclick="extraer_datos(<?php //echo $c['id'] ?>)">ELEGIR</span> -->
                            <!-- <button type="button" class="btn btn-success"><i class="fas fa-check"></i></button> -->
                        </td>
                    </tr>                
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>&nbsp;</h3>
    <h3>No encontrado</h3>
<?php endif ?>
<script type="text/javascript">
    var grupos = <?php echo $obj_grupo ?>;
    // var obj_grupos = JSON.parse(grupos);
    function escoje_grupo(id)
    {
        // console.log(grupos);
        for(var i = 0; i < grupos.length; i++)
        {
            if(grupos[i].id == id)
            {
                console.log(grupos[i].nombre);
                $("#muestra_grupos_ajax").hide('slow');
                $("#ida").val(grupos[i].id);
                $("#busca_grupo").val(grupos[i].nombre);
                $("#direccion").val(grupos[i].direccion);
                $("#celulares").val(grupos[i].celulares);
            }
        }
    }
</script>