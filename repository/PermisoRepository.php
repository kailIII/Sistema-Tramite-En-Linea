<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Permiso;

class PermisoRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "permiso";
		$this->nombreId = "idPermiso";
		$this->nombreClase = "Stel\Model\Permiso";
	}

	public function insert(Permiso $permiso){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTarea"=>$permiso->getIdTarea(),
						"idUsuario"=>$permiso->getIdUsuario()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Permiso $permiso){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$permiso->getIdPermiso(),
					array(
						"idTarea"=>$permiso->getIdTarea(),
						"idUsuario"=>$permiso->getIdUsuario()
						)
					);

		return true;
	}

	public function exists($idUsuario, $idTarea){
		$sql = "select * from ".$this->nombreTabla." where idUsuario = :idUsuario and idTarea = :idTarea";	
		$params = array("idTarea"=>$idTarea, "idUsuario"=>$idUsuario);
		//echo $sql;die;
		return DB::fetchOneClass($sql, $this->nombreClase,$params);
	}
}