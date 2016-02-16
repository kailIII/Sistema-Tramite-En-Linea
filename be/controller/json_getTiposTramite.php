<?php
use Stel\Repository\TipoTramiteRepository;
use Stel\Model\TipoTramite;

$repo = new TipoTramiteRepository();

$tipos = $repo->getAll();

$result = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdTipoTramite(),
							"text" => $element->getCodigoNombre()
						);
			},
			$tipos
		);
//var_dump($result);die;
Controller::renderJson("OK", $result);