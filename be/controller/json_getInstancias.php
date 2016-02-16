<?php
use Stel\Repository\TipoTramiteRepository;
use Stel\Repository\InstanciaRepository;
use Stel\Repository\RelTipoTramiteInstanciaRepository;
use Stel\Model\TipoTramite;
use Stel\Model\Instancia;
use Stel\Model\RelTipoTramiteInstancia;

$repo = new InstanciaRepository();
$instancias = array();
if(isset($_GET['tipotramite'])){
	$idTipoTramite = (int)$_GET['tipotramite'];

	$repoRel = new RelTipoTramiteInstanciaRepository();
	$relTipoInstancia = $repoRel->getByTipoTramite($idTipoTramite);

	//var_dump($relTipoInstancia);die;

	$instancias = array();
	if($relTipoInstancia){
		foreach ($relTipoInstancia as $rel) {
			$instancias[] = $repo->getOne($rel->getIdInstancia());
		}
	}else{ Controller::renderJson("ERROR"); }
		
}else{
	$instancias = $repo->getAll();
}

if(isset($_GET['forSelect'])){
	$instancias = array_map(
			function($element){ 
				return array(
							"value" => $element->getIdInstancia(),
							"text" => $element->getNombre()
						);
			},
			$instancias
		);
}
Controller::renderJson("OK", $instancias);