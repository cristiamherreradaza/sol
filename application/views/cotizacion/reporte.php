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

       .invoice {
            /*margin-top: 10px; */
            margin-left: 40px;
            margin-right: 40px;

        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        
        .invoice h3 {
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

        /*estilos para tablas de datos*/
        table.datos {
            font-size: 13px;
            /*line-height:14px;*/
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        .datos th {
          height: 15px;
          background-color: #616362;
          color: #fff;
        }
        .datos td {
          height: 20px;
        }
        .datos th, .datos td {
          border: 1px solid #ddd;
          padding: 2px;
          text-align: center;
        }
        .datos tr:nth-child(even) {background-color: #f2f2f2;}
        /*fin de estilos para tablas de datos*/


      
    </style>


</head>
<body>



<br/>




<div class="invoice">
    <h3 align="center" style="margin-top: 120px; font-size: 30px;">COTIZACION</h3>
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
            <h2>Confecci&oacute;n para VARON</h2>                 
            </td>
        </tr>
</table>

    <table id="data" width="100%" class="datos" style="text-align: center; margin-top: 5px;">
        <thead>
            <tr>
               
                <th style="border: 1px solid #000;">Cantidad</th> 
                <th style="border: 1px solid #000;">Prendas</th> 
                <th style="border: 1px solid #000;">Costo Real Bs.</th>
                <th style="border: 1px solid #000;">Costo por Mayor Bs.</th>
            </tr>
        </thead>
        <tbody>            
                <tr >                    
                    <td style="border: 1px solid #000;">2 PIEZAS</td>
                    <td style="border: 1px solid #000;">SACO Y PANTALON</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_v_1; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_v_1; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">3 PIEZAS</td>
                    <td style="border: 1px solid #000;">SACO, PANTALON Y CHALECO</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_v_2; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_v_2; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">1 PIEZA</td>
                    <td style="border: 1px solid #000;">CAMISA Y CORBATA</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_v_3; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_v_3; ?> Bs.</td> 
                </tr>
        </tbody>
    </table>
    

    <table width="100%" style=" margin-top: 5px; margin-left: 30px;">
        <tr>
            <td style="width: 80%;">
            <h2>Confecci&oacute;n para DAMA</h2>                 
            </td>
        </tr>
    </table>

    <table id="data1" width="100%" class="datos" style="text-align: center; margin-top: 5px;">
        <thead>
            <tr>
               
                <th style="border: 1px solid #000;">Cantidad</th> 
                <th style="border: 1px solid #000;">Prendas</th> 
                <th style="border: 1px solid #000;">Costo Real Bs.</th>
                <th style="border: 1px solid #000;">Costo por Mayor Bs.</th>
            </tr>
        </thead>
        <tbody>            
                <tr >                    
                    <td style="border: 1px solid #000;">2 PIEZAS</td>
                    <td style="border: 1px solid #000;">SACO Y PANTALON</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_m_1; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_m_1; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">3 PIEZAS</td>
                    <td style="border: 1px solid #000;">SACO, PANTALON Y FALDA</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_m_2; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_m_2; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">1 PIEZA</td>
                    <td style="border: 1px solid #000;">CHALECO</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_m_3; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_m_3; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">1 PIEZA</td>
                    <td style="border: 1px solid #000;">BLUZA</td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_m_4; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_m_4; ?> Bs.</td> 
                </tr>
        </tbody>
    </table>

    <table width="100%" style=" margin-top: 5px; margin-left: 30px;">
        <tr>
            <td style="width: 80%;">
            <h2>Telas</h2>                 
            </td>
        </tr>
    </table>

    <table id="data1" width="100%" class="datos" style="text-align: center; margin-top: 5px;">
        <thead>
            <tr>
               
                <th style="border: 1px solid #000;">Metros</th> 
                <th style="border: 1px solid #000;">Tela</th> 
                <th style="border: 1px solid #000;">Costo Real por Metro Bs.</th>
                <th style="border: 1px solid #000;">Costo por Mayor del Metro Bs.</th>
            </tr>
        </thead>
        <tbody>            
                <tr >                    
                    <td style="border: 1px solid #000;">1 METRO</td>
                    <td style="border: 1px solid #000;"><?php echo $tela1->nombre; ?></td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_tela_1; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_tela_1; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">1 METRO</td>
                    <td style="border: 1px solid #000;"><?php echo $tela2->nombre; ?></td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_tela_2; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_tela_2; ?> Bs.</td> 
                </tr>
                <tr>                    
                    <td style="border: 1px solid #000;">1 METRO</td>
                    <td style="border: 1px solid #000;"><?php echo $tela3->nombre; ?></td>    
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_real_tela_3; ?> Bs.</td>
                    <td style="border: 1px solid #000;"><?php echo $cotiza->costo_mayor_tela_3; ?> Bs.</td> 
                </tr>
        </tbody>
    </table>
    


    
    <br>
      <table width="100%" style=" margin-top: 5px; margin-left: 30px;">
            <tr>
                <td style="width: 80%;">
               NOTA.- Las fechas de medida, primera prueba y entrega ser&aacute;n fijadas con la promoci&oacute;n.
               <p>
                   La entrega se realizaran en respectivo colgador y porta saco.
               </p>                 
            </td>
           
        </tr>
    </table>

   
</div>
<table width="100%" style=" margin-top: 15px;">
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
</body>
</html>