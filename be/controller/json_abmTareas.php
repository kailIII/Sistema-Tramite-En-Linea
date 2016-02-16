<?php

use Stel\Model\Tarea;
use Stel\Repository\TareaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new TareaRepository();
	switch($action){
		case "new":
			$tarea = $repo->getByNombre($data->nombre);

			if($tarea)
			{
				Controller::renderJson("ERROR", "", "Ya existe una tarea con el mismo nombre.");
				return;
			}

			$tarea = new Tarea();
			$tarea->setNombre($data->nombre);
			$tarea->setIdTipoTarea($data->idTipoTarea);
			$tarea->setIdListaItem($data->idListaItem);
			$tarea->setIdTarea($repo->insert($tarea));
			Controller::renderJson("OK", $tarea);
		break;
		case "edit":
			$tarea = $repo->getOne($data->idTarea);
			$tarea->setNombre($data->nombre);
			$tarea->setIdTipoTarea($data->idTipoTarea);
			$tarea->setIdListaItem($data->idListaItem);
			$repo->update($tarea);
			Controller::renderJson("OK", $tarea);
		break;
		case "delete":
			$repo->delete($data->idTarea);
			Controller::renderJson("OK", $data->idTarea);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
