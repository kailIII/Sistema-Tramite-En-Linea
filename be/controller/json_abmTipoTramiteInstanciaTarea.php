<?php

use Stel\Model\RelTipoTramiteInstanciaTarea;
use Stel\Repository\RelTipoTramiteInstanciaTareaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new RelTipoTramiteInstanciaTareaRepository();
	switch($action){
		case "new":
			$rel = new RelTipoTramiteInstanciaTarea();
			$rel->setIdRelTipoTramiteInstancia($data->idRelTipoTramiteInstancia);
			$rel->setIdTarea($data->idTarea);
			$rel->setOrden($data->orden);
			$rel->setIdRelTipoTramiteInstanciaTarea($repo->insert($rel));
			Controller::renderJson("OK", $rel);
		break;
		case "edit":
			Controller::renderJson("ERROR", "", "No implementado");
		break;
		case "delete":
			$repo->delete($data->idRelTipoTramiteInstanciaTarea);
			Controller::renderJson("OK", $data->idRelTipoTramiteInstanciaTarea);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
