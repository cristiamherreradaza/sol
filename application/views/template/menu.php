<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
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
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> Cambio Pass</a>
                    <div class="dropdown-divider"></div> <a href="<?php echo base_url() ?>usuarios/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MENU PRINCIPAL</li>
                <li>
                    <a href="javascript:void(0)" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Control Panel</span></a>
                </li>    
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">TRABAJOS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>trabajos/nuevo">Nuevo</a></li>
                        <li><a href="<?php echo base_url(); ?>trabajos/listado_trabajos">Listado</a></li>
                        <li><a href="<?php echo base_url(); ?>reportes/inicio">Reportes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>clientes/listado" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">CLIENTES</span></a>
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
                            <a href="<?php echo base_url() ?>usuarios/listado"><i class="mdi mdi-account-multiple"></i> Usuarios</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">INVENTARIOS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra">Principal</a></li> -->

                        <li><a href="<?php echo base_url(); ?>Inventarios_Compra/lista">Lista de Inventarios</a></li>
                        <!-- <li><a href="<?php echo base_url(); ?>Inventarios_Compra/categorias">Lista de Materiales</a></li> -->
                        <li><a href="<?php echo base_url(); ?>Inventarios_Compra">Ingresar Material</a></li>
                        <li><a href="<?php echo base_url(); ?>Inventarios_Compra/categorias">Sacar Material</a></li>
                        <li><a href="<?php echo base_url(); ?>Inventarios_Compra/membrete">Membrete</a></li>
                        <li><a href="<?php echo base_url(); ?>Inventarios_Compra/reporte">Reporte</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                <li><a href="javascript:void(0)">item 1.3.3</a></li>
                                <li><a href="javascript:void(0)">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
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
<!-- ==============================================================