<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\RelTipoTramiteInstanciaTarea;

class RelTipoTramiteInstanciaTareaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "rel_tramiteinstanciatarea";
		$this->nombreId = "idRelTramiteInstanciaTarea";
		$this->nombreClase = "Stel\Model\RelTipoTramiteInstanciaTarea";
	}

	public function insert(RelTipoTramiteInstanciaTarea $relTipoTramiteInstanciaTarea){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idRelTramiteInstancia"=>$relTipoTramiteInstanciaTarea->getIdRelTipoTramiteInstancia(),
						"idTarea"=>$relTipoTramiteInstanciaTarea->getIdTarea(),
						"orden"=>$relTipoTramiteInstanciaTarea->getOrden()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(RelTipoTramiteInstanciaTarea $relTipoTramiteInstanciaTarea){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$relTipoTramiteInstanciaTarea->getIdRelTipoTramiteInstanciaTarea(),
					array(
						"idRelTramiteInstancia"=>$relTipoTramiteInstanciaTarea->getIdRelTipoTramiteInstancia(),
						"idTarea"=>$relTipoTramiteInstanciaTarea->getIdTarea(),
						"orden"=>$relTipoTramiteInstanciaTarea->getOrden()
						)
					);

		return true;
	}
	public function getTareasPropias($idTipoTramite, $idInstancia){
		$sql = "select rtit.* 
					from rel_tramiteinstanciatarea rtit
					join rel_tramiteinstancia rti on rtit.idRelTramiteInstancia = rti.idRelTramiteinstancia
				where rti.idTipoTramite = :idTipoTramite and rti.idInstancia = :idInstancia;";

		$params = array("idTipoTramite"=>$idTipoTramite, "idInstancia"=>$idInstancia);

		return DB::fetchAllClass($sql, $this->nombreClase, $params);
	}
}