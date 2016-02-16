<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Persona;

class PersonaRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "persona";
		$this->nombreId = "idPersona";
		$this->nombreClase = "Stel\Model\Persona";
	}

	public function insert(Persona $persona){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$persona->getNombre(),
						"apellido"=>$persona->getApellido(),
						"email"=>$persona->getEmail(),
						"idTipoDocumento"=>$persona->getIdTipoDocumento(),
						"nroDoc"=>$persona->getNroDoc(),
						"cud"=>$persona->getCud(),
						"calle"=>$persona->getCalle(),
						"numero"=>$persona->getNumero(),
						"piso"=>$persona->getPiso(),
						"dpto"=>$persona->getDpto(),
						"idLocalidad"=>$persona->getIdLocalidad(),
						"codPos"=>$persona->getCodPos(),
						"idProvincia"=>$persona->getIdProvincia(),
						"telcodarea"=>$persona->getTelCodArea(),
						"telefono"=>$persona->getTelefono(),
						"movil"=>$persona->getMovil(),
						"obraSocial"=>$persona->getObraSocial(),
						"fechaNacimiento"=>$persona->getFechaNacimiento(),
						"ocupacion"=>$persona->getOcupacion(),
						"domicilioCaba"=>$persona->getDomicilioCaba(),
						"hospital"=>$persona->getHospital(),
						"domicilioHospital"=>$persona->getDomicilioHospital(),
						"codPosHospital"=>$persona->getCodPosHospital(),
						"idLocalidadHospital"=>$persona->getIdLocalidadHospital(),
						"idProvinciaHospital"=>$persona->getIdProvinciaHospital(),
						"telcodareahosp"=>$persona->getTelCodAreaHospital(),
						"telefonoHospital"=>$persona->getTelefonoHospital(),
						"idGestor"=>$persona->getIdGestor()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Persona $persona){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$persona->getIdPersona(),
					array(
						"nombre"=>$persona->getNombre(),
						"apellido"=>$persona->getApellido(),
						"email"=>$persona->getEmail(),
						"idTipoDocumento"=>$persona->getIdTipoDocumento(),
						"nroDoc"=>$persona->getNroDoc(),
						"cud"=>$persona->getCud(),
						"calle"=>$persona->getCalle(),
						"numero"=>$persona->getNumero(),
						"piso"=>$persona->getPiso(),
						"dpto"=>$persona->getDpto(),
						"idLocalidad"=>$persona->getIdLocalidad(),
						"codPos"=>$persona->getCodPos(),
						"idProvincia"=>$persona->getIdProvincia(),
						"telcodarea"=>$persona->getTelCodArea(),
						"telefono"=>$persona->getTelefono(),
						"movil"=>$persona->getMovil(),
						"obraSocial"=>$persona->getObraSocial(),
						"fechaNacimiento"=>$persona->getFechaNacimiento(),
						"ocupacion"=>$persona->getOcupacion(),
						"domicilioCaba"=>$persona->getDomicilioCaba(),
						"hospital"=>$persona->getHospital(),
						"domicilioHospital"=>$persona->getDomicilioHospital(),
						"codPosHospital"=>$persona->getCodPosHospital(),
						"idLocalidadHospital"=>$persona->getIdLocalidadHospital(),
						"idProvinciaHospital"=>$persona->getIdProvinciaHospital(),
						"telcodareahosp"=>$persona->getTelCodAreaHospital(),
						"telefonoHospital"=>$persona->getTelefonoHospital(),
						"idGestor"=>$persona->getIdGestor()
						)
					);

		return true;
	}
}