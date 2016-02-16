<?php 
	echo Stel\BackEnd\FrontController::embebController("menu.php"); 
//use Stel\Model\Persona;
//use Stel\Repository\PersonaRepository;
//use Stel\Repository\DireccionRepository;

$link = mysqli_connect("localhost","root","root","stel");

header('Content-Type: text/html; charset=ISO-8859-1');

if(isset($_POST["enviado"])){

	$sqlP =	"update persona set nombre='" . $_POST['frannombre'] . 
			"', apellido='" . $_POST['franapellido'] . 
			"', email='" . $_POST['franemail'] . 
			"', idTipoDocumento='".$_POST['frantipodoc'].
			"', nroDoc='".$_POST['frannumdoc'].
			"', cud='".$_POST['francud'].
			"', calle='".$_POST['frandomreal'];

	if(isset($_POST['franloc'])) 
		$sqlP = $sqlP . "', idLocalidad='".$_POST['franloc'];

	if(isset($_POST['franprov']))
		$sqlP = $sqlP . "', idProvincia='".$_POST['franprov'];

	$sqlP = $sqlP . "', codPos='".$_POST['francodpost'].
			"', telefono='".$_POST['frantel'].
			"', telcodarea='".$_POST['frantelcodarea'].
			"', domicilioCaba='".$_POST['frandomcaba'].
			"', ocupacion='".$_POST['franocu'].
			"', obraSocial='".$_POST['franobra'].
			"', hospital='".$_POST['franhosp'].
			"', fechaNacimiento='".$_POST['franfecha'].
			"', domicilioHospital='".$_POST['franhospdir'];

	if(isset($_POST['franhosploc']))
		$sqlP = $sqlP . "', idLocalidadHospital='".$_POST['franhosploc'];

	if(isset($_POST['franhospprov']))
		$sqlP = $sqlP . "', idProvinciaHospital='".$_POST['franhospprov'];

	$sqlP = $sqlP . "', telefonoHospital='".$_POST['franhosptel'].
			"', telcodareahosp='".$_POST['frantelcodareahosp'].
			"', codPosHospital='".$_POST['franhospcodpost'].
			"' where idPersona = (select idPersona from tramite where idTramite = ".$_GET['idTramite'].")";

	$upTra="update tramite set expediente='".$_POST['franexpediente']."' where idTramite = ".$_GET['idTramite']."";	
	mysqli_query($link, $upTra);
	
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

			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre1']."', apellido='".$_POST['paapellido1']."', idTipoDocumento='".$_POST['padocumento1']."', nroDoc= '".$_POST['panumero1']."', idParentesco='".$_POST['paparentesco1']."', vencimiento='".$_POST['pavenc1']."', convive='".$conv1."', autorizado='".$aut1."', foja='".$_POST['pafoja1']."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
			mysqli_query($link, $upParTotal);
			}
			if($cont==2){
			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre2']."', apellido='".$_POST['paapellido2']."', idTipoDocumento='".$_POST['padocumento2']."', nroDoc= '".$_POST['panumero2']."', idParentesco='".$_POST['paparentesco2']."', vencimiento='".$_POST['pavenc2']."', convive='".$conv2."', autorizado='".$aut2."', foja='".$_POST['pafoja2']."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
			mysqli_query($link, $upParTotal);
			}
			if($cont==3){
			$upParTotal = "UPDATE `familiar` SET nombre='".$_POST['panombre3']."', apellido='".$_POST['paapellido3']."', idTipoDocumento='".$_POST['padocumento3']."', nroDoc= '".$_POST['panumero3']."', idParentesco='".$_POST['paparentesco3']."', vencimiento='".$_POST['pavenc3']."', convive='".$conv3."', autorizado='".$aut3."', foja='".$_POST['pafoja3']."' WHERE idFamiliar='".$updPar['idFamiliar']."'";
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
		$sqlInPa1="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado, vencimiento, foja) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre1']."', '".$_POST['paapellido1']."', '".$_POST['padocumento1']."', '".$_POST['panumero1']."', '".$_POST['paparentesco1']."', '".$conv1."', '".$aut1."', '".$_POST['pavenc1']."', '".$_POST['pafoja1']."')"; 
		mysqli_query($link, $sqlInPa1);
		//}
		//if(isset($_POST['paapellido2'])){
		$sqlInPa2="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado, vencimiento, foja) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre2']."', '".$_POST['paapellido2']."', '".$_POST['padocumento2']."', '".$_POST['panumero2']."', '".$_POST['paparentesco2']."', '".$conv2."', '".$aut2."', '".$_POST['pavenc2']."', '".$_POST['pafoja3']."')"; 
		mysqli_query($link, $sqlInPa2);
		//}
		//if(isset($_POST['paapellido3'])){
		$sqlInPa3="INSERT INTO `familiar` (idPersona, nombre, apellido, idTipoDocumento, nroDoc, idParentesco, convive, autorizado, vencimiento, foja) VALUES 
		((select idPersona from tramite where idTramite = ".$_GET['idTramite']."), '".$_POST['panombre3']."', '".$_POST['paapellido3']."', '".$_POST['padocumento3']."', '".$_POST['panumero3']."', '".$_POST['paparentesco3']."', '".$conv3."', '".$aut3."', '".$_POST['pavenc3']."', '".$_POST['pafoja3']."')"; 
		mysqli_query($link, $sqlInPa3);
		//}
	}
	
	$sqlVehPer = "select * from vehiculo where idVehiculo = (select idVehiculo from tramite where idTramite = ".$_GET['idTramite'].")";
	
	$upVeh = mysqli_query($link, $sqlVehPer);

	if(mysqli_num_rows($upVeh) > 0){

		$upVehSQL = "UPDATE `vehiculo` SET marca='".$_POST['dvmarca']."', modelo='".$_POST['dvmodelo'].
					"', dominio='".$_POST['dvdominio']."', anio= '".$_POST['anio'].
					"', registro= '".$_POST['dvregistro']."', version= '".$_POST['dvversion'].
					"', fechaPatente= '".$_POST['dvfechapat']."', ffpr= '".$_POST['dvffpr'].
					"', fob= '".$_POST['dvfob']."', dfob= ".$_POST['dvdfob'].", fs= ".$_POST['dvfs'].
					", nvin= '".$_POST['dvnvin']."', fadq= '".$_POST['dvfadq']."'";

		if(isset($_POST['dvimportado']))
			$upVehSQL .= ", importado= 1";
		else
			$upVehSQL .= ", importado= 0";

		$upVehSQL .= " where idVehiculo = (select idVehiculo from tramite where idTramite = ".$_GET['idTramite'].")";

		mysqli_query($link, $upVehSQL);

	}else{

		$insVehSQL="INSERT INTO `vehiculo` (marca, modelo, dominio, anio, registro, version, fs, fechaPatente, 
											fob, dfob, ffpr, nvin, fadq, importado) VALUES (
					'".$_POST['dvmarca']."', '".$_POST['dvmodelo']."', '".$_POST['dvdominio']."', '".
					$_POST['anio']."', '".$_POST['dvregistro']."', '".$_POST['dvversion']."', ".
					$_POST['dvfs'].", '".$_POST['dvfechapat']."', '".$_POST['dvfob']."', ".
					$_POST['dvdfob'].", '".$_POST['dvffpr']."', '".$_POST['dvnvin']."', '".$_POST['dvfadq']."'"; 

		if(isset($_POST['dvimportado']))
			$insVehSQL .= ", importado= 1)";
		else
			$insVehSQL .= ", importado= 0)";
	
		mysqli_query($link, $insVehSQL);
		
		$vehId=mysqli_insert_id($link);

		$upTraVeh="update tramite set idVehiculo='".$vehId."' where idTramite = ".$_GET['idTramite']."";
		
		mysqli_query($link, $upTraVeh);
		
	}
	
	$mensaje = "Tramite Actualizado";

}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
<script src="scripts/solfacompleta.js"></script>
<div id="formularios">
<form name="solfacompleta" id="solfacompleta" method="post" action="" >
<div id="contentform">

