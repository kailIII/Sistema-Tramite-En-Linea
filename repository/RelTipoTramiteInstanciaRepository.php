<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\RelTipoTramiteInstancia;

class RelTipoTramiteInstanciaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "rel_tramiteinstancia";
		$this->nombreId = "idRelTramiteInstancia";
		$this->nombreClase = "Stel\Model\RelTipoTramiteInstancia";
	}

	public function insert(RelTipoTramiteInstancia $relTipoTramiteInstancia){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTipoTramite"=>$relTipoTramiteInstancia->getIdTipoTramite(),
						"idInstancia"=>$relTipoTramiteInstancia->getIdInstancia(),
						"orden"=>$relTipoTramiteInstancia->getOrden()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(RelTipoTramiteInstancia $relTipoTramiteInstancia){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$relTipoTramiteInstancia->getIdRelTipoTramiteInstancia(),
					array(
						"idTipoTramite"=>$relTipoTramiteInstancia->getIdTipoTramite(),
						"idInstancia"=>$relTipoTramiteInstancia->getIdInstancia(),
						"orden"=>$relTipoTramiteInstancia->getOrden()
						)
					);

		return true;
	}

	public function getByTipoTramite($idTipo){
		$sql = "select * from ".$this->nombreTabla." where idTipoTramite = :id order by orden asc";
		$params = array("id"=>$idTipo);
		return DB::fetchAllClass($sql, $this->nombreClase,$params);
	}
}