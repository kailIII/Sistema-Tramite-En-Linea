<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Institucion;


class InstitucionRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "institucion";
		$this->nombreId = "idInstitucion";
		$this->nombreClase = "Stel\Model\Institucion";
	}

	public function insert(Institucion $institucion){
		$id = DB::insert($this->nombreTabla, 
					array(
						"denominacionSocial"=>$institucion->getDenominacionSocial(),
						"cuit"=>$institucion->getCuit(),
						"personeriaJuridica"=>$institucion->getPersoneriaJuridica(),
						"domicilioLegal"=>$institucion->getDomicilioLegal(),
						"idLocalidad"=>$institucion->getIdLocalidad(),
						"idProvincia"=>$institucion->getIdProvincia(),
						"codPostal"=>$institucion->getCodPostal(),
						"domicilioCaba"=>$institucion->getDomicilioCaba(),
						"apellidoRelLegal"=>$institucion->getApellidoRelLegal(),
						"nombreRepLegal"=>$institucion->getNombreRepLegal(),
						"idTipoDocRepLegal"=>$institucion->getIdTipoDocRepLegal(),
						"numeroDocRepLegal"=>$institucion->getNumeroDocRepLegal(),
						"telefonoRepLegal"=>$institucion->getTelefonoRepLegal()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Institucion $institucion){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$institucion->getIdInstitucion(),
					array(
						"denominacionSocial"=>$this->getDenominacionSocial(),
						"cuit"=>$this->getCuit(),
						"personeriaJuridica"=>$this->getPersoneriaJuridica(),
						"domicilioLegal"=>$this->getDomicilioLegal(),
						"idLocalidad"=>$this->getIdLocalidad(),
						"idProvincia"=>$this->getIdProvincia(),
						"codPostal"=>$this->getCodPostal(),
						"domicilioCaba"=>$this->getDomicilioCaba(),
						"apellidoRelLegal"=>$this->getApellidoRelLegal(),
						"nombreRepLegal"=>$this->getNombreRepLegal(),
						"idTipoDocRepLegal"=>$this->getIdTipoDocRepLegal(),
						"numeroDocRepLegal"=>$this->getNumeroDocRepLegal(),
						"telefonoRepLegal"=>$this->getTelefonoRepLegal()
						)
					);

		return true;
	}
}