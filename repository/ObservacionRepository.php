<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Observacion;

class ObservacionRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "observacion";
		$this->nombreId = "idObservacion";
		$this->nombreClase = "Stel\Model\Observacion";
	}

	public function insert(Observacion $obs){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTramiteInstanciaTarea"=>$obs->getIdTramiteInstanciaTarea(),
						"observacion"=>$obs->getObservacion()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Observacion $obs){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$obs->getIdObservacion(),
					array(
						"idTramiteInstanciaTarea"=>$obs->getIdTramiteInstanciaTarea(),
						"observacion"=>$obs->getObservacion()
						)
					);

		return true;
	}

	public function getByTarea($idTramiteInstanciaTarea){
		$sql = "select * from observacion where idTramiteInstanciaTarea = :idTramiteInstanciaTarea";
		$param = array("idTramiteInstanciaTarea"=>$idTramiteInstanciaTarea);

		return DB::fetchOneClass($sql, $this->nombreClase, $param);
	}
}