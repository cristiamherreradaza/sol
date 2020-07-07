<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>SOLIZ Y MENDOZA</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>public/main/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo base_url(); ?>public/assets/images/background/img_login.jpg);">        
            <div class="login-box card">
            <?php echo form_open('usuarios/valida'); ?>
            <div class="card-body">
                <div class="form-horizontal form-material">
                    <center>
                        <img src="<?php echo base_url() ?>public/assets/images/sol.png" height="150px">
                        <p></p>
                        <img src="<?php echo base_url() ?>public/assets/images/reportes/impresion_cliente.jpg" width="300px">
                        <hr>
                        <!-- <h3 class="box-title mb-3">SOLIZ&MENDOZA</h3> -->
                    </center>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" name="usuario" type="text" required="" placeholder="Usuario" autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <input class="form-control" name="pass" type="password" required="" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group text-center mt-3">
                      <div class="col-xs-12">
                        <a href="<?php echo base_url() ?>trabajos/nuevo">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">INGRESAR</button>
                        </a>
                      </div>
                    </div>
                  </div>
            </div>
            </form>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>public/main/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/main/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>public/main/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/main/js/custom.min.js"></script>
</body>

</html>