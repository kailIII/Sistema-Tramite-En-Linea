<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Instancias por Tipo de Tramite</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmTipoTramiteInstancia?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<form>
				<input type="hidden" name="idRelTipoTramiteInstancia" id="idDireccion">
				<p>
					<select id="idTipoTramite" data-url="./json_getTiposTramite" class="-autoload"></select>
					<label for="idTipoTramite">Tipo de Tramite:</label>
				</p>
				<p>
					<select id="idInstancia" data-url="./json_getInstancias?forSelect=true" class="-autoload"></select>
					<label for="idInstancia">Instancia:</label>
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
			<li class="left col-xs" data-field="idRelTipoTramiteInstancia"></li>
			<li class="left col-l2 -entity" data-url="./json_getTiposTramite" data-field="idTipoTramite"></li>
			<li class="left col-l2 -entity" data-url="./json_getInstancias?forSelect=true" data-field="idInstancia"></li>
			<li class="left col-m" data-field="orden"></li>
			<li class="right col-m2">
				<input type="button" value="Borrar" class="btn -delete-object" 
					data-value="idRelTipoTramiteInstancia"
					data-url="./json_abmTipoTramiteInstancia?action=delete">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-l2"><span>Tipo Tramite</span></li>
				<li class="left col-l2"><span>Instancia</span></li>
				<li class="left col-m"><span>Orden</span></li>
				<li class="right col-m2"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				//echo $entity->getRelIdTipoTramiteInstancia();
				?>
				<li class="abm-item" id="<?php echo $entity->getIdRelTipoTramiteInstancia(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdRelTipoTramiteInstancia(); ?></li>
						<li class="left col-l2 -entity" data-url="./json_getTiposTramite"><?php echo $entity->getIdTipoTramite(); ?></li>
						<li class="left col-l2 -entity" data-url="./json_getInstancias?forSelect=true"><?php echo $entity->getIdInstancia(); ?></li>
						<li class="left col-m"><?php echo $entity->getOrden(); ?></li>
						<li class="right col-m2">
							<input type="button" value="Borrar" class="btn -delete-object" 
								data-value="<?php echo $entity->getIdRelTipoTramiteInstancia(); ?>"
								data-url="./json_abmTipoTramiteInstancia?action=delete">
							<script> 
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdRelTipoTramiteInstancia(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>