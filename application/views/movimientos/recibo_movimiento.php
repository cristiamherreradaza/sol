<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Impresion Recibo</title>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
    <style type="text/css">
        @media print {
            #boton_imprimir {
                display: none;
            }
        }
        @page {
            margin: 15px;
        }
        body {
            background-repeat: no-repeat; 
            font-size: 8px;
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
          height: 10px;
          background-color: #616362;
          color: #fff;
        }
        .datos td {
          height: 12px;
        }
        .datos th, .datos td {
          border: 1px solid #ddd;
          padding: 2px;
          text-align: center;
        }
        .datos tr:nth-child(even) {background-color: #f2f2f2;}
        /*fin de estilos para tablas de datos*/
        /*estilos para tablas de contenidos*/
        table.contenidos {
            /*font-size: 13px;*/
            line-height:10px;
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
            width: 813px;
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
        .firmas td {
            padding-top: 30px;
            text-align: center;
        }
        .firmas {
            width: 100%;
        }

    </style>
</head>
<body>
<div class="invoice" id="printableArea">
    <p style="margin-top: 5px; font-size: 15px; text-align: center;">RECIBO DE ENVIO DE PRODUCTOS</p>
    <table class="contenidos">
        <tr>
            <?php
            
            ?>
            <td><b>Numero de Envio :</b> <?=$detalle['numero_ingreso']?> </td>  
            <td><b>Fecha :</b> <?=$detalle['fecha']?></td>
        </tr>
        <tr>
            <?php
                $numero_ingreso = $detalle['numero_ingreso'];

    			$almacen = $this->db->query("SELECT * FROM movimientos WHERE numero_ingreso = $numero_ingreso AND  almacen_origen_id IS NOT NULL AND borrado is NULL")->result();

                $almacen_origen_result = $this->db->get_where('almacenes', array('id' => $almacen[0]->almacen_origen_id, 'borrado' => null))->row_array();
                
                $almacen_destino = $this->db->get_where('almacenes', array('id' => $almacen[0]->almacen_id, 'borrado' => null))->row_array();
            ?>
            <td><b>Desde :</b> <?=$almacen_origen_result['nombre']?> </td>
            <td><b>Hasta :</b> <?=$almacen_destino['nombre']?> </td>
        </tr>
    </table>
    <!-- Detalle de los Productos -->
    <br>
    <div class="titulo">Detalle de Productos</div>
    <table class="datos">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-right">Nombre</th>
                <th>Tipo</th>
                <th class="text-right">Cantidad Ingresada</th>
                <th class="text-right">Stock actual en <?=$almacen_destino['nombre']?> </th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $key => $pro) {
            ?>
            <tr>
                <td><?=$key+1?></td>
                <?php
                    $productoName = $this->db->get_where('productos', array('id' => $pro->producto_id, 'borrado' => null))->row_array();

                    
                    $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $pro->producto_id AND almacen_id = $pro->almacen_id AND  borrado is null")->result();
                    $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $pro->producto_id AND almacen_id = $pro->almacen_id AND  borrado is null")->result();

                    $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;

                ?>
                <td><?=$productoName['nombre']?></td>
                <td><?=$productoName['tipo']?></td>
                <td><?=$pro->ingreso?></td>
                <td><?=($cantidadTotal - $pro->ingreso)?></td>
                <td><?=$cantidadTotal?></td>
            </tr>            
            <?php
            }
            ?>
        </tbody>
    </table>
    <table class="firmas">
        <tr>
            <td><hr style="width: 150px"> Entregue Conforme</td>
            <td><hr style="width: 150px"> Recibi Conforme</td>
        </tr>
    </table>
</div>
<br>
<br>
<div class="invoice" id="printableArea">
    <p style="margin-top: 5px; font-size: 15px; text-align: center;">RECIBO DE ENVIO DE PRODUCTOS</p>
    <table class="contenidos">
        <tr>
            <td><b>Numero de Envio :</b> <?=$detalle['numero_ingreso']?> </td>
            <td><b>Fecha :</b> <?=$detalle['fecha']?></td>
        </tr>
        <tr>
            <td><b>Desde :</b> <?=$almacen_origen_result['nombre']?> </td>
            <td><b>Hasta :</b> <?=$almacen_destino['nombre']?> </td>
        </tr>
    </table>
    <!-- Detalle de los Productos -->
    <br>
    <div class="titulo">Detalle de Productos</div>
    <table class="datos">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-right">Nombre</th>
                <th>Tipo</th>
                <th class="text-right">Cantidad Ingresada</th>
                <th class="text-right">Stock actual en <?=$almacen_destino['nombre']?> </th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>

        <?php
            foreach ($productos as $key => $pro) {
            ?>
            <tr>
                <td><?=$key+1?></td>
                <?php
                    $productoName = $this->db->get_where('productos', array('id' => $pro->producto_id, 'borrado' => null))->row_array();

                    
                    $cantidadEntrada = $this->db->query("SELECT sum(ingreso) as cantidadEntrada FROM movimientos WHERE producto_id = $pro->producto_id AND almacen_id = $pro->almacen_id AND  borrado is null")->result();
                    $cantidadSalida = $this->db->query("SELECT sum(salida) as cantidadSalida FROM movimientos WHERE producto_id = $pro->producto_id AND almacen_id = $pro->almacen_id AND  borrado is null")->result();

                    $cantidadTotal = $cantidadEntrada[0]->cantidadEntrada - $cantidadSalida[0]->cantidadSalida;

                ?>
                <td><?=$productoName['nombre']?></td>
                <td><?=$productoName['tipo']?></td>
                <td><?=$pro->ingreso?></td>
                <td><?=($cantidadTotal - $pro->ingreso)?></td>
                <td><?=$cantidadTotal?></td>
            </tr>            
            <?php
            }
            ?>
        </tbody>
    </table>
    <table class="firmas">
        <tr>
            <td><hr style="width: 150px"> Entregue Conforme</td>
            <td><hr style="width: 150px"> Recibi Conforme</td>
        </tr>
    </table>
</div>
<input type="button" name="imprimir" id="boton_imprimir" value="Imprimir" onclick="window.print();">
<!-- <button id="botonImprimir" class="btn btn-inverse btn-block print-page" type="button"> <span><i class="fa fa-print"></i> IMPRIMIR </span></button> -->

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/samplepages/jquery.PrintArea.js') }}"></script>
<script src="{{ asset('dist/js/pages/invoice/invoice.js') }}"></script>
<script>
    $("#botonImprimir").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
                mode: mode,
                popClose: close
        };
        $("div#printableArea").printArea(options);
    });
</script>