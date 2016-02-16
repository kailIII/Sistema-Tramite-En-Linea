<?php

use Stel\Model\Permiso;
use Stel\Repository\PermisoRepository;
use Stel\Repository\UsuarioRepository;
use Stel\Repository\TareaRepository;

try{
	$action = $_GET["action"];
	$data = json_decode($_POST["object"]);

	$repo = new PermisoRepository();
	$repoUsuarios = new UsuarioRepository();
	$repoTareas = new TareaRepository();
	switch($action){
		case "new":
			//para no duplicar registros
			$exists = $repo->exists($data->idUsuario, $data->idTarea);

			if($exists){
				Controller::renderJson("ERROR", $exists, "Permiso existente");
			}else{
				$permiso = new Permiso();
				$permiso->setIdTarea($data->idTarea);
				$permiso->setIdUsuario($data->idUsuario);
				$permiso->setIdPermiso($repo->insert($permiso));

				$usuario = $repoUsuarios->getOne($data->idUsuario);

				$permiso->setUsuario($usuario);

				$tarea = $repoTareas->getOne($data->idTarea);

				$permiso->setTarea($tarea);

				Controller::renderJson("OK", $permiso);
			}
		break;
		case "edit":
			Controller::renderJson("ERROR", null, "No implementado");
		break;
		case "delete":
			$repo->delete($data->idPermiso);
			Controller::renderJson("OK", $data->idPermiso);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
