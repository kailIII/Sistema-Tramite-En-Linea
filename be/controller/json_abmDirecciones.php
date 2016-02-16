<?php

use Stel\Model\Direccion;
use Stel\Repository\DireccionRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new DireccionRepository();
	switch($action){
		case "new":
			$direccion = new Direccion();
			$direccion->setNombre($data->nombre);
			$direccion->setIdDireccion($repo->insert($direccion));
			Controller::renderJson("OK", $direccion);
		break;
		case "edit":
			$direccion = $repo->getOne($data->idDireccion);
			$direccion->setNombre($data->nombre);
			$repo->update($direccion);
			Controller::renderJson("OK", $direccion);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
