<?php
namespace Stel\Model;


class TramiteInstancia extends Entity{
	private $idTramiteInstancia;
	private $idTramite;
	private $idInstancia;

    /**
     * Gets the value of idTramiteInstancia.
     *
     * @return mixed
     */
    public function getIdTramiteInstancia()
    {
        return $this->idTramiteInstancia;
    }
    
    /**
     * Sets the value of idTramiteInstancia.
     *
     * @param mixed $idTramiteInstancia the id tramite instancia
     *
     * @return self
     */
    public function setIdTramiteInstancia($idTramiteInstancia)
    {
        $this->idTramiteInstancia = $idTramiteInstancia;

        return $this;
    }

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

    public function jsonSerialize(){
        return array(
            "idTramiteInstancia"=>$this->idTramiteInstancia,
            "idTramite"=>$this->idTramite,
            "idInstancia"=>$this->idInstancia,
        );
    }
}