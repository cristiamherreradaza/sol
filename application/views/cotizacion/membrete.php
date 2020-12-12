<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizacion</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
           
           background-image: url('<?php echo base_url(); ?>public/assets/images/reportes/membrete_oficial_sm.jpg');

           background-repeat: no-repeat; 

        }

        * {
            font-family: Verdana, Arial, sans-serif;

        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: 13px;
            line-height:14px;
            
            
        }

       

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        
        .invoice {
            /*margin-top: 10px; */
            margin-left: 40px;
            margin-right: 40px;

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

<br/>
    <div class="invoice">
        <h3 align="center" style="margin-top: 180px; font-size: 30px; font-family: Ink Free; ">COTIZACION</h3>
         <table width="100%"  style=" margin-top: 10px; margin-bottom: 15px;">
            <tr>
                <td align="left" width="40"  style=" margin-top: 20px; font-size: 12px; width: 60%; float: right;">                
                    <b>  Se&ntilde;ores: </b> <?php echo $cotiza->nombre; ?>                                 
                </td>
               <td align="left" width="30">                
                                                 
                </td>

                <td align="right"  style=" font-size: 12px; float: left;"> <?php echo $fecha; ?>  
                </td>
            
            </tr>
        </table>

    
        <table width="100%" style=" margin-top: 10px; margin-left: 30px;">
                <tr>
                    <td style="width: 80%;">
                   Trajes en la m&aacute;s alta calidad y dise&ntilde;o exclusivo para cada uno de nuestros clientes, les ofrecemos nuestra cotizaci&oacute;n:                  
                </td>
            </tr>
        </table>
        <table width="100%" style=" margin-top: 10px; margin-left: 30px;">
                <tr>
                    <td style="width: 80%;">
                    <h2>Confecci&oacute;n para VARON con tela</h2>                 
                    </td>
                </tr>
        </table>
        <table id="data" width="100%" class="code" style="text-align: center;">
            <thead>
                <tr>
                   
                    <th style="border: 1px solid #000;">Cantidad</th> 
                    <th style="border: 1px solid #000;">Prendas</th> 
                    <th style="border: 1px solid #000;">Tela <?php echo $tela1->nombre; ?> <?php echo $tela1->precio; ?> Bs.</th>
                    <th style="border: 1px solid #000;">Tela <?php echo $tela2->nombre; ?> <?php echo $tela2->precio; ?> Bs.</th>
                    <th style="border: 1px solid #000;">Tela <?php echo $tela3->nombre; ?> <?php echo $tela3->precio; ?> Bs.</th>
                </tr>
            </thead>
            <tbody>            
                    <tr >                    
                        <td style="border: 1px solid #000;">2</td>
                        <td style="border: 1px solid #000;">Saco y Pantalon</td>    
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_1; ?> Bs.</td>
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_2; ?> Bs.</td> 
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_3; ?> Bs.</td> 
                    </tr>
                    <tr>                    
                        <td style="border: 1px solid #000;">3</td>
                        <td style="border: 1px solid #000;">Saco, Pantalon y Chaleco</td>    
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_4; ?> Bs.</td>
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_5; ?> Bs.</td> 
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_6; ?> Bs.</td> 
                    </tr>
            </tbody>
        </table>
        <table width="100%" style=" margin-top: 10px; margin-left: 30px;">
            <tr>
                <td style="width: 80%;">
                <h2>Confecci&oacute;n para DAMA con tela</h2>                 
                </td>
            </tr>
        </table>
        <table id="data1" width="100%" class="code" style="text-align: center;">
            <thead>
                <tr>
                   
                    <th style="border: 1px solid #000;">Cantidad</th> 
                    <th style="border: 1px solid #000;">Prendas</th> 
                    <th style="border: 1px solid #000;">Tela <?php echo $tela4->nombre; ?> <?php echo $tela4->precio; ?> Bs.</th>
                    <th style="border: 1px solid #000;">Tela <?php echo $tela5->nombre; ?> <?php echo $tela5->precio; ?> Bs.</th>
                    <th style="border: 1px solid #000;">Tela <?php echo $tela6->nombre; ?> <?php echo $tela6->precio; ?> Bs.</th>
                </tr>
            </thead>
            <tbody>            
                    <tr>                    
                        <td style="border: 1px solid #000;">2</td>
                        <td style="border: 1px solid #000;">Saco y Pantalon</td>    
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_7; ?> Bs.</td>
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_8; ?> Bs.</td> 
                        <td style="border: 1px solid #000;"><?php echo $cotiza->prec_9; ?> Bs.</td> 
                    </tr>
                    <tr>                    
                        <td style="border: 1px solid #000;">3</td>
                        <td style="border: 1px solid #000;">Saco, Pantalon y Falda</td>    
                        <td style="border: 1px solid #000;"><?php echo $cotiza->precio_1; ?> Bs.</td>
                        <td style="border: 1px solid #000;"><?php echo $cotiza->precio_2; ?> Bs.</td> 
                        <td style="border: 1px solid #000;"><?php echo $cotiza->precio_3; ?> Bs.</td> 
                    </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" style=" margin-top: 10px; margin-left: 30px;">
            <tr>
                <td style="width: 80%;">
               NOTA.- Las fechas de medida, primera prueba y entrega ser&aacute;n fijadas con la promoci&oacute;n.
               <p>
                   La entrega se realizaran en respectivo colgador y porta saco.
               </p>                 
                </td>
                
            </tr>
        </table>
        <table width="100%" style=" margin-top: 120px;">
                <tr>
                    <td style="width: 80%; text-align: center;">
                        Soliz & Mendoza
                    </td>
                </tr>
                <tr>
                    <td style="width: 80%; text-align: center;">Calle Antonio Quijaro N° 911, Zona Garita de Lima La Paz - Bolivia</td>
                </tr>
                <tr>
                    <td style="width: 80%; text-align: center;">soliz.y.mendoza@gmail.com</td>
                </tr>
                <tr>
                    <td style="width: 80%; text-align: center;">http://solizmendoza.com</td>
                </tr>
                <tr>
                    <td style="width: 80%; text-align: center;">(591)-79135112</td>
                </tr>
        </table>
    </div>
</body>
</html>