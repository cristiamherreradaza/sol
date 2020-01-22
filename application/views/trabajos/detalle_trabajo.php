   <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body printableArea">
                        <h3><b>DETALLE DEL TRABAJO</b> <span class="float-right">Numero: <?php echo $trabajo['id']; ?></span></h3>
                        <?php //vdebug($trabajo, false, false, true); ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left">
                                    <address>
                                        <h3> &nbsp;<b class="text-info"><?php echo $trabajo['nombre'] ?></b></h3>
                                        <p class="text-muted ml-1">C.I.: <?php echo $trabajo['ci'] ?>,
                                            <br/> Celulares: <?php echo $trabajo['celulares'] ?>,
                                        </p>
                                    </address>
                                </div>
                                <div class="float-right text-right">
                                    <address>
                                        <h4 class="font-bold">Fecha Entrega: <i class="fa fa-calendar"></i> <?php echo fechaEs($trabajo['fecha_entrega']); ?></h4>
                                        <p class="mt-4"><b>Fecha de Prueba :</b> <i class="fa fa-calendar"></i> <?php echo fechaEs($trabajo['fecha_prueba']); ?></p>
                                        <p><b>Fecha Registro :</b> <i class="fa fa-calendar"></i> <?php echo fechaEs($trabajo['fecha']); ?></p>
                                    </address>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <?php if (!empty($saco)): ?>
                                                <div class="card card-outline-info">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">MEDIDAS SACO</h4>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Talle</th>
                                                            <th>Largo</th>
                                                            <th>Hombro</th>
                                                            <th>Espalda</th>
                                                            <th>Pecho</th>
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
                                                            <td><?php echo $saco['estomago']; ?></td>
                                                            <td><?php echo $saco['medio_brazo']; ?></td>
                                                            <td><?php echo $saco['largo_manga']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon)): ?>
                                                <div class="card card-outline-success">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">MEDIDAS PANTALON</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Largo</th>
                                                            <th>Entrepierna</th>
                                                            <th>Cintura</th>
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
                                                            <td><?php echo $pantalon['muslo']; ?></td>
                                                            <td><?php echo $pantalon['rodilla']; ?></td>
                                                            <td><?php echo $pantalon['bota_pie']; ?></td>
                                                            <td><?php echo $pantalon['tiro_delantero']; ?></td>
                                                            <td><?php echo $pantalon['tiro_atras']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco)): ?>                                            <div class="card card-outline-primary">
                                                <div class="card-header">
                                                    <h4 class="mb-0 text-white">MEDIDAS CHALECO</h4>
                                                </div>
                                            </div>

                                            <table class="table table-hover">
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
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <?php if (!empty($saco)): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-info">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES SACO</h4>
                                                    </div>
                                                </div>
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-info">Modelo</td>
                                                            <td class="text-right"><?php echo $saco['modelo_nombre']; ?> </td>
                                                            <td class="text-info">Botones</td>
                                                            <td class="text-right"><?php echo $saco['botones']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Aberturas</td>
                                                            <td class="text-right"><?php echo $saco['nombre_abertura']; ?></td>
                                                            <td class="text-info">Detalle</td>
                                                            <td class="text-right"><?php echo $saco['detalle_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Color</td>
                                                            <td class="text-right"><?php echo $saco['color']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-info">Ojal</td>
                                                            <td class="text-right"><?php echo $saco['ojal_puno']; ?></td>
                                                            <td class="text-info">Color Ojal</td>
                                                            <td class="text-right"><?php echo $saco['color_ojal']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <?php if (!empty($saco)): ?>
                                        <div class="col-md-6">

                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-success">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES PANTALON</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-success">Modelo</td>
                                                            <td class="text-right"><?php echo $pantalon['modelo_nombre']; ?> </td>
                                                            <td class="text-success">PInzas</td>
                                                            <td class="text-right"><?php echo $pantalon['pinzas_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success">Bragueta</td>
                                                            <td class="text-right"><?php echo $pantalon['bragueta']; ?></td>
                                                            <td class="text-success">Bolsillo atras</td>
                                                            <td class="text-right"><?php echo $pantalon['bolsillo_nombre']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-success">Bota pie</td>
                                                            <td class="text-right"><?php echo $pantalon['bota_pie_des']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>


                                    <div class="row">
                                    <?php if (!empty($chaleco)): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-primary">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES CHALECO</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-primary">Modelo</td>
                                                            <td class="text-right"><?php echo $chaleco['modelo_nombre']; ?> </td>
                                                            <td class="text-primary">Botones</td>
                                                            <td class="text-right"><?php echo $chaleco['botones']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-primary">Detalle</td>
                                                            <td class="text-right"><?php echo $chaleco['detalle_nombre']; ?></td>
                                                            <td class="text-primary">Color ojales</td>
                                                            <td class="text-right"><?php echo $chaleco['color_ojales']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>

                                        <?php if (!empty($camisa)): ?>
                                        <div class="col-md-6">

                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-inverse">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">DETALLES CAMISA</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Cuello</td>
                                                            <td class="text-right"><?php echo $camisa['cuello']; ?> </td>
                                                            <td>Largo Manga</td>
                                                            <td class="text-right"><?php echo $camisa['largo_manga']; ?></td>
                                                            <td>Color</td>
                                                            <td class="text-right"><?php echo $camisa['color']; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cuello combinado</td>
                                                            <td class="text-right"><?php echo $camisa['cuello_combinado']; ?></td>
                                                            <td>Cantidad</td>
                                                            <td class="text-right"><?php echo $camisa['cantidad']; ?> </td>
                                                            <td>Modelo cuello</td>
                                                            <td class="text-right"><?php echo $camisa['modelo_cuello']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>
                                    </div>

                                    <div class="row">
                                    <?php if (!empty($extras)): ?>
                                        <div class="col-md-6">
                                            <div class="table-responsive mt-5" style="clear: both;">
                                                <div class="card card-outline-inverse">
                                                    <div class="card-header">
                                                        <h4 class="mb-0 text-white">EXTRAS</h4>
                                                    </div>
                                                </div>

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>Corbaton</td>
                                                            <td class="text-right"><?php echo $extras['corbaton']; ?> </td>
                                                            <td>Corbata Gato</td>
                                                            <td class="text-right"><?php echo $extras['corbata_gato']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Detalle</td>
                                                            <td class="text-right"><?php echo $extras['faja']; ?></td>
                                                            <td></td>
                                                            <td class="text-right"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                        <?php endif ?>

                                    </div>

                                <div class="table-responsive mt-5" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Descripcion</th>
                                                <th class="text-right">Cantidad</th>
                                                <th class="text-right">Precio Unitario</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($saco)): ?>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Saco</td>
                                                    <td class="text-right"><?php echo $saco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $saco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_saco = $saco['cantidad'] * $saco['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_saco = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($pantalon)): ?>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Pantalon</td>
                                                    <td class="text-right"><?php echo $pantalon['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $pantalon['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_pantalon = $pantalon['cantidad'] * $pantalon['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_pantalon = 0 ?>
                                            <?php endif ?>

                                            <?php if (!empty($chaleco)): ?>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>Chaleco</td>
                                                    <td class="text-right"><?php echo $chaleco['cantidad'] ?></td>
                                                    <td class="text-right"><?php echo $chaleco['precio_unitario'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo $sub_chaleco = $chaleco['cantidad'] * $chaleco['precio_unitario'] ?>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php $sub_chaleco = 0 ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="float-right mt-4 text-right">
                                    <?php $sub_total = $sub_saco + $sub_pantalon + $sub_chaleco ?>
                                    <p>Sub - Total : <?php echo $sub_total ?></p>
                                    <p>Precio - Tela : <?php echo $trabajo['costo_tela'] ?> </p>
                                    <hr>
                                    <h3><b>Total :</b> <?php echo $trabajo['costo_tela'] + $sub_total ?></h3>
                                    <h3 class="text-info"><b>Saldo :</b> <?php echo $trabajo['saldo'] ?></h3>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <!-- <div class="text-right">
                                    <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="mt-3">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block mt-4"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                        <ul class="mt-3 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 Monster Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->