<div id="tabs">
<ul  class="clearfix">
      <li class="left">
        <a href="javascript:activateTab('page1')">Franquicia Automotor</a>
      </li>
	  <li class="left">
        <a href="javascript:activateTab('page2')">Autorizados a Conducir</a>
      </li>
	  <li class="left">
        <a href="javascript:activateTab('page3')">Datos Vehiculo</a>
      </li>
</ul>
</div>

<div id="tabCtrl">

<?php 
if(isset($mensaje)){ echo "<h5 style='color:green'>".$mensaje."</h5>";}	
	$sqlPersona ="select * from persona where idPersona = (select idPersona from tramite where idTramite = ".$_GET['idTramite'].")";
	
	$sqlPersona = mysqli_query($link, $sqlPersona);

	$sqlTramite ="select * from tramite where idTramite = ".$_GET['idTramite'];
	$sqlTramite = mysqli_query($link, $sqlTramite);
	$sqlTramite = mysqli_fetch_assoc($sqlTramite);

	foreach($sqlPersona as $sqlPersona){
	
	$sqlLocalidadPersona ="select * from localidad";
	$sqlLocalidadPersona = mysqli_query($link, $sqlLocalidadPersona);
	
	$sqlProvinciaPersona ="select * from provincia";
	$sqlProvinciaPersona = mysqli_query($link, $sqlProvinciaPersona);
	
	$sqlLocalidadPersonaH ="select * from localidad";
	$sqlLocalidadPersonaH = mysqli_query($link, $sqlLocalidadPersonaH);
	
	$sqlProvinciaPersonaH ="select * from provincia";
	$sqlProvinciaPersonaH = mysqli_query($link, $sqlProvinciaPersonaH);

	$sqlTipoDocumentoPersona ="select * from tipodocumento";
	$sqlTipoDocumentoPersona = mysqli_query($link, $sqlTipoDocumentoPersona);
		
?>

<div id="page1"> <!-- 1 -->
<h3 class="azul" style="margin-top:10px;">FRANQUICIA AUTOMOTOR</h3>
<hr />
<div class="space">Nro. Expediente: &nbsp;&nbsp;<input name="franexpediente" id="franexpediente" type="text" size="28" value="<?php if(isset($sqlTramite['expediente'])){echo $sqlTramite['expediente'];} ?>" /> </div>
<div class="space">Apellido: &nbsp;&nbsp;<input name="franapellido" id="franapellido" type="text" size="28" value="<?php if(isset($sqlPersona['apellido'])){echo $sqlPersona['apellido'];} ?>" /> | Nombres: <input name="frannombre" id="frannombre" type="text" size="26" value="<?php if(isset($sqlPersona['nombre'])){echo $sqlPersona['nombre'];} ?>" /></div>

<div class="space">
	<select name="frantipodoc" id="frantipodoc">
		<?php 
					foreach($sqlTipoDocumentoPersona as $sqlTipoDocumentoPersona){
		?>
					<option value="<?php echo $sqlTipoDocumentoPersona["idTipoDocumento"]; ?>" <?php if($sqlPersona["idTipoDocumento"] == $sqlTipoDocumentoPersona["idTipoDocumento"]){echo " selected='selected' ";}?>>
					<?php echo $sqlTipoDocumentoPersona["nombre"];?>
					</option>
		<?php } ?>
		</select>

 | Nro: <input name="frannumdoc" id="frannumdoc" style="margin-left: 5px;" size="26" value="<?php if(isset($sqlPersona['nroDoc'])){echo $sqlPersona['nroDoc'];} ?>" type="text" /> | Fecha de Nacimiento : <input name="franfecha" id="franfecha" style="border: 0px;line-height: 20px" class="center" type="date" value="<?php if(isset($sqlPersona['fechaNacimiento'])){echo $sqlPersona['fechaNacimiento'];} ?>"/></div>

<div class="space">Domicilio Real: <input name="frandomreal" id="frandomreal" type="text" size="24" style="margin-left: 3px;" value="<?php if(isset($sqlPersona['calle'])){echo $sqlPersona['calle'];} ?>" /> | 

Provincia: <select name="franprov" id="franprov" style="width:230px;">
					<option value="" disabled="disabled" selected="selected">Seleccione una Provincia
					</option>

		<?php 
					foreach($sqlProvinciaPersona as $sqlProvinciaPersona){
		?>
					<option value="<?php echo $sqlProvinciaPersona["idProvincia"]; ?>" <?php if($sqlPersona["idProvincia"] == $sqlProvinciaPersona["idProvincia"]){echo " selected='selected' ";}?>>
					<?php echo $sqlProvinciaPersona["nombre"];?>
					</option>
		<?php } ?>
		</select>
</div>

<div class="space">
Localidad: <select name="franlocOriginal" id="franlocOriginal" style="display:none">
		<?php 
					foreach($sqlLocalidadPersona as $sqlLocalidadPersonaOriginal){
		?>
					<option name="<?php echo $sqlLocalidadPersonaOriginal["idProvincia"]; ?>" value="<?php echo $sqlLocalidadPersonaOriginal["idLocalidad"]; ?>" <?php if($sqlPersona["idLocalidad"] == $sqlLocalidadPersonaOriginal["idLocalidad"]){echo " selected='selected' ";}?>>
					<?php echo $sqlLocalidadPersonaOriginal["nombre"];?>
					</option>
		<?php } ?>
		</select>

		<select name="franloc" id="franloc" style="width:246px;">
		<?php 
					foreach($sqlLocalidadPersona as $sqlLocalidadPersona){
		?>
					<option value="<?php echo $sqlLocalidadPersona["idLocalidad"]; ?>" <?php if($sqlPersona["idLocalidad"] == $sqlLocalidadPersona["idLocalidad"]){echo " selected='selected' ";}?>>
					<?php echo $sqlLocalidadPersona["nombre"];?>
					</option>
		<?php } ?>
		</select>
 | Cod.Postal: <input name="francodpost" id="francodpost" type="text" size="10" value="<?php if(isset($sqlPersona['codPos'])){echo $sqlPersona['codPos'];} ?>" /></div>
<div class="space"> Tel&eacute;fono Cod. &Aacute;rea: <input name="frantelcodarea" id="frantelcodarea" type="text" size="5" value="<?php if(isset($sqlPersona['telcodarea'])){echo $sqlPersona['telcodarea'];} ?>" /> | Tel&eacute;fono Nro. <input name="frantel" id="frantel" type="text" size="26" value="<?php if(isset($sqlPersona['telefono'])){echo $sqlPersona['telefono'];} ?>" /></div> 
<div class="space">
Obra Social: <input name="franobra" id="franobra" type="text" size="50" value="<?php if(isset($sqlPersona['obraSocial'])){echo $sqlPersona['obraSocial'];} ?>" /></div>
<div class="space">
Email: <input name="franemail" id="franemail" type="text" size="40" value="<?php if(isset($sqlPersona['email'])){echo $sqlPersona['email'];} ?>" /> | CUD: <input name="francud" id="francud" type="text" size="20" value="<?php if(isset($sqlPersona['cud'])){echo $sqlPersona['cud'];} ?>" /></div>
<div class="space">Ocupaci&oacute;n: <input name="franocu" id="franocu" type="text" size="50" value="<?php if(isset($sqlPersona['ocupacion'])){echo $sqlPersona['ocupacion'];} ?>" /></div>
<div class="space">Domicilio Constituido en la Ciudad Aut&oacute;noma de Buenos Aires: <input name="frandomcaba" id="frandomcaba" type="text" size="80" value="<?php if(isset($sqlPersona['domicilioCaba'])){echo $sqlPersona['domicilioCaba'];} ?>" /></div>
<h3 class="azul">HOSPITAL</h3>
<hr />

<div class="space">
Hospital: <input name="franhosp" id="franhosp" type="text" size="60" value="<?php if(isset($sqlPersona['hospital'])){echo $sqlPersona['hospital'];} ?>" /></div>
<div class="space">
Direccion: <input name="franhospdir" id="franhospdir" type="text" size="60" value="<?php if(isset($sqlPersona['domicilioHospital'])){echo $sqlPersona['domicilioHospital'];} ?>" /> </div>

<div class="space">

Provincia: <select name="franhospprov" id="franhospprov">
					<option value="" disabled="disabled" selected="selected">Seleccione una Provincia
					</option>

		<?php 
					foreach($sqlProvinciaPersonaH as $sqlProvinciaPersonaH){
		?>
					<option value="<?php echo $sqlProvinciaPersonaH["idProvincia"]; ?>" <?php if($sqlPersona["idProvinciaHospital"] == $sqlProvinciaPersonaH["idProvincia"]){echo " selected='selected' ";}?>>
					<?php echo $sqlProvinciaPersonaH["nombre"];?>
					</option>
		<?php } ?>
		</select> | Localidad: <select name="franhosplocOriginal" id="franhosplocOriginal" style="display:none">
		<?php 
					foreach($sqlLocalidadPersonaH as $sqlLocalidadPersonaHOriginal){
		?>
					<option name="<?php echo $sqlLocalidadPersonaHOriginal["idProvincia"]; ?>" value="<?php echo $sqlLocalidadPersonaHOriginal["idLocalidad"]; ?>" <?php if($sqlPersona["idLocalidadHospital"] == $sqlLocalidadPersonaHOriginal["idLocalidad"]){echo " selected='selected' ";}?>>
					<?php echo $sqlLocalidadPersonaHOriginal["nombre"];?>
					</option>
		<?php } ?>
		</select>

		<select name="franhosploc" id="franhosploc">
		<?php 
					foreach($sqlLocalidadPersonaH as $sqlLocalidadPersonaH){
		?>
					<option value="<?php echo $sqlLocalidadPersonaH["idLocalidad"]; ?>" <?php if($sqlPersona["idLocalidadHospital"] == $sqlLocalidadPersonaH["idLocalidad"]){echo " selected='selected' ";}?>>
					<?php echo $sqlLocalidadPersonaH["nombre"];?>
					</option>
		<?php } ?>
		</select>
</div>
<div>
Cod.Postal: <input name="franhospcodpost" id="franhospcodpost" type="text" size="20" value="<?php if(isset($sqlPersona['codPosHospital'])){echo $sqlPersona['codPosHospital'];} ?>" /></div>
<div class="space">
Tel&eacute;fono  Cod. &Aacute;rea: <input name="frantelcodareahosp" id="frantelcodareahosp" type="text" size="5" value="<?php if(isset($sqlPersona['telcodareahosp'])){echo $sqlPersona['telcodareahosp'];} ?>" /> | Tel&eacute;fono Nro. <input name="franhosptel" id="franhosptel" type="text" size="25" value="<?php if(isset($sqlPersona['telefonoHospital'])){echo $sqlPersona['telefonoHospital'];} ?>" /></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfacompleta').submit();">+ Guardar Tramite</a>
</div>
</div>
<!-- 1 fin -->

<?php }; ?>

