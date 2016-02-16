<?php

use Stel\Model\Instancia;
use Stel\Repository\InstanciaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new InstanciaRepository();
	switch($action){
		case "new":
			$instancia = new Instancia();
			$instancia->setNombre($data->nombre);
			$instancia->setIdInstancia($repo->insert($instancia));
			Controller::renderJson("OK", $instancia);
		break;
		case "edit":
			$instancia = $repo->getOne($data->idInstancia);
			$instancia->setNombre($data->nombre);
			$repo->update($instancia);
			Controller::renderJson("OK", $instancia);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
