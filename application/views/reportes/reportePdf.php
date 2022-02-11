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
            /* padding-top: -77px; */
        }
        .pagoSalarios{
            /* padding-top: -57px; */
        }
        .contenidos1 th{
          height: 20px;
          background-color: #616362;
          color: #fff;
        }
    </style>
</head>
<body>
<div class="invoice">
    <h3 style="margin-top: 30px; font-size: 30px;"><center>REPORTE CENTRALIZADO</center></h3>
    <img src="">

    <table class="contenidos">
        <tr>
            <td><b>Fecha desde :</b> <?php echo fechaEs($inicio); ?></td>
            <td><b>Fecha Hasta :</b> <?php echo fechaEs($fin); ?></td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                <table class="contenidos">
                    <tr>
                        <th colspan="3">
                            <center>
                                INGRESOS POR TRABAJOS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Monto</b></td>
                    </tr>
                    <tr>
                        <td>Trabajos con deudas</td>
                        <td><?=$cantidad_deudores['total']?></td>
                        <td><?=number_format($monto_deudores['total'], 2)?></td>
                    </tr>
                    <tr>
                        <td>Trabajos pagados</td>
                        <td><?=$cantidad_pagados['total']?></td>
                        <td><?=number_format($trabajos_totales['total'], 2)?></td>
                    </tr>
                    <tr>
                        <th>Total trabajos</th>
                        <th><?=$cantidad_deudores['total']+$cantidad_pagados['total']?></th>
                        <?php $trabajos_por_cobrar = $trabajos_totales['total']-$monto_deudores['total'] ?>
                        <th><?=number_format($trabajos_por_cobrar, 2)?></th>
                    </tr>
                </table>
            </td>
            <td class="gastosCajaChica">
                <table class="contenidos">
                    <tr>
                        <th colspan="2">
                            <center>
                                GASTOS DE CAJA CHICA
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                    </tr>
                    <tr>
                        <td>Gastos</td>
                        <td><?=number_format($ingresos_gastos_cc['gastos'], 2)?></td>
                    </tr>
                    <tr>
                        <td>Ingresos</td>
                        <td><?=number_format($ingresos_gastos_cc['ingreso'])?></td>
                    </tr>
                    <tr>
                        <th>Saldo Caja</th>
                        <?php $saldo_caja_chica = $ingresos_gastos_cc['gastos']-$ingresos_gastos_cc['ingreso'] ?>
                        <th><?=number_format($saldo_caja_chica, 2)?></th>
                    </tr>
                </table>
            </td>
            <td class="cantidadContratos">
                <table class="contenidos">
                    <tr>
                        <th colspan="3">
                            <center>
                                CANTIDAD DE CONTRATOS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Monto</b></td>
                    </tr>
                    <tr>
                        <td>Contratos</td>
                        <td><?=$ingresos_contratos['cantidad']?></td>
                        <td><?=number_format($ingresos_contratos['total'], 2)?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td class="trabajosGeneros">
                <table class="contenidos">
                    <tr>
                        <th colspan="2">
                            <center>
                                INGRESOS POR TRABAJOS POR GENEROS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                    </tr>
                    <tr>
                        <td>Varones</td>
                        <td><?=$cantidad_varones['total']?></td>
                    </tr>
                    <tr>
                        <td>Mujeres</td>
                        <td><?=$cantidad_mujeres['total']?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th><?=$cantidad_varones['total']+$cantidad_mujeres['total']?></th>
                    </tr>
                </table>
            </td>
            <td class="trabajosEntregados">
                <table class="contenidos">
                    <tr>
                        <th colspan="2">
                            <center>
                                TRABAJOS ENTREGADOS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                    </tr>
                    <tr>
                        <td>Trabajos</td>
                        <td><?=$trabajos_cantidad['total']?></td>
                    </tr>
                    <tr>
                        <td>Trabajos entregados</td>
                        <?php $trabajos_por_terminar = $trabajos_cantidad['total']-$trabajos_no_entregados['total'] ?>
                        <td><?=$trabajos_por_terminar?></td>
                    </tr>
                    <tr>
                        <th>Trabajos por terminar</th>
                        <th><?=$trabajos_no_entregados['total']?></th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td class="compraVenta">
                <table class="contenidos1">
                    <tr>
                        <th colspan="3">
                            <center>
                                COMPRA Y VENTA DE INVENTARIOS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Monto</b></td>
                    </tr>
                    <tr>
                        <td>Compra</td>
                        <td><?=$cantidad_compra['total']?></td>
                        <td><?=number_format($valor_compra['total'], 2)?></td>
                    </tr>
                    <tr>
                        <td>Venta</td>
                        <td><?=$venta_compra['total']?></td>
                        <td><?=number_format($valor_venta['total'], 2)?></td>
                    </tr>
                    <tr>
                        <th>Saldo</th>
                        <th></th>
                        <?php $inventarios_totales = $valor_compra['total']-$valor_venta['total'] ?>
                        <th><?=number_format($inventarios_totales, 2)?></th>
                    </tr>
                </table>
            </td>
            <td class="pagoSalarios">
                <table class="contenidos1">
                    <tr>
                        <th colspan="3">
                            <center>
                                PAGO DE SALARIOS
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Monto</b></td>
                    </tr>
                    <tr>
                        <td>Salario de Empleados</td>
                        <td><?=$cantidad_empleados['total']?></td>
                        <td><?=number_format($sueldo_empleados['total'], 2)?></td>
                    </tr>
                    <tr>
                        <td>Descuento a Empleados</td>
                        <td><?=$cantidad_descuentos['total']?></td>
                        <td><?=number_format($descuento_empleados['total'], 2)?></td>
                    </tr>
                    <tr>
                        <th>Saldo</th>
                        <th></th>
                        <?php $sueldos_totales = $sueldo_empleados['total']-$descuento_empleados['total'] ?>
                        <th><?=number_format($sueldos_totales, 2)?></th>
                    </tr>
                </table>
            </td>
            <td class="costoProduccion">
                <table class="contenidos1">
                    <tr>
                        <th colspan="4">
                            <center>
                                COSTOS Y PRODUCCION
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Descripcion</b></td>
                        <td><b>Cantidad</b></td>
                        <td><b>Monto</b></td>
                        <td><b>Materiales</b></td>
                    </tr>
                    <?php
                        $cantidadCP = 0;
                        $MontoCP = 0;
                        $canMat = 0;
                        $costo_produccion1 = $costo_produccion;
                        foreach ($costo_produccion as $cp){
                        ?>
                            <tr>
                                <td><?=$cp->tipo?></td>
                                <td class="text-center"><?=$cp->cant_tra?></td>
                                <td class="text-right"><?=$cp->precio?></td>
                                <?php
                                $prenda = strtoupper($cp->tipo);
                                $query = "SELECT SUM(precio_total) as total 
                                    FROM movimientos 
                                    WHERE confeccion = '$prenda' AND fecha BETWEEN '$inicio' AND '$fin'";
                                    $totalMaterial = $this->db->query($query)->result_array();
                                    $canMatSa = ($totalMaterial[0]['total'] != null)? $totalMaterial[0]['total'] : 0;
                                ?>
                                <td class="text-right"><?=number_format($canMatSa,2)?></td>
                            </tr>    
                        <?php
                            $cantidadCP = $cantidadCP + $cp->cant_tra;
                            $MontoCP = $MontoCP + $cp->precio;
                            $canMat = $canMat + $totalMaterial[0]['total'];
                        }
                    ?>
                    <tr>
                        <th>Total</th>
                        <th><?=$cantidadCP?></th>
                        <th><?=number_format($MontoCP,2)?></th>
                        <th><?=$canMat?></th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

    <table class="contenidos">
        <tr>
            <th colspan="3">
                <center>
                    INGRESOS, GASTOS, SALDOS
                </center>
            </th>
        </tr>
        <tr>
            <td><b>Ingresos</b></td>
            <td><b>Gastos</b></td>
            <td><b>Saldos</b></td>
        </tr>
        <tr>
            <td><?=$ingresos_totales?></td>
            <td><?=$gasto_total?></td>
            <td><?=number_format($ingresos_totales-$gasto_total, 2)?></td>
        </tr>
    </table>
</div>