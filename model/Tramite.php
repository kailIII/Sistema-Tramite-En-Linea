<?php
namespace Stel\Model;


class Tramite extends Entity{
	private $idTramite;
	private $idTipoTramite;
	private $numero;
	private $idEstado;
	private $idInstanciaActual;
	private $expediente;
	private $idPersona;
	private $idInstitucion;
	private $idVehiculo;
	private $fechainicio;
	private $fechavalidez;
	private $fechafin;
	private $diasproroga;


    /**
     * Gets the value of idTramite.
     *
     * @return mixed
     */
    public function getIdTramite()
    {
        return $this->idTramite;
    }
    
    /**
     * Sets the value of idTramite.
     *
     * @param mixed $idTramite the id tramite
     *
     * @return self
     */
    public function setIdTramite($idTramite)
    {
        $this->idTramite = $idTramite;

        return $this;
    }

    /**
     * Gets the value of idTipoTramite.
     *
     * @return mixed
     */
    public function getIdTipoTramite()
    {
        return $this->idTipoTramite;
    }
    
    /**
     * Sets the value of idTipoTramite.
     *
     * @param mixed $idTipoTramite the id tipo tramite
     *
     * @return self
     */
    public function setIdTipoTramite($idTipoTramite)
    {
        $this->idTipoTramite = $idTipoTramite;

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
     * Gets the value of idEstado.
     *
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }
    
    /**
     * Sets the value of idEstado.
     *
     * @param mixed $idEstado the id estado
     *
     * @return self
     */
    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Gets the value of idInstanciaActual.
     *
     * @return mixed
     */
    public function getIdInstanciaActual()
    {
        return $this->idInstanciaActual;
    }
    
    /**
     * Sets the value of idInstanciaActual.
     *
     * @param mixed $idInstanciaActual the id instancia actual
     *
     * @return self
     */
    public function setIdInstanciaActual($idInstanciaActual)
    {
        $this->idInstanciaActual = $idInstanciaActual;

        return $this;
    }

    /**
     * Gets the value of expediente.
     *
     * @return mixed
     */
    public function getExpediente()
    {
        return $this->expediente;
    }
    
    /**
     * Sets the value of expediente.
     *
     * @param mixed $expediente the expediente
     *
     * @return self
     */
    public function setExpediente($expediente)
    {
        $this->expediente = $expediente;

        return $this;
    }

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
     * Gets the value of idVehiculo.
     *
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }
    
    /**
     * Sets the value of idVehiculo.
     *
     * @param mixed $idVehiculo the id vehiculo
     *
     * @return self
     */
    public function setIdVehiculo($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;

        return $this;
    }

    /**
     * Gets the value of fechainicio.
     *
     * @return mixed
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }
    
    /**
     * Sets the value of fechainicio.
     *
     * @param mixed $fechainicio the fechainicio
     *
     * @return self
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    /**
     * Gets the value of fechavalidez.
     *
     * @return mixed
     */
    public function getFechavalidez()
    {
        return $this->fechavalidez;
    }
    
    /**
     * Sets the value of fechavalidez.
     *
     * @param mixed $fechavalidez the fechavalidez
     *
     * @return self
     */
    public function setFechavalidez($fechavalidez)
    {
        $this->fechavalidez = $fechavalidez;

        return $this;
    }

    /**
     * Gets the value of fechafin.
     *
     * @return mixed
     */
    public function getFechafin()
    {
        return $this->fechafin;
    }
    
    /**
     * Sets the value of fechafin.
     *
     * @param mixed $fechafin the fechafin
     *
     * @return self
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    /**
     * Gets the value of diasproroga.
     *
     * @return mixed
     */
    public function getDiasproroga()
    {
        return $this->diasproroga;
    }
    
    /**
     * Sets the value of diasproroga.
     *
     * @param mixed $diasproroga the diasproroga
     *
     * @return self
     */
    public function setDiasproroga($diasproroga)
    {
        $this->diasproroga = $diasproroga;

        return $this;
    }


	public function jsonSerialize(){
		return array(
			"idTramite"=>$this->idTramite,
			"idTipoTramite"=>$this->idTipoTramite,
			"numero"=>$this->numero,
			"idEstado"=>$this->idEstado,
			"idInstanciaActual"=>$this->idInstanciaActual,
			"expediente"=>$this->expediente,
			"idPersona"=>$this->idPersona,
			"idInstitucion"=>$this->idInstitucion,
			"idVehiculo"=>$this->idVehiculo,
			"fechainicio"=>$this->fechainicio,
			"fechavalidez"=>$this->fechavalidez,
			"fechafin"=>$this->fechafin,
			"diasproroga"=>$this->diasproroga
			);
	}
}