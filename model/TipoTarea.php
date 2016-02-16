<?php
namespace Stel\Model;


class TipoTarea extends Entity{
	private $idTipoTarea;
	private $nombre;

	public function getIdField(){
		return "idTipoTarea";
	}

	public function setIdTipoTarea($id){
		$this->idTipoTarea = $id;
	}

	public function getIdTipoTarea(){
		return $this->idTipoTarea;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function jsonSerialize(){
		return array(
				"idTipoTarea"=>$this->idTipoTarea,
				"nombre"=>$this->nombre
			);
	}
}