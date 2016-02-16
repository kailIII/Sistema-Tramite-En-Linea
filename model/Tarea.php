<?php
namespace Stel\Model;


class Tarea extends Entity{
	private $idTarea;
	private $nombre;
	private $idTipoTarea;
	private $idListaItem;

	public function getIdField(){
		return "idTarea";
	}

	public function setIdTarea($id){
		$this->idTarea = $id;
	}

	public function getIdTarea(){
		return $this->idTarea;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

    public function getIdTipoTarea()
    {
        return $this->idTipoTarea;
    }

    public function setIdTipoTarea($idTipoTarea)
    {
        $this->idTipoTarea = $idTipoTarea;

        return $this;
    }

    public function getIdListaItem()
    {
        return $this->idListaItem;
    }

    public function setIdListaItem($idListaItem)
    {
        $this->idListaItem = $idListaItem;

        return $this;
    }

    public function jsonSerialize(){
		return array(
				"idTarea"=>$this->idTarea,
				"nombre"=>$this->nombre,
				"idTipoTarea"=>$this->idTipoTarea,
				"idListaItem"=>$this->idListaItem,
			);
	}
}