<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Tareas por Instancia</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmTipoTramiteInstanciaTarea?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idRelTipoTramiteInstanciaTarea" id="idDireccion">
				<p>
					<select id="idRelTipoTramiteInstancia" data-url="./json_getTiposTramiteInstancia?forSelect=true" class="-autoload"></select>
					<label for="idRelTipoTramiteInstancia">Instancia:</label>
				</p>
				<p>
					<select id="idTarea" data-url="./json_getTareas?forSelect=true" class="-autoload"></select>
					<label for="idTarea">Tarea:</label>
				</p>
				<p>
					<input type="number" id="orden">
					<label for="orden">Orden:</label>
				</p>
				<p class="clearfix">
					<input type="button" name="submit" value="Guardar" class="btn -action-sender" data-form="#nuevoTipo">
				</p>
			</form>
		</div>
	</div>
	<div id="itemTemplate" class="hidden">
		<ul class="columns clearfix">
			<li class="left col-xs" data-field="idRelTipoTramiteInstanciaTarea"></li>
			<li class="left col-l2 -entity" data-url="./json_getTiposTramiteInstancia?forSelect=true" data-field="idRelTipoTramiteInstancia"></li>
			<li class="left col-l2 -entity" data-url="./json_getTareas?forSelect=true" data-field="idTarea"></li>
			<li class="left col-m" data-field="orden"></li>
			<li class="right col-m2">
				<input type="button" value="Borrar" class="btn -delete-object" 
					data-value="idRelTipoTramiteInstanciaTarea"
					data-url="./json_abmTipoTramiteInstanciaTarea?action=delete">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-l2"><span>Instancia</span></li>
				<li class="left col-l2"><span>Tarea</span></li>
				<li class="left col-m"><span>Orden</span></li>
				<li class="right col-m2"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				//echo $entity->getRelIdTipoTramiteInstancia();
				?>
				<li class="abm-item" id="<?php echo $entity->getIdRelTipoTramiteInstanciaTarea(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdRelTipoTramiteInstanciaTarea(); ?></li>
						<li class="left col-l2 -entity" data-url="./json_getTiposTramiteInstancia?forSelect=true"><?php echo $entity->getIdRelTipoTramiteInstancia(); ?></li>
						<li class="left col-l2 -entity" data-url="./json_getTareas?forSelect=true"><?php echo $entity->getIdTarea(); ?></li>
						<li class="left col-m"><?php echo $entity->getOrden(); ?></li>
						<li class="right col-m2">
							<input type="button" value="Borrar" class="btn -delete-object" 
								data-value="<?php echo $entity->getIdRelTipoTramiteInstanciaTarea(); ?>"
								data-url="./json_abmTipoTramiteInstanciaTarea?action=delete">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdRelTipoTramiteInstanciaTarea(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>