<select name="contrato_id" id="contrato_id" class="form-control custom-select" onchange="extraer_datos_contrato()">
	<option value="">Seleccione</option>
	<?php foreach ($contratos as $key => $c) : ?>
	<option value="<?php echo $c['id'] ?>"><?php echo $c['nombre'] ?> (<?php echo $c['genero'] ?>)</option>
	<?php endforeach ?>
</select>