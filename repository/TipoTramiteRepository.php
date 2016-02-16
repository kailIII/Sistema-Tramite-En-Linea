<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\TipoTramite;

class TipoTramiteRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tipotramite";
		$this->nombreId = "idTipoTramite";
		$this->nombreClase = "Stel\Model\TipoTramite";
	}

	public function insert(TipoTramite $tipo){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$tipo->getNombre(), 
						"diasvalidez"=>$tipo->getDiasvalidez()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(TipoTramite $tipo){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tipo->getIdTipoTramite(),
					array(
						"nombre"=>$tipo->getNombre(), 
						"diasvalidez"=>$tipo->getDiasvalidez()
						)
					);

		return true;
	}
}