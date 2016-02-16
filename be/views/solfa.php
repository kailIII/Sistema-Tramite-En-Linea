<?php
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
?>
<script src="scripts/solfa.js"></script>
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
				<input name="fecnac" id="fecnac" type="date" size="20" style="display:none" />
			 	<input name="dom" id="dom" type="text" size="25" style="display:none"/>
			 	<input name="prov" id="prov" type="text" size="25" style="display:none"/>
			 	<input name="loc" id="loc" type="text" size="25" style="display:none"/>
			 	<input name="codpost" id="codpost" type="text" size="25" style="display:none"/>
			 	<input name="telarea" id="telarea" type="text" size="25" style="display:none"/>
			 	<input name="telnro" id="telnro" type="text" size="25" style="display:none"/>
			 	<input name="osoc" id="osoc" type="text" size="25" style="display:none"/>
			 	<input name="email" id="email" type="text" size="25" style="display:none"/>
			 	<input name="cud" id="cud" type="text" size="25" style="display:none"/>
			 	<input name="ocup" id="ocup" type="text" size="25" style="display:none"/>
			 	<input name="domcaba" id="domcaba" type="text" size="25" style="display:none"/>

			 	<input name="hosp" id="hosp" type="text" size="25" style="display:none"/>
			 	<input name="dirH" id="dirH" type="text" size="25" style="display:none"/>
			 	<input name="provH" id="provH" type="text" size="25" style="display:none"/>
			 	<input name="locH" id="locH" type="text" size="25" style="display:none"/>
			 	<input name="codpostH" id="codpostH" type="text" size="25" style="display:none"/>
			 	<input name="telareaH" id="telareaH" type="text" size="25" style="display:none"/>
			 	<input name="telnroH" id="telnroH" type="text" size="25" style="display:none"/>
			 	<input name="duplicado" id="duplicado" type="text" size="25" style="display:none"/>
			 </div> 


			<h3 class="azul">CHECKLIST</h3>
			<hr />
			<div class="space check">
			Formulario de Declaracion Jurada de Solicitada de Franquicia (FORMULARIO A)
			<input type="checkbox" name="op1" id="op1" rel="requerido" />
			</div>

			<div class="space check odd">
			Certificado Medico Original
			<input type="checkbox" name="op2" id="op2" rel="requerido" />
			</div>

			<div class="space check">
			Fotocopia Certificada Documento del Solicitante
			<input type="checkbox" name="op3" id="op3" rel="requerido" />
			</div>

			<div class="space check odd">
			Fotocopia Certificada Registro de Conducir del Solicitante
			<input type="checkbox" name="op4" id="op4" rel="requerido" />
			</div>

			<div class="space check">
			Fotocopia Certificada Registro de Conducir del Beneficiario
			<input type="checkbox" name="op5" id="op5" rel="requerido" />
			</div>

			<div class="space check odd">
			Original del Certificado de Capacidad Economica de la AFIP
			<input type="checkbox" name="op6" id="op6" />
			</div>

			<div class="space check">
			Factura ProForma
			<input type="checkbox" name="op7" id="op7" />
			</div>

			<div class="space check odd">
			Fotocopia Certificada Testimonio Sentencia Curatela - Curador Definitivo - Proceso de Insania
			<input type="checkbox" name="op8" id="op8" />
			</div>

			<div class="space check">
			Autorizacion Judicial - Proceso de Insania
			<input type="checkbox" name="op9" id="op9" />
			</div>

			<div class="space check odd">
			Certificado Medico Psiquiatria - Proceso de Insania
			<input type="checkbox" name="op10" id="op10" />
			</div>

			<div class="space check odd">
			Poder Administrativo
			<input type="checkbox" name="op10" id="op10" />
			</div>

			<div class="right">
				<input type="submit" name="submit" value="+Tramite" class="btn">
			</div>
		</form>

		<script type="text/javascript">
		    $(document).ready(function (){

		    	$("#nrodoc").change(function() {

		    		if ($("#nrodoc").val() != "")
		    		{
		    			findPersona();
		    		}
		    		

		    	});

		    	function findPersona()
		    	{    		
		    		var parametros = {
		                "tipoDoc" : getRadioVal(),
		                "nro" : $("#nrodoc").val(),
		                "tramite" : 1
		        	};	

		    		$.ajax({
		                data:  parametros,
		                url:   './controller/personatramite.php',
		                type:  'post',
		                success:  function (response) {

		                	if($.parseJSON(response) == 'duplicado')
		                	{
		                		alert("Ya existe una Franquicia Automotor para el documento ingresado.");
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