<!-- chartist CSS -->
    <link href="<?php echo base_url('/public/assets/plugins/chartist-js/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/assets/plugins/chartist-js/dist/chartist-init.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/assets/plugins/css-chart/css-chart.css'); ?>" rel="stylesheet">
    
<!-- ============================================================== -->
  <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script>
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
   <!-- Row -->
                <div class="row">
                	<div class="col-lg-3">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">NUEVA CATEGORIA</h4>
                                <!-- <form class="needs-validation" novalidate> -->
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationTooltip01">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Categoria" required>
                                            
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary" onclick="buscar();" type="submit">Guardar</button>
                                <!-- </form> -->
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <h4 class="card-title">Projects of the Month</h4>
                                    <div class="ml-auto">
                                        <select class="custom-select">
                                            <option selected>January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                    <table class="table stylish-table">
                                    	<?php $var = $this->db->order_by('id', 'ASC')->get_where('categorias')->result();?>
                                        <thead>
                                            <tr>
                                                <th colspan="2">Assigned</th>
                                                <th>Name</th>
                                                <th>Priority</th>
                                                <th>Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($var as $valor) {
                                        	# code...
                                         ?>
                                            <tr>
                                                <td style="width:50px;"><span class="round">S</span></td>
                                                <td>
                                                    <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small></td>
                                                <td><?php echo $valor->nombre; ?></td>
                                                <td><span class="label label-light-success">Low</span></td>
                                                <td>$3.9K</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Row -->
  </div>
</div>
<link href="<?php echo base_url('/public/assets/plugins/css-chart/css-chart.css'); ?>" rel="stylesheet">

<!-- chartist chart -->
<script src="<?php echo base_url('/public/assets/plugins/chartist-js/dist/chartist.min.js'); ?>"></script>
<script src="<?php echo base_url('/public/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'); ?>"></script>
<!-- Chart JS -->
<script src="<?php echo base_url('/public/assets/plugins/Chart.js/Chart.min.js'); ?>"></script>
<script src="js/dashboard2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
function alerta_edad(){
Swal.fire(
  'Buen trabajo!',
  'Hiciste el Registro Correctamente!',
  'success'
)
//location.reload();
}
</script>

<script type="text/javascript">
function buscar()
	{
    	var nombre = $("#nombre").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Inventarios/guarda/',
            type: 'POST',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: nombre},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
            	if (data.estado == 'registrado') {
            		alerta_edad();
	            }
	            	// $('#nombres').val(data.nombre);
	            // $('#nombres').val(data[3].nombre);


            },
            error:function(jqXHR, textStatus, errorThrown) {
                alert('NO SE GUARDO');
            }
        });
  }
   
</script>


