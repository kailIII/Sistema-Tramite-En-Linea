<?php
use Stel\Model\Persona;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Model\Usuario;
use Stel\Repository\PersonaRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\InstanciaRepository;

if(!isset($_POST["tipoDoc"]) || !isset($_POST["nro"]) || !isset($_POST["tramite"])){
	return;
}

$link = mysqli_connect("localhost","root","root","stel");

if (mysqli_connect_errno())
  {
  	echo "Error en la conexión con la base de datos: " . mysqli_connect_error();
  }

$tipo = 'DNI';

if($_POST["tipoDoc"] == 2)
	$tipo = 'LE';

if($_POST["tipoDoc"] == 3)
	$tipo = 'LC';

$sqlPer = "select idPersona, apellido, nombre, fechaNacimiento, calle, idProvincia, idLocalidad, codPos, telcodarea, 
			telefono, obraSocial, email, cud, ocupacion, domicilioCaba, hospital, domicilioHospital, idProvinciaHospital, 
			idLocalidadHospital, codPosHospital, telcodareahosp, telefonoHospital from `persona` 
			where idTipoDocumento = ".$_POST["tipoDoc"]." and nroDoc = ".$_POST["nro"]." order by idPersona desc";
$result = $link->query($sqlPer);

if($result->num_rows == 0) {	

	$sqlPer = "select Apellido as apellido, Nombre as nombre, Cod_Postal as codPos, Telefono as telefono 
			FROM `cabecera` where nro_documento = ".$_POST["nro"]." and tipo = '".$tipo."' order by cod_cabecera desc";
	$result = $link->query($sqlPer);

	if($result->num_rows == 0)
		$fila = "false";			
	else
		$fila = $result->fetch_assoc();

}else
{
	$fila = $result->fetch_assoc();

	$sqlPer = "select * FROM `tramite` where idPersona = ".$fila["idPersona"]." and idTipoTramite = ".$_POST["tramite"];
	$result = $link->query($sqlPer);

	if($result->num_rows > 0)
		$fila = "duplicado";			
}

echo json_encode($fila);
return;
	
?>