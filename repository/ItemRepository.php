<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\Item;

class ItemRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "item";
		$this->nombreId = "idItem";
		$this->nombreClase = "Stel\Model\Item";
	}

	public function insert(Item $item){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$item->getNombre(),
						"orden"=>$item->getOrden(),
						"obligatorio"=>$item->getObligatorio(),
						"idListaItem"=>$item->getIdListaItem()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(Item $item){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$item->getIdItem(),
					array(
						"nombre"=>$item->getNombre(),
						"orden"=>$item->getOrden(),
						"obligatorio"=>$item->getObligatorio(),
						"idListaItem"=>$item->getIdListaItem()
						)
					);

		return true;
	}
}