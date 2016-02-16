<?php
use Stel\Repository\TramiteInstanciaTareaRepository;
use Stel\Repository\UsuarioRepository;
use Stel\Model\Usuario;
use Stel\Model\Estado;

// $tramite = isset($_GET["tramite"])?$_GET["tramite"]:null;
$tipo = isset($_GET["tipo"])?$_GET["tipo"]:null;
$instancia = isset($_GET["instancia"])?$_GET["instancia"]:null;
$filtro = isset($_GET["filtro"])?$_GET["filtro"]:null;


$tareas = array();
$user = Usuario::getSessionUser();
if(!$user){
	Controller::renderJson("ERROR",null, "relogin");
}else{
	$repo = new TramiteInstanciaTareaRepository();

	$tareas = $repo->getForMisTareas($user["id"],$tipo,$instancia,$filtro);
	//var_dump($tareas);die;
	$repoUser = new UsuarioRepository();
	foreach ($tareas as $tarea) {
		$usuario = $repoUser->getOne($tarea->idUsuario);
		//en el estado concateno el nombre de usuario que tomo la tarea
		if($usuario)
			$tarea->nombreEstado .= " - ".$usuario->getUsuario();
		// para que una tarea sea editable o finalizable tiene que estar Abierta 
		// o EnCurso pero por el mismo usuario
		if($tarea->idEstado == Estado::$TareaAbierta ||
		   ($tarea->idEstado == Estado::$TareaEncurso && $tarea->idUsuario == $user["id"] )){
			$tarea->editable = true;
		}
	}
}

Controller::renderJson("OK", $tareas);