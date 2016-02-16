<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\TramiteInstanciaTarea;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Model\Persona;

class TramiteInstanciaTareaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "tramiteinstanciatarea";
		$this->nombreId = "idTramiteInstanciaTarea";
		$this->nombreClase = "Stel\Model\TramiteInstanciaTarea";
	}

	public function insert(TramiteInstanciaTarea $tramiteInstanciaTarea){
		$id = DB::insert($this->nombreTabla, 
					array(
						"idTramiteInstancia"=>$tramiteInstanciaTarea->getIdTramiteInstancia(),
						"idTarea"=>$tramiteInstanciaTarea->getIdTarea(),
						"orden"=>$tramiteInstanciaTarea->getOrden(),
						"idEstado"=>$tramiteInstanciaTarea->getIdEstado(),
						"idUsuario"=>$tramiteInstanciaTarea->getIdUsuario(),
						"finalizacion"=>$tramiteInstanciaTarea->getFinalizacion()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(TramiteInstanciaTarea $tramiteInstanciaTarea){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$tramiteInstanciaTarea->getIdTramiteInstanciaTarea(),
					array(
						"idTramiteInstancia"=>$tramiteInstanciaTarea->getIdTramiteInstancia(),
						"idTarea"=>$tramiteInstanciaTarea->getIdTarea(),
						"orden"=>$tramiteInstanciaTarea->getOrden(),
						"idEstado"=>$tramiteInstanciaTarea->getIdEstado(),
						"idUsuario"=>$tramiteInstanciaTarea->getIdUsuario(),
						"finalizacion"=>$tramiteInstanciaTarea->getFinalizacion()
						)
					);

		return true;
	}

	public function getForMisTareas($idUsuario, $idTipoTramite=null, $idInstancia=null, $filtro=null){
		$params = array();

		$where = "where pe.idUsuario = ".$idUsuario." and tit.idEstado != ".Estado::$TareaFinalizada;

		if($idTipoTramite){
			$where .= " and tt.idTipoTramite = ".$idTipoTramite." ";
			$params["idTipoTramite"] = $idTipoTramite;
		}
		if($idInstancia){
			$where .= " and i.idInstancia = ".$idInstancia." ";
			$params["idInstancia"] = $idInstancia;
		}
		// if($idTramite){
		// 	$where .= " and tr.idTramite = ".$idTramite." ";
		// 	$params["idTramite"] = $idTramite;
		// }

		if($filtro){
			$where .= " and (tr.idPersona IN (select persona.idPersona from persona where persona.apellido like '%".
				$filtro."%' or persona.nombre like '%".$filtro."%' or persona.nroDoc like '%".$filtro."%') ";
			$where .= " or tr.idInstitucion IN (select institucion.idInstitucion from institucion where institucion.cuit like '%".
				$filtro."%' or institucion.denominacionSocial like '%".$filtro."%') ";
			$where .= " or tr.idTramite like '%".$filtro."%'";
			$where .= " or ta.nombre like '%".$filtro."%'";
			$where .= " or e.nombre like '%".$filtro."%')";
			$params["filtro"] = $filtro;
		}

		$sql = "(select tr.idTramite idTramite, tr.numero numeroTramite,
						tt.idTipoTramite idTipoTramite, tt.nombre nombreTipoTramite, tt.codigonombre codigoTipoTramite,
						i.idInstancia idInstancia, i.nombre nombreInstancia,
						ta.idTarea idTarea, ta.nombre nombreTarea,
						p.idPersona idPersona, concat(p.nombre,' ',p.apellido) nombreSolicitante, 
						null idInstitucion, p.nroDoc documento,
						e.idEstado idEstado, e.nombre nombreEstado,
						tit.idTramiteInstanciaTarea id, tit.orden orden, tit.idUsuario idUsuario
				from tramiteinstanciatarea tit
					 join tarea ta on tit.idTarea = ta.idTarea
					 join permiso pe on pe.idTarea = ta.idTarea
					 join tramiteinstancia ti on tit.idTramiteInstancia = ti.idTramiteInstancia
					 join tramite tr on ti.idTramite = tr.idTramite
					 join tipotramite tt on tr.idTipoTramite = tt.idTipoTramite
					 join instancia i on tr.idInstanciaActual = i.idInstancia
					 join persona p on tr.idPersona = p.idPersona
					 join estado e on tit.idEstado = e.idEstado
				$where 
				)union(
				select tr.idTramite idTramite, tr.numero numeroTramite, 
						tt.idTipoTramite idTipoTramite, tt.nombre nombreTipoTramite, tt.codigonombre codigoTipoTramite,
						i.idInstancia idInstancia, i.nombre nombreInstancia, 
						ta.idTarea idTarea, ta.nombre nombreTarea, 
						null idPersona, it.denominacionSocial nombreSolicitante,
						it.idInstitucion idInstitucion, it.cuit documento,
						e.idEstado idEstado, e.nombre nombreEstado,
						tit.idTramiteInstanciaTarea id, tit.orden orden, tit.idUsuario idUsuario
				from tramiteinstanciatarea tit
					 join tarea ta on tit.idTarea = ta.idTarea
					 join permiso pe on pe.idTarea = ta.idTarea
					 join tramiteinstancia ti on tit.idTramiteInstancia = ti.idTramiteInstancia
					 join tramite tr on ti.idTramite = tr.idTramite
					 join tipotramite tt on tr.idTipoTramite = tt.idTipoTramite
					 join instancia i on tr.idInstanciaActual = i.idInstancia
					 join institucion it on tr.idInstitucion = it.idInstitucion
					 join estado e on tit.idEstado = e.idEstado
				$where )
				order by idTipoTramite, idTramite desc, orden";

		return DB::fetchAll($sql, $params);
		
	}

	public function finalizarPendientes(Tramite $tramite){
		$sql = "select tit.* 
				from tramiteinstanciatarea tit 
					join tramiteinstancia ti on tit.idTramiteInstancia = ti.idTramiteInstancia
				where tit.idEstado != :idEstadoFinal 
					and ti.idTramite = :idTramite 
					and ti.idInstancia = :idInstancia";
		$params = array(
					"idEstadoFinal"=>Estado::$TareaFinalizada, 
					"idTramite"=>$tramite->getIdTramite(),
					"idInstancia"=>$tramite->getIdInstanciaActual()
				);
		$tareasPendientes = DB::fetchAllClass($sql, $this->nombreClase, $params);
		foreach ($tareasPendientes as $tarea) {
			$tarea->setIdEstado(Estado::$TareaFinalizada);
			$this->update($tarea);
		}
	}
	public function getForSintesisGlobal($idTramite){
		$sql = "select i.nombre nombreInstancia, t.nombre nombreTarea, e.nombre nombreEstado, u.usuario nombreUsuario, tit.finalizacion finalizacion
				from tramiteinstanciatarea tit
					join tramiteinstancia ti on tit.idTramiteInstancia = ti.idTramiteInstancia
					join tarea t on tit.idTarea = t.idTarea
					join instancia i on ti.idInstancia = i.idInstancia
					join estado e on tit.idEstado = e.idEstado
					left join usuario u on u.idUsuario = tit.idUsuario
				where ti.idTramite = :idTramite;";
		$params = array(
					"idTramite"=>$idTramite,
				);
		return DB::fetchAll($sql, $params);
	}
}