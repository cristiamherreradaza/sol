 </div>
 <style>
  .modal .modal-body {
      max-height: 500px;
      overflow-y: auto;
      overflow-x: hidden;
  }
</style>
<!-- abrimos el modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div id="div_barra_cargando">
      <div class="progress progress-striped active progress-sm">
        <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar"
          class="progress-bar progress-bar-success">

        </div>
      </div>
    </div>
    <div id="divmodal" style="display: none;">

    </div>
  </div>
</div>
</div>
<!-- fin del modal -->
<script>
function cargarmodal(urll)
{
    $("#div_barra_cargando").show();
    $("#myModal").modal({
        //backdrop: 'static',
        //keyboard: false
    });
    $("#divmodal").show();
    $("#divmodal").load(urll, function (responseText, textStatus, req) {
        if (textStatus == "error")
        {
            $("#divmodal").hide();
            alert("error!!!");
        }
        else {
            $("#div_barra_cargando").hide(800);
        }
    });

}
</script>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
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
    <script src="<?php echo base_url('/public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/main/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
</body>

</html>