<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/solfainst.js"></script>
<div id="formularios">

	<div id="contentform">

		<h3 class="azul">DATOS DE LA INSTITUCI&Oacute;N</h3>
		<hr />
		<form method="post" action="">
			<div class="space">Denominacion Social: &nbsp;&nbsp;<input name="densoc" id="densoc" type="text" size="60" /></div>
			<div class="space">CUIT: <input type="text" name="cuit" id="cuit" size="30" /></div>
			<div class="space">
			 	<input name="duplicado" id="duplicado" type="text" size="25" style="display:none"/>
			</div> 

			<h3 class="azul">CHECKLIST</h3>
			<hr />
			<div class="space check">
				Estatuto/Acta/Contrato Cosntitutivo
				<input type="checkbox" name="op1" id="op1" />
			</div>

			<div class="space check odd">
				Título de Propiedad del Automotor
				<input type="checkbox" name="op2" id="op2" />
			</div>

			<div class="space check">
				Acta de Distribución de Cargos/DNI de la Autoridad
				<input type="checkbox" name="op1" id="op1" />
			</div>

			<div class="space check odd">
				Incripción IGJ
				<input type="checkbox" name="op2" id="op2" />
			</div>


			<div class="space check">
				Símbolos y Certificado de Uso Original (Si Fue Adquirido con Anterioridad)
				<input type="checkbox" name="op1" id="op1" />
			</div>

			<div class="right">
				<input type="submit" name="submit" value="+Tramite" class="btn">
			</div>
		</form>

		<script type="text/javascript">
		    $(document).ready(function (){

		    	$("#cuit").change(function() {

		    		if ($("#cuit").val() != "")
		    			findInstitucion();
		    		
		    	});

		    	function findInstitucion()
		    	{    		
		    		var parametros = {
		                "cuit" : $("#cuit").val(),
		        	};	

		    		$.ajax({
		                data:  parametros,
		                url:   './controller/instituciontramite.php',
		                type:  'post',
		                success:  function (response) {

		                	if($.parseJSON(response) == 'duplicado')
		                	{
		                		alert("Ya existe una Franquicia Automotor para el cuit ingresado.");
		                		$("#duplicado").val("duplicado");
		                		return;
		                	}
		                	else
		                		$("#duplicado").val("");
		                }
		        	});
		    	}
			});

		</script>

	</div>
</div>