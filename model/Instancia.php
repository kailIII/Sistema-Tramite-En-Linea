<?php
namespace Stel\Model;


class Instancia extends Entity{
	private $idInstancia;
	private $nombre;

	public function getIdField(){
		return "idInstancia";
	}

	public function setIdInstancia($id){
		$this->iInstancia = $id;
	}

	public function getIdInstancia(){
		return $this->idInstancia;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function jsonSerialize(){
		return array(
				"idInstancia"=>$this->idInstancia,
				"nombre"=>$this->nombre
			);
	}
}