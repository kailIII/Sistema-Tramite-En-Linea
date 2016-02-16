<?php
namespace Stel\Repository;

use Stel\Lib\DB;
use Stel\Model\ListaItem;

class ListaItemRepository extends EntidadRepository{
	
	public function __construct(){
		$this->nombreTabla = "listaitem";
		$this->nombreId = "idListaItem";
		$this->nombreClase = "Stel\Model\ListaItem";
	}

	public function insert(ListaItem $lista){
		$id = DB::insert($this->nombreTabla, 
					array(
						"nombre"=>$lista->getNombre()
					), 
					$this->nombreId);
		return $id;
	}

	public function update(ListaItem $lista){
		DB::update($this->nombreTabla,
					$this->nombreId,
					$lista->getIdListaItem(),
					array(
						"nombre"=>$lista->getNombre()
						)
					);

		return true;
	}
}