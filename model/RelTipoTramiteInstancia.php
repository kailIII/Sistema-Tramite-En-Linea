<?php
namespace Stel\Model;


class RelTipoTramiteInstancia extends Entity{
	private $idRelTramiteInstancia;
	private $idTipoTramite;
	private $idInstancia;
	private $orden;

    /**
     * Gets the value of idRelTramiteInstancia.
     *
     * @return mixed
     */
    public function getIdRelTipoTramiteInstancia()
    {
        return $this->idRelTramiteInstancia;
    }
    
    /**
     * Sets the value of idRelTramiteInstancia.
     *
     * @param mixed $idRelTramiteInstancia the id tipo tramite instancia
     *
     * @return self
     */
    public function setIdRelTipoTramiteInstancia($idRelTramiteInstancia)
    {
        $this->idRelTramiteInstancia = $idRelTramiteInstancia;

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
     * Gets the value of idInstancia.
     *
     * @return mixed
     */
    public function getIdInstancia()
    {
        return $this->idInstancia;
    }
    
    /**
     * Sets the value of idInstancia.
     *
     * @param mixed $idInstancia the id instancia
     *
     * @return self
     */
    public function setIdInstancia($idInstancia)
    {
        $this->idInstancia = $idInstancia;

        return $this;
    }

    /**
     * Gets the value of orden.
     *
     * @return mixed
     */
    public function getOrden()
    {
        return $this->orden;
    }
    
    /**
     * Sets the value of orden.
     *
     * @param mixed $orden the orden
     *
     * @return self
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

	public function jsonSerialize(){
		return array(
				"idRelTipoTramiteInstancia"=>$this->idRelTramiteInstancia,
				"idTipoTramite"=>$this->idTipoTramite,
				"idInstancia"=>$this->idInstancia,
				"orden"=>$this->orden
			);
	}
}