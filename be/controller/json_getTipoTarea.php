<?php
use Stel\Repository\TipoTareaRepository;
use Stel\Model\TipoTarea;

$repo = new TipoTareaRepository();

$tipos = $repo->getAll();

$result = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdTipoTarea(),
							"text" => $element->getNombre()
						);
			},
			$tipos
		);
//var_dump($result);die;
Controller::renderJson("OK", $result);