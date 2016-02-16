<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
//use Stel\Model\Persona;
//use Stel\Repository\PersonaRepository;
//use Stel\Repository\DireccionRepository;

$link = mysqli_connect("localhost","root","root","stel");

if(isset($_POST["enviado"])){
echo "<div class='error'>ERROR AL GUARDAR TRAMITE</div>";
	/* $sqlP ="update persona set nombre='".$_POST['frannombre']."', apellido='".$_POST['franapellido']."', email='".$_POST['franemail']."', idTipoDocumento='".$_POST['frantipodoc']."', nroDoc='".$_POST['frannumdoc']."', cud='".$_POST['francud']."', calle='".$_POST['frandomreal']."',
	idLocalidad='".$_POST['franloc']."', idProvincia='".$_POST['franprov']."', telefono='".$_POST['frantel']."', domicilioCaba='".$_POST['frandomcaba']."', ocupacion='".$_POST['franocu']."', obraSocial='".$_POST['franobra']."', hospital='".$_POST['franhosp']."', domicilioHospital='".$_POST['franhospdir']."',
	idLocalidadHospital='".$_POST['franhosploc']."', idProvinciaHospital='".$_POST['franhospprov']."', telefonoHospital='".$_POST['franhosptel']."', codPosHospital='".$_POST['franhospcodpost']."' where idPersona = (select idPersona from tramite where idTramite = ".$_GET['idTramite'].")";
	
	mysqli_query($link, $sqlP);
	
	$sqlParPer = "select * from familiar where idPersona = (select idPersona from tramite where idTramite = ".$_GET['idTramite'].")";
	
	$updPar = mysqli_query($link, $sqlParPer);
	if(mysqli_num_rows($updPar)){

		if(isset($_POST['paconv1'])){$conv1=1;} else{$conv1=0;}
		if(isset($_POST['paautor1'])){$aut1=1;}else{$aut1=0;}
		
		if(isset($_POST['paconv2'])){$conv2=1;} else{$conv2=0;}
		if(isset($_POST['paautor2'])){$aut2=1;}else{$aut2=0;}
		
		if(isset($_POST['paconv3'])){$conv3=1;} else{$conv3=0;}
		if(isset($_POST['paautor3'])){$aut3=1;}else{$aut3=0;}
		$cont=0;
		foreach($updPar as $updPar){
			$cont++;
			if($cont==1){
			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre1']."', apellido='".$_POST['paapellido1']."', idTipoDocumento='".$_POST['padocumento1']."', nroDoc= '".$_POST['panumero1']."', idParentesco='".$_POST['paparentesco1']."', convive='".$conv1."', autorizado='".$aut1."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
			mysqli_query($link, $upParTotal);
			}
			if($cont==2){
			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre2']."', apellido='".$_POST['paapellido2']."', idTipoDocumento='".$_POST['padocumento2']."', nroDoc= '".$_POST['panumero2']."', idParentesco='".$_POST['paparentesco2']."', convive='".$conv2."', autorizado='".$aut2."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
			mysqli_query($link, $upParTotal);
			}
			if($cont==3){
			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre3']."', apellido='".$_POST['paapellido3']."', idTipoDocumento='".$_POST['padocumento3']."', nroDoc= '".$_POST['panumero3']."', idParentesco='".$_POST['paparentesco3']."', convive='".$conv3."', autorizado='".$aut3."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
			mysqli_query($link, $upParTotal);
			}
		}
		
		
	}else{
		
		if(isset($_POST['paconv1'])){$conv1=1;} else{$conv1=0;}
		if(isset($_POST['paautor1'])){$aut1=1;}else{$aut1=0;}
		
		if(isset($_POST['paconv2'])){$conv2=1;} else{$conv2=0;}
		if(isset($_POST['paautor2'])){$aut2=1;}else{$aut2=0;}
		
		if(isset($_POST['paconv3'])){$conv3=1;} else{$conv3=0;}
		if(isset($_POST['paautor3'])){$aut3=1;}else{$aut3=0;}
			
		//if(isset($_POST['paapellido1'])){
		$sqlInPa1="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre1']."', '".$_POST['paapellido1']."', '".$_POST['padocumento1']."', '".$_POST['panumero1']."', '".$_POST['paparentesco1']."', '".$conv1."', '".$aut1."')"; 
		mysqli_query($link, $sqlInPa1);
		//}
		//if(isset($_POST['paapellido2'])){
		$sqlInPa2="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre2']."', '".$_POST['paapellido2']."', '".$_POST['padocumento2']."', '".$_POST['panumero2']."', '".$_POST['paparentesco2']."', '".$conv2."', '".$aut2."')"; 
		mysqli_query($link, $sqlInPa2);
		//}
		//if(isset($_POST['paapellido3'])){
		$sqlInPa3="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre3']."', '".$_POST['paapellido3']."', '".$_POST['padocumento3']."', '".$_POST['panumero3']."', '".$_POST['paparentesco3']."', '".$conv3."', '".$aut3."')"; 
		mysqli_query($link, $sqlInPa3);
		//}
	}
	
	$sqlVehPer = "select * from vehiculo where idVehiculo = (select idVehiculo from tramite where idTramite = ".$_GET['idTramite'].")";
	
	$updVeh = mysqli_query($link, $sqlVehPer);
	if(mysqli_num_rows($updVeh)){
		$upVehTotal = "UPDATE `vehiculo` SET marca='".$_POST['dvmarca']."', modelo='".$_POST['dvmodelo']."', dominio='".$_POST['dvdominio']."', año= '".$_POST['anio']."', clase='".$_POST['clase']."'where idVehiculo = (select idVehiculo from tramite where idTramite = ".$_GET['idTramite'].")";
		mysqli_query($link, $upVehTotal);
	}else{
		$upVehTotal="INSERT INTO `vehiculo` (marca, modelo, dominio, año, clase, numeroMotor, registro, procedencia) VALUES (
		'".$_POST['dvmarca']."', '".$_POST['dvmodelo']."', '".$_POST['dvdominio']."', '".$_POST['anio']."', '".$_POST['clase']."', '".$_POST['dvmotor']."', '".$_POST['dvregistro']."', '".$_POST['dvprocedencia']."')"; 
		mysqli_query($link, $upVehTotal);
		
		$contVehId=mysqli_insert_id($link);

		$upPerVeh="update tramite set idVehiculo='".$contVehId."' where idTramite = ".$_GET['idTramite']."";
		
		mysqli_query($link, $upPerVeh);
		
	}
	
	
	
	$mensaje = "Tramite Actualizado";

	 */
}



