<?php
namespace Stel\Model;


class Observacion extends Entity{
	private $idObservacion;
	private $idTramiteInstanciaTarea;
	private $observacion;

	

    /**
     * Gets the value of idObservacion.
     *
     * @return mixed
     */
    public function getIdObservacion()
    {
        return $this->idObservacion;
    }
    
    /**
     * Sets the value of idObservacion.
     *
     * @param mixed $idObservacion the id observacion
     *
     * @return self
     */
    public function setIdObservacion($idObservacion)
    {
        $this->idObservacion = $idObservacion;

        return $this;
    }

    /**
     * Gets the value of idTramiteInstanciaTarea.
     *
     * @return mixed
     */
    public function getIdTramiteInstanciaTarea()
    {
        return $this->idTramiteInstanciaTarea;
    }
    
    /**
     * Sets the value of idTramiteInstanciaTarea.
     *
     * @param mixed $idTramiteInstanciaTarea the id tramite instancia tarea
     *
     * @return self
     */
    public function setIdTramiteInstanciaTarea($idTramiteInstanciaTarea)
    {
        $this->idTramiteInstanciaTarea = $idTramiteInstanciaTarea;

        return $this;
    }

    /**
     * Gets the value of observacion.
     *
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
    
    /**
     * Sets the value of observacion.
     *
     * @param mixed $observacion the observacion
     *
     * @return self
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

	public function jsonSerialize(){
		return array(
				"idObservacion"=>$this->idObservacion,
				"idTramiteInstanciaTarea"=>$this->idTramiteInstanciaTarea,
				"observacion"=>$this->observacion
			);
	}
}