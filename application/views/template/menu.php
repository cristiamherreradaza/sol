<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<!-- inicio modal content -->

<div id="modal_usuario" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <form action="<?php //echo base_url() 
                                ?>aberturas/guarda" method="POST"> -->
            <?php echo form_open('usuarios/guarda'); ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">FORMULARIO DE USUARIOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <input type="hidden" name="ida" id="u_ida" value="<?php echo $this->session->id_usuario; ?>">
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input name="nombre" type="text" id="u_nombre" class="form-control" value="<?php echo $this->session->nombre; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label">Celulares</label>
                            <input name="celulares" type="text" id="u_celulares" class="form-control" value="<?php echo $this->session->celulares; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="control-label">Direccion</label>
                            <input name="direccion" type="text" id="u_direccion" class="form-control" value="<?php echo $this->session->direccion; ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input name="email" type="text" id="u_email" class="form-control" value="<?php echo $this->session->email; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Usuario</label>
                            <input name="usuario" type="text" id="u_usuario" class="form-control" value="<?php echo $this->session->usuario; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input name="pass" type="text" id="u_pass" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA USUARIO</button>
            </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $this->session->nombre; ?> <span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item" onclick="abre_modal_usuario();"><i class="ti-user"></i> Mi Perfil</a>
                    <!-- <a href="#" class="dropdown-item"><i class="ti-wallet"></i> Cambio Pass</a> -->
                    <div class="dropdown-divider"></div> <a href="<?php echo base_url() ?>usuarios/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap text-center">
                    <?php echo $this->session->rol; ?>
                </li>
                <?php
                if($this->session->rol == 'Administrador'){
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>Panel/home" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">CONTROL PANEL</span></a>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">TRABAJOS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>trabajos/nuevo">Nuevo</a></li>
                            <li><a href="<?php echo base_url(); ?>trabajos/listado_trabajos">Listado</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>trabajos/listado_pagos" aria-expanded="false"><i class="mdi mdi-cash"></i>PAGOS</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url(); ?>contratos/listado" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i>CONTRATOS</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>clientes/listado" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">CLIENTES</span></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url() ?>cajachica/inicio" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">CAJA CHICA</span></a>
                    </li>

                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">REPORTES</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>reportes/fecha_centralizado">Centralizado</a></li>
                            <li><a href="<?php echo base_url(); ?>reportes/inicio">Trabajos</a></li>
                            <li><a href="<?php echo base_url(); ?>reportes/caja_chica">Caja Chica</a></li>
                            <li><a href="<?php echo base_url(); ?>reportes/fecha_inventario">Inventarios</a></li>
                            <li><a href="<?php echo base_url(); ?>reportes/fecha_rrhh">Sueldos y Control del Personal</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">RECURSOS HUMANOS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>Personal/lista">Lista del Personal</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/registra">Registrar Personal</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/horarios">Horarios</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/descuentos">Descuentos</a></li>
                            <li><a href="<?php echo base_url(); ?>Control_Asistencia/inicio">Sueldos</a></li>
                            <li><a href="<?php echo base_url(); ?>Excels/sube_excel">Subir Excel</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-puzzle"></i><span class="hide-menu">CONFIGURACIONES</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <!-- <li><a href="#">Confecciones</a> -->
                            <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu"> Trabajos</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>aberturas/listado">Aberturas</a></li>
                                    <li><a href="<?php echo base_url(); ?>bolsillos/listado">Bolsillos</a></li>
                                    <li><a href="<?php echo base_url(); ?>detalles/listado">Detalles</a></li>
                                    <li><a href="<?php echo base_url(); ?>modelos/listado">Modelos</a></li>
                                    <li><a href="<?php echo base_url(); ?>pinzas/listado">Pinzas</a></li>
                                    <li><a href="<?php echo base_url(); ?>costos/modifica">Costos Operacion</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-outline"></i><span class="hide-menu"> Inventarios</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo base_url(); ?>Materiales/categorias">Materiales</a></li>
                                    <!--<li><a href="<?php echo base_url(); ?>Inventarios/productos">Productos</a></li>
                                    <li><a href="<?php echo base_url(); ?>Inventarios">Dashboard</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Usuarios/listado"><i class="mdi mdi-account-multiple"></i> Usuarios</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Telas/listado"><i class="mdi mdi-format-title"></i> Telas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Almacen/listado"><i class="mdi mdi-store"></i> Almacenes</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url() ?>Material_trabajo/listado"><i class="mdi mdi-book"></i> Material Trabajos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">ITEMS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>Inventarios_Compra/lista">Lista de itemns</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-border-color"></i><span class="hide-menu">COTIZACIONES</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra">Principal</a></li> -->

                            <li><a href="<?php echo base_url(); ?>Cotizacion/lista_unida">Confeccion y Tela</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra/categorias">Lista de Materiales</a></li> -->
                            <li><a href="<?php echo base_url(); ?>Cotizacion/lista_separada">Confeccion y Tela Separados</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>trabajos/presentacion" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">PRESENTACION</span></a>
                    </li>

                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-puzzle"></i><span class="hide-menu">ENVIOS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="<?php echo base_url() ?>Movimiento/nuevo"><i class="mdi mdi-book"></i> Nuevo</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

                <?php
                if($this->session->rol == 'Operario'){
                    ?>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">TRABAJOS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>trabajos/nuevo">Nuevo</a></li>
                            <li><a href="<?php echo base_url(); ?>trabajos/listado_trabajos">Listado</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>trabajos/listado_pagos" aria-expanded="false"><i class="mdi mdi-cash"></i>PAGOS</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url(); ?>contratos/listado" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i>CONTRATOS</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>clientes/listado" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">CLIENTES</span></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url() ?>cajachica/inicio" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">CAJA CHICA</span></a>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-border-color"></i><span class="hide-menu">COTIZACIONES</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra">Principal</a></li> -->

                            <li><a href="<?php echo base_url(); ?>Cotizacion/lista_unida">Confeccion y Tela</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra/categorias">Lista de Materiales</a></li> -->
                            <li><a href="<?php echo base_url(); ?>Cotizacion/lista_separada">Confeccion y Tela Separados</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                ?>

                <?php
                if($this->session->rol == 'recursos humanos'){
                    ?>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-card-details"></i><span class="hide-menu">RECURSOS HUMANOS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>Personal/lista">Lista del Personal</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/registra">Registrar Personal</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/horarios">Horarios</a></li>
                            <li><a href="<?php echo base_url(); ?>Personal/descuentos">Descuentos</a></li>
                            <li><a href="<?php echo base_url(); ?>Control_Asistencia/inicio">Sueldos</a></li>
                            <li><a href="<?php echo base_url(); ?>Excels/sube_excel">Subir Excel</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

                <?php
                if($this->session->rol == 'Almacenero'){
                    ?>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">ITEMS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo base_url(); ?>Inventarios_Compra/lista">Lista de Items</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>



                
                <!-- <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">COTIZACIONES</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Cotizacion/separados">Precios Separados</a></li>
                        <li><a href="<?php echo base_url(); ?>Cotizacion/conjuntos">Precios Conjuntos</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<script>
    function abre_modal_usuario() {
        $("#modal_usuario").modal('show');
    }
</script>