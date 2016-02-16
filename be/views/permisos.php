<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Permisos</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" 
		data-url="./json_abmPermisos?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idPermiso" id="idPermiso">
				<p class="clearfix">
					<select id="idUsuario" data-url="./json_getUsuarios?forSelect=1" class="-autoload"></select>
					<label for="idUsuario">Usuario:</label>
				</p>
				<p class="clearfix">
					<select id="idTarea" data-url="./json_getTareas?forSelect=1" class="-autoload"></select>
					<label for="idTarea">Tarea:</label>
				</p>
				<p class="clearfix">
					<input type="button" name="submit" value="Guardar" class="btn -action-sender" data-form="#nuevoTipo">
				</p>
			</form>
		</div>
	</div>
	<div id="itemTemplate" class="hidden">
		<ul class="columns clearfix">
			<li class="left col-xs" data-field="idPermiso"></li>
			<li class="left col-l" data-field="usuario"></li>
			<li class="left col-xxl" data-field="tarea"></li>
			<li class="right col-m2">
				<input type="button" value="Borrar" class="btn -delete-object" 
					data-form="#nuevoTipo" data-value="idPermiso"
					data-url="./json_abmPermisos?action=delete">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-l"><span>Usuario</span></li>
				<li class="left col-xxl"><span>Tarea</span></li>
				<li class="right col-m2"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				?>
				<li class="abm-item" id="<?php echo $entity->getIdPermiso(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdPermiso(); ?></li>
						<li class="left col-l"><?php echo $entity->getUsuario()->getUsuario(); ?></li>
						<li class="left col-xxl"><?php echo $entity->getTarea()->getNombre(); ?></li>
						<li class="right col-m2">
							<input type="button" value="Borrar" class="btn -delete-object" 
								data-value="<?php echo $entity->getIdPermiso(); ?>"
								data-url="./json_abmPermisos?action=delete">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdPermiso(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>