<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>CLIENTE</th>
					<th>CARNET</th>
					<th>CELULAR</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<b class="text-info"> <?php echo $trabajo['nombre'] ?></b>
					</td>
					<td>
						<b class="text-info"> <?php echo $trabajo['ci'] ?></b>
					</td>
					<td>
						<b class="text-info"> <?php echo $trabajo['celulares'] ?></b>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>PRENDA</th>
					<th>CANTIDAD</th>
					<th>ESTADO</th>
					<th>UBICACION</th>
					<th>ASIGNACION</th>
					<th>FECHA DE ASIGNACION</th>
					<th>FECHA DE CONCLUSION</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			// if(!empty($saco['modelo_nombre'])){
			if(count($saco) > 0){
				foreach ($saco as $key => $s) {
				?>	
					<tr>
						<td>
							SACO <b class="text-danger">#<?=$key + 1?></b>
						</td>
						<td class="text-center"><?=$s['cantidad']?></td>
						<td>
							<select name="saco_estado" id="saco_estado" class="form-control" onchange="guardaEstadoUbicacion('saco', 'estado', <?=$s['id']?>)" <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
								<option <?= ($s['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
								<option <?= ($s['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
							</select>
							<center>
								<small id="_saco_estado" class="text-success" style="display: none;">Guardado Estado</small>
							</center>
						</td>
						<td>
							<select name="saco_ubicacion" id="saco_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('saco', 'ubicacion', <?=$s['id']?>)">
								<option <?= ($s['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
								<option <?= ($s['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
							</select>
							<center>
								<small id="_saco_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
							</center>
						</td>
						<td>
							<select name="persona_destinada_saco" id="persona_destinada_saco_<?=$key?>" style="width: 100%;" class="form-control select2" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
							<option value="">Seleccione</option>
							<?php
								foreach ($usuarios as $u){
								?>
								<option <?=(($s['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
								<?php
								}
							?>
							</select>
						</td>
						<td><?=(empty($s['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $s['fecha_asignado']?></td>
						<td><?=(empty($s['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $s['fecha_concluido']?></td>
						<td>
							<?php
							if($s['fecha_asignado'] != null){
								if($this->session->id_usuario == $s['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
							?>
								<button type="button" onclick="asignarPrenda('saco', <?=$s['id']?>, 'concluir', <?=$key?>)" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
							<?php
								}
							}
							?>
							<?php
							if($this->session->rol == 'Administrador'){
							?>
							<button type="button" onclick="asignarPrenda('saco', <?=$s['id']?>, 'asignar', <?=$key?>)" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
							<?php
							}
							?>
						</td>
					</tr>	
				<?php
				}
			}

			if(count($pantalon) > 0){
				foreach ($pantalon as $key => $p) {
				?>
					<tr>
						<td>
							PANTALON <b class="text-danger">#<?=$key + 1?></b>
						</td>
						<td class="text-center"><?=$p['cantidad']?></td>
						<td>
							<select name="pantalon_estado" id="pantalon_estado" class="form-control" onchange="guardaEstadoUbicacion('pantalon', 'estado', <?=$p['id']?>)" <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
								<option <?= ($p['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
								<option <?= ($p['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
							</select>
							<center>
								<small id="_pantalon_estado" class="text-success" style="display: none;">Guardado Estado</small>
							</center>
						</td>
						<td>
							<select name="pantalon_ubicacion" id="pantalon_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('pantalon', 'ubicacion', <?=$p['id']?>)">
								<option <?= ($p['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
								<option <?= ($p['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
							</select>
							<center>
								<small id="_pantalon_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
							</center>
						</td>
						<td>
							<select name="persona_destinada_pantalon" id="persona_destinada_pantalon_<?=$key?>" style="width: 100%;" class="form-control select2" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
							<option value="">Seleccione</option>
							<?php
								foreach ($usuarios as $u){
								?>
								<option <?=(($p['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
								<?php
								}
							?>
							</select>
						</td>
						<td><?=(empty($p['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $p['fecha_asignado']?></td>
						<td><?=(empty($p['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $p['fecha_concluido']?></td>
						<td>
							<?php
							if($p['fecha_asignado'] != null){
								if($this->session->id_usuario == $p['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
							?>
								<button type="button" onclick="asignarPrenda('pantalon', <?=$p['id']?>, 'concluir', <?=$key?>)" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
							<?php
								}
							}
							?>
							<?php
							if($this->session->rol == 'Administrador'){
							?>
							<button type="button" onclick="asignarPrenda('pantalon', <?=$p['id']?>, 'asignar', <?=$key?>)" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
							<?php
							}
							?>
						</td>
					</tr>	
				<?php
				}
			}
			
			if(count($chaleco) > 0){
				foreach ($chaleco as $key => $c) {
				?>
				<tr>
					<td>
						CHALECO <b class="text-danger">#<?=$key + 1?></b>
					</td>
					<td class="text-center"><?=$c['cantidad']?></td>
					<td>
						<select name="chaleco_estado" id="chaleco_estado" class="form-control" onchange="guardaEstadoUbicacion('chaleco', 'estado', <?=$c['id']?>)" <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
							<option <?= ($c['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($c['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_chaleco_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="chaleco_ubicacion" id="chaleco_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('chaleco', 'ubicacion', <?=$c['id']?>)">
							<option <?= ($c['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($c['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_chaleco_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_chaleco" id="persona_destinada_chaleco_<?=$key?>" style="width: 100%;" class="form-control select2" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($c['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($c['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $c['fecha_asignado']?></td>
					<td><?=(empty($c['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $c['fecha_concluido']?></td>
					<td>
						<?php
						if($c['fecha_asignado'] != null){
							if($this->session->id_usuario == $c['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('chaleco', <?=$c['id']?>, 'concluir', <?=$key?>)" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('chaleco', <?=$c['id']?>, 'asignar', <?=$key?>)" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
				<?php
				}
			}

			if(!empty($falda['modelo_nombre'])){
			?>
				<tr>
					<td>
						FALDA
					</td>
					<td>
						<select name="falda_estado" id="falda_estado" class="form-control" onchange="guardaEstadoUbicacion('falda', 'estado', <?=$falda['id']?>)">
							<option <?= ($falda['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($falda['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_falda_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="falda_ubicacion" id="falda_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('falda', 'ubicacion', <?=$falda['id']?>)">
							<option <?= ($falda['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($falda['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_falda_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_falda" id="persona_destinada_falda_0" class="form-control select2" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($falda['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($falda['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $falda['fecha_asignado']?></td>
					<td><?=(empty($falda['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $falda['fecha_concluido']?></td>
					<td>
						<?php
						if($falda['fecha_asignado'] != null){
							if($this->session->id_usuario == $falda['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('falda', <?=$falda['id']?>, 'concluir', 0)" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('falda', <?=$falda['id']?>, 'asignar', 0)" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
			<?php
			}
			?>

			<?php
			if(!empty($jumper['modelo_nombre'])){
			?>
				<tr>
					<td>
						JUMPER
					</td>
					<td>
						<select name="jumper_estado" id="jumper_estado" class="form-control" onchange="guardaEstadoUbicacion('jumper', 'estado', <?=$jumper['id']?>)">
							<option <?= ($jumper['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($jumper['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_jumper_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="jumper_ubicacion" id="jumper_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('jumper', 'ubicacion', <?=$jumper['id']?>)">
							<option <?= ($jumper['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($jumper['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_jumper_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_jumper" id="persona_destinada_jumper_0" class="form-control select2" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($jumper['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($jumper['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $jumper['fecha_asignado']?></td>
					<td><?=(empty($jumper['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $jumper['fecha_concluido']?></td>
					<td>
						<?php
						if($jumper['fecha_asignado'] != null){
							if($this->session->id_usuario == $jumper['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('jumper', <?=$jumper['id']?>, 'concluir', 0)" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('jumper', <?=$jumper['id']?>, 'asignar', 0)" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
			<?php
			}
			?>
			</tbody>
		</table>
	
	</div>
</div>

<script>
	$(document).ready(function() {

		<?php
			for ($i=0; $i < count($saco) ; $i++)
				echo "$('#persona_destinada_saco_$i').select2({dropdownParent: $('#myModalLocalizacion')});";

			for ($i=0; $i < count($pantalon) ; $i++)
				echo "$('#persona_destinada_pantalon_$i').select2({dropdownParent: $('#myModalLocalizacion')});";

			for ($i=0; $i < count($chaleco) ; $i++)
				echo "$('#persona_destinada_chaleco_$i').select2({dropdownParent: $('#myModalLocalizacion')});";
		?>

		$('#persona_destinada_falda').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('#persona_destinada_jumper').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('.select2').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});
	});
</script>

