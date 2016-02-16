<?php
namespace Stel\Model;


class RelTipoTramiteInstanciaTarea extends Entity{
	private $idRelTramiteInstanciaTarea;
	private $idRelTipoTramiteInstancia;
	private $idTarea;
	private $orden;

    /**
     * Gets the value of idRelTramiteInstanciaTarea.
     *
     * @return mixed
     */
    public function getIdRelTipoTramiteInstanciaTarea()
    {
        return $this->idRelTramiteInstanciaTarea;
    }
    
    /**
     * Sets the value of idRelTramiteInstanciaTarea.
     *
     * @param mixed $idRelTramiteInstanciaTarea the id rel tipo tramite instancia tarea
     *
     * @return self
     */
    public function setIdRelTipoTramiteInstanciaTarea($idRelTramiteInstanciaTarea)
    {
        $this->idRelTramiteInstanciaTarea = $idRelTramiteInstanciaTarea;

        return $this;
    }

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
     * @param mixed $idRelTramiteInstancia the id rel tipo tramite instancia
     *
     * @return self
     */
    public function setIdRelTipoTramiteInstancia($idRelTramiteInstancia)
    {
        $this->idRelTramiteInstancia = $idRelTramiteInstancia;

        return $this;
    }

    /**
     * Gets the value of idTarea.
     *
     * @return mixed
     */
    public function getIdTarea()
    {
        return $this->idTarea;
    }
    
    /**
     * Sets the value of idTarea.
     *
     * @param mixed $idTarea the id tarea
     *
     * @return self
     */
    public function setIdTarea($idTarea)
    {
        $this->idTarea = $idTarea;

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
                "idRelTipoTramiteInstanciaTarea"=>$this->idRelTramiteInstanciaTarea,
                "idRelTipoTramiteInstancia"=>$this->idRelTramiteInstancia,
                "idTarea"=>$this->idTarea,
                "orden"=>$this->orden
            );
    }
}