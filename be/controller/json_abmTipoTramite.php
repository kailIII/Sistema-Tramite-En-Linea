<?php

use Stel\Model\TipoTramite;
use Stel\Repository\TipoTramiteRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new TipoTramiteRepository();
	switch($action){
		case "new":
			$tipoTramite = new TipoTramite();
			$tipoTramite->setNombre($data->nombre);
			$tipoTramite->setDiasvalidez($data->diasvalidez);
			$tipoTramite->setIdTipoTramite($repo->insert($tipoTramite));
			Controller::renderJson("OK", $tipoTramite);
		break;
		case "edit":
			$tipoTramite = $repo->getOne($data->idTipoTramite);
			$tipoTramite->setNombre($data->nombre);
			$tipoTramite->setDiasvalidez($data->diasvalidez);
			$repo->update($tipoTramite);
			Controller::renderJson("OK", $tipoTramite);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
