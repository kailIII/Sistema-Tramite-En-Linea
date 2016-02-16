<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Direccion;

class DireccionRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "direccion";
		$this->nombreId = "idDireccion";
		$this->nombreClase = "Stel\Model\Direccion";
	}

	public function insert(Direccion $dir){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$dir->getNombre()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Direccion $dir){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$dir->getIdDireccion(),
					array(
						"nombre"=>$dir->getNombre()
						)
					);

		return true;
	}
}