<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Tarea;

class TareaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tarea";
		$this->nombreId = "idTarea";
		$this->nombreClase = "Stel\Model\Tarea";
	}

	public function insert(Tarea $tarea){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$tarea->getNombre(),
						"idTipoTarea"=>$tarea->getIdTipoTarea(),
						"idListaItem"=>$tarea->getIdListaItem()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Tarea $tarea){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tarea->getIdTarea(),
					array(
						"nombre"=>$tarea->getNombre(),
						"idTipoTarea"=>$tarea->getIdTipoTarea(),
						"idListaItem"=>$tarea->getIdListaItem()
						)
					);

		return true;
	}

	public function getByTipo($idTipoTarea, $idUsuario=null){
		$sql = "select t.* from tarea t
					join permiso p on t.idTarea = p.idTarea
				where idTipoTarea = :idTipoTarea";
		$param = array("idTipoTarea"=>$idTipoTarea);

		if($idUsuario){
			$sql .= " and p.idUsuario = :idUsuario";
			$param["idUsuario"] = $idUsuario;
		}
		return DB::fetchAllClass($sql,$this->nombreClase, $param);
	}

	public function getByNombre($nombre){
		$sql = "select t.* from tarea t
				where nombre = :nombre";
		$param = array("nombre"=>$nombre);

		return DB::fetchAllClass($sql,$this->nombreClase, $param);
	}
}