?>
<script src="scripts/solfainstcompleta.js"></script>
<div id="formularios">
<form name="solfainstcompleta" id="solfainstcompleta" method="post" action="" >
<div id="contentform">

<div id="tabs">
<ul  class="clearfix">
      <li class="left">
        <a href="javascript:activateTab('page1')">Datos de la Institución</a>
      </li>
	  <li class="left">
        <a href="javascript:activateTab('page2')">Datos del Representante Legal</a>
      </li>
	  <li class="left">
        <a href="javascript:activateTab('page3')">Antecedentes</a>
      </li>
	  <li class="left">
        <a href="javascript:activateTab('page4')">Datos del Vehículo</a>
      </li>
</ul>
</div>

<div id="tabCtrl">


<div id="page1"> <!-- 1 -->
<h3 class="azul">Datos de la institución solicitante</h3>
<hr />
<div class="space">Denominación Social: <input type="text" size="60" /></div>
<div class="space">CUIT: <input type="text" size="25" /> | Personería Jurídica: <input type="text" size="26" /></div>
<div class="space">Domicilio Legal: <input type="text" size="38" /> | Localidad<select>
		<option value=""></option>
		<option value="">Localidad 1</option>
		<option value="">Localidad 2</option>
		<option value="">Localidad 3</option>
		</select></div>
<div class="space">Provincia: <select>
		<option value=""></option>
		<option value="">Buenos Aires</option>
		<option value="">Cordoba</option>
		<option value="">Santa Fe</option>
		</select>
         | Cod. Postal: <input type="text" size="9" /></div>
<div class="space">Email: <input type="text" size="38" /> | Teléfono: <input type="text" /></div>    

<div class="space">Tipo de Institución: <input type="text" size="70" /></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfainstcompleta').submit();">+ Guardar Tramite</a>
</div>
</div>
<!-- 1 fin -->



<div id="page2"> <!-- 2 -->
<h3 class="azul">Datos del Representante Legal de la Institución</h3>
<hr />
<div class="space">Apellido: &nbsp;&nbsp;<input type="text" size="25" /> | Nombre: <input type="text" size="26" /></div>
<div class="space">DNI <input type="radio" name="doc" /> LE <input type="radio" name="doc" /> LC <input type="radio" name="doc" /> | Nº: <input type="text" /> | Teléfono: <input type="text" /></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfainstcompleta').submit();">+ Guardar Tramite</a>
</div>
</div>
<!-- 2 fin -->


<div id="page3"> <!-- 3 -->
<h3 class="azul">Antecedentes</h3>
<hr />
<div class="space">
¿Adquirió el vehiculo con el régimen de franquicia impositiva previsto en
la Ley Nº 19279?
</div>
<div class="space">SI <input type="checkbox" /> | NO<input type="checkbox" /></div>
<div class="space">
¿Solicitó con anterioridad el Símbolo Internacional de Acceso para Personas
con Discapacidad?
</div>
<div class="space">SI <input type="checkbox" /> | NO<input type="checkbox" /></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfainstcompleta').submit();">+ Guardar Tramite</a>
</div>
</div>
<!-- 3 fin -->

<div id="page4"> <!-- 4 -->
<h3 class="azul">Datos del Vehículo</h3>
<hr />
<div class="space">Marca y Modelo: <input type="text" size="35" /></div>
<div class="space">Año: <input type="text" size="9" /> | Fecha de Inscripción Inicial: <input class="center" type="text" size="4" />/<input class="center" type="text" size="4" />/<input class="center" type="text" size="4" /></div>
<div class="space">Patente Nº: <input type="text" /> | Registro Propiedad Automotor: <input type="text" /></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfainstcompleta').submit();">+ Guardar Tramite</a>
</div>
</div>
<!-- 4 fin -->

</div>













<input type="hidden" name="enviado" id="enviado" value="enviado" />



</div>
</form>
</div>
