<?php
namespace Stel\Repository;

use Stel\Lib\DB;

class EntidadRepository{
	protected $nombreTabla;
	protected $nombreId;
	protected $nombreClase;

	public function getAll(){
		if(!$this->nombreTabla){
			throw new Exception("No se encontro Entity::nombreTabla", 1);
		}
		return DB::fetchAllClass("select * from ".$this->nombreTabla, $this->nombreClase);
	}

	public function getAllOrderBy($orderBy){
		if(!$this->nombreTabla){
			throw new Exception("No se encontro Entity::nombreTabla", 1);
		}
		return DB::fetchAllClass("select * from ".$this->nombreTabla." order by ".$orderBy, $this->nombreClase);
	}

	public function getOne($id){
		if(!$this->nombreTabla){
			throw new Exception("No se encontro Entity::nombreTabla", 1);
		}
		if(!$this->nombreId){
			throw new Exception("No se encontro Entity::nombreId", 1);
		}

		//die($this->nombreClase);
		return DB::fetchOneClass("select * from ".$this->nombreTabla." where ".$this->nombreId." = :id ", $this->nombreClase, array(":id"=>$id));
	}

	public function delete($id){
		return DB::delete($this->nombreTabla, $this->nombreId, $id);
	}

}