<?php 
	
	$sqlFamiliar ="select * from familiar where idPersona = (select idPersona from tramite where idTramite = ".$_GET['idTramite'].")";
	
	$sqlFamiliar = mysqli_query($link, $sqlFamiliar);

	$familiar=array();
	
	foreach($sqlFamiliar as $sqlFamiliar){
	
	
	array_push($familiar, $sqlFamiliar);
	
	$sqlTipoDocumentoPersona ="select * from tipodocumento";
	$sqlTipoDocumentoPersona = mysqli_query($link, $sqlTipoDocumentoPersona);
	
	};
	
?>

<div id="page2"> <!-- 2 -->
<h3 class="azul">AUTORIZADOS A CONDUCIR</h3>
<hr />
<div>
<div class="space">Apellido: &nbsp;&nbsp;<input name="paapellido1" id="paapellido1" type="text" size="40" value="<?php if(isset($familiar[0]["apellido"])){echo $familiar[0]["apellido"];} ?>" /></div>
<div class="space">Nombres: <input name="panombre1" id="panombre1" type="text" size="40" value="<?php if(isset($familiar[0]["nombre"])){echo $familiar[0]["nombre"];} ?>" /></div>
<div class="space">Tipo Documento: <select name="padocumento1" id="padocumento1">
		<option value="1" <?php if(isset($familiar[0]) && $familiar[0]["idTipoDocumento"]==1){echo 'selected="selected"';} ?>>DNI</option>
		<option value="2" <?php if(isset($familiar[0]) && $familiar[0]["idTipoDocumento"]==2){echo 'selected="selected"';} ?>>LE</option>
		<option value="3" <?php if(isset($familiar[0]) && $familiar[0]["idTipoDocumento"]==3){echo 'selected="selected"';} ?>>CI</option>
		<option value="4" <?php if(isset($familiar[0]) && $familiar[0]["idTipoDocumento"]==4){echo 'selected="selected"';} ?>>LC</option>
		</select>
  | Nro: <input type="text"  name="panumero1" id="panumero1" value="<?php if(isset($familiar[0]["nroDoc"])){echo $familiar[0]["nroDoc"];} ?>" /> | Relaci&oacute;n: <select name="paparentesco1" id="paparentesco1">
		<option value="1" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==1){echo 'selected="selected"';} ?>>Padre</option>
		<option value="2" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==2){echo 'selected="selected"';} ?>>Madre</option>
		<option value="3" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==3){echo 'selected="selected"';} ?>>Hermano</option>
		<option value="4" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==4){echo 'selected="selected"';} ?>>Hermana</option>
		<option value="5" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==5){echo 'selected="selected"';} ?>>Hijo</option>
		<option value="6" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==6){echo 'selected="selected"';} ?>>Hija</option>
		<option value="7" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==7){echo 'selected="selected"';} ?>>Esposo</option>
		<option value="8" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==8){echo 'selected="selected"';} ?>>Esposa</option>
		<option value="9" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==9){echo 'selected="selected"';} ?>>Concubino</option>
		<option value="10" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==10){echo 'selected="selected"';} ?>>Concubina</option>
		<option value="11" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==11){echo 'selected="selected"';} ?>>Primo</option>
		<option value="12" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==12){echo 'selected="selected"';} ?>>Prima</option>
		<option value="13" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==13){echo 'selected="selected"';} ?>>Amigo</option>
		<option value="14" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==14){echo 'selected="selected"';} ?>>Amiga</option>
		<option value="15" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==15){echo 'selected="selected"';} ?>>Flia. Pol&iacute;tica</option>
		<option value="16" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==16){echo 'selected="selected"';} ?>>Abuela</option>
		<option value="17" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==17){echo 'selected="selected"';} ?>>Abuelo</option>
		<option value="18" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==18){echo 'selected="selected"';} ?>>C&oacute;nyuge</option>
		<option value="19" <?php if(isset($familiar[0]) && $familiar[0]["idParentesco"]==19){echo 'selected="selected"';} ?>>Otro</option>
		</select> 
