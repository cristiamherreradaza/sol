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
                   <div class="card card-outline-info">
                       <div class="card-header">
                           <h4 class="mb-0 text-white">RETGISTRO DE ARCHIVOS EXCEL</h4>
                       </div>

                       <div class="card-body">

                           <div class="row">

                               <div class="col-md-3">
                                   <?php echo form_open_multipart('excels/guarda_excel'); ?>
                                   <div class="row">

                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">Archivo (Nombre:<span style="color: red;"> enero_2020.xlsx</span>)</label>
                                               <input type="file" name="archivo" class="form-control" required>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">

                                       <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">Mes</label>
                                               <select name="mes" id="mes" class="form-control custom-select">
                                                   <option value="Enero">Enero</option>
                                                   <option value="Febrero">Febrero</option>
                                                   <option value="Marzo">Marzo</option>
                                                   <option value="Abril">Abril</option>
                                                   <option value="Mayo">Mayo</option>
                                                   <option value="Junio">Junio</option>
                                                   <option value="Julio">Julio</option>
                                                   <option value="Agosto">Agosto</option>
                                                   <option value="Septiembre">Septiembre</option>
                                                   <option value="Octubre">Octubre</option>
                                                   <option value="Noviembre">Noviembre</option>
                                                   <option value="Diciembre">Diciembre</option>
                                               </select>
                                           </div>
                                       </div>

                                   </div>

                                   <div class="row">
                                       <div class="col-md-12">
                                           <button type="submit" class="btn waves-effect waves-light btn-block btn-success">GUARDA PAGO</button>
                                       </div>
                                   </div>
                                   </form>
                               </div>

                               <div class="col-md-9">
                                   <div class="card card-outline-primary">
                                       <div class="card-header">
                                           <h4 class="mb-0 text-white">LISTADO DE ARCHIVOS</h4>
                                       </div>
                                       <?php //vdebug($eagos, false, false, true) 
                                        ?>
                                       <?php $total = 0; ?>
                                       <table class="table table-striped no-wrap">
                                           <thead>
                                               <tr>
                                                   <th>Excel</th>
                                                   <th>Fecha</th>
                                                   <th style="width: 5%;">Acciones</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <?php foreach ($excels_subidos as $e) : ?>
                                                   <tr>
                                                       <td><?php echo $e->nombre_archivo; ?></td>
                                                       <td><?php echo fechaEs($e->fecha); ?></td>
                                                       <td></td>
                                                       <td align="left">
                                                           <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                       </td>
                                                   </tr>
                                               <?php endforeach; ?>
                                           </tbody>
                                       </table>
                                   </div>

                               </div>


                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <script type="text/javascript">
       function alerta(id_pago, monto, id_trabajo) {
           //console.log(id_pago);
           Swal.fire({
               title: 'Quieres borrar ' + monto + '?',
               text: "Luego no podras recuperarlo!",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Si, estoy seguro!',
               cancelButtonText: "Cancelar",
           }).then((result) => {
               if (result.value) {
                   Swal.fire(
                       'Excelente!',
                       'Tu monto fue borrado.',
                       'success'
                   );
                   // console.log("el id es "+id_pago);
                   window.location.href = "<?php echo base_url() ?>trabajos/borra_pago/" + id_pago + "/" + id_trabajo;
               }
           })
       }
   </script>