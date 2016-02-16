<?php
namespace Stel\Model;


class Direccion extends Entity{
	private $idDireccion;
	private $nombre;

	public function getIdField(){
		return "idDireccion";
	}

	public function setIdDireccion($id){
		$this->idDireccion = $id;
	}

	public function getIdDireccion(){
		return $this->idDireccion;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function jsonSerialize(){
		return array(
				"idDireccion"=>$this->idDireccion,
				"nombre"=>$this->nombre
			);
	}
}