<?php
use Stel\Repository\ItemRepository;
use Stel\Model\Item;

$repo = new ItemRepository();

$items = $repo->getAll();

$result = array_map(
			function($element){ 
				return array(
							"nombre"=>$element->getNombre(),
							"orden"=>$element->getOrden(),
							"obligatorio"=>$element->getObligatorio(),
							"idListaItem"=>$element->getIdListaItem()
						);
			},
			$items
		);
//var_dump($result);die;
Controller::renderJson("OK", $result);