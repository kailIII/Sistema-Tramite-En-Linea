<?php

use Stel\Model\Observacion;
use Stel\Repository\ObservacionRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new ObservacionRepository();
	switch($action){
		case "new":
			$observacion = new Observacion();
			$observacion->setIdTramiteInstanciaTarea($data->idTramiteInstanciaTarea);
			$observacion->setObservacion($data->observacion);
			$observacion->setIdObservacion($repo->insert($observacion));
			Controller::renderJson("OK", $observacion);
		break;
		case "edit":
			$observacion = $repo->getOne($data->idObservacion);
			$observacion->setObservacion($data->observacion);
			//var_dump($data);die;
			$repo->update($observacion);
			Controller::renderJson("OK", $observacion);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
