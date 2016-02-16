<?php
use Stel\Model\Usuario;
use Stel\Repository\UsuarioRepository;
use Stel\Repository\DireccionRepository;
//Controller::renderJson("OK", array("item"=>"item1"));
if($_POST && count($_POST) > 0){
	$repo = new UsuarioRepository();
	if($user = $repo->authenticate($_POST["username"], $_POST["password"])){
		if($user->getActivo()){
			$_SESSION["user"]["usuario"] = $user->getUsuario();
			$_SESSION["user"]["email"] = $user->getEmail();
			$_SESSION["user"]["id"] = $user->getIdUsuario();

			$repoDireccion = new DireccionRepository();
			if($user->getIdDireccion()){
				$dir = $repoDireccion->getOne($user->getIdDireccion());
				$_SESSION["user"]["idDireccion"] = $dir->getIdDireccion();
				$_SESSION["user"]["nombreDireccion"] = $dir->getNombre();
			}

			if($user->getIdUsuario() == 1){
				Controller::redirect("administracion");
			}else{
				Controller::redirect("misTareas");
			}
		}else{
			Controller::render("login.php", array("error"=>"El usuario ingresado se encuentra inactivo, por favor contacte al administrador"));	
		}
	}else{
		Controller::render("login.php", array("error"=>"Datos invalidos"));		
	}
}else{
	Controller::render("login.php");	
}
