<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Tramite;
use Stel\Model\TramiteInstancia;
use Stel\Model\TramiteInstanciaTarea;
use Stel\Model\Instancia;
use Stel\Model\Estado;
use Stel\Model\RelTipoTramiteInstancia;
use Stel\Model\RelTipoTramiteInstanciaTarea;
use Stel\Repository\TramiteInstanciaRepository;
use Stel\Repository\TramiteInstanciaTareaRepository;
use Stel\Repository\InstanciaRepository;
use Stel\Repository\RelTipoTramiteInstanciaRepository;
use Stel\Repository\RelTipoTramiteInstanciaTareaRepository;

class TramiteRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tramite";
		$this->nombreId = "idTramite";
		$this->nombreClase = "Stel\Model\Tramite";
	}

	public function insert(Tramite $tramite){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTipoTramite"=>$tramite->getIdTipoTramite(),
						"numero"=>$tramite->getNumero(),
						"idEstado"=>$tramite->getIdEstado(),
						"idInstanciaActual"=>$tramite->getIdInstanciaActual(),
						"expediente"=>$tramite->getexpediente(),
						"idPersona"=>$tramite->getIdPersona(),
						"idInstitucion"=>$tramite->getIdInstitucion(),
						"idVehiculo"=>$tramite->getIdVehiculo(),
						"fechainicio"=>$tramite->getFechainicio(),
						"fechavalidez"=>$tramite->getFechavalidez(),
						"fechafin"=>$tramite->getFechafin(),
						"diasprorroga"=>$tramite->getDiasproroga()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Tramite $tramite){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tramite->getIdTramite(),
					array(
						"idTipoTramite"=>$tramite->getIdTipoTramite(),
						"numero"=>$tramite->getNumero(),
						"idEstado"=>$tramite->getIdEstado(),
						"idInstanciaActual"=>$tramite->getIdInstanciaActual(),
						"expediente"=>$tramite->getexpediente(),
						"idPersona"=>$tramite->getIdPersona(),
						"idInstitucion"=>$tramite->getIdInstitucion(),
						"idVehiculo"=>$tramite->getIdVehiculo(),
						"fechainicio"=>$tramite->getFechainicio(),
						"fechavalidez"=>$tramite->getFechavalidez(),
						"fechafin"=>$tramite->getFechafin(),
						"diasprorroga"=>$tramite->getDiasproroga()
						)
					);

		return true;
	}

	public function getByFiltro($filtro){
		$sql = "select * from tramite where tramite.idPersona IN select persona.idPersona from 
		persona where persona.apellido = :filtro OR persona.nombre = :filtro OR nroDoc = :filtro)";
		//SELECT * FROM tramite where tramite.idPersona IN (select persona.idPersona from persona where persona.apellido = "magallon")
		//$params = array("idTipo"=>$idTipo);
		return DB::fetchAllClass($sql, $this->nombreClase,$params);
	}
	
	public function getByTipoTramite($idTipo){
		$sql = "select * from ".$this->nombreTabla." where idTipoTramite = :idTipo order by numero asc";	
		$params = array("idTipo"=>$idTipo);
		return DB::fetchAllClass($sql, $this->nombreClase,$params);
	}
	
	public function getByInstancia($idInstancia){
		$sql = "select * from ".$this->nombreTabla." where idInstanciaActual = :idInstancia order by numero asc";	
		$params = array("idInstancia"=>$idInstancia);
		return DB::fetchAllClass($sql, $this->nombreClase,$params);
	}

	public function getByTipoTramiteYInstancia($idTipo, $idInstancia = null){
		$sql = "select * from ".$this->nombreTabla." where idTipoTramite = :idTipo and idInstanciaActual = :idInstancia order by numero asc";	
		$params = array("idTipo"=>$idTipo, "idInstancia"=>$idInstancia);
		return DB::fetchAllClass($sql, $this->nombreClase,$params);
	}

	public function cambiarInstancia(Tramite $tramite){
		$repoInstancia = new InstanciaRepository();
		$repoTramiteInstancia = new TramiteInstanciaRepository();
		$repoTramiteInstanciaTarea = new TramiteInstanciaTareaRepository();
		$repoTarea = new RelTipoTramiteinstanciaTareaRepository();

		//siguiente instancia del tramite
		$nuevainstancia = $repoInstancia->getSiguienteInstancia($tramite->getIdTipoTramite(),$tramite->getidInstanciaActual());
		//var_dump($nuevainstancia);die;
		//asocio la nueva instancia con el tramite
		$tramiteInstancia = new TramiteInstancia();
		$tramiteInstancia->setIdTramite($tramite->getidTramite());
		$tramiteInstancia->setIdInstancia($nuevainstancia->getIdInstancia());
		$tramiteInstancia->setIdTramiteInstancia($repoTramiteInstancia->insert($tramiteInstancia));

		//tareas propias de la nueva instancia
		$tareasPropias = $repoTarea->getTareasPropias($tramite->getIdTipoTramite(),$nuevainstancia->getIdInstancia());
		//var_dump($tareasPropias);die;
		//agrego las tareas al tramite
		foreach ($tareasPropias as $tarea) {
			$tit = new TramiteInstanciaTarea();
			$tit->setIdTramiteInstancia($tramiteInstancia->getIdTramiteInstancia());
			$tit->setIdTarea($tarea->getIdTarea());
			$tit->setOrden($tarea->getOrden());
			$tit->setIdEstado(Estado::$TareaAbierta);
			//var_dump($tit);die;
			$repoTramiteInstanciaTarea->insert($tit);
		}

		//cambio la instancia actual del tramite
		$tramite->setIdInstanciaActual($nuevainstancia->getIdInstancia());
		$this->update($tramite);

		return $tramite;
	}
}