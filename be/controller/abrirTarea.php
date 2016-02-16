<?php
use Stel\Repository\TramiteInstanciaTareaRepository;
use Stel\Repository\TareaRepository;
use Stel\Repository\ObservacionRepository;
use Stel\Model\TramiteInstanciaTarea;
use Stel\Model\Estado;
use Stel\Model\Usuario;

$idTarea = $_GET["idTarea"];

$repo = new TramiteInstanciaTareaRepository();

$user = Usuario::getSessionUser();
if(!$user){
	Controller::redirect("./login");
}
$tarea = null;
$observacion = null;
if($idTarea){
	$tareatramite = $repo->getOne($idTarea);
	//pongo la tarea como Encurso
	$tareatramite->setIdEstado(Estado::$TareaEncurso);
	$tareatramite->setIdUsuario($user["id"]);
	$repo->update($tareatramite);

	$repoTarea = new TareaRepository();
	$tarea = $repoTarea->getOne($tareatramite->getIdTarea());
	$repoObservacion = new ObservacionRepository();
	$observacion = $repoObservacion->getByTarea($tareatramite->getIdTramiteInstanciaTarea());
}

Controller::render("cargaObservacion.php", 
					array(
						"tareatramite"=>$tareatramite,
						"tarea"=>$tarea,
						"observacion"=>$observacion
					)
				);