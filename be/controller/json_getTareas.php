<?php
use Stel\Repository\TareaRepository;
use Stel\Model\Tarea;
use Stel\Model\Usuario;

$repo = new TareaRepository();
$tareas = array();

if(isset($_GET["tipo"])){
	$user = Usuario::getSessionUser();
	$tareas = $repo->getByTipo($_GET["tipo"], $user['id']);
}else{
	$tareas = $repo->getAllOrderBy("nombre");
}

if(isset($_GET['forSelect'])){
	$tareas = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdTarea(),
							"text" => $element->getNombre()
						);
			},
			$tareas
		);
}
Controller::renderJson("OK", $tareas);