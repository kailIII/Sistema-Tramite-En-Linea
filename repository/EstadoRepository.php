<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Estado;

class EstadoRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "estado";
		$this->nombreId = "idEstado";
		$this->nombreClase = "Stel\Model\Estado";
	}

	public function insert(Estado $estado){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$estado->getNombre(),
						"owner"=>$estado->getOwner()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Estado $estado){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$estado->getIdEstado(),
					array(
						"nombre"=>$estado->getNombre(),
						"owner"=>$estado->getOwner()
						)
					);

		return true;
	}
}