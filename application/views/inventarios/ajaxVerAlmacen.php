<?php if (!empty($almacenes)) : ?>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-info text-center">            
                <?=$producto[0]->nombre?>
            </h2>
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table no-wrap">
            <thead>
                <tr>
                    <th>Almacen</th>
                    <th>Existencia</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $producto_id = $producto[0]->id;
                foreach ($almacenes as $key => $al) : 
                    ?>
                    <tr>
                        <td><?php echo $al->nombre ?></td>
                        <?php
                            $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $producto_id AND almacen_id = $al->id AND borrado is null")->result();
                            $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $producto_id AND almacen_id = $al->id AND borrado is null")->result();

                            $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;
                        ?>
                        <td>
                            <?php
                                if($cantidadTotal > 0){
                                    echo $cantidadTotal." ". $producto[0]->tipo;
                                }else{
                                    echo 0 ." ". $producto[0]->tipo; 
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div class="text-primary"><b>El cliente no esta registrado, puede registralo</b></div>
<?php endif ?>