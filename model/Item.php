<?php
namespace Stel\Model;


class Item extends Entity{
	private $idItem;
	private $nombre;
	private $orden;
    private $obligatorio;
    private $idListaItem;
    
    /**
     * Gets the value of idItem.
     *
     * @return mixed
     */
    public function getIdItem()
    {
        return $this->idItem;
    }
    
    /**
     * Sets the value of idItem.
     *
     * @param mixed $idItem the id item
     *
     * @return self
     */
    public function setIdItem($idItem)
    {
        $this->idItem = $idItem;

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
     * Gets the value of obligatorio.
     *
     * @return mixed
     */
    public function getObligatorio()
    {
        return $this->obligatorio;
    }
    
    /**
     * Sets the value of obligatorio.
     *
     * @param mixed $obligatorio the obligatorio
     *
     * @return self
     */
    public function setObligatorio($obligatorio)
    {
        $this->obligatorio = $obligatorio;

        return $this;
    }

    /**
     * Gets the value of idListaItem.
     *
     * @return mixed
     */
    public function getIdListaItem()
    {
        return $this->idListaItem;
    }
    
    /**
     * Sets the value of idListaItem.
     *
     * @param mixed $idListaItem the id lista item
     *
     * @return self
     */
    public function setIdListaItem($idListaItem)
    {
        $this->idListaItem = $idListaItem;

        return $this;
    }

    public function jsonSerialize(){
        return array(
                "idItem"=>$this->idItem,
                "nombre"=>$this->nombre,
                "orden"=>$this->orden,
                "obligatorio"=>$this->obligatorio,
                "idListaItem"=>$this->idListaItem
            );
    }
}