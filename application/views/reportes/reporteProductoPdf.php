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
            line-height:14px;
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
            /* border-collapse: collapse; */
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
        .gastosCajaChica{
            padding-top: -35px;
            width: 280px;
        }
        .cantidadContratos{
            width: 250px;
            padding-top: -95px;
        }
        .trabajosGeneros{
            width:380px;
        }
        .trabajosEntregados{
            width:380px;
        }
        .compraVenta{
            padding-top: -77px;
        }
        .pagoSalarios{
            padding-top: -57px;
        }
    </style>
</head>
<body>
<div class="invoice">
    <h3 style="margin-top: 30px; font-size: 30px;"><center>REPORTES DE PRODUCTOS</center></h3>
    <img src="">

    <table class="contenidos">
        <tr>
            <td><b>Fecha desde :</b> <?php echo fechaEs($inicio); ?></td>
            <td><b>Fecha Hasta :</b> <?php echo fechaEs($fin); ?></td>
        </tr>
    </table>

    <table class="contenidos">
        <tr>
            <th>ITEM</th>
            <th><?php $modo = ($tipo=='ingreso')? 'Ingreso' : 'Salida'; echo $modo?></th>
            <th>ALMACEN</th>
            <th>OBSERVACION</th>
            <th>FECHA</th>
        </tr>  
        <?php
        $ingreso = 0 ;
        $salida = 0 ;
        foreach ($productos as $pro){
        ?>  
        <tr>
            <?php
            $producto = $this->db->get_where('productos', array('id'=>$pro->producto_id, 'borrado' => null))->result();
            ?>
            <td><?php echo $producto[0]->nombre; ?></td>
            <?php
            if($tipo == 'ingreso'){
            ?>
                <td><?php echo $pro->ingreso." ".$producto[0]->tipo; ?></td>
            <?php
            }else{
            ?>
                <td><?php echo $pro->salida." ".$producto[0]->tipo; ?></td>
            <?php
            }
            $almacene = $this->db->get_where('almacenes', array('id'=> $pro->almacen_id, 'borrado' => null))->result();
            ?>
            <td><?php echo $almacene[0]->nombre; ?></td>
            <td><?php echo $pro->descripcion; ?></td>
            <td><?php echo $pro->fecha; ?></td>
        </tr>
        <?php
        // $ingreso = $ingreso + $ca->ingreso;
        // $salida = $salida + $ca->salida;
        }
        ?>   
        <!-- <tr>
            <th colspan="2">TOTAL</th>
            <th><?=$ingreso?> Bs.</th>
            <th><?=$salida?> Bs.</th>
        </tr>    -->
    </table>
</div>