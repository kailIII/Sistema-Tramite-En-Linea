<?php
namespace Stel\Model;


class TramiteInstanciaTarea extends Entity{
	private $idTramiteInstanciaTarea;
    private $idTramiteInstancia;
	private $idTarea;
    private $orden;
    private $idEstado;
    private $idUsuario;
    private $finalizacion;

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

    
    public function jsonSerialize(){
        return array(
                "idTramiteInstanciaTarea"=>$this->idTramiteInstanciaTarea,
                "idTramiteInstancia"=>$this->idTramiteInstancia,
                "idTarea"=>$this->idTarea,
                "orden"=>$this->orden,
                "idEstado"=>$this->idEstado
            );
    }

    /**
     * Gets the value of idUsuario.
     *
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    /**
     * Sets the value of idUsuario.
     *
     * @param mixed $idUsuario the id usuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Gets the value of finalizacion.
     *
     * @return mixed
     */
    public function getFinalizacion()
    {
        return $this->finalizacion;
    }
    
    /**
     * Sets the value of finalizacion.
     *
     * @param mixed $finalizacion the finalizacion
     *
     * @return self
     */
    public function setFinalizado($finalizacion)
    {
        $this->finalizacion = $finalizacion;

        return $this;
    }
}