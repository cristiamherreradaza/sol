<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Impresion Trabajo</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/barcode/jquery-barcode.js"></script>
    <style type="text/css">
        @page {
            margin: 15px;
        }
        body {
            /* background-image: url('<?php //echo base_url(); ?>public/assets/images/reportes/formato.png'); */
            background-repeat: no-repeat; 
            font-size: 13px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        /*estilos para tablas de datos*/
        table.datos {
            /*font-size: 13px;*/
            /*line-height:14px;*/
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        .datos th {
          height: 25px;
          background-color: #616362;
          color: #fff;
        }
        .datos td {
          height: 20px;
        }
        .datos th, .datos td {
          border: 1px solid #ddd;
          padding: 5px;
          text-align: center;
        }
        .datos tr:nth-child(even) {background-color: #f2f2f2;}
        /*fin de estilos para tablas de datos*/
        /*estilos para tablas de contenidos*/
        table.contenidos {
            /*font-size: 13px;*/
            line-height:14px;
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        .contenidos th {
          height: 20px;
          background-color: #616362;
          color: #fff;
        }
        .contenidos td {
          height: 10px;
        }
        .contenidos th, .contenidos td {
          border-bottom: 1px solid #ddd;
          padding: 5px;
          text-align: left;
        }
        /*.contenidos tr:nth-child(even) {background-color: #f2f2f2;}*/
        /*fin de estilos para tablas de contenidos*/
        .titulo {
            font-weight: bolder;
        }
        .invoice {
            margin-left: 15px;

        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
            line-height:7px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .glosa {
            font-size: 10px;
            line-height:14px;
        }
        .pie_pagina {
            font-size: 10px;
            line-height:14px;
        }
        .titulo {
            font-size: 13px;
            line-height:18px;
            
            
        }
    </style>
</head>
<body>
<div class="invoice">
    <h3 style="margin-top: 30px; font-size: 30px;">TRABAJO # <?php echo $trabajo['id']; ?></h3>
    <img src="">

    <table class="contenidos">
        <tr>
            <td><b>Entrega :</b> <?php echo fechaEs($trabajo['fecha_entrega']); ?></td>
            <td><b>Prueba :</b> <?php echo fechaEs($trabajo['fecha_prueba']); ?></td>
            <td><b>Registro :</b> <?php echo fechaEs($trabajo['fecha']); ?></td>
        </tr>
    </table>
    
    <table class="contenidos">
        <tr>
            <td><b>Cliente :</b> <?php echo $trabajo['nombre'] ?></td>
            <td><b>Carnet :</b> <?php echo $trabajo['ci'] ?></td>
        </tr>
        <tr>
            <td><b>Celulares :</b> <?php echo $trabajo['celulares'] ?></td>
            <td><b>Trabajo entregado :</b> <?php echo $trabajo['entregado'] ?></td>
        </tr>
    </table>

    <br>

    <?php if (!empty($saco['modelo_nombre'])): ?>
        <div class="titulo">MEDIDAS SACO</div>
        
        <table class="datos">
            <thead>
                <tr>
                    <th>Talle</th>
                    <th>Largo</th>
                    <th>Hombro</th>
                    <th>Espalda</th>
                    <th>Pecho</th>
                    <?php if ($saco['altura_busto'] != 0): ?>
                        <th>Altura Busto</th>
                    <?php endif ?>
                    <th>Estomago</th>
                    <th>Medio Brazo</th>
                    <th>Largo Maga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $saco['talla']; ?></td>
                    <td><?php echo $saco['largo']; ?></td>
                    <td><?php echo $saco['hombro']; ?></td>
                    <td><?php echo $saco['espalda']; ?></td>
                    <td><?php echo $saco['pecho']; ?></td>
                    <?php if ($saco['altura_busto'] != 0): ?>
                        <td><?php echo $saco['altura_busto']; ?></td>
                    <?php endif ?>
                    <td><?php echo $saco['estomago']; ?></td>
                    <td><?php echo $saco['medio_brazo']; ?></td>
                    <td><?php echo $saco['largo_manga']; ?></td>
                </tr>
            </tbody>
        </table>
        <?php if (!empty($saco['modelo_nombre'])): ?>
            <table class="datos">
                <tr>
                    <th>Modelo</th>
                    <th>Botones</th>
                    <th>Aberturas</th>
                    <th>Detalle</th>
                    <th>Color</th>
                    <th>Ola</th>
                    <th>Color Ojal</th>
                </tr>
                <tr>
                    <td><?php echo $saco['modelo_nombre']; ?></td>
                    <td><?php echo $saco['botones']; ?></td>
                    <td><?php echo $saco['nombre_abertura']; ?></td>
                    <td><?php echo $saco['detalle_nombre']; ?></td>
                    <td><?php echo $saco['color']; ?></td>
                    <td><?php echo $saco['ojal_puno']; ?></td>
                    <td><?php echo $saco['color_ojal']; ?></td>
                </tr>
            </table>
            
        <?php endif ?>
    <?php endif ?>

    <?php if (!empty($pantalon['modelo_nombre'])): ?>
        <br>
        <div class="titulo">MEDIDAS PANTALON</div>
        
        <table class="datos">
            <thead>
                <tr>
                    <th>Largo</th>
                    <th>Entrepierna</th>
                    <th>Cintura</th>
                    <?php if ($pantalon['cadera'] != 0): ?>
                        <th>Cadera</th>
                    <?php endif ?>
                    <th>Muslo</th>
                    <th>Rodilla</th>
                    <th>Bota pie</th>
                    <th>Tiro delantero</th>
                    <th>Tiro atras</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $pantalon['largo']; ?></td>
                    <td><?php echo $pantalon['entre_pierna']; ?></td>
                    <td><?php echo $pantalon['cintura']; ?></td>
                    <?php if ($pantalon['cadera'] != 0): ?>
                        <td><?php echo $pantalon['cadera']; ?></td>
                    <?php endif ?>
                    <td><?php echo $pantalon['muslo']; ?></td>
                    <td><?php echo $pantalon['rodilla']; ?></td>
                    <td><?php echo $pantalon['bota_pie']; ?></td>
                    <td><?php echo $pantalon['tiro_delantero']; ?></td>
                    <td><?php echo $pantalon['tiro_atras']; ?></td>
                </tr>
            </tbody>
        </table>
        <?php if (!empty($pantalon['modelo_nombre'])): ?>
            <table class="datos">
                <tr>
                    <th>Modelo</th>
                    <th>Pinzas</th>
                    <?php if ($pantalon['bragueta']==NULL): ?>
                        <th>Bragueta</th>
                    <?php else: ?>
                        <th>Pretina</th>
                    <?php endif ?>
                    <th>Bolsillo Atras</th>
                    <th>Bota Pie</th>
                </tr>
                <tr>
                    <td><?php echo $pantalon['modelo_nombre']; ?></td>
                    <td><?php echo $pantalon['pinzas_nombre']; ?></td>
                    <?php if ($pantalon['bragueta']==NULL): ?>
                        <td><?php echo $pantalon['bragueta']; ?></td>
                    <?php else: ?>
                        <td><?php echo $pantalon['pretina']; ?></td>
                    <?php endif ?>
                    <td><?php echo $pantalon['bolsillo_nombre']; ?></td>
                    <td><?php echo $pantalon['bota_pie_des']; ?></td>
                </tr>
            </table>
        <?php endif ?>
    <?php endif ?>

    <?php if (!empty($chaleco['modelo_nombre'])): ?>                                            
        <br>
        <div class="titulo">MEDIDAS CHALECO</div>

        <table class="datos">
            <thead>
                <tr>
                    <th>Largo</th>
                    <th>Pecho</th>
                    <th>Estomago</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $chaleco['largo']; ?></td>
                    <td><?php echo $chaleco['pecho']; ?></td>
                    <td><?php echo $chaleco['estomago']; ?></td>
                </tr>
            </tbody>
        </table>

        <?php if (!empty($chaleco['modelo_nombre'])): ?>
            <table class="datos">
                <tr>
                    <th>Modelo</th>
                    <th>Botones</th>
                    <th>Detalle</th>
                    <th>Color Ojales</th>
                </tr>
                <tr>
                    <td><?php echo $chaleco['modelo_nombre']; ?></td>
                    <td><?php echo $chaleco['botones']; ?></td>
                    <td><?php echo $chaleco['detalle_nombre']; ?></td>
                    <td><?php echo $chaleco['color_ojales']; ?></td>
                </tr>
            </table>
        <?php endif ?>

       

    <?php endif ?>

    <?php if (!empty($falda['modelo_nombre'])): ?>                                            
    <br>
    <div class="titulo">MEDIDAS FALDA</div>

    <table class="datos">
        <thead>
            <tr>
                <th>Largo</th>
                <th>Cintura</th>
                <th>Cadera</th>
                <th>Vasta</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $falda['largo']; ?></td>
                <td><?php echo $falda['cintura']; ?></td>
                <td><?php echo $falda['cadera']; ?></td>
                <td><?php echo $falda['vasta']; ?></td>
            </tr>
        </tbody>
    </table>

        <?php if (!empty($falda['modelo_nombre'])): ?>
            <table class="datos">
                <tr>
                    <th>Modelo</th>
                    <th>Abertura</th>
                    <th>Pretina</th>
                </tr>
                <tr>
                    <td><?php echo $falda['modelo_nombre']; ?></td>
                    <td><?php echo $falda['abertura_nombre']; ?></td>
                    <td><?php echo $falda['pretina']; ?></td>
                </tr>
            </table>
        <?php endif ?>

    <?php endif ?>

    <?php if (!empty($jumper)): ?>                                            
    <br>
    <div class="titulo">MEDIDAS JUMPER</div>

    <table class="datos">
        <thead>
            <tr>
                <th>Talle</th>
                <th>Largo</th>
                <th>Cintura</th>
                <th>Cadera</th>
                <th>Pecho</th>
                <th>Estomago</th>
                <th>Altura Busto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $jumper['talle']; ?></td>
                <td><?php echo $jumper['largo']; ?></td>
                <td><?php echo $jumper['cintura']; ?></td>
                <td><?php echo $jumper['cadera']; ?></td>
                <td><?php echo $jumper['pecho']; ?></td>
                <td><?php echo $jumper['estomago']; ?></td>
                <td><?php echo $jumper['altura_busto']; ?></td>
            </tr>
        </tbody>
    </table>

        <?php if (!empty($jumper)): ?>
            <table class="datos">
                <tr>
                    <th>Modelo</th>
                    <th>Abertura</th>
                    <th>Bolsillo</th>
                </tr>
                <tr>
                    <td><?php echo $jumper['modelo_nombre']; ?></td>
                    <td><?php echo $jumper['abertura_nombre']; ?></td>
                    <td><?php echo $jumper['bolsillo_nombre']; ?></td>
                </tr>
            </table>
        <?php endif ?>

    <?php endif ?>

    <?php if (!empty($camisa)): ?>
        <br>
        <div class="titulo">CAMISA</div>

        <table class="datos">
            <thead>
                <tr>
                    <th>Cuello</th>
                    <th>Largo Manga</th>
                    <th>Color</th>
                    <th>Cuello Combinado</th>
                    <th>Modelo Cuello</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $camisa['cuello']; ?></td>
                    <td><?php echo $camisa['largo_manga']; ?></td>
                    <td><?php echo $camisa['color']; ?></td>
                    <td><?php echo $camisa['cuello_combinado']; ?></td>
                    <td><?php echo $camisa['modelo_cuello']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>

    <?php if (!empty($extras)): ?>
        <br>
        <div class="titulo">EXTRAS</div>

        <table class="datos">
            <thead>
                <tr>
                    <th>Corbaton</th>
                    <th>Corbata Gato</th>
                    <th>Faja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $extras['corbaton']; ?></td>
                    <td><?php echo $extras['corbata_gato']; ?></td>
                    <td><?php echo $extras['faja']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>

    <!-- impresion de cantidades y cosotos -->
    <br>
    <div class="titulo">CANTIDAD Y PRECIOS</div>
    <table class="datos">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th class="text-right">Cantidad</th>
                <th class="text-right">Precio Unitario</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($saco)): ?>
                <tr>
                    <td>Saco</td>
                    <td class="text-right"><?php echo $saco['cantidad'] ?></td>
                    <td class="text-right"><?php echo $saco['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_saco = number_format($saco['cantidad'] * $saco['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_saco = 0 ?>
            <?php endif ?>

            <?php if (!empty($pantalon['modelo_nombre'])): ?>
                <tr>
                    <td>Pantalon</td>
                    <td class="text-right"><?php echo $pantalon['cantidad'] ?></td>
                    <td class="text-right"><?php echo $pantalon['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_pantalon = number_format($pantalon['cantidad'] * $pantalon['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_pantalon = 0 ?>
            <?php endif ?>

            <?php if (!empty($chaleco['modelo_nombre'])): ?>
                <tr>
                    <td>Chaleco</td>
                    <td class="text-right"><?php echo $chaleco['cantidad'] ?></td>
                    <td class="text-right"><?php echo $chaleco['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_chaleco = number_format($chaleco['cantidad'] * $chaleco['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_chaleco = 0 ?>
            <?php endif ?>

             <?php if (!empty($camisa['cuello'])): ?>
                <tr>
                    <td>Camisa</td>
                    <td class="text-right"><?php echo $camisa['cantidad'] ?></td>
                    <td class="text-right"><?php echo $camisa['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_camisa = number_format($camisa['cantidad'] * $camisa['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_falda = 0 ?>
            <?php endif ?>

            <?php if (!empty($extras['trabajo_id'])): ?>
                <tr>
                    <td>Extras</td>
                    <td class="text-right"><?php echo $extras['cantidad'] ?></td>
                    <td class="text-right"><?php echo $extras['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_extras = number_format($extras['cantidad'] * $extras['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_falda = 0 ?>
            <?php endif ?>

            <?php if (!empty($falda['modelo_nombre'])): ?>
                <tr>
                    <td>Falda</td>
                    <td class="text-right"><?php echo $falda['cantidad'] ?></td>
                    <td class="text-right"><?php echo $falda['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_falda = number_format($falda['cantidad'] * $falda['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_falda = 0 ?>
            <?php endif ?>

            <?php if (!empty($jumper['modelo_nombre'])): ?>
                <tr>
                    <td>Jumper</td>
                    <td class="text-right"><?php echo $jumper['cantidad'] ?></td>
                    <td class="text-right"><?php echo $jumper['precio_unitario'] ?></td>
                    <td class="text-right">
                        <?php echo $sub_jumper = number_format($jumper['cantidad'] * $jumper['precio_unitario'], 2) ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php $sub_jumper = 0 ?>
            <?php endif ?>

            <?php if ($trabajo['rebaja'] != 0): ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Rebaja (<?php echo $trabajo['motivo_rebaja'] ?>)</td>
                    <td>-<?php echo number_format($trabajo['rebaja'], 2); ?></td>
                </tr>
            <?php endif ?>
            <tr>
                <td></td>
                <td></td>
                <td>Costo Confeccion</td>
                <td><?php echo number_format($trabajo['costo_confeccion'], 2) ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Precio Tela</td>
                <td><?php echo number_format($trabajo['costo_tela'], 2) ;?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><b><?php echo number_format($trabajo['total'], 2) ;?></b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Adelanto</td>
                <?php $saldo = $trabajo['total']-$trabajo['saldo'] ?>
                <td><?php echo number_format($saldo, 2) ;?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Saldo</td>
                <td><b><?php echo number_format($trabajo['saldo'], 2) ;?></b></td>
            </tr>
        </tbody>
    </table>

</div>