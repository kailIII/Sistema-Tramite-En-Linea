<?php
use Stel\Repository\DireccionRepository;
use Stel\Model\Direccion;

$repo = new DireccionRepository();

$tipos = $repo->getAll();

$result = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdDireccion(),
							"text" => $element->getNombre()
						);
			},
			$tipos
		);
//var_dump($result);die;
Controller::renderJson("OK", $result);