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
    <h3 style="margin-top: 30px; font-size: 30px;"><center>REPORTE CAJA CHICA</center></h3>
    <img src="">

    <table class="contenidos">
        <tr>
            <td><b>Fecha desde :</b> <?php echo fechaEs($inicio); ?></td>
            <td><b>Fecha Hasta :</b> <?php echo fechaEs($fin); ?></td>
        </tr>
    </table>

    <table class="contenidos">
        <tr>
            <th>CLIENTE</th>
            <th>REGISTRO</th>
            <th>PRUEBA</th>
            <th>ENTREGA</th>
            <th>$ TELA</th>
            <th>$ CONFECCION</th>
            <th>TOTAL</th>
            <th>$ SALDO</th>
            <th>ENTREGADO</th>
        </tr>  
        <?php
        $costo_tela = 0 ;
        $costo_confeccion = 0 ;
        $total = 0 ;
        $saldo = 0 ;
        foreach ($trabajos as $tra){
        ?>   
        <tr>
            <td><?=$tra->nombre?></td>
            <td><?=fechaEs($tra->fecha)?></td>
            <td><?=$tra->fecha_prueba?></td>
            <td><?=$tra->fecha_entrega?></td>
            <td><?=$tra->costo_tela?></td>
            <td><?=$tra->costo_confeccion?></td>
            <td><?=$tra->total?></td>
            <td><?=$tra->saldo?></td>
            <td><?=$tra->entregado?></td>
        </tr>
        <?php
        $costo_tela = $costo_tela + $tra->costo_tela;
        $costo_confeccion = $costo_confeccion + $tra->costo_confeccion;
        $total = $total + $tra->total ;
        $saldo = $saldo + $tra->saldo;
        }
        ?>   
        <tr style="text-align: center;">
            <th colspan="4">TOTAL</th>
            <th><?=$costo_tela?></th>
            <th><?=$costo_confeccion?></th>
            <th><?=$total?></th>
            <th><?=$saldo?></th>
            <th></th>
        </tr>   
    </table>
</div>