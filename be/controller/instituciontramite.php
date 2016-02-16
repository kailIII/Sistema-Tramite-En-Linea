<?php
use Stel\Model\Persona;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Model\Usuario;
use Stel\Repository\PersonaRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\InstanciaRepository;

if(!isset($_POST["cuit"])){
	return;
}

$link = mysqli_connect("localhost","root","root","stel");

if (mysqli_connect_errno())
  {
  	echo "Error en la conexión con la base de datos: " . mysqli_connect_error();
  }

$sqlPer = "select idInstitucion from `institucion` 
			where cuit = '".$_POST["cuit"]."'";
$result = $link->query($sqlPer);

if($result->num_rows == 0) 
	$fila = "false";			
else
{
	$fila = $result->fetch_assoc();

	$sqlPer = "select * FROM `tramite` where idInstitucion = ".$fila["idInstitucion"];
	$result = $link->query($sqlPer);

	if($result->num_rows > 0)
		$fila = "duplicado";			
}

echo json_encode($fila);
return;
	
?>