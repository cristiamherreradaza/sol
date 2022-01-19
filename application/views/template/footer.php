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
  // script para que todos los formularios pasen con ENTER en vez de TAB
  jQuery(document).ready(function() {
      $('body').on('keydown', 'input, select', function(e) {
      if (e.key === "Enter") {
          var self = $(this), form = self.parents('form:eq(0)'), focusable, next;
          focusable = form.find('input,a,select,button,textarea').filter(':visible');
          next = focusable.eq(focusable.index(this)+1);
          if (next.length) {
              next.focus();
          } else {
              form.submit();
          }
          return false;
      }
    });
  });
</script>
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

// // Refresh Rate is how often you want to refresh the page 
// // bassed off the user inactivity. 
// var refresh_rate = 200; //<-- In seconds, change to your needs
// var last_user_action = 0;
// var has_focus = false;
// var lost_focus_count = 0;
// // If the user loses focus on the browser to many times 
// // we want to refresh anyway even if they are typing. 
// // This is so we don't get the browser locked into 
// // a state where the refresh never happens.    
// var focus_margin = 10; 

// // Reset the Timer on users last action
// function reset() {
//     last_user_action = 0;
//     console.log("Reset");
// }

// function windowHasFocus() {
//     has_focus = true;
// }

// function windowLostFocus() {
//     has_focus = false;
//     lost_focus_count++;
//     console.log(lost_focus_count + " <~ Lost Focus");
// }

// // Count Down that executes ever second
// setInterval(function () {
//     last_user_action++;
//     refreshCheck();
// }, 1000);

// // The code that checks if the window needs to reload
// function refreshCheck() {
//     var focus = window.onfocus;
//     if ((last_user_action >= refresh_rate && !has_focus && document.readyState == "complete") || lost_focus_count > focus_margin) {
//         window.location.reload(); // If this is called no reset is needed
//         reset(); // We want to reset just to make sure the location reload is not called.
//     }

// }
// window.addEventListener("focus", windowHasFocus, false);
// window.addEventListener("blur", windowLostFocus, false);
// window.addEventListener("click", reset, false);
// window.addEventListener("mousemove", reset, false);
// window.addEventListener("keypress", reset, false);
// window.addEventListener("scroll", reset, false);
// document.addEventListener("touchMove", reset, false);
// document.addEventListener("touchEnd", reset, false);


  var time = new Date().getTime();
  $(document.body).bind("mousemove keypress", function(e) {
      time = new Date().getTime();
  });

  function refresh() {
    console.log(time);
      if(new Date().getTime() - time >= 600000) 
      // if(new Date().getTime() - time >= 20000) 
          // window.location.reload(true);
          window.location.href = "<?=base_url()?>";
      else 
          setTimeout(refresh, 5000);
  }

  setTimeout(refresh, 10000);
  // setTimeout(refresh, 5000);
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
    <!-- Sweet-Alert  -->
   <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js" charset="UTF-8"></script>
   <!-- <script src="<?php //echo base_url(); ?>public/assets/plugins/sweetalert2/sweet-alert.init.js"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
   <script src="<?php echo base_url(); ?>public/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
</body>

</html>