</div>
<div class="space">Vencimiento Registro de Conducir: <input name="pavenc1" id="pavenc1" style="border: 0px;line-height: 20px" class="center" type="date" value="<?php if(isset($familiar[0]['vencimiento'])){echo $familiar[0]['vencimiento'];} ?>"/></div>
<div class="space">Foja Nro.: <input type="text" name="pafoja1" id="pafoja1" value="<?php if(isset($familiar[0]['foja'])){echo $familiar[0]['foja'];} ?>"/></div>
</div>
<div class="space"><label for="paautor1">Autorizado a Conducir: <input name="paautor1" id="paautor1" type="checkbox" <?php if(isset($familiar[0]["autorizado"]) && $familiar[0]["autorizado"]==1){echo 'checked=checked';} ?> /></label> | <label for="paconv1">Convive: <input name="paconv1" id="paconv1" type="checkbox" <?php if(isset($familiar[0]["convive"]) && $familiar[0]["convive"]==1){echo 'checked=checked';} ?> /></label></div>

<hr />
<div>
<div class="space">Apellido: &nbsp;&nbsp;<input name="paapellido2" id="paapellido2" type="text" size="40" value="<?php if(isset($familiar[1]["apellido"])){echo $familiar[1]["apellido"];} ?>" /> </div>
<div class="space">Nombres: <input name="panombre2" id="panombre2" type="text" size="40" value="<?php if(isset($familiar[1]["nombre"])){echo $familiar[1]["nombre"];} ?>" /></div>
<div class="space">Tipo Documento: <select name="padocumento2" id="padocumento2">
		<option value="1" <?php if(isset($familiar[1]) && $familiar[1]["idTipoDocumento"]==1){echo 'selected="selected"';} ?>>DNI</option>
		<option value="2" <?php if(isset($familiar[1]) && $familiar[1]["idTipoDocumento"]==2){echo 'selected="selected"';} ?>>LE</option>
		<option value="3" <?php if(isset($familiar[1]) && $familiar[1]["idTipoDocumento"]==3){echo 'selected="selected"';} ?>>CI</option>
		<option value="4" <?php if(isset($familiar[1]) && $familiar[1]["idTipoDocumento"]==4){echo 'selected="selected"';} ?>>LC</option>
		</select>
  | Nro: <input type="text"  name="panumero2" id="panumero2" value="<?php if(isset($familiar[1]["nroDoc"])){echo $familiar[1]["nroDoc"];} ?>" /> | Relaci&oacute;n: <select name="paparentesco2" id="paparentesco2">
		<option value="1" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==1){echo 'selected="selected"';} ?>>Padre</option>
		<option value="2" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==2){echo 'selected="selected"';} ?>>Madre</option>
		<option value="3" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==3){echo 'selected="selected"';} ?>>Hermano</option>
		<option value="4" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==4){echo 'selected="selected"';} ?>>Hermana</option>
		<option value="5" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==5){echo 'selected="selected"';} ?>>Hijo</option>
		<option value="6" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==6){echo 'selected="selected"';} ?>>Hija</option>
		<option value="7" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==7){echo 'selected="selected"';} ?>>Esposo</option>
		<option value="8" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==8){echo 'selected="selected"';} ?>>Esposa</option>
		<option value="9" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==9){echo 'selected="selected"';} ?>>Concubino</option>
		<option value="10" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==10){echo 'selected="selected"';} ?>>Concubina</option>
		<option value="11" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==11){echo 'selected="selected"';} ?>>Primo</option>
		<option value="12" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==12){echo 'selected="selected"';} ?>>Prima</option>
		<option value="13" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==13){echo 'selected="selected"';} ?>>Amigo</option>
		<option value="14" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==14){echo 'selected="selected"';} ?>>Amiga</option>
		<option value="15" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==15){echo 'selected="selected"';} ?>>Flia. Pol&iacute;tica</option>
		<option value="16" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==16){echo 'selected="selected"';} ?>>Abuela</option>
		<option value="17" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==17){echo 'selected="selected"';} ?>>Abuelo</option>
		<option value="18" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==18){echo 'selected="selected"';} ?>>C&oacute;nyuge</option>
		<option value="19" <?php if(isset($familiar[1]) && $familiar[1]["idParentesco"]==19){echo 'selected="selected"';} ?>>Otro</option>
		</select> 
