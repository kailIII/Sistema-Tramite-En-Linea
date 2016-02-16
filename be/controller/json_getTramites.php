<?php
use Stel\Repository\TramiteRepository;
use Stel\Model\Tramite;

$repo = new TramiteRepository();
$tramites = array();

function cmp($a, $b)
{
    return strcmp($a["value"], $b["value"]);
}

if(isset($_GET['filtro'])){

	$tramites = $repo->getByFiltro($_GET['filtro']);

}else{
	if(isset($_GET['tipotramite']) || isset($_GET['instancia'])){
		$idTipoTramite = (int)(isset($_GET['tipotramite'])?$_GET['tipotramite']:0);
		$idInstancia = (int)(isset($_GET['instancia'])?$_GET['instancia']:0);

		if($idTipoTramite){
			if($idInstancia){
				$tramites = $repo->getByTipoTramiteYInstancia($idTipoTramite ,$idInstancia);
			}else{
				$tramites = $repo->getByTipoTramite($idTipoTramite);
			}
		}else{
			if($idInstancia){
				$tramites = $repo->getByInstancia($idInstancia);
			}
		}			
	}else{
		$tramites = $repo->getAll();
	}
}

if(isset($_GET['forSelect'])){
	$tramites = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdTramite(),
							"text" => $element->getIdTramite()
						);
			},
			$tramites
		);
	usort($tramites, "cmp");

}
Controller::renderJson("OK", $tramites);