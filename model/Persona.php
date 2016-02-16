<?php
namespace Stel\Model;


class Persona extends Entity{
	private $idPersona;
	private $nombre;
	private $apellido;
	private $email;
	private $idTipoDocumento;
	private $nroDoc;
	private $cud;
	private $calle;
    private $codPos;
	private $numero;
	private $piso;
	private $dpto;
	private $idLocalidad;
	private $idProvincia;
    private $telcodarea;
	private $telefono;
	private $movil;
	private $obraSocial;
	private $fechaNacimiento;
	private $ocupacion;
	private $domicilioCaba;
	private $hospital;
	private $domicilioHospital;
	private $codPosHospital;
	private $idLocalidadHospital;
	private $idProvinciaHospital;
	private $telCodAreaHospital;
    private $telefonoHospital;
	private $idGestor;

    /**
     * Gets the value of idPersona.
     *
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }
    
    /**
     * Sets the value of idPersona.
     *
     * @param mixed $idPersona the id persona
     *
     * @return self
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Gets the value of apellido.
     *
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }
    
    /**
     * Sets the value of apellido.
     *
     * @param mixed $apellido the apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of idTipoDocumento.
     *
     * @return mixed
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }
    
    /**
     * Sets the value of idTipoDocumento.
     *
     * @param mixed $idTipoDocumento the id tipo documento
     *
     * @return self
     */
    public function setIdTipoDocumento($idTipoDocumento)
    {
        $this->idTipoDocumento = $idTipoDocumento;

        return $this;
    }

    /**
     * Gets the value of nroDoc.
     *
     * @return mixed
     */
    public function getNroDoc()
    {
        return $this->nroDoc;
    }
    
    /**
     * Sets the value of nroDoc.
     *
     * @param mixed $nroDoc the nro doc
     *
     * @return self
     */
    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;

        return $this;
    }

    /**
     * Gets the value of cud.
     *
     * @return mixed
     */
    public function getCud()
    {
        return $this->cud;
    }
    
    /**
     * Sets the value of cud.
     *
     * @param mixed $cud the cud
     *
     * @return self
     */
    public function setCud($cud)
    {
        $this->cud = $cud;

        return $this;
    }

    /**
     * Gets the value of calle.
     *
     * @return mixed
     */
    public function getCalle()
    {
        return $this->calle;
    }
    
    /**
     * Sets the value of calle.
     *
     * @param mixed $calle the calle
     *
     * @return self
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Gets the value of numero.
     *
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }
    
    /**
     * Sets the value of numero.
     *
     * @param mixed $numero the numero
     *
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Gets the value of piso.
     *
     * @return mixed
     */
    public function getPiso()
    {
        return $this->piso;
    }
    
    /**
     * Sets the value of piso.
     *
     * @param mixed $piso the piso
     *
     * @return self
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Gets the value of dpto.
     *
     * @return mixed
     */
    public function getDpto()
    {
        return $this->dpto;
    }
    
    /**
     * Sets the value of dpto.
     *
     * @param mixed $dpto the dpto
     *
     * @return self
     */
    public function setDpto($dpto)
    {
        $this->dpto = $dpto;

        return $this;
    }

    /**
     * Gets the value of idLocalidad.
     *
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->idLocalidad;
    }
    
    /**
     * Sets the value of idLocalidad.
     *
     * @param mixed $idLocalidad the id localidad
     *
     * @return self
     */
    public function setIdLocalidad($idLocalidad)
    {
        $this->idLocalidad = $idLocalidad;

        return $this;
    }

    /**
     * Gets the value of codPos.
     *
     * @return mixed
     */
    public function getCodPos()
    {
        return $this->codPos;
    }
    
    /**
     * Sets the value of codPos.
     *
     * @param mixed $idLocalidad the id localidad
     *
     * @return self
     */
    public function setCodPos($codPos)
    {
        $this->codPos = $codPos;

        return $this;
    }


    /**
     * Gets the value of idProvincia.
     *
     * @return mixed
     */
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }
    
    /**
     * Sets the value of idProvincia.
     *
     * @param mixed $idProvincia the id provincia
     *
     * @return self
     */
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;

        return $this;
    }

    /**
     * Gets the value of telefono area.
     *
     * @return mixed
     */
    public function getTelCodArea()
    {
        return $this->telcodarea;
    }
    
    /**
     * Sets the value of telefono.
     *
     * @param mixed $telefono the telefono area
     *
     * @return self
     */
    public function setTelCodArea($telcodarea)
    {
        $this->telcodarea = $telcodarea;

        return $this;
    }
    /**
     * Gets the value of telefono.
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    /**
     * Sets the value of telefono.
     *
     * @param mixed $telefono the telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Gets the value of movil.
     *
     * @return mixed
     */
    public function getMovil()
    {
        return $this->movil;
    }
    
    /**
     * Sets the value of movil.
     *
     * @param mixed $movil the movil
     *
     * @return self
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Gets the value of obraSocial.
     *
     * @return mixed
     */
    public function getObraSocial()
    {
        return $this->obraSocial;
    }
    
    /**
     * Sets the value of obraSocial.
     *
     * @param mixed $obraSocial the obra social
     *
     * @return self
     */
    public function setObraSocial($obraSocial)
    {
        $this->obraSocial = $obraSocial;

        return $this;
    }

    /**
     * Gets the value of fechaNacimiento.
     *
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    
    /**
     * Sets the value of fechaNacimiento.
     *
     * @param mixed $fechaNacimiento the fecha nacimiento
     *
     * @return self
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Gets the value of ocupacion.
     *
     * @return mixed
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }
    
    /**
     * Sets the value of ocupacion.
     *
     * @param mixed $ocupacion the ocupacion
     *
     * @return self
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Gets the value of domicilioCaba.
     *
     * @return mixed
     */
    public function getDomicilioCaba()
    {
        return $this->domicilioCaba;
    }
    
    /**
     * Sets the value of domicilioCaba.
     *
     * @param mixed $domicilioCaba the domicilio caba
     *
     * @return self
     */
    public function setDomicilioCaba($domicilioCaba)
    {
        $this->domicilioCaba = $domicilioCaba;

        return $this;
    }

    /**
     * Gets the value of hospital.
     *
     * @return mixed
     */
    public function getHospital()
    {
        return $this->hospital;
    }
    
    /**
     * Sets the value of hospital.
     *
     * @param mixed $hospital the hospital
     *
     * @return self
     */
    public function setHospital($hospital)
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Gets the value of domicilioHospital.
     *
     * @return mixed
     */
    public function getDomicilioHospital()
    {
        return $this->domicilioHospital;
    }
    
    /**
     * Sets the value of domicilioHospital.
     *
     * @param mixed $domicilioHospital the domicilio hospital
     *
     * @return self
     */
    public function setDomicilioHospital($domicilioHospital)
    {
        $this->domicilioHospital = $domicilioHospital;

        return $this;
    }

    /**
     * Gets the value of codPosHospital.
     *
     * @return mixed
     */
    public function getCodPosHospital()
    {
        return $this->codPosHospital;
    }
    
    /**
     * Sets the value of codPosHospital.
     *
     * @param mixed $codPosHospital the cod pos hospital
     *
     * @return self
     */
    public function setCodPosHospital($codPosHospital)
    {
        $this->codPosHospital = $codPosHospital;

        return $this;
    }

    /**
     * Gets the value of idLocalidadHospital.
     *
     * @return mixed
     */
    public function getIdLocalidadHospital()
    {
        return $this->idLocalidadHospital;
    }
    
    /**
     * Sets the value of idLocalidadHospital.
     *
     * @param mixed $idLocalidadHospital the id localidad hospital
     *
     * @return self
     */
    public function setIdLocalidadHospital($idLocalidadHospital)
    {
        $this->idLocalidadHospital = $idLocalidadHospital;

        return $this;
    }

    /**
     * Gets the value of idProvinciaHospital.
     *
     * @return mixed
     */
    public function getIdProvinciaHospital()
    {
        return $this->idProvinciaHospital;
    }
    
    /**
     * Sets the value of idProvinciaHospital.
     *
     * @param mixed $idProvinciaHospital the id provincia hospital
     *
     * @return self
     */
    public function setIdProvinciaHospital($idProvinciaHospital)
    {
        $this->idProvinciaHospital = $idProvinciaHospital;

        return $this;
    }


    /**
     * Gets the value of telefonoHospital cod area.
     *
     * @return mixed
     */
    public function getTelCodAreaHospital()
    {
        return $this->telCodAreaHospital;
    }
    
    /**
     * Sets the value of telefonoHospital.
     *
     *
     * @return self
     */
    public function setTelCodAreaHospital($telCodAreaHospital)
    {
        $this->telCodAreaHospital = $telCodAreaHospital;

        return $this;
    }


    /**
     * Gets the value of telefonoHospital.
     *
     * @return mixed
     */
    public function getTelefonoHospital()
    {
        return $this->telefonoHospital;
    }
    
    /**
     * Sets the value of telefonoHospital.
     *
     * @param mixed $telefonoHospital the telefono hospital
     *
     * @return self
     */
    public function setTelefonoHospital($telefonoHospital)
    {
        $this->telefonoHospital = $telefonoHospital;

        return $this;
    }

    /**
     * Gets the value of idGestor.
     *
     * @return mixed
     */
    public function getIdGestor()
    {
        return $this->idGestor;
    }
    
    /**
     * Sets the value of idGestor.
     *
     * @param mixed $idGestor the id gestor
     *
     * @return self
     */
    public function setIdGestor($idGestor)
    {
        $this->idGestor = $idGestor;

        return $this;
    }

    public function jsonSerialize(){
		return array(
				"idPersona"=>$this->idPersona,
				"nombre"=>$this->nombre,
				"apellido"=>$this->apellido,
				"email"=>$this->email,
				"idTipoDocumento"=>$this->idTipoDocumento,
				"nroDoc"=>$this->nroDoc,
				"cud"=>$this->cud,
				"calle"=>$this->calle,
				"numero"=>$this->numero,
				"piso"=>$this->piso,
				"dpto"=>$this->dpto,
				"idLocalidad"=>$this->idLocalidad,
				"idProvincia"=>$this->idProvincia,
				"telcodarea"=>$this->telcodarea,
                "telefono"=>$this->telefono,
				"movil"=>$this->movil,
				"obraSocial"=>$this->obraSocial,
				"fechaNacimiento"=>$this->fechaNacimiento,
				"ocupacion"=>$this->ocupacion,
				"domicilioCaba"=>$this->domicilioCaba,
				"hospital"=>$this->hospital,
				"domicilioHospital"=>$this->domicilioHospital,
				"codPosHospital"=>$this->codPosHospital,
				"idLocalidadHospital"=>$this->idLocalidadHospital,
				"idProvinciaHospital"=>$this->idProvinciaHospital,
				"telCodAreaHospital"=>$this->telCodAreaHospital,
                "telefonoHospital"=>$this->telefonoHospital,
				"idGestor"=>$this->idGestor
			);
	}
}