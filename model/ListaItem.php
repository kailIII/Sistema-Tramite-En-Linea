<?php
namespace Stel\Model;


class ListaItem extends Entity{
	private $idListaItem;
	private $nombre;

	public function getIdField(){
		return "idListaItem";
	}

	public function setIdListaItem($id){
		$this->idListaItem = $id;
	}

	public function getIdListaItem(){
		return $this->idListaItem;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function jsonSerialize(){
		return array(
				"idListaItem"=>$this->idListaItem,
				"nombre"=>$this->nombre
			);
	}
}