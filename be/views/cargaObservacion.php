<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/cargaobservacion.js"></script>
<div id="carga-observacion">
	<h3 class="azul"><?php echo $viewParams["tarea"]->getNombre(); ?></h3>
	<hr>
		<form>
			<input type="hidden" name="idTramiteInstanciaTarea" id="idTramiteInstanciaTarea" 
				   value="<?php echo $viewParams["tareatramite"]->getIdTramiteInstanciaTarea(); ?>"/>
			<p class="clearfix">
				<label class="tcenter" for="observacion">Cargue la observacion aqui:</label>
			</p>
			<p class="clearfix">
				<textarea id="observacion" style="border: 1px solid #ccc;border-radius: 5px;padding: 5px;resize: none;"<?php
					if($viewParams["observacion"]){
						echo ' data-id="'.$viewParams["observacion"]->getIdObservacion().'">' .$viewParams["observacion"]->getObservacion();
					}else{
						echo '>';
					}
				?></textarea>
			</p>
			<p class="clearfix">
				<input type="button" name="submit" id="enviar" value="Guardar" class="right btn">
				<input type="button" id="cancelar" value="Cancelar" class="right btn" style="margin-right:10px;">
			</p>
		</form>

		<script type="text/javascript">
    		$(document).ready(function (){
    			$("#cancelar").click(function (){
    				window.close();
    			});
    		});
    	</script>
</div>