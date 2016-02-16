<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/abms.js"></script>
<div id="abm-container">
	<h3 class="azul">Usuarios</h3>
	<hr>
	<input type="button" value="+ Nuevo" class="btn -hidden -new-object" data-form="#nuevoTipo" data-url="./json_abmUsuarios?action=new">
	<div id="form-container">
		<div class="inner" id="nuevoTipo" style="display:none">
			<p>A menos que desee cambiar el passwod dejelo vacio</p>
			<form>
				<input type="hidden" name="idUsuario" id="idUsuario">
				<p class="clearfix">
					<input type="text" name="usuario" id="usuario">
					<label for="usuario">Usuario:</label>
				</p>
				<p class="clearfix">
					<input type="password" name="password" id="password">
					<label for="password">Password:</label>
				</p>
				<p class="clearfix">
					<input type="text" name="email" id="email">
					<label for="email">Email:</label>
				</p>
				<p class="clearfix">
					<input type="text" name="telefono" id="telefono">
					<label for="telefono">Telefono:</label>
				</p>
				<p class="clearfix">
					<input type="checkbox" name="activo" id="activo">
					<label for="activo">Activo:</label>
				</p>
				<p class="clearfix">
					<select id="idDireccion" data-url="./json_getDirecciones" class="-autoload"></select>
					<label for="idDireccion">Dirección:</label>
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
			<li class="left col-xs" data-field="idUsuario"></li>
			<li class="left col-m2" data-field="usuario"></li>
			<li class="left col-l" data-field="email"></li>
			<li class="left col-m" data-field="idDireccion"></li>
			<li class="left col-xs" data-field="activo"></li>
			<li class="right col-l2">
				<input type="button" value="Editar" class="btn -edit-object" 
					data-form="#nuevoTipo" data-value="idUsuario"
					data-url="./json_abmUsuarios?action=edit">
				<input type="button" value="" class="btn -action activate-user" 
					data-url="" data-callback="usuarioActivado">
			</li>
		</ul>
	</div>
	<ul class="abm-list">
		<li class="abm-head">
			<ul class="columns clearfix">
				<li class="left col-xs"><span>Id</span></li>
				<li class="left col-m2"><span>Usuario</span></li>
				<li class="left col-l"><span>Email</span></li>
				<li class="left col-m"><span>Dirección</span></li>
				<li class="left col-xs"><span>Activo</span></li>
				<li class="right col-l2"><span>Acciones</span></li>
			</ul>
		</li>
		<?php
			foreach ($viewParams["entities"] as $entity) {
				?>
				<li class="abm-item" id="<?php echo $entity->getIdUsuario(); ?>">
					<ul class="columns clearfix">
						<li class="left col-xs"><?php echo $entity->getIdUsuario(); ?></li>
						<li class="left col-m2"><?php echo $entity->getUsuario(); ?></li>
						<li class="left col-l"><?php echo ($entity->getEmail())?$entity->getEmail():"Sin direccion"; ; ?></li>
						<li class="left col-m"><?php echo ($entity->getIdDireccion())?$entity->getIdDireccion():"Sin direccion"; ?></li>
						<li class="left col-xs"><?php echo ($entity->getActivo())?"si":"no"; ?></li>
						<li class="right col-l2">
							<input type="button" value="Editar" class="btn -edit-object" 
								data-form="#nuevoTipo" data-value="<?php echo $entity->getIdUsuario(); ?>"
								data-url="./json_abmUsuarios?action=edit">
							<?php
								$value = "Activar";
								if($entity->getActivo()) $value = "Desactivar"; 
							?>
							<input type="button" value="<?php echo $value; ?>" class="btn -action activate-user" 
								data-url="./json_abmUsuarios?action=activate&id=<?php echo $entity->getIdUsuario(); ?>"
								data-callback="usuarioActivado">
							<script> 
								<?php //antes de devolver el usuario vacio la password
										$entity->setPassword(null);?>
								entities.push(<?php echo json_encode(array("id"=>$entity->getIdUsuario(), "fields"=>$entity)); ?>);
							</script>
						</li>
					</ul>
				</li>
				<?php
			}
		?>
	</ul>
</div>
<script>
	function usuarioActivado(object){
		var $ul = $(".abm-list .abm-item#"+object.idUsuario+" ul");
		var $li = $($ul.find("li")[4]);
		var $input = $ul.find('input.activate-user').first();
		if(object.activo){ 
			$li.text("si"); 
			$input.val("Desactivar");
		}else { 
			$li.text("no"); 
			$input.val("Activar");
		}
		entities.forEach(function(element){
			if(element.id == object.idUsuario){
				element.fields.activo = object.activo;
			}
		});
	}
	function onLoadingTemplate(template, object){
		if(object.activo){object.activo = "si";}
		else{ object.activo = "no"; }
		//ahora solo hago lo especifico del boton de activacion, del resto se encarga la libreria
		var activatebtn = template.find("input.activate-user").first();
		var url = "./json_abmUsuarios?action=activate&id="+object.idUsuario;
		if(object.activo){ activatebtn.val("Desactivar"); }else{ activatebtn.val("Activar"); }
		activatebtn.attr("data-url",url);
		return template;
	}
</script>