</div>
<div class="space">Vencimiento Registro de Conducir: <input name="pavenc2" id="pavenc2" style="border: 0px;line-height: 20px" class="center" type="date" value="<?php if(isset($familiar[1]['vencimiento'])){echo $familiar[1]['vencimiento'];} ?>"/></div>
<div class="space">Foja Nro.: <input type="text" name="pafoja2" id="pafoja2" value="<?php if(isset($familiar[1]['foja'])){echo $familiar[1]['foja'];} ?>"/></div>
</div>
<div class="space"><label for="paautor2">Autorizado a Conducir: <input name="paautor2" id="paautor2" type="checkbox" <?php if(isset($familiar[1]["autorizado"]) && $familiar[1]["autorizado"]==1){echo 'checked=checked';} ?> /></label> | <label for="paconv2">Convive: <input name="paconv2" id="paconv2" type="checkbox" <?php if(isset($familiar[1]["convive"]) && $familiar[1]["convive"]==1){echo 'checked=checked';} ?> /></label></div>

<hr />
<div>
<div class="space">Apellido: &nbsp;&nbsp;<input name="paapellido3" id="paapellido3" type="text" size="25" value="<?php if(isset($familiar[2]["apellido"])){echo $familiar[2]["apellido"];} ?>" /></div>
<div class="space">Nombres: <input name="panombre3" id="panombre3" type="text" size="40" value="<?php if(isset($familiar[2]["nombre"])){echo $familiar[2]["nombre"];} ?>" /></div>
<div class="space">Tipo Documento: <select name="padocumento3" id="padocumento3">
		<option value="1" <?php if(isset($familiar[2]) && $familiar[2]["idTipoDocumento"]==1){echo 'selected="selected"';} ?>>DNI</option>
		<option value="2" <?php if(isset($familiar[2]) && $familiar[2]["idTipoDocumento"]==2){echo 'selected="selected"';} ?>>LE</option>
		<option value="3" <?php if(isset($familiar[2]) && $familiar[2]["idTipoDocumento"]==3){echo 'selected="selected"';} ?>>CI</option>
		<option value="4" <?php if(isset($familiar[2]) && $familiar[2]["idTipoDocumento"]==4){echo 'selected="selected"';} ?>>LC</option>
		</select>
  | Nro: <input type="text"  name="panumero3" id="panumero3" value="<?php if(isset($familiar[2]["nroDoc"])){echo $familiar[2]["nroDoc"];} ?>" /> | Relaci&oacute;n: <select name="paparentesco3" id="paparentesco3">
		<option value="1" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==1){echo 'selected="selected"';} ?>>Padre</option>
		<option value="2" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==2){echo 'selected="selected"';} ?>>Madre</option>
		<option value="3" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==3){echo 'selected="selected"';} ?>>Hermano</option>
		<option value="4" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==4){echo 'selected="selected"';} ?>>Hermana</option>
		<option value="5" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==5){echo 'selected="selected"';} ?>>Hijo</option>
		<option value="6" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==6){echo 'selected="selected"';} ?>>Hija</option>
		<option value="7" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==7){echo 'selected="selected"';} ?>>Esposo</option>
		<option value="8" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==8){echo 'selected="selected"';} ?>>Esposa</option>
		<option value="9" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==9){echo 'selected="selected"';} ?>>Concubino</option>
		<option value="10" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==10){echo 'selected="selected"';} ?>>Concubina</option>
		<option value="11" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==11){echo 'selected="selected"';} ?>>Primo</option>
		<option value="12" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==12){echo 'selected="selected"';} ?>>Prima</option>
		<option value="13" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==13){echo 'selected="selected"';} ?>>Amigo</option>
		<option value="14" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==14){echo 'selected="selected"';} ?>>Amiga</option>
		<option value="15" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==15){echo 'selected="selected"';} ?>>Flia. Pol&iacute;tica</option>
		<option value="16" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==16){echo 'selected="selected"';} ?>>Abuela</option>
		<option value="17" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==17){echo 'selected="selected"';} ?>>Abuelo</option>
		<option value="18" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==18){echo 'selected="selected"';} ?>>C&oacute;nyuge</option>
		<option value="19" <?php if(isset($familiar[2]) && $familiar[2]["idParentesco"]==19){echo 'selected="selected"';} ?>>Otro</option>

		</select> 
