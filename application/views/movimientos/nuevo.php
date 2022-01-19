<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <link href="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-dark">
                    <div class="card-header">
                        <h4>ENVIO DE PRODUCTOS</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?=date('Y-m-d')?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Almacen Origen</label>
                                        <select name="alamcen_origen" id="alamcen_origen" class="form-control">
                                            <?php
                                            foreach ($almacenes as $key => $al) {
                                            ?>
                                                <option value="<?=$al->id?>" <?php $select = ($this->session->almacen_id == $al->id)? 'selected': ''?> <?=$select?>><?=$al->nombre?></option>
                                            <?php
                                            }                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Almacen Destino</label>
                                        <select name="almacen_destino" id="almacen_destino" class="form-control">
                                            <?php
                                            foreach ($almacenes as $key => $al) {
                                                if($al->id != $this->session->almacen_id){
                                                ?>
                                                    <option value="<?=$al->id?>"><?=$al->nombre?></option>
                                                <?php
                                                }
                                            }                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Buscar Producto</label>
                                        <input type="text" name="busca_producto" id="busca_producto" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="table-productos">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
</div>
<script type="text/javascript">

    // $("#edita-busqueda-kcb, #edita-busqueda-nombre").on("change paste keyup", function() {
    $("#busca_producto").on("change paste keyup", function() {

        let fecha           = $("#fecha").val();
        let almacen_origen  = $("#almacen_origen").val();
        let almacen_destino = $("#almacen_destino").val();
        let busca_producto  = $("#busca_producto").val();

        $.ajax({
            url: "<?= base_url()?>movimiento/ajaxBuscaProducto",
            data: {
                fecha: fecha, 
                almacen_origen: almacen_origen,
                almacen_destino: almacen_destino,
                busca_producto: busca_producto
            },
            type: 'GET',
            success: function(data) {
                $("#table-productos").html(data);
            }
        });

    });
</script>

