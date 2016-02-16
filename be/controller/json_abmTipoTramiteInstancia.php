<?php

use Stel\Model\RelTipoTramiteInstancia;
use Stel\Repository\RelTipoTramiteInstanciaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new RelTipoTramiteInstanciaRepository();
	switch($action){
		case "new":
			$rel = new RelTipoTramiteInstancia();
			$rel->setIdTipoTramite($data->idTipoTramite);
			$rel->setIdInstancia($data->idInstancia);
			$rel->setOrden($data->orden);
			$rel->setIdRelTipoTramiteInstancia($repo->insert($rel));
			Controller::renderJson("OK", $rel);
		break;
		case "edit":
			Controller::renderJson("ERROR", "", "No implementado");
		break;
		case "delete":
			$repo->delete($data->idRelTipoTramiteInstancia);
			Controller::renderJson("OK", $data->idRelTipoTramiteInstancia);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
