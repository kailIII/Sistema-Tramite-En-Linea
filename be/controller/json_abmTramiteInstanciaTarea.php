<?php

use Stel\Model\TramiteInstanciaTarea;
use Stel\Model\Estado;
use Stel\Model\Usuario;
use Stel\Repository\TramiteInstanciaTareaRepository;
use Stel\Repository\TramiteInstanciaRepository;
use Stel\Repository\TramiteRepository;

try{
	$action = $_GET["action"];
	
	$data = json_decode($_POST["object"]);
	
	$repo = new TramiteInstanciaTareaRepository();
	switch($action){
		case "new":
			//busco el tramite
			$repoTramite = new TramiteRepository();
			$t = $repoTramite->getOne($data->idTramite);
			if(!$t){ Controller::renderJson("ERROR", "", "Tramite no encontrado");die; }

			//busco el tramiteinstancia
			$repoTi = new TramiteInstanciaRepository();
			$ti =  $repoTi->getByTramiteInstancia($t->getIdTramite(), $t->getIdInstanciaActual());
			if(!$ti){ Controller::renderJson("ERROR", "", "Instancia incorrecta");die; }

			//genero la nueva tarea
			$tit = new TramiteInstanciaTarea();
			$tit->setIdTramiteInstancia($ti->getIdTramiteInstancia());
			$tit->setIdTarea($data->idTarea);
			$tit->setOrden(0);
			$tit->setIdEstado(Estado::$TareaAbierta);

			$tit->setIdTramiteInstanciaTarea($repo->insert($tit));

			Controller::renderJson("OK", $tit);
		break;
		case "open":
			$user = Usuario::getSessionUser();
			if($user){
				$tit = $repo->getOne($data->id);
				$tit->setIdEstado(Estado::$TareaEncurso);
				$tit->setIdUsuario($user["id"]);
				$repo->update($tit);
				Controller::renderJson("OK", $tit);	
			}
			Controller::renderJson("ERROR", "", "relogin");
		break;
		case "end":
			$tit = $repo->getOne($data->id);
			$tit->setIdEstado(Estado::$TareaFinalizada);
			$tit->setFinalizado(new DateTime());
			$repo->update($tit);
			Controller::renderJson("OK", $tit);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
