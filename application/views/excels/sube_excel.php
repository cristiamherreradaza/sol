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
                            <?php echo form_open_multipart('excels/guarda_excel'); ?>
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Archivo (Nombre:<span style="color: red;"> enero_2020.xlsx</span>)</label>
                                            <input type="file" name="archivo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="padding-top: 14px;"></p>
                                        <button type="submit" class="btn waves-effect waves-light btn-block btn-success">SUBIR EXCEL</button>
                                    </div>
                                </div>
                            </form>
                           <div class="row">

                               <div class="col-md-12">
                                   <div class="card card-outline-primary">
                                       <div class="card-header">
                                           <h4 class="mb-0 text-white">LISTADO DE ARCHIVOS</h4>
                                       </div>
                                       <?php //vdebug($eagos, false, false, true)
                                        ?>
                                       <?php $total = 0; ?>
                                       <table id="archivos-table" class="table table-striped no-wrap">
                                           <thead>
                                               <tr>
                                                   <th>Excel</th>
                                                   <th>Mes</th>
                                                   <th>Fecha</th>
                                                   <th class="text-center">Acciones</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <?php foreach ($excels_subidos as $e) : ?>
                                                   <tr>
                                                       <td><?php echo $e->nombre_archivo; ?></td>
                                                       <td><?php echo $e->mes; ?></td>
                                                       <td><?php echo fechaEs($e->fecha); ?></td>
                                                       <td class="text-center">
                                                           <a href="<?php echo base_url() ?>Excels/detalle/<?php echo $e->id; ?>">
                                                               <button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button>
                                                           </a>
                                                           <button type="button" class="btn btn-danger" onclick="elimina_excel(<?php echo $e->id ?>, '<?php echo $e->nombre_archivo ?>')"><i class="fas fa-times"></i></button>
                                                       </td>
                                                   </tr>
                                               <?php endforeach; ?>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                                <div class="col-md-12">
                                    <!-- <?php echo form_open('reportes/ingresos_gastos') ?> -->
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="mes-sueldo" id="mes-sueldo" class="form-control">
                                                        <option value="1">Enero</option>
                                                        <option value="2">Febrero</option>
                                                        <option value="3">Marzo</option>
                                                        <option value="4">Abril</option>
                                                        <option value="5">Mayo</option>
                                                        <option value="6">Junio</option>
                                                        <option value="7">Julio</option>
                                                        <option value="8">Agosto</option>
                                                        <option value="9">Septiembre</option>
                                                        <option value="10">Octubre</option>
                                                        <option value="11">Noviembre</option>
                                                        <option value="12">Diciembre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" onclick="verifica_genera()" class="btn waves-effect waves-light btn-block btn-success">GENERAR SUELDOS</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

   <script type="text/javascript">
       $(function () {
            $('#archivos-table').DataTable({
                responsive: true,
                bFilter: false,
                bLengthChange: false,
                // bPaginate: false,

                "order": [
                    [0, 'desc']
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });

        });

       function elimina_excel(id, nombre) {
           //console.log(id_pago);
           Swal.fire({
               title: 'Quieres borrar ' + nombre + '?',
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
                       'El archivo fue eliminado.',
                       'success'
                   );
                   window.location.href = "<?php echo base_url() ?>excels/elimina/"+id;
               }
           })
       }

       function verifica_genera(){
		// var fecha = $('#fecha_genera').val();
        var mes = $('#mes-sueldo').val();
        // alert(mes);
        // hay que convertir el mes en numero
		if (fecha == '') {
			Swal.fire({
				      type: 'error',
				      title: 'Oops...',
				      text: 'No ingreso ninguna fecha'
				    })
		} else {
			$.ajax({
	                url: '<?php echo base_url(); ?>Control_Asistencia/verifica_genera/',
	                type: 'get',
	                dataType: 'json',
	                data: {param1: fecha},
	                success:function(data, textStatus, jqXHR) {
	                    if (data.estado == 'No') {
	                        window.location.href = "<?php echo base_url() ?>Control_Asistencia/lista_pagos/"+fecha;
	                    } else {
	                    	Swal.fire({
						      type: 'error',
						      title: 'Oops...',
						      text: 'Ya existe el registrado de fecha '+ fecha
						    })
	                    }
	                },
	                error:function(jqXHR, textStatus, errorThrown) {
	                    alerta_ci();
	                }
	            });
		}
	}
   </script>
