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
                                <h3><b>DETALLE DEL SACO</b></h3>
                                <hr>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Talle</td>
                                                        <td class="text-right"><?php echo $saco['talla']; ?> </td>
                                                        <td>Pecho</td>
                                                        <td class="text-right"><?php echo $saco['pecho']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Largo</td>
                                                        <td class="text-right"><?php echo $saco['largo']; ?></td>
                                                        <td>Estomago</td>
                                                        <td class="text-right"><?php echo $saco['estomago']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hombro</td>
                                                        <td class="text-right"><?php echo $saco['hombro']; ?></td>
                                                        <td>Medio Brazo</td>
                                                        <td class="text-right"><?php echo $saco['medio_brazo']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Espalda</td>
                                                        <td class="text-right"><?php echo $saco['espalda']; ?></td>
                                                        <td>Largo Manga</td>
                                                        <td class="text-right"><?php echo $saco['largo_manga']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php //vdebug($saco, false, false, true); ?>
                                    <!-- <hr width="1" size="500"> -->

                                    <div class="col-md-8">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Modelo</td>
                                                        <td class="text-right"><?php echo $saco['modelo_nombre']; ?> </td>
                                                        <td>Botones</td>
                                                        <td class="text-right"><?php echo $saco['botones']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aberturas</td>
                                                        <td class="text-right"><?php echo $saco['nombre_abertura']; ?></td>
                                                        <td>Detalle</td>
                                                        <td class="text-right"><?php echo $saco['detalle_nombre']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td class="text-right"><?php echo $saco['color']; ?></td>
                                                        <td></td>
                                                        <td class="text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ojal</td>
                                                        <td class="text-right"><?php echo $saco['ojal_puno']; ?></td>
                                                        <td>Color Ojal</td>
                                                        <td class="text-right"><?php echo $saco['color_ojal']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <p></p>

                                <h3><b>DETALLE DEL PANTALON</b></h3>
                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Largo</td>
                                                        <td class="text-right"><?php echo $pantalon['largo']; ?> </td>
                                                        <td>Rodilla</td>
                                                        <td class="text-right"><?php echo $pantalon['rodilla']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Entrepierna</td>
                                                        <td class="text-right"><?php echo $pantalon['entre_pierna']; ?></td>
                                                        <td>Bota pie</td>
                                                        <td class="text-right"><?php echo $pantalon['bota_pie']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cintura</td>
                                                        <td class="text-right"><?php echo $pantalon['cintura']; ?></td>
                                                        <td>Tiro Desaltero</td>
                                                        <td class="text-right"><?php echo $pantalon['tiro_delantero']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Muslo</td>
                                                        <td class="text-right"><?php echo $pantalon['muslo']; ?></td>
                                                        <td>Tiro atras</td>
                                                        <td class="text-right"><?php echo $pantalon['tiro_atras']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php //vdebug($pantalon, false, false, true); ?>
                                    <!-- <hr width="1" size="500"> -->

                                    <div class="col-md-8">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Modelo</td>
                                                        <td class="text-right"><?php echo $pantalon['modelo_nombre']; ?> </td>
                                                        <td>PInzas</td>
                                                        <td class="text-right"><?php echo $pantalon['pinzas_nombre']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bragueta</td>
                                                        <td class="text-right"><?php echo $pantalon['bragueta']; ?></td>
                                                        <td>Bolsillo atras</td>
                                                        <td class="text-right"><?php echo $pantalon['bolsillo_nombre']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bota pie</td>
                                                        <td class="text-right"><?php echo $pantalon['bota_pie_des']; ?></td>
                                                        <td></td>
                                                        <td class="text-right"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>

                                <p></p>

                                <h3><b>DETALLE DEL CHALECO</b></h3>
                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Largo</td>
                                                        <td class="text-right"><?php echo $chaleco['largo']; ?> </td>
                                                        <td>Pecho</td>
                                                        <td class="text-right"><?php echo $chaleco['pecho']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estomago</td>
                                                        <td class="text-right"><?php echo $chaleco['estomago']; ?></td>
                                                        <td></td>
                                                        <td class="text-right"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php //vdebug($chaleco, false, false, true); ?>
                                    <!-- <hr width="1" size="500"> -->

                                    <div class="col-md-8">
                                        <div class="table-responsive mt-5" style="clear: both;">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                        <th>Descripcion</th>
                                                        <th class="text-right">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Modelo</td>
                                                        <td class="text-right"><?php echo $chaleco['modelo_nombre']; ?> </td>
                                                        <td>Botones</td>
                                                        <td class="text-right"><?php echo $chaleco['botones']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Detalle</td>
                                                        <td class="text-right"><?php echo $chaleco['detalle_nombre']; ?></td>
                                                        <td>Color ojales</td>
                                                        <td class="text-right"><?php echo $chaleco['color_ojales']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="table-responsive mt-5" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Description</th>
                                                <th class="text-right">Quantity</th>
                                                <th class="text-right">Unit Cost</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>Milk Powder</td>
                                                <td class="text-right">2 </td>
                                                <td class="text-right"> $24 </td>
                                                <td class="text-right"> $48 </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>Air Conditioner</td>
                                                <td class="text-right"> 3 </td>
                                                <td class="text-right"> $500 </td>
                                                <td class="text-right"> $1500 </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>RC Cars</td>
                                                <td class="text-right"> 20 </td>
                                                <td class="text-right"> %600 </td>
                                                <td class="text-right"> $12000 </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>Down Coat</td>
                                                <td class="text-right"> 60 </td>
                                                <td class="text-right">$5 </td>
                                                <td class="text-right"> $300 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="float-right mt-4 text-right">
                                    <p>Sub - Total amount: $13,848</p>
                                    <p>vat (10%) : $138 </p>
                                    <hr>
                                    <h3><b>Total :</b> $13,986</h3>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="text-right">
                                    <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                    <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                </div>
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