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
                        <center><h1><b>MATERIALES PERTENECIENTES AL TRABAJO N° <?php echo $trabajo['id']; ?></b></h1></center>
                        <?php
                        $retiro = $this->db->get_where('movimientos', array('trabajo_id'=>$trabajo['id'], 'borrado'=>null))->result();
                        if(count($retiro) > 0){
                        ?>
                          <h6 class="text-danger text-center"><b><i class="mdi mdi-alert"></i> Material ya Retirado <i class="mdi mdi-alert"></i></b></h6>
                        <?php
                        }
                        ?>
                        <?php //vdebug($trabajo, false, false, true); ?>
                        <hr>
                        <?php
                        $retiro = $this->db->get_where('movimientos', array('trabajo_id'=>$trabajo['id'], 'borrado' => null))->result();
                        if(count($retiro) != 0){
                          ?>
                          <?php echo form_open_multipart('Inventarios_Venta/edita_retiro', array('method'=>'POST')); ?>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="float-left">
                                  <address>
                                      <h3>Cliente: <b class="text-info"> <?php echo $trabajo['nombre'] ?></b></h3>
                                  </address>
                                </div>
                                <div class="float-right text-right">
                                  <address>
                                      <h4 class="font-bold">Fecha: <?php echo date("Y-m-d");?></h4>
                                  </address>
                                </div>
                              </div>
                            </div>

                              <input type="hidden" name="trabajo_id" id="trabajo_id"  value="<?php echo $trabajo['id']; ?>">
                              <!-- <input type="hidden" name="cliente_id" id="cliente_id"  value="<?php echo $trabajo['cliente_id'] ?>"> -->
                              <input type="hidden" name="fecha" id="fecha"  value="<?php echo date("Y-m-d") ?>">
                              <div class="row">
                                <div class="col-md-6">
                                  <?php
                                    $sacos = $this->db->get_where('movimientos', array('confeccion' => 'SACO', 'trabajo_id'=>$trabajo['id'], 'borrado' => null))->result();
                                    if(!empty($sacos)){
                                      $saco = $this->db->get_where('sacos', array('trabajo_id'=>$trabajo['id'],'borrado'=>null))->row_array();
                                    ?>
                                      <div class="card card-outline-info">
                                        <div class="card-header">
                                          <h4 class="mb-0 text-white">MATERIALES PARA EL SACO (cantidad <?php echo $saco['cantidad']; ?>)</h4>
                                        </div>
                                        <div class="card-body" style="background-color: #e6f2ff;">
                                          <?php
                                            $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'VARON', 'borrado' => null ))->result();
                                          ?>
                                          <table class="table table-responsive table-striped">
                                            <thead>
                                              <tr>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>PRECIO</th>
                                              </tr>                                               
                                            </thead>
                                            <tbody>
                                              <?php
                                              foreach ($sacos as $sa){
                                                $producto = $this->db->get_where('productos', array('id' => $sa->producto_id, 'borrado' => null ))->row_array();
                                                ?>
                                                <tr>
                                                  <td><?=$producto['nombre']?><input type="hidden" name="saco_varon_ids[]" value="<?=$sa->producto_id?>"></td>
                                                  <td><input name="saco_varon_cantidad[]" type="text" class="form-control" value="<?=$sa->salida?>"></td>
                                                  <td><input name="saco_varon_precio[]" type="text" class="form-control" value="<?=$sa->precio_total?>"></td>
                                                </tr>                                            
                                                <?php
                                              }
                                              ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    <?php
                                    }
                                  ?>
                                </div>
                                <div class="col-md-6">
                                  <?php
                                    $pantalones = $this->db->get_where('movimientos', array('confeccion' => 'PANTALON', 'trabajo_id'=>$trabajo['id'], 'borrado' => null))->result();
                                    if(!empty($pantalones)){
                                      $pantalon = $this->db->get_where('pantalones', array('trabajo_id'=>$trabajo['id'],'borrado'=>null))->row_array();
                                    ?>
                                      <div class="card card-outline-success">
                                        <div class="card-header">
                                          <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON (cantidad <?php echo $pantalon['cantidad']; ?>)</h4>
                                        </div>
                                        <div class="card-body" style="background-color: #e6ffe6;">
                                          <?php
                                            $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'VARON', 'borrado' => null ))->result();
                                          ?>
                                          <table class="table table-responsive table-striped">
                                            <thead>
                                              <tr>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>PRECIO</th>
                                              </tr>                                               
                                            </thead>
                                            <tbody>
                                              <?php
                                              foreach ($pantalones as $sa){
                                                $producto = $this->db->get_where('productos', array('id' => $sa->producto_id, 'borrado' => null ))->row_array();
                                                ?>
                                                <tr>
                                                  <td><?=$producto['nombre']?><input type="hidden" name="pantalon_varon_ids[]" value="<?=$sa->producto_id?>"></td>
                                                  <td><input name="pantalon_varon_cantidad[]" type="text" class="form-control" value="<?=$sa->salida?>"></td>
                                                  <td><input name="pantalon_varon_precio[]" type="text" class="form-control" value="<?=$sa->precio_total?>"></td>
                                                </tr>                                            
                                                <?php
                                              }
                                              ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    <?php
                                    }
                                  ?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <?php
                                    $chalecos = $this->db->get_where('movimientos', array('confeccion' => 'CHALECO', 'trabajo_id'=>$trabajo['id'], 'borrado' => null))->result();
                                    if(!empty($chalecos)){
                                      $pantalon = $this->db->get_where('chalecos', array('trabajo_id'=>$trabajo['id'],'borrado'=>null))->row_array();
                                    ?>
                                      <div class="card card-outline-primary">
                                        <div class="card-header">
                                          <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO (cantidad <?php echo $pantalon['cantidad']; ?>)</h4>
                                        </div>
                                        <div class="card-body" style="background-color: #f0e7fe;">
                                          <?php
                                            $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'VARON', 'borrado' => null ))->result();
                                          ?>
                                          <table class="table table-responsive table-striped">
                                            <thead>
                                              <tr>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>PRECIO</th>
                                              </tr>                                               
                                            </thead>
                                            <tbody>
                                              <?php
                                              foreach ($chalecos as $cha){
                                                $producto = $this->db->get_where('productos', array('id' => $cha->producto_id, 'borrado' => null ))->row_array();
                                                ?>
                                                <tr>
                                                  <td><?=$producto['nombre']?><input type="hidden" name="chaleco_varon_ids[]" value="<?=$cha->producto_id?>"></td>
                                                  <td><input name="chaleco_varon_cantidad[]" type="text" class="form-control" value="<?=$cha->salida?>"></td>
                                                  <td><input name="chaleco_varon_precio[]" type="text" class="form-control" value="<?=$cha->precio_total?>"></td>
                                                </tr>                                            
                                                <?php
                                              }
                                              ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    <?php
                                    }
                                  ?>
                                </div>
                                <div class="col-md-6">
                                  <?php
                                    $faldas = $this->db->get_where('movimientos', array('confeccion' => 'FALDA', 'trabajo_id'=>$trabajo['id'], 'borrado' => null))->result();
                                    if(!empty($faldas)){
                                      $falda = $this->db->get_where('faldas', array('trabajo_id'=>$trabajo['id'],'borrado'=>null))->row_array();
                                    ?>
                                      <div class="card card-outline-warning">
                                        <div class="card-header">
                                          <h4 class="mb-0 text-white">MATERIALES PARA LA FALDA (cantidad <?php echo $falda['cantidad']; ?>)</h4>
                                        </div>
                                        <div class="card-body" style="background-color: #FBFCBF;">
                                          <?php
                                            $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'VARON', 'borrado' => null ))->result();
                                          ?>
                                          <table class="table table-responsive table-striped">
                                            <thead>
                                              <tr>
                                                <th>PRODUCTO</th>
                                                <th>CANTIDAD</th>
                                                <th>PRECIO</th>
                                              </tr>                                               
                                            </thead>
                                            <tbody>
                                              <?php
                                              foreach ($faldas as $fa){
                                                $producto = $this->db->get_where('productos', array('id' => $fa->producto_id, 'borrado' => null ))->row_array();
                                                ?>
                                                <tr>
                                                  <td><?=$producto['nombre']?><input type="hidden" name="falda_varon_ids[]" value="<?=$fa->producto_id?>"></td>
                                                  <td><input name="falda_varon_cantidad[]" type="text" class="form-control" value="<?=$fa->salida?>"></td>
                                                  <td><input name="falda_varon_precio[]" type="text" class="form-control" value="<?=$fa->precio_total?>"></td>
                                                </tr>                                            
                                                <?php
                                              }
                                              ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    <?php
                                    }
                                  ?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <button class="btn btn-block btn-info"> <span><i class="fa fa-print"></i> Guardar</span> </button>
                                </div>
                              </div>
                          </form>
                          <?php
                        }else{
                          ?>
                            <?php echo form_open_multipart('Inventarios_Venta/guarda_retiro', array('method'=>'POST')); ?>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="float-left">
                                    <address>
                                        <h3>Cliente: <b class="text-info"> <?php echo $trabajo['nombre'] ?></b></h3>
                                    </address>
                                  </div>
                                  <div class="float-right text-right">
                                    <address>
                                        <h4 class="font-bold">Fecha: <?php echo date("Y-m-d");?></h4>
                                    </address>
                                  </div>
                                </div>
                                <input type="hidden" name="trabajo_id" id="trabajo_id"  value="<?php echo $trabajo['id']; ?>">
                                <!-- <input type="hidden" name="cliente_id" id="cliente_id"  value="<?php echo $trabajo['cliente_id'] ?>"> -->
                                <input type="hidden" name="fecha" id="fecha"  value="<?php echo date("Y-m-d") ?>">
                                <?php if (!empty($saco_varon->cantidad)) { ?>
                                <!-- INICIO DATOS PARA EL VARON -->
                                <div class="col-md-12">
                                        <div class="row">
                                        <!-- <?//php if (!empty($saco_varon->cantidad)): ?> -->
                                        <?php if ($saco_varon->modelo_id != 0): 
                                            
                                          ?>
                                            <div class="col-md-6">
                                              <div class="card card-outline-info">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL SACO (cantidad <?php echo $saco_varon->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6f2ff;">
                                                  <?php
                                                    $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'VARON', 'borrado' => null ))->result();
                                                  ?>
                                                  <table class="table table-responsive table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>CANTIDAD</th>
                                                        <th>PRECIO</th>
                                                      </tr>                                               
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      foreach ($datos as $sv){
                                                        ?>
                                                        <tr>
                                                          <td><?=$sv->detalle?><input type="hidden" name="saco_varon_ids[]" value="<?=$sv->producto_id?>"></td>
                                                          <td><input name="saco_varon_cantidad[]" type="text" class="form-control" value="<?=$saco_varon->cantidad*$sv->cantidad?>"></td>
                                                          <td><input name="saco_varon_precio[]" type="text" class="form-control" value="<?=$saco_varon->cantidad*$sv->precio?>"></td>
                                                        </tr>                                            
                                                        <?php
                                                      }
                                                      ?>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                        
                                        <?php endif ?>

                                        <!-- <?//php if (!empty($pantalon_varon->cantidad)): ?> -->
                                        <?php 
                                          if($pantalon_varon !=  null ){

                                            if ($pantalon_varon->modelo_id != 0): 
                                            ?>
                                              <!-- modelos pantalon -->
                                              <div class="col-md-6">
                                                <div class="card card-outline-success">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON (cantidad <?php echo $pantalon_varon->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #e6ffe6;">
                                                    <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>PRODUCTO</th>
                                                          <th>CANTIDAD</th>
                                                          <th>PRECIO</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                      $datos = $this->db->get_where('material_trabajos', array('pieza'=>'PANTALON','genero' =>'VARON', 'borrado' => null ))->result();
                                                      foreach($datos as $pv){
                                                      ?>
                                                        <tr>      
                                                          <td><?=$pv->detalle?> <input type="hidden" name="pantalon_varon_ids[]" value="<?=$pv->producto_id?>"></td>
                                                          <td><input name="pantalon_varon_cantidad[]" id="" type="text" class="form-control" value="<?=$pantalon_varon->cantidad*$pv->cantidad?>"></td>
                                                          <td><input name="pantalon_varon_precio[]" id="" type="text" class="form-control" value="<?=$pantalon_varon->cantidad*$pv->precio?>"></td>
                                                        </tr>  
                                                      <?php
                                                      }
                                                      ?>
                                                      </tbody>
                                                    </table>

                                                      <!-- <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BONYE (Metros)' ?></label>
                                                              <input name="bpv" type="number" id="bpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*0.50; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                              <input name="cpv" type="number" id="cpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                              <input name="pbpv" type="number" id="pbpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*0.30; ?>">
                                                            </div>
                                                          </div>
                                                      </div> -->

                                                      <!-- <div class="row">
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                            <input name="bppv" type="number" id="bppv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*5; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BROCHE (Unidades)' ?></label>
                                                            <input name="bropv" type="number" id="bropv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'PLASTON (Metros)' ?></label>
                                                            <input name="ppv" type="number" id="ppv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*6; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'LIGA (Metros)' ?></label>
                                                            <input name="lpv" type="number" id="lpv" class="form-control" min="0" step="any" value="<?php echo $pantalon_varon->cantidad*1.2; ?>">
                                                          </div>
                                                        </div>
                                                      </div> -->

                                                  </div>
                                                </div>
                                              </div>
                                              <!-- fin medidas pantalon -->
                                            </div>
                                              <!-- fin pantalon -->
                                            <?php 
                                            endif ;
                                          }
                                          ?>

                                </div>

                                <div class="col-md-12">

                                        <div class="row">
                                        <!-- <?//php if (!empty($chaleco_varon->cantidad)): ?> -->
                                        <?php 
                                        if($chaleco_varon != null){
                                          if ($chaleco_varon->modelo_id != 0): 
                                          ?>
                                              <div class="col-md-6">
                                                  <div class="card card-outline-primary">
                                                    <div class="card-header">
                                                      <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO (cantidad <?php echo $chaleco_varon->cantidad; ?>)</h4>
                                                    </div>
                                                    <div class="card-body" style="background-color: #f0e7fe;">

                                                      <table class="table table-striped">
                                                        <thead>
                                                          <tr>
                                                            <th>PRODUCTO</th>
                                                            <th>CANTIDAD</th>
                                                            <th>PRECIO</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $datos = $this->db->get_where('material_trabajos', array('pieza'=>'CHALECO','genero' =>'VARON', 'borrado' => null ))->result();
                                                        foreach($datos as $chv){
                                                        ?>
                                                          <tr>      
                                                            <td><?=$chv->detalle?> <input type="hidden" name="chaleco_varon_ids[]" value="<?=$chv->producto_id?>"></td>
                                                            <td><input name="chaleco_varon_cantidad[]" id="" type="text" class="form-control" value="<?=$chaleco_varon->cantidad*$chv->cantidad?>"></td>
                                                            <td><input name="chaleco_varon_precio[]" id="" type="text" class="form-control" value="<?=$chaleco_varon->cantidad*$chv->precio?>"></td>
                                                          </tr>  
                                                        <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                      </table>

                                                      <!-- <div class="row">

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                            <input name="fcv" type="number" id="fcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*1.10; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                            <input name="pcv" type="number" id="pcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*0.30; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'HEVILLA (Unidades)' ?></label>
                                                            <input name="hcv" type="number" id="hcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*1; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                            <input name="bgcv" type="number" id="bgcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*3; ?>">
                                                          </div>
                                                        </div>

                                                      </div>

                                                      <div class="row">

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                            <input name="bpcv" type="number" id="bpcv" class="form-control" min="0" step="any" value="<?php echo $chaleco_varon->cantidad*2; ?>">
                                                          </div>
                                                        </div>

                                                      </div> -->
                                                    </div>
                                                  </div>
                                              </div>
                                          
                                          <?php 
                                          endif;
                                        }
                                        ?>

                                        <!-- <?php if (!empty($camisa['modelo_nombre'])): ?>
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">CAMISA</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #f0e7fe;">

                                                    <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">BONYE</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">CIERRE</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">PELLON BLANCO</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label">BOTON</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>
                                                    </div>

                                                    <div class="row">
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">BOCHA</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">PLASTON</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label">LIGA</label>
                                                              <input name="sd_botones" type="number" id="sd_botones" class="form-control" min="0" step="any">
                                                            </div>
                                                          </div>

                                                    </div>

                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                            <?php endif ?> -->
                                </div>
                                <!-- FIN DE DATOS DEL VARON -->
                                <?php 
                                } else { 
                                ?>
                                <!-- INICIO DATOS PARA LA MUJER -->
                                <div class="col-md-12">

                                        <div class="row">
                                        <!-- <?//php if (!empty($saco_mujer->cantidad)): ?> -->
                                        <?php 
                                        if($saco_mujer != null){
                                          if ($saco_mujer->modelo_id != 0): 
                                            ?>
                                              <div class="col-md-6">
                                                  <div class="card card-outline-info">
                                                    <div class="card-header">
                                                      <h4 class="mb-0 text-white">MATERIALES PARA EL SACO (cantidad <?php echo $saco_mujer->cantidad; ?>)</h4>
                                                    </div>
                                                    <div class="card-body" style="background-color: #e6f2ff;">
                                                      <?php
                                                        $datos = $this->db->get_where('material_trabajos', array('pieza'=>'SACO','genero' =>'MUJER', 'borrado' => null ))->result();
                                                      ?>
                                                      <table class="table table-responsive table-striped">
                                                        <thead>
                                                          <tr>
                                                            <th>PRODUCTO</th>
                                                            <th>CANTIDAD</th>
                                                            <th>PRECIO</th>
                                                          </tr>                                               
                                                        </thead>
                                                        <tbody>
                                                          <?php
                                                          foreach ($datos as $sm){
                                                            ?>
                                                            <tr>
                                                              <td><?=$sm->detalle?><input type="hidden" name="saco_mujer_ids[]" value="<?=$sm->producto_id?>"></td>
                                                              <td><input name="saco_mujer_cantidad[]" type="text" class="form-control" value="<?=$saco_mujer->cantidad*$sm->cantidad?>"></td>
                                                              <td><input name="saco_mujer_precio[]" type="text" class="form-control" value="<?=$saco_mujer->cantidad*$sm->precio?>"></td>
                                                            </tr>                                            
                                                            <?php
                                                          }
                                                          ?>
                                                        </tbody>
                                                      </table>                                    

                                                      <!-- <div class="row">
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                            <input name="fsm" type="number" id="fsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*1.10; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'TELA FUSIONABLE (Metros)' ?></label>
                                                            <input name="fusm" type="number" id="fusm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.30; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                            <input name="psm" type="number" id="psm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.10; ?>">
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'TAFETA (Metros)' ?></label>
                                                            <input name="tsm" type="number" id="tsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*0.20; ?>">
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'HOMBRERA DE MUJER (Unidades)' ?></label>
                                                            <input name="hmsm" type="number" id="hmsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*2; ?>">
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BOTON GRANDE (Unidades)' ?></label>
                                                            <input name="bgsm" type="number" id="bgsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*4; ?>">
                                                          </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                            <input name="bpsm" type="number" id="bpsm" class="form-control" min="0" step="any" value="<?php echo $saco_mujer->cantidad*10; ?>">
                                                          </div>
                                                        </div>
                                                      </div> -->

                                                    </div>
                                                  </div>
                                              </div>
                                          
                                          <?php 
                                          endif ;
                                        }
                                        ?>

                                        <!-- <?//php if (!empty($pantalon_mujer->cantidad)): ?> -->
                                        <?php 
                                        if($pantalon_mujer != null){
                                          if ($pantalon_mujer->modelo_id != 0):
                                           ?>
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-success">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL PANTALON (cantidad <?php echo $pantalon_mujer->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6ffe6;">
                                                  <table class="table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>CANTIDAD</th>
                                                        <th>PRECIO</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $datos = $this->db->get_where('material_trabajos', array('pieza'=>'PANTALON','genero' =>'MUJER', 'borrado' => null ))->result();
                                                    foreach($datos as $pm){
                                                    ?>
                                                      <tr>      
                                                        <td><?=$pm->detalle?> <input type="hidden" name="pantalon_mujer_ids[]" value="<?=$pm->producto_id?>"></td>
                                                        <td><input name="pantalon_mujer_cantidad[]" id="" type="text" class="form-control" value="<?=$pantalon_mujer->cantidad*$pm->cantidad?>"></td>
                                                        <td><input name="pantalon_mujer_precio[]" id="" type="text" class="form-control" value="<?=$pantalon_mujer->cantidad*$pm->precio?>"></td>
                                                      </tr>  
                                                    <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                  </table>


                                                    <!-- <div class="row">
                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                              <input name="cpm" type="number" id="cpm" class="form-control" min="0" step="any" value="<?php echo $pantalon_mujer->cantidad*1; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON PARA PRETINA (Metros)' ?></label>
                                                              <input name="pppm" type="number" id="pppm" class="form-control" min="0" step="any" value="<?php echo $pantalon_mujer->cantidad*3.50; ?>">
                                                            </div>
                                                          </div>
                                                    </div> -->
                                                </div>
                                              </div>
                                            </div>
                                            <!-- fin medidas pantalon -->
                                          </div>
                                              <!-- fin pantalon -->
                                          <?php 
                                          endif ;
                                        }
                                      ?>
                                </div>
                                <div class="col-md-12">

                                        <div class="row">
                                        <!-- <?//php if (!empty($falda_mujer->cantidad)): ?> -->
                                        <?php 
                                        if($falda_mujer != null){
                                          if ($falda_mujer->modelo_id != 0): 
                                          ?>
                                            <div class="col-md-6">
                                              <div class="card card-outline-primary">
                                                  <div class="card-header">
                                                    <h4 class="mb-0 text-white">MATERIALES PARA LA FALDA (cantidad <?php echo $falda_mujer->cantidad; ?>)</h4>
                                                  </div>
                                                  <div class="card-body" style="background-color: #f0e7fe;">
                                                    <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>PRODUCTO</th>
                                                          <th>CANTIDAD</th>
                                                          <th>PRECIO</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                      <?php
                                                      $datos = $this->db->get_where('material_trabajos', array('pieza'=>'FALDA','genero' =>'MUJER', 'borrado' => null ))->result();
                                                      foreach($datos as $fm){
                                                      ?>
                                                        <tr>      
                                                          <td><?=$fm->detalle?> <input type="hidden" name="falda_mujer_ids[]" value="<?=$fm->producto_id?>"></td>
                                                          <td><input name="falda_mujer_cantidad[]" id="" type="text" class="form-control" value="<?=$falda_mujer->cantidad*$fm->cantidad?>"></td>
                                                          <td><input name="falda_mujer_precio[]" id="" type="text" class="form-control" value="<?=$falda_mujer->cantidad*$fm->precio?>"></td>
                                                        </tr>  
                                                      <?php
                                                      }
                                                      ?>
                                                      </tbody>
                                                    </table>
                                                    <!-- <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'CIERRE (Unidades)' ?></label>
                                                          <input name="cfm" type="number" id="cfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*1; ?>">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'TAFETA (Metros)' ?></label>
                                                          <input name="tfm" type="number" id="tfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*0.50; ?>">
                                                        </div>
                                                      </div>

                                                      <div class="col-md-5">
                                                        <div class="form-group">
                                                          <label class="control-label"><?php echo 'PELLON PARA PRETINA (Metros)' ?></label>
                                                          <input name="ppfm" type="number" id="ppfm" class="form-control" min="0" step="any" value="<?php echo $falda_mujer->cantidad*3.50; ?>">
                                                        </div>
                                                      </div>
                                                    </div> -->
                                                  </div>
                                                </div>
                                            </div>
                                        
                                        <?php 
                                        endif ;
                                      }
                                      ?>

                                        <!-- <?//php if (!empty($chaleco_mujer->cantidad)): ?> -->
                                        <?php 
                                        if($chaleco_mujer != null){                          
                                          if ($chaleco_mujer->modelo_id != 0): 
                                          ?>
                                            
                                            <!-- modelos pantalon -->
                                            <div class="col-md-6">
                                              <div class="card card-outline-inverse">
                                                <div class="card-header">
                                                  <h4 class="mb-0 text-white">MATERIALES PARA EL CHALECO (cantidad <?php echo $chaleco_mujer->cantidad; ?>)</h4>
                                                </div>
                                                <div class="card-body" style="background-color: #e6f2ff;">
                                                  <table class="table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>CANTIDAD</th>
                                                        <th>PRECIO</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $datos = $this->db->get_where('material_trabajos', array('pieza'=>'CHALECO','genero' =>'MUJER', 'borrado' => null ))->result();
                                                    foreach($datos as $chm){
                                                    ?>
                                                      <tr>      
                                                        <td><?=$chm->detalle?> <input type="text" name="chaleco_mujer_ids[]" value="<?=$chm->producto_id?>"></td>
                                                        <td><input name="chaleco_mujer_cantidad[]" id="" type="text" class="form-control" value="<?=$falda_mujer->cantidad*$chm->cantidad?>"></td>
                                                        <td><input name="chaleco_mujer_precio[]" id="" type="text" class="form-control" value="<?=$falda_mujer->cantidad*$chm->precio?>"></td>
                                                      </tr>  
                                                    <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                  </table>

                                                    <!-- <div class="row">
                                                          <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'FORRO (Metros)' ?></label>
                                                              <input name="fcm" type="number" id="fcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*0.50; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-4">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'PELLON BLANCO (Metros)' ?></label>
                                                              <input name="pbcm" type="number" id="pbcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*0.20; ?>">
                                                            </div>
                                                          </div>

                                                          <div class="col-md-5">
                                                            <div class="form-group">
                                                              <label class="control-label"><?php echo 'BOTON PEQUEÑO (Unidades)' ?></label>
                                                              <input name="bpcm" type="number" id="bpcm" class="form-control" min="0" step="any" value="<?php echo $chaleco_mujer->cantidad*5; ?>">
                                                            </div>
                                                          </div>
                                                    </div> -->
                                                </div>
                                              </div>
                                            </div>
                                            <!-- fin medidas pantalon -->
                                        </div>
                                              <!-- fin pantalon -->
                                          <?php 
                                          endif ;
                                        }
                                        ?>
                                </div>
                                <!-- FIN DATOS PARA LA MUJER -->
                                <?php 
                                } 
                                ?>
                              </div>
                              <div class="col-md-12">
                                <button class="btn waves-effect waves-light btn-block btn-info" type="submit"> <span><i class="fa fa-print"></i> Guardar</span> </button>
                              </div>
                            </div>
                          </form>
                        <?php
                        }
                        ?>
                      
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            <?=date('Y')?> desarrollado por GoGhu
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
<script src="<?php echo base_url(); ?>public/main/js/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
   $(document).ready(function() {
       $("#print").click(function() {
           var mode = 'iframe'; //popup
           var close = mode == "popup";
           var options = {
               mode: mode,
               popClose: close
           };
           $("div.printableArea").printArea(options);
       });
   });
</script>

<script>
   function sacar_inv(){

        var entre_tela_saco_pv = $("#entre_tela_saco_pv").val();
        var entre_tela_saco = $("#entre_tela_saco").val();
        var entre_tela_saco_id = $("#entre_tela_saco_id").val();



        var forro_saco = $("#forro_saco").val();
        var plaston_saco = $("#plaston_saco").val();
        var hombrera_v_saco = $("#hombrera_v_saco").val();
        var pellon_saco = $("#pellon_saco").val();
        var fusionable_saco = $("#fusionable_saco").val();
        var boton_g_saco = $("#boton_g_saco").val();
        var boton_p_saco = $("#boton_p_saco").val();
        var bonye_pantalon = $("#bonye_pantalon").val();
        var cierre_pantalon = $("#cierre_pantalon").val();
        var pellon_pantalon = $("#pellon_pantalon").val();
        var boton_g_pantalon = $("#boton_g_pantalon").val();
        var boton_p_pantalon = $("#boton_p_pantalon").val();
        var bocha_pantalon = $("#bocha_pantalon").val();
        var plaston_pantalon = $("#plaston_pantalon").val();
        var liga_pantalon = $("#liga_pantalon").val();
        var forro_chaleco = $("#forro_chaleco").val();
        var pellon_chaleco = $("#pellon_chaleco").val();
        var hebilla_chaleco = $("#hebilla_chaleco").val();
        var boton_g_chaleco = $("#boton_g_chaleco").val();
        var boton_p_chaleco = $("#boton_p_chaleco").val();


   }
</script>

