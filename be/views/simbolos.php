<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/simbolos.js"></script>
<div id="formularios">

	<div id="contentform">

		<h3 class="azul">DECLARACI&Oacute;N JURADA DEL SOLICITANTE</h3>
		<hr />
		<form method="post" action="">
			<div class="space">DNI <input type="radio" id="doc1" name="doc" value="1" checked=checked /> LE 
				<input type="radio" id="doc2" name="doc" value="2" /> LC <input type="radio" id="doc3" name="doc" value="3" style="margin-right:40px;"/> 
				Nro: <input name="nrodoc" id="nrodoc" type="text" /></div>
			<div class="space">Apellido: &nbsp;&nbsp;<input name="apellido" id="apellido" type="text" size="25" style="margin-right:40px;"/>
			 Nombres: <input name="nombre" id="nombre" type="text" size="26" /></div>
			<div class="space">
			 	<input name="duplicado" id="duplicado" type="text" size="25" style="display:none"/>
			</div> 

			<div class="right">
				<input type="submit" name="submit" value="+Tramite" class="btn">
			</div>
		</form>

		<script type="text/javascript">
		    $(document).ready(function (){

		    	$("#nrodoc").change(function() {

		    		if ($("#nrodoc").val() != "")
		    			findPersona();
		    		
		    	});

		    	function findPersona()
		    	{    		
		    		var parametros = {
		                "tipoDoc" : getRadioVal(),
		                "nro" : $("#nrodoc").val(),
		                "tramite" : 5
		        	};	

		    		$.ajax({
		                data:  parametros,
		                url:   './controller/personatramite.php',
		                type:  'post',
		                success:  function (response) {

		                	if($.parseJSON(response) == 'duplicado')
		                	{
		                		alert("Ya existen Simbolos para el documento ingresado.");
		                		$("#duplicado").val("duplicado");
		                		return;
		                	}
		                	else
		                		$("#duplicado").val("");

	                	 	if(response != "false") 
	        				{
		                		var data_array = $.parseJSON(response);
		                		$("#nombre").val(data_array["nombre"]);
		                        $("#apellido").val(data_array["apellido"]);
								$("#fecnac").val(data_array["fechaNacimiento"]);
							 	$("#dom").val(data_array["calle"]);
							 	$("#prov").val(data_array["idProvincia"]);
							 	$("#loc").val(data_array["idLocalidad"]);
							 	$("#codpost").val(data_array["codPos"]);
							 	$("#telarea").val(data_array["telcodarea"]);
							 	$("#telnro").val(data_array["telefono"]);
							 	$("#osoc").val(data_array["obraSocial"]);
							 	$("#email").val(data_array["email"]);
							 	$("#cud").val(data_array["cud"]);
							 	$("#ocup").val(data_array["ocupacion"]);
							 	$("#domcaba").val(data_array["domicilioCaba"]);

							 	$("#hosp").val(data_array["hospital"]);
							 	$("#dirH").val(data_array["domicilioHospital"]);
							 	$("#provH").val(data_array["idProvinciaHospital"]);
							 	$("#locH").val(data_array["idLocalidadHospital"]);
							 	$("#codpostH").val(data_array["codPosHospital"]);
							 	$("#telareaH").val(data_array["telcodareahosp"]);
							 	$("#telnroH").val(data_array["telefonoHospital"]);
		                    }
		                }
		        	});
		    	}
			});

			function getRadioVal() {
			    var val;

			    var radios = $( "input[id^='doc']");
			    
			    for (var i=0, len=radios.length; i<len; i++) {
			        if ( radios[i].checked ) { 
			            val = radios[i].value; 
			            break; 
			        }
			    }
			    return val;
			}

		</script>

	</div>
</div>