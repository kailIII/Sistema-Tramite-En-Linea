<?php

use Stel\Model\Usuario;
use Stel\Repository\UsuarioRepository;

try{
	$action = $_GET["action"];
	if(isset($_POST["object"]))
		$data = json_decode($_POST["object"]);

	$repo = new UsuarioRepository();
	switch($action){
		case "new":
			$usuario = new Usuario();
			$usuario->setUsuario($data->usuario);
			$usuario->setPassword(Usuario::encode($data->password));
			$usuario->setTelefono($data->telefono);
			$usuario->setEmail($data->email);
			$usuario->setActivo($data->activo);
			$usuario->setIdDireccion($data->idDireccion);
			$usuario->setIdUsuario($repo->insert($usuario));

			//antes de devolver el usuario vacio la password
			$usuario->setPassword(null);
			Controller::renderJson("OK", $usuario);
		break;
		case "edit":
			$usuario = $repo->getOne($data->idUsuario);
			//si no se especifica un password no se pisa el viejo
			if($data->password && $data->password != "")
				$usuario->setPassword(Usuario::encode($data->password));
			$usuario->setTelefono($data->telefono);
			$usuario->setEmail($data->email);
			$usuario->setActivo($data->activo);
			$usuario->setIdDireccion($data->idDireccion);
			$repo->update($usuario);

			//antes de devolver el usuario vacio la password
			$usuario->setPassword(null);
			Controller::renderJson("OK", $usuario);
		break;
		case "delete":
			Controller::renderJson("ERROR", "", "No implementado");	
		break;
		case "activate":
			$usuario = $repo->getOne($_GET['id']);
			if($usuario->getActivo()){
				$usuario->setActivo(false);
			}else{ $usuario->setActivo(true); }
			
			$repo->update($usuario);
			//antes de devolver el usuario vacio la password
			$usuario->setPassword(null);
			Controller::renderJson("OK", $usuario);
		break;
	}	
}catch(Exception $e){
	Controller::renderJson("ERROR", "", $e->getMessage());
}