</div>
<div class="space">Vencimiento Registro de Conducir: <input name="pavenc3" id="pavenc3" style="border: 0px;line-height: 20px" class="center" type="date" value="<?php if(isset($familiar[2]['vencimiento'])){echo $familiar[2]['vencimiento'];} ?>"/></div>
<div class="space">Foja Nro.: <input type="text" name="pafoja3" id="pafoja3" value="<?php if(isset($familiar[2]['foja'])){echo $familiar[2]['foja'];} ?>"/></div>
</div>
<div class="space"><label for="paautor3">Autorizado a Conducir: <input name="paautor3" id="paautor3" type="checkbox" <?php if(isset($familiar[2]["autorizado"]) && $familiar[2]["autorizado"]==1){echo 'checked=checked';} ?> /></label> | <label for="paconv3">Convive: <input name="paconv3" id="paconv3" type="checkbox" <?php if(isset($familiar[2]["convive"]) && $familiar[2]["convive"]==1){echo 'checked=checked';} ?> /></label></div>
<div class="right">
<a href="#" class="btn"  onclick="$('#solfacompleta').submit();">+ Guardar Tramite</a>
</div>
</div> <!-- 2 fin -->

<?php //} ?>


<?php 
	
	$sqlVehiculo ="select * from vehiculo where idVehiculo = (select idVehiculo from tramite where idTramite = ".$_GET['idTramite'].")";

	$sqlVehiculo = mysqli_query($link, $sqlVehiculo);

	

	$vehiculo=array();
	
	foreach($sqlVehiculo as $sqlVehiculo){
	
	array_push($vehiculo, $sqlVehiculo);
	
	}