<!-- <script type="text/javascript">
    var costo_tela = 0;
    var costo_confeccion = 0;
    var suma = 0;
    var monto_total = 0;
    var a_cuenta = 0;
    var saldo = 0;
    var subtotal_saco = 0;
    var subtotal_pantalon = 0;
    var subtotal_ch = 0;
    var subtotal_fa = 0;
    var subtotal_jam = 0;
    var subtotal_cam = 0;
    var subtotal_ext = 0;
    var costo_confeccion_calculado = 0;

    // generamos los tabs
    $('#tabsProductos div .btn').click(function () {
        var t = $(this).attr('id');

        if ($(this).hasClass('inactivo')) { //preguntamos si tiene la clase inactivo 
            $('#tabsProductos div .btn').addClass('inactivo');
            $(this).removeClass('inactivo');

            $('.tabContenido').hide();
            $('#' + t + 'C').fadeIn('slow');
        }
    });

    $("#saco_pu, #saco_cantidad").keyup(function() {
        calcula_precio_saco();
    });

    function calcula_precio_saco() {
        cantidad_saco = parseFloat($("#saco_cantidad").val());
        precio_saco = parseFloat($("#saco_pu").val());
        subtotal_saco = cantidad_saco * precio_saco;

        costo_confeccion_calculado = parseFloat(subtotal_saco + subtotal_pantalon + subtotal_ch);
        $('#saco_subtotal').val(subtotal_saco);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
    }

    $("#pantalon_pu, #pantalon_cantidad").keyup(function() {
        calcula_precio_pantalon();
    });

    function calcula_precio_pantalon() {
        cantidad_pantalon = parseFloat($("#pantalon_cantidad").val());
        precio_pantalon = parseFloat($("#pantalon_pu").val());
        subtotal_pantalon = cantidad_pantalon * precio_pantalon;

        $('#pantalon_subtotal').val(subtotal_pantalon);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);
    }

    $("#ch_pu, #ch_cantidad").keyup(function() {
        calcula_precio_chaleco();
    });

    function calcula_precio_chaleco() {
        cantidad_ch = parseFloat($("#ch_cantidad").val());
        precio_ch = parseFloat($("#ch_pu").val());
        subtotal_ch = cantidad_ch * precio_ch;

        $('#ch_subtotal').val(subtotal_ch);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch);

    }

    $("#cam_pu, #cam_cantidad").keyup(function() {
        calcula_precio_camisa();
    });

    function calcula_precio_camisa() {
        cantidad_cam = parseFloat($("#cam_cantidad").val());
        precio_cam = parseFloat($("#cam_pu").val());
        subtotal_cam = cantidad_cam * precio_cam;

        $('#cam_subtotal').val(subtotal_cam);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam);
    }

    $("#ext_pu, #ext_cantidad").keyup(function() {
        calcula_precio_extras();
    });

    function calcula_precio_extras() {
        cantidad_ext = parseFloat($("#ext_cantidad").val());
        precio_ext = parseFloat($("#ext_pu").val());
        subtotal_ext = cantidad_ext * precio_ext;

        $('#ext_subtotal').val(subtotal_ext);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam + subtotal_ext)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_cam + subtotal_ext);
    }

    $("#fa_pu, #fa_cantidad").keyup(function() {
        calcula_precio_falda();
    });

    function calcula_precio_falda() {
        cantidad_fa = parseFloat($("#fa_cantidad").val());
        precio_fa = parseFloat($("#fa_pu").val());
        subtotal_fa = cantidad_fa * precio_fa;

        $('#fa_subtotal').val(subtotal_fa);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa);
    }

    $("#jam_pu, jam_cantidad").keyup(function() {
        calcula_precio_jumper();
    });

    function calcula_precio_jumper() {
        cantidad_jam = parseFloat($("#jam_cantidad").val());
        precio_jam = parseFloat($("#jam_pu").val());
        subtotal_jam = cantidad_jam * precio_jam;

        $('#jam_subtotal').val(subtotal_jam);
        $('#costo_confeccion').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa + subtotal_jam)
        $('#costo_confeccion_calculado').val(subtotal_saco + subtotal_pantalon + subtotal_ch + subtotal_fa + subtotal_jam);
    }

    $("#costo_confeccion").keyup(function() {
        ccc = parseFloat($("#costo_confeccion_calculado").val());
        cc = parseFloat($("#costo_confeccion").val());

        if (cc < ccc) {
            calculo_rebaja = ccc - cc;
            $('#rebaja').val(calculo_rebaja);
        } else {
            $('#rebaja').val(0);
        }
    });


    // $(".calculo").change(function() {
    $(".calculo").on("change paste keyup", function() {


        costo_tela = parseFloat($("#costo_tela").val());
        costo_confeccion = parseFloat($("#costo_confeccion").val());
        suma = costo_tela + costo_confeccion;

        var obj = document.getElementById('rebaja');
        if(obj.getAttribute("readonly") == null){
            var rebaja = $('#rebaja').val()
            suma = suma - rebaja;
        }

        $("#monto_total").val(suma);

        a_cuenta = parseFloat($("#a_cuenta").val());
        saldo = suma - a_cuenta

        

        $("#saldo").val(saldo);
        // console.log("Costo: "+suma);
        // console.log("Costo de tela: "+costo_tela);
    });

    function cambia_genero() {
    
        
        var genero = $("#genero").val();
        // console.log(genero);
        if (genero == 'Mujer') {
            $("#saco_albusto").toggle('slow');
            $("#pantalon_cadera").toggle('slow');
            $("#pd_cpretina").toggle('slow');
            $("#ch_abusto").toggle('slow');
            $("#bloque_extras").toggle('slow');
            $("#bloque_mujer").toggle('slow');
            $("#select_bragueta").toggle('slow');

            // invocamos los contratos para mujer
            $.ajax({
                url: '<?php echo base_url() ?>Contratos/ajaxContratos/Mujer',
                type: 'GET',
                success: function(data) {
                    $("#carga_contratos").html(data);
                }
            });

        } else {
            $("#saco_albusto").toggle('slow');
            $("#pantalon_cadera").toggle('slow');
            $("#pd_cpretina").toggle('slow');
            $("#ch_abusto").toggle('slow');
            $("#bloque_extras").toggle('slow');
            $("#bloque_mujer").toggle('slow');
            $("#select_bragueta").toggle('slow');

            // invocamos los contratos para val
            $.ajax({
                url: '<?php echo base_url() ?>Contratos/ajaxContratos/Varon',
                type: 'GET',
                success: function(data) {
                    $("#carga_contratos").html(data);
                }
            });

        }
    }

    $("#nombre").on("change paste keyup", function() {
        $("#datos_cliente_ajax").show('toggle');

        nombre_cliente = $('#nombre').val();

        // console.log(nombre_cliente);
        if (nombre_cliente.length > 2) {
            $.ajax({
                url: '<?php echo base_url() ?>Trabajos/ajax_busca_cliente/' + nombre_cliente,
                type: 'GET',
                success: function(data) {
                    $("#datos_cliente_ajax").html(data);
                }
            });
        }

    });

    function extraer_datos(id_cliente) {

        $("#datos_cliente_ajax").hide('toggle');

        $.ajax({
            url: '<?php echo base_url() ?>Trabajos/ajax_medidas_cliente/' + id_cliente,
            type: 'GET',
            success: function(data) {
                // dv.html(data);
                datos_cliente = JSON.parse(data);
                // console.log(datos_cliente);
                // console.log(datos_cliente.cliente.nombre);
                if (datos_cliente.cliente.genero == 'Mujer') {
                    $("#genero").val('Mujer');
                    // $("#genero").attr("disabled", true);
                    cambia_genero();
                    // console.log('entro');
                }else{
                    $("#genero").val('Varon');
                    cambia_genero();
                }

                $("#cod_cliente").val(datos_cliente.cliente.id);
                $("#nombre").val(datos_cliente.cliente.nombre);
                $("#ci").val(datos_cliente.cliente.ci);
                $("#celulares").val(datos_cliente.cliente.celulares);

                if (datos_cliente.sacos != null) {
                    $("#s_talla").val(datos_cliente.sacos.talla);
                    $("#s_largo").val(datos_cliente.sacos.largo);
                    $("#s_hombro").val(datos_cliente.sacos.hombro);
                    $("#s_espalda").val(datos_cliente.sacos.espalda);
                    $("#s_pecho").val(datos_cliente.sacos.pecho);
                    $("#s_estomago").val(datos_cliente.sacos.estomago);
                    $("#s_mbrazo").val(datos_cliente.sacos.medio_brazo);
                    $("#s_lmanga").val(datos_cliente.sacos.largo_manga);
                    $("#s_abusto").val(datos_cliente.sacos.altura_busto);
                }

                if (datos_cliente.pantalones != null) {
                    $("#p_largo").val(datos_cliente.pantalones.largo);
                    $("#p_entrepierna").val(datos_cliente.pantalones.entre_pierna);
                    $("#p_cintura").val(datos_cliente.pantalones.cintura);
                    $("#p_muslo").val(datos_cliente.pantalones.muslo);
                    $("#p_rodilla").val(datos_cliente.pantalones.rodilla);
                    $("#p_bpie").val(datos_cliente.pantalones.bota_pie);
                    $("#p_tdelantero").val(datos_cliente.pantalones.tiro_delantero);
                    $("#p_tatras").val(datos_cliente.pantalones.tiro_atras);
                    $("#p_cadera").val(datos_cliente.pantalones.cadera);
                }
                if (datos_cliente.chalecos != null) {
                    $("#ch_largo").val(datos_cliente.chalecos.largo);
                    $("#ch_pecho").val(datos_cliente.chalecos.pecho);
                    $("#ch_estomago").val(datos_cliente.chalecos.estomago);
                }
                if (datos_cliente.faldas != null) {
                    $("#fa_largo").val(datos_cliente.faldas.largo);
                    $("#fa_cintura").val(datos_cliente.faldas.cintura);
                    $("#fa_cadera").val(datos_cliente.faldas.cadera);
                    $("#fa_vasta").val(datos_cliente.faldas.vasta);
                }
            }
        });
    }

    // validamos que el cliente no se repita en el contrato
    function valida_cliente_contrato(contrato_id) {
        var cliente_id = $('#cod_cliente').val();
        // console.log('entro');
        if (cliente_id) {
            // alert('entro');
            $.ajax({
                url: '<?php echo base_url() ?>contratos/ajax_valida_cliente/' + cliente_id + '/' + contrato_id,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        $("#contrato_id").val("");
                        swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'El cliente ya esta en el contrato!',
                            // footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                }
            });
        }

    }


    // extrae datos del contrato y setea form
    function extraer_datos_contrato() {
        var contrato_id = $("#contrato_id").val();
        valida_cliente_contrato(contrato_id);
        // var cliente_id = $("#cod_cliente").val();
        // console.log(contrato_id);  

        $.ajax({
            url: '<?php echo base_url() ?>contratos/ajax_extrae_modelos/' + contrato_id,
            type: 'GET',
            success: function(data) {
                datos_modelos = JSON.parse(data);
                $("#grupo_id").val(datos_modelos.contrato.grupo_id);
                console.log(datos_modelos);

                $("#saco_pu").val(datos_modelos.contrato.costo_saco);
                $("#pantalon_pu").val(datos_modelos.contrato.costo_pantalon);
                $("#ch_pu").val(datos_modelos.contrato.costo_chaleco);
                $("#fa_pu").val(datos_modelos.contrato.costo_falda);
                calcula_precio_saco();
                calcula_precio_pantalon();
                calcula_precio_chaleco();
                calcula_precio_falda();

                //llenamos datos del trabajo
                $("#costo_tela").val(datos_modelos.contrato.costo_tela);
                $("#monto_total").val(datos_modelos.contrato.total);
                $("#tela_propia").val(datos_modelos.contrato.tela_propia);
                $("#marca").val(datos_modelos.contrato.marca);
                //fin llenamos datos del trabajo

                if (datos_modelos.sacos != null) {
                    $("#sd_modelo").val(datos_modelos.sacos.modelo_id);
                    $("#sd_botones").val(datos_modelos.sacos.botones);
                    $("#sd_aberturas").val(datos_modelos.sacos.abertura_id);
                    $("#sd_detalle").val(datos_modelos.sacos.detalle_id);
                    $("#sd_color").val(datos_modelos.sacos.color);
                    $("#sd_ojal").val(datos_modelos.sacos.ojal_puno);
                    $("#sd_color_ojal").val(datos_modelos.sacos.color_ojal);
                } else {
                    $("#sd_modelo").val("");
                    $("#sd_botones").val("");
                    $("#sd_aberturas").val("");
                    $("#sd_detalle").val("");
                    $("#sd_color").val("");
                    $("#sd_ojal").val("");
                    $("#sd_color_ojal").val("");
                }

                if (datos_modelos.pantalones != null) {
                    $("#pd_modelo").val(datos_modelos.pantalones.modelo_id);
                    $("#pd_pinzas").val(datos_modelos.pantalones.pinza_id);
                    $("#pd_bragueta").val(datos_modelos.pantalones.bragueta);
                    $("#pd_batras").val(datos_modelos.pantalones.bolsillo_id);
                    $("#pd_bpie").val(datos_modelos.pantalones.bota_pie_des);
                    $("#pd_pretina").val(datos_modelos.pantalones.pretina);
                } else {
                    $("#pd_modelo").val("");
                    $("#pd_botones").val("");
                    $("#pd_bragueta").val("");
                    $("#pd_batras").val("");
                    $("#pd_bpie").val("");
                    $("#pd_pretina").val("");
                }

                if (datos_modelos.chalecos != null) {
                    $("#ch_modelo").val(datos_modelos.chalecos.modelo_id);
                    $("#ch_botones").val(datos_modelos.chalecos.botones);
                    $("#ch_detalle").val(datos_modelos.chalecos.detalle_id);
                    $("#ch_color").val(datos_modelos.chalecos.color_ojales);
                } else {
                    $("#ch_modelo").val("");
                    $("#ch_botones").val("");
                    $("#ch_detalle").val("");
                    $("#ch_color").val("");
                }

                if (datos_modelos.faldas != null) {
                    $("#fa_modelo").val(datos_modelos.faldas.modelo_id);
                    $("#fa_abertura").val(datos_modelos.faldas.abertura_id);
                    $("#fa_pretina").val(datos_modelos.faldas.pretina);
                } else {
                    $("#fa_modelo").val("");
                    $("#fa_abertura").val("");
                    $("#fa_pretina").val("");
                }

            }
        });

    }

    function habilita(){
        // alert('en desarrollo :v');
        if($('#motivo_rebaja').val() == ''){
            suma = parseInt($("#rebaja").val()) + parseInt($("#monto_total").val());
            $("#monto_total").val(suma);

            $("#saldo").val(parseInt($("#monto_total").val()) - parseInt($("#a_cuenta").val()));
            
            $("#rebaja").val(0);
            $("#rebaja").attr("readonly", true); 
        }else{
            $("#rebaja").attr("readonly", false); 
        }
    }

    function copyDateChaleco(dato){

        if(dato.id == 's_largo'){
            $('#ch_largo').val(dato.value);
        }else if(dato.id == 's_pecho'){
            $('#ch_pecho').val(dato.value);
        }else{
            $('#ch_estomago').val(dato.value);
        }

    }

    // $("#rebaja").on("change paste keyup", function() {
    //     // $("#raza-modal").val($("#raza_id").val());
    //     console.log($('#rebaja').val());
    //     console.log($('#monto_total').val());
    //     console.log('------------');
    // });

    // fin extrae datos del contrato
</script> -->
<script src="<?php echo base_url() ?>public/assets/plugins/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url() ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>