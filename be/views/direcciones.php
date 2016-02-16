<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Direcciones</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmDirecciones?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idDireccion" id="idDireccion">
				<p class="clearfix">
					<input type="text" name="nombre" id="nombre">
					<label for="nombre">Nombre:</label>
				</p>
				<p class="clearfix">
					<input type="button" name="submit" value="Guardar" class="btn -action-sender" data-form="#nuevoTipo">
				</p>
			</form>
		</div>
	</div>
	<div id="itemTemplate" class="hidden">
		<ul class="columns clearfix">
			<li class="left col-xs" data-field="idDireccion"></li>
			<li class="left col-xxl" data-field="nombre"></li>
			<li class="left col-m" data-field="diasvalidez"></li>
			<li class="right col-m2">
				<input type="button" value="Editar" class="-edit-object" 
					data-form="#nuevoTipo" data-value="idDireccion"
					data-url="./json_abmDirecciones?action=edit">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-xxl"><span>Nombre</span></li>
				<li class="right col-m2"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				?>
				<li class="abm-item" id="<?php echo $entity->getIdDireccion(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdDireccion(); ?></li>
						<li class="left col-xxl"><?php echo $entity->getNombre(); ?></li>
						<li class="right col-m2">
							<input type="button" value="Editar" class="btn -edit-object" 
								data-form="#nuevoTipo" data-value="<?php echo $entity->getIdDireccion(); ?>"
								data-url="./json_abmDirecciones?action=edit">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdDireccion(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>