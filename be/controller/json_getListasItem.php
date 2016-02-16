<?php
use Stel\Repository\ListaItemRepository;
use Stel\Model\ListaItem;

$repo = new ListaitemRepository();

$tipos = $repo->getAll();

$result = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdListaItem(),
							"text" => $element->getNombre()
						);
			},
			$tipos
		);
//var_dump($result);die;
Controller::renderJson("OK", $result);