?>


<div id="page3"> <!-- 3 -->
	<h3 class="azul">DATOS VEHICULO</h3>
	<hr />
	<div>
		<div class="space">
			Importado &nbsp;&nbsp; <input style="margin-top:5px;margin-right:110px;" name="dvimportado" id="dvimportado" type="checkbox" 
			<?php if(isset($vehiculo[0]["importado"]) && $vehiculo[0]["importado"]==1){echo 'checked=checked';} ?> />
			FS: &nbsp;<input name="dvfs" id="dvfs" type="number" size="15" 
			value="<?php if(isset($vehiculo[0]['FS'])){echo $vehiculo[0]['FS'];} ?>" /> &nbsp;&nbsp;
		</div>
		<div class="space">
			Marca: &nbsp;<input name="dvmarca" id="dvmarca" type="text" size="15" 
			value="<?php if(isset($vehiculo[0]['marca'])){echo $vehiculo[0]['marca'];} ?>" /> &nbsp;&nbsp;
			Modelo: &nbsp;<input name="dvmodelo" id="dvmodelo" type="text" size="15" 
			value="<?php if(isset($vehiculo[0]['modelo'])){echo $vehiculo[0]['modelo'];} ?>" /> &nbsp;&nbsp;
			Versi&oacute;n: &nbsp;<input name="dvversion" id="dvversion" type="text" size="15" 
			value="<?php if(isset($vehiculo[0]['version'])){echo $vehiculo[0]['version'];} ?>" />
		</div>
		<div class="space">
			Valor FOB: &nbsp;&nbsp;<input name="dvfob" id="dvfob" type="text" size="11" 
				value="<?php if(isset($vehiculo[0]['fob'])){echo $vehiculo[0]['fob'];} ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;
			Nro. de Vin: &nbsp;&nbsp;<input name="dvnvin" id="dvnvin" type="text" size="11" 
				value="<?php if(isset($vehiculo[0]['nvin'])){echo $vehiculo[0]['nvin'];} ?>" /> &nbsp;&nbsp;&nbsp;&nbsp;
			U$S: &nbsp;&nbsp;<input name="dvdfob" id="dvdfob" type="number" size="11" 
				value="<?php if(isset($vehiculo[0]['dfob'])){echo $vehiculo[0]['dfob'];} ?>" />
		</div>
		<div class="space">
			Fecha Vigencia Factura Proforma: &nbsp;&nbsp;<input name="dvffpr" id="dvffpr" style="border: 0px;line-height: 20px" class="center" type="date" 
				value="<?php if(isset($vehiculo[0]['ffpr'])){echo $vehiculo[0]['ffpr'];} ?>"/>
		</div>
		<div class="space">
			Fecha Adquisici&oacute;n: &nbsp;&nbsp;<input name="dvfadq" id="dvfadq" style="border: 0px;line-height: 20px" class="center" type="date" 
				value="<?php if(isset($vehiculo[0]['fadq'])){echo $vehiculo[0]['fadq'];} ?>"/>
		</div>
	<h3 class="azul">DATOS POST COMPRA</h3>
	<hr />
	<div>
		<div class="space">
			Dominio: &nbsp;&nbsp;<input name="dvdominio" id="dvdominio" type="text" size="10" 
				value="<?php if(isset($vehiculo[0]['dominio'])){echo $vehiculo[0]['dominio'];} ?>" /> &nbsp;&nbsp;
			A&ntilde;o: &nbsp;&nbsp;<input name="anio" id="anio" type="text" size="15" 
				value="<?php if(isset($vehiculo[0]['anio'])){echo $vehiculo[0]['anio'];} ?>" />
		</div>
		<div class="space">
			Registro: &nbsp;&nbsp;<input name="dvregistro" id="dvregistro" type="text" size="10" 
				value="<?php if(isset($vehiculo[0]['registro'])){echo $vehiculo[0]['registro'];} ?>" /> &nbsp;&nbsp;
			Fecha Patente: &nbsp;&nbsp;<input name="dvfechapat" id="dvfechapat" style="border: 0px;line-height: 20px" class="center" type="date" 
				value="<?php if(isset($vehiculo[0]['fechaPatente'])){echo $vehiculo[0]['fechaPatente'];} ?>"/> &nbsp;&nbsp;
		</div>
		<div class="right">
			<a href="#" class="btn"  onclick="$('#solfacompleta').submit();">+ Guardar Tramite</a>
		</div>
	</div>

<!-- 3 fin -->

<?php //}; ?>

</div>

<input type="hidden" name="enviado" id="enviado" value="enviado" />

</div>
</form>

<script type="text/javascript">
    $(document).ready(function (){

		locFilter();
		locHFilter();

    	$("#franprov").change(function() {

    		locFilter();

    		$("#franloc").val("");

    	});


    	$("#franhospprov").change(function() {

    		locHFilter();

    		$("#franhosploc").val("");

    	});

    	function locFilter()
    	{    		
    		$("#franloc").empty();
    		var options = $("#franlocOriginal option[name='" + $("#franprov").val() + "']").clone();
    		$("#franloc").html(options);
    	}

    	function locHFilter()
    	{
    		$("#franhosploc").empty();
    		var options = $("#franhosplocOriginal option[name='" + $("#franhospprov").val() + "']").clone();
    		$("#franhosploc").html(options);
    	}

	});

</script>

</div>
