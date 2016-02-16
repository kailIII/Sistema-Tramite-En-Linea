<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Usuario;

class UsuarioRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "usuario";
		$this->nombreId = "idUsuario";
		$this->nombreClase = "Stel\Model\Usuario";
	}

	public function authenticate($username, $password){
		$params = array("usuario"=>$username, "password"=> Usuario::encode($password));
		$sql = "select * from ".$this->nombreTabla." where usuario = :usuario and password = :password";
		$login = DB::fetchOneClass($sql, $this->nombreClase, $params);
		if($login){
			return $login;
		}
		return false;
	}

	public function insert(Usuario $usuario){
		$id = DB::insert($this->nombreTabla, 
					array(
						"usuario"=>$usuario->getUsuario(),
						"password"=>$usuario->getPassword(),
						"email"=>$usuario->getEmail(),
						"telefono"=>$usuario->getTelefono(),
						"idDireccion"=>$usuario->getIdDireccion(),
						"activo"=>$usuario->getActivo()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Usuario $usuario){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$usuario->getIdUsuario(),
					array(
						"usuario"=>$usuario->getUsuario(),
						"password"=>$usuario->getPassword(),
						"telefono"=>$usuario->getTelefono(),
						"email"=>$usuario->getEmail(),
						"idDireccion"=>$usuario->getIdDireccion(),
						"activo"=>$usuario->getActivo()
						)
					);

		return true;
	}
}