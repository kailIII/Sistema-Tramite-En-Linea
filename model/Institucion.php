<?php
namespace Stel\Model;


class Institucion extends Entity{
	private $idInstitucion;
	private $denominacionSocial;
	private $cuit;
	private $personeriaJuridica;
	private $domicilioLegal;
	private $idLocalidad;
	private $idProvincia;
	private $codPostal;
	private $domicilioCaba;
	private $apellidoRelLegal;
	private $nombreRepLegal;
	private $idTipoDocRepLegal;
	private $numeroDocRepLegal;
	private $telefonoRepLegal;

    /**
     * Gets the value of idInstitucion.
     *
     * @return mixed
     */
    public function getIdInstitucion()
    {
        return $this->idInstitucion;
    }
    
    /**
     * Sets the value of idInstitucion.
     *
     * @param mixed $idInstitucion the id institucion
     *
     * @return self
     */
    public function setIdInstitucion($idInstitucion)
    {
        $this->idInstitucion = $idInstitucion;

        return $this;
    }

    /**
     * Gets the value of denominacionSocial.
     *
     * @return mixed
     */
    public function getDenominacionSocial()
    {
        return $this->denominacionSocial;
    }
    
    /**
     * Sets the value of denominacionSocial.
     *
     * @param mixed $denominacionSocial the denominacion social
     *
     * @return self
     */
    public function setDenominacionSocial($denominacionSocial)
    {
        $this->denominacionSocial = $denominacionSocial;

        return $this;
    }

    /**
     * Gets the value of cuit.
     *
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }
    
    /**
     * Sets the value of cuit.
     *
     * @param mixed $cuit the cuit
     *
     * @return self
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;

        return $this;
    }

    /**
     * Gets the value of personeriaJuridica.
     *
     * @return mixed
     */
    public function getPersoneriaJuridica()
    {
        return $this->personeriaJuridica;
    }
    
    /**
     * Sets the value of personeriaJuridica.
     *
     * @param mixed $personeriaJuridica the personeria juridica
     *
     * @return self
     */
    public function setPersoneriaJuridica($personeriaJuridica)
    {
        $this->personeriaJuridica = $personeriaJuridica;

        return $this;
    }

    /**
     * Gets the value of domicilioLegal.
     *
     * @return mixed
     */
    public function getDomicilioLegal()
    {
        return $this->domicilioLegal;
    }
    
    /**
     * Sets the value of domicilioLegal.
     *
     * @param mixed $domicilioLegal the domicilio legal
     *
     * @return self
     */
    public function setDomicilioLegal($domicilioLegal)
    {
        $this->domicilioLegal = $domicilioLegal;

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
     * Gets the value of codPostal.
     *
     * @return mixed
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }
    
    /**
     * Sets the value of codPostal.
     *
     * @param mixed $codPostal the cod postal
     *
     * @return self
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

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
     * Gets the value of apellidoRelLegal.
     *
     * @return mixed
     */
    public function getApellidoRelLegal()
    {
        return $this->apellidoRelLegal;
    }
    
    /**
     * Sets the value of apellidoRelLegal.
     *
     * @param mixed $apellidoRelLegal the apellido rel legal
     *
     * @return self
     */
    public function setApellidoRelLegal($apellidoRelLegal)
    {
        $this->apellidoRelLegal = $apellidoRelLegal;

        return $this;
    }

    /**
     * Gets the value of nombreRepLegal.
     *
     * @return mixed
     */
    public function getNombreRepLegal()
    {
        return $this->nombreRepLegal;
    }
    
    /**
     * Sets the value of nombreRepLegal.
     *
     * @param mixed $nombreRepLegal the nombre rep legal
     *
     * @return self
     */
    public function setNombreRepLegal($nombreRepLegal)
    {
        $this->nombreRepLegal = $nombreRepLegal;

        return $this;
    }

    /**
     * Gets the value of idTipoDocRepLegal.
     *
     * @return mixed
     */
    public function getIdTipoDocRepLegal()
    {
        return $this->idTipoDocRepLegal;
    }
    
    /**
     * Sets the value of idTipoDocRepLegal.
     *
     * @param mixed $idTipoDocRepLegal the id tipo doc rep legal
     *
     * @return self
     */
    public function setIdTipoDocRepLegal($idTipoDocRepLegal)
    {
        $this->idTipoDocRepLegal = $idTipoDocRepLegal;

        return $this;
    }

    /**
     * Gets the value of numeroDocRepLegal.
     *
     * @return mixed
     */
    public function getNumeroDocRepLegal()
    {
        return $this->numeroDocRepLegal;
    }
    
    /**
     * Sets the value of numeroDocRepLegal.
     *
     * @param mixed $numeroDocRepLegal the numero doc rep legal
     *
     * @return self
     */
    public function setNumeroDocRepLegal($numeroDocRepLegal)
    {
        $this->numeroDocRepLegal = $numeroDocRepLegal;

        return $this;
    }

    /**
     * Gets the value of telefonoRepLegal.
     *
     * @return mixed
     */
    public function getTelefonoRepLegal()
    {
        return $this->telefonoRepLegal;
    }
    
    /**
     * Sets the value of telefonoRepLegal.
     *
     * @param mixed $telefonoRepLegal the telefono rep legal
     *
     * @return self
     */
    public function setTelefonoRepLegal($telefonoRepLegal)
    {
        $this->telefonoRepLegal = $telefonoRepLegal;

        return $this;
    }

	public function jsonSerialize(){
		return array(
				"idInstitucion"=>$this->idInstitucion,
				"denominacionSocial"=>$this->denominacionSocial,
				"cuit"=>$this->cuit,
				"personeriaJuridica"=>$this->personeriaJuridica,
				"domicilioLegal"=>$this->domicilioLegal,
				"idLocalidad"=>$this->idLocalidad,
				"idProvincia"=>$this->idProvincia,
				"codPostal"=>$this->codPostal,
				"domicilioCaba"=>$this->domicilioCaba,
				"apellidoRelLegal"=>$this->apellidoRelLegal,
				"nombreRepLegal"=>$this->nombreRepLegal,
				"idTipoDocRepLegal"=>$this->idTipoDocRepLegal,
				"numeroDocRepLegal"=>$this->numeroDocRepLegal,
				"telefonoRepLegal"=>$this->telefonoRepLegal
			);
	}
}