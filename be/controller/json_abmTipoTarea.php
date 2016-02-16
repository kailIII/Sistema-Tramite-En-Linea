<?php

use Stel\Model\TipoTarea;
use Stel\Repository\TipoTareaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new TipoTareaRepository();
	switch($action){
		case "new":
			$tipoTarea = new TipoTarea();
			$tipoTarea->setNombre($data->nombre);
			$tipoTarea->setIdTipoTarea($repo->insert($tipoTarea));
			Controller::renderJson("OK", $tipoTarea);
		break;
		case "edit":
			$tipoTarea = $repo->getOne($data->idTipoTarea);
			$tipoTarea->setNombre($data->nombre);
			$repo->update($tipoTarea);
			Controller::renderJson("OK", $tipoTarea);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
