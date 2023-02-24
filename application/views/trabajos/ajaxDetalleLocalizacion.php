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
			if(!empty($saco['modelo_nombre'])){
			?>
				<tr>
					<td>
						SACO
					</td>
					<td>
						<select name="saco_estado" id="saco_estado" class="form-control" onchange="guardaEstadoUbicacion('saco', 'estado', <?=$saco['id']?>)">
							<option <?= ($saco['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($saco['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_saco_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="saco_ubicacion" id="saco_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('saco', 'ubicacion', <?=$saco['id']?>)">
							<option <?= ($saco['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($saco['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_saco_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_saco" id="persona_destinada_saco" class="form-control" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($saco['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($saco['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $saco['fecha_asignado']?></td>
					<td><?=(empty($saco['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $saco['fecha_concluido']?></td>
					<td>
						<?php
						if($saco['fecha_asignado'] != null){
							if($this->session->id_usuario == $saco['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('saco', <?=$saco['id']?>, 'concluir')" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('saco', <?=$saco['id']?>, 'asignar')" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
			<?php
			}
			?>

			<?php
			if(!empty($pantalon['modelo_nombre'])){
			?>
				<tr>
					<td>
						PANTALON
					</td>
					<td>
						<select name="pantalon_estado" id="pantalon_estado" class="form-control" onchange="guardaEstadoUbicacion('pantalon', 'estado', <?=$pantalon['id']?>)">
							<option <?= ($pantalon['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($pantalon['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_pantalon_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="pantalon_ubicacion" id="pantalon_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('pantalon', 'ubicacion', <?=$pantalon['id']?>)">
							<option <?= ($pantalon['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($pantalon['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_pantalon_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_pantalon" id="persona_destinada_pantalon" class="form-control" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($pantalon['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($pantalon['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $pantalon['fecha_asignado']?></td>
					<td><?=(empty($pantalon['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $pantalon['fecha_concluido']?></td>
					<td>
						<?php
						if($pantalon['fecha_asignado'] != null){
							if($this->session->id_usuario == $pantalon['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('pantalon', <?=$pantalon['id']?>, 'concluir')" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('pantalon', <?=$pantalon['id']?>, 'asignar')" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
			<?php
			}
			?>

			<?php
			if(!empty($chaleco['modelo_nombre'])){
			?>
				<tr>
					<td>
						CHALECO
					</td>
					<td>
						<select name="chaleco_estado" id="chaleco_estado" class="form-control" onchange="guardaEstadoUbicacion('chaleco', 'estado', <?=$chaleco['id']?>)">
							<option <?= ($chaleco['estado'] == 'Trabajando')? 'selected' : ''?> value="Trabajando">Trabajando</option>
							<option <?= ($chaleco['estado'] == 'Terminado')? 'selected' : ''?> value="Terminado">Terminado</option>
						</select>
						<center>
							<small id="_chaleco_estado" class="text-success" style="display: none;">Guardado Estado</small>
						</center>
					</td>
					<td>
						<select name="chaleco_ubicacion" id="chaleco_ubicacion" class="form-control" onchange="guardaEstadoUbicacion('chaleco', 'ubicacion', <?=$chaleco['id']?>)">
							<option <?= ($chaleco['ubicacion'] == 'Taller')? 'selected' : ''?> value="Taller">Taller</option>
							<option <?= ($chaleco['ubicacion'] == 'Tienda')? 'selected' : ''?> value="Tienda">Tienda</option>
						</select>
						<center>
							<small id="_chaleco_ubicacion" class="text-success" style="display: none;">Guardado Ubicacion</small>
						</center>
					</td>
					<td>
						<select name="persona_destinada_chaleco" id="persona_destinada_chaleco" class="form-control" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
						<option value="">Seleccione</option>
						<?php
							foreach ($usuarios as $u){
							?>
							<option <?=(($chaleco['usuario_asignado_id'] == $u['id'])? 'selected' : '')?> value="<?=$u['id']?>"><?=$u['nombre']?></option>
							<?php
							}
						?>
						</select>
					</td>
					<td><?=(empty($chaleco['fecha_asignado']))? '<span class="text-danger">No Asiganado</span>' : $chaleco['fecha_asignado']?></td>
					<td><?=(empty($chaleco['fecha_concluido']))? '<span class="text-danger">No Concluido</span>' : $chaleco['fecha_concluido']?></td>
					<td>
						<?php
						if($chaleco['fecha_asignado'] != null){
							if($this->session->id_usuario == $chaleco['usuario_asignado_id'] || $this->session->rol == 'Administrador'){
						?>
							<button type="button" onclick="asignarPrenda('chaleco', <?=$chaleco['id']?>, 'concluir')" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('chaleco', <?=$chaleco['id']?>, 'asignar')" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
						<?php
						}
						?>
					</td>
				</tr>	
			<?php
			}
			?>

			<?php
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
						<select name="persona_destinada_falda" id="persona_destinada_falda" class="form-control" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
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
							<button type="button" onclick="asignarPrenda('falda', <?=$falda['id']?>, 'concluir')" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('falda', <?=$falda['id']?>, 'asignar')" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
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
						<select name="persona_destinada_jumper" id="persona_destinada_jumper" class="form-control" required <?= ($this->session->rol != 'Administrador')? 'disabled' : ''?>>
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
							<button type="button" onclick="asignarPrenda('jumper', <?=$jumper['id']?>, 'concluir')" class="btn btn-primary btn-icon"><i class="fa fa-cart-arrow-down"></i></button>
						<?php
							}
						}
						?>
						<?php
						if($this->session->rol == 'Administrador'){
						?>
						<button type="button" onclick="asignarPrenda('jumper', <?=$jumper['id']?>, 'asignar')" class="btn btn-success btn-icon"><i class="fa fa-cart-plus"></i></button>
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
		$('#persona_destinada_saco').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('#persona_destinada_pantalon').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('#persona_destinada_chaleco').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('#persona_destinada_falda').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});

		$('#persona_destinada_jumper').select2({
			dropdownParent: $('#myModalLocalizacion'),
		});
	});
</script>

