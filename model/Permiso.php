<?php
namespace Stel\Model;


class Permiso extends Entity{
	private $idPermiso;
	private $idUsuario;
    private $usuario;
	private $idTarea;
    private $tarea;

    /**
     * Gets the value of idPermiso.
     *
     * @return mixed
     */
    public function getIdPermiso()
    {
        return $this->idPermiso;
    }
    
    /**
     * Sets the value of idPermiso.
     *
     * @param mixed $idPermiso the id permiso
     *
     * @return self
     */
    public function setIdPermiso($idPermiso)
    {
        $this->idPermiso = $idPermiso;

        return $this;
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
     * Gets the value of idUsuario.
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    /**
     * Sets the value of idUsuario.
     *
     * @param mixed $idUsuario the id usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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
     * Gets the value of idTarea.
     *
     * @return mixed
     */
    public function getTarea()
    {
        return $this->tarea;
    }
    
    /**
     * Sets the value of idTarea.
     *
     * @param mixed $idTarea the id tarea
     *
     * @return self
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;

        return $this;
    }

	public function jsonSerialize(){
		return array(
				"idPermiso"=>$this->idPermiso,
				"idUsuario"=>$this->idUsuario,
				"idTarea"=>$this->idTarea,
                "usuario"=>$this->usuario->getUsuario(),
                "tarea"=>$this->tarea->getNombre(),
			);
	}
}