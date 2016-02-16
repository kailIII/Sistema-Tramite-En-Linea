<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Instancia;

class InstanciaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "instancia";
		$this->nombreId = "idInstancia";
		$this->nombreClase = "Stel\Model\Instancia";
	}

	public function insert(Instancia $instancia){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$instancia->getNombre()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Instancia $instancia){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$instancia->getIdInstancia(),
					array(
						"nombre"=>$instancia->getNombre()
						)
					);
		return true;
	}

	public function getSiguienteInstancia($idTipoTramite, $idInstanciaActual){
		if(!$idInstanciaActual){ $idInstanciaActual=0; }
		$sql = "select i.* 
				from rel_tramiteinstancia rti
					join instancia i on rti.idInstancia = i.idInstancia
				where rti.idTipoTramite = :idTipoTramite and rti.idInstancia > :idInstancia
				order by rti.orden asc";
		$params = array("idTipoTramite"=>$idTipoTramite, "idInstancia"=>$idInstanciaActual);

		return DB::fetchOneClass($sql, $this->nombreClase, $params);
	}
}