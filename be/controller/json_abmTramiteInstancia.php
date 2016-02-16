<?php
use Stel\Model\Tramite;
use Stel\Model\TramiteInstancia;
use Stel\Model\Estado;
use Stel\Repository\TramiteInstanciaRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\TramiteInstanciaTareaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new TramiteInstanciaRepository();
	switch($action){
		case "new":
			Controller::renderJson("ERROR", "", "No implementado");
		break;
		case "open":
			Controller::renderJson("ERROR", "", "No implementado");
		break;
		case "end":
			$repoTramite = new TramiteRepository();
			$t = $repoTramite->getOne($data->idTramite);
			//fuerzo la finalizacion de las tareas pendientes
			$repoTarea = new TramiteInstanciaTareaRepository();
			$repoTarea->finalizarPendientes($t);
			//cambio la instancia
			$t = $repoTramite->cambiarInstancia($t);
			
			Controller::renderJson("OK", $t);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
