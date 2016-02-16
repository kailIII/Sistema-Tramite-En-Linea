<?php
use Stel\Repository\UsuarioRepository;
use Stel\Model\Usuario;

$repo = new UsuarioRepository();
$usuarios = array();

$usuarios = $repo->getAllOrderBy("usuario");

if(isset($_GET['forSelect'])){
	$usuarios = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdUsuario(),
							"text" => $element->getUsuario()
						);
			},
			$usuarios
		);
}
Controller::renderJson("OK", $usuarios);