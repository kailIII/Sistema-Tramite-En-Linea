<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Tipos de Tramite</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmTipoTramite?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idTipoTramite" id="idTipoTramite">
				<p class="clearfix">
					<input type="text" name="nombre" id="nombre">
					<label for="nombre">Nombre:</label>
				</p>
				<p class="clearfix">
					<input type="number" name="diasvalidez" id="diasvalidez">
					<label for="diasvalidez">Dias de validez:</label>
				</p>
				<p class="clearfix">
					<input type="button" name="submit" value="Guardar" class="btn -action-sender" data-form="#nuevoTipo">
				</p>
			</form>
		</div>
	</div>
	<div id="itemTemplate" class="hidden">
		<ul class="columns clearfix">
			<li class="left col-xs" data-field="idTipoTramite"></li>
			<li class="left col-xxl" data-field="nombre"></li>
			<li class="left col-s2" data-field="diasvalidez"></li>
			<li class="right col-l">
				<input type="button" value="Editar" class="btn -edit-object" 
					data-form="#nuevoTipo" data-value="idTipoTramite"
					data-url="./json_abmTipoTramite?action=edit">
				<input type="button" value="Borrar" class="btn -delete-object" 
					data-value="idTipoTramite" data-url="./json_abmTipoTramite?action=delete">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-xxl"><span>Nombre</span></li>
				<li class="left col-s2"><span>Validez</span></li>
				<li class="right col-l"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["tipos"] as $tipo) {
				?>
				<li class="abm-item" id="<?php echo $tipo->getIdTipoTramite(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $tipo->getIdTipoTramite(); ?></li>
						<li class="left col-xxl"><?php echo $tipo->getNombre(); ?></li>
						<li class="left col-s2"><?php echo $tipo->getDiasvalidez(); ?></li>
						<li class="right col-l">
							<input type="button" value="Editar" class="btn -edit-object" 
								data-form="#nuevoTipo" data-value="<?php echo $tipo->getIdTipoTramite(); ?>"
								data-url="./json_abmTipoTramite?action=edit">
							<input type="button" value="Borrar" class="btn -delete-object" 
								data-value="<?php echo $tipo->getIdTipoTramite(); ?>" data-url="./json_abmTipoTramite?action=delete">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$tipo->getIdTipoTramite(), "fields"=>$tipo)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>