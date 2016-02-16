<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Tareas</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmTareas?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idTarea" id="idTarea">
				<p class="clearfix">
					<input type="text" name="nombre" id="nombre">
					<label for="nombre">Nombre:</label>
				</p>
				<p>
					<select id="idTipoTarea" data-url="./json_getTipoTarea" class="-autoload"></select>
					<label for="idTipoTarea">Tipo:</label>
				</p>
				<p>
					<select id="idListaItem" data-url="./json_getListasItem" class="-autoload"></select>
					<label for="idListaItem">Lista:</label>
				</p>
				<p class="clearfix">
					<input type="button" name="submit" value="Guardar" class="btn -action-sender" 
						data-form="#nuevoTipo">
				</p>
			</form>
		</div>
	</div>
	<div id="itemTemplate" class="hidden">
		<ul class="columns clearfix">
			<li class="left col-xs" data-field="idTarea"></li>
			<li class="left col-xl" data-field="nombre"></li>
			<li class="left col-m -entity" data-url="./json_getTipoTarea" data-field="idTipoTarea"></li>
			<li class="left col-s" data-field="idListaItem"></li>
			<li class="right col-l">
				<input type="button" value="Editar" class="btn -edit-object" 
					data-form="#nuevoTipo" data-value="idTarea"
					data-url="./json_abmTareas?action=edit">
				<input type="button" value="Borrar" class="btn -delete-object" 
					data-form="#nuevoTipo" data-value="idTarea"
					data-url="./json_abmTareas?action=delete">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-xl"><span>Nombre</span></li>
				<li class="left col-m"><span>Tipo</span></li>
				<li class="left col-s"><span>Lista</span></li>
				<li class="right col-l"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				?>
				<li class="abm-item" id="<?php echo $entity->getIdTarea(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdTarea(); ?></li>
						<li class="left col-xl"><?php echo $entity->getNombre(); ?></li>
						<li class="left col-m -entity" data-url="./json_getTipoTarea"><?php echo $entity->getIdTipoTarea(); ?></li>
						<li class="left col-s"><?php echo ($entity->getIdListaItem())?$entity->getIdListaItem():"&nbsp;"; ?></li>
						<li class="right col-l">
							<input type="button" value="Editar" class="btn -edit-object" 
								data-form="#nuevoTipo" data-value="<?php echo $entity->getIdTarea(); ?>"
								data-url="./json_abmTareas?action=edit">
							<input type="button" value="Borrar" class="btn -delete-object" 
								data-value="<?php echo $entity->getIdTarea(); ?>"
								data-url="./json_abmTareas?action=delete">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdTarea(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>