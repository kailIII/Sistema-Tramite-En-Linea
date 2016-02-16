<?php
namespace Stel\Model;


class Estado extends Entity{
	private $idEstado;
	private $nombre;
	private $owner;

    public static $TramiteAbierto = 1;
    public static $TramiteVencido = 2;
    public static $TramiteCerrado = 3;
    public static $TareaAbierta = 4;
    public static $TareaEncurso = 5;
    public static $TareaFinalizada = 6;


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
     * Gets the value of owner.
     *
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }
    
    /**
     * Sets the value of owner.
     *
     * @param mixed $owner the owner
     *
     * @return self
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    public function jsonSerialize(){
        return array(
                "idEstado"=>$this->idEstado,
                "nombre"=>$this->nombre,
                "owner"=>$this->owner
            );
    }
}