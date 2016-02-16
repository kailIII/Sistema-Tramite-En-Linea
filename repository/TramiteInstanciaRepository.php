<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\TramiteInstancia;

class TramiteInstanciaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tramiteinstancia";
		$this->nombreId = "idTramiteInstancia";
		$this->nombreClase = "Stel\Model\TramiteInstancia";
	}

	public function insert(TramiteInstancia $tramiteInstancia){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTramite"=>$tramiteInstancia->getIdTramite(),
						"idInstancia"=>$tramiteInstancia->getIdInstancia()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(TramiteInstancia $tramiteInstancia){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tramiteInstancia->getIdTramiteInstancia(),
					array(
						"idTramite"=>$tramiteInstancia->getIdTramite(),
						"idInstancia"=>$tramiteInstancia->getIdInstancia(),
						)
					);

		return true;
	}

	public function getByTramiteInstancia($idTramite, $idInstancia){
		$sql = "select * from ".$this->nombreTabla." where idTramite = :idTramite and idInstancia = :idInstancia";	
		$params = array("idTramite"=>$idTramite, "idInstancia"=>$idInstancia);
		//echo $sql;die;
		return DB::fetchOneClass($sql, $this->nombreClase,$params);
	}
}