<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\TipoTarea;

class TipoTareaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tipotarea";
		$this->nombreId = "idTipoTarea";
		$this->nombreClase = "Stel\Model\TipoTarea";
	}

	public function insert(TipoTarea $tipo){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$tipo->getNombre()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(TipoTarea $tipo){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tipo->getIdTipoTarea(),
					array(
						"nombre"=>$tipo->getNombre()
						)
					);

		return true;
	}
}