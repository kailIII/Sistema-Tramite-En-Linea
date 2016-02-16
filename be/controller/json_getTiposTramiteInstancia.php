<?php
use Stel\Repository\RelTipoTramiteInstanciaRepository;
use Stel\Repository\TipoTramiteRepository;
use Stel\Repository\InstanciaRepository;
use Stel\Model\RelTipoTramiteInstancia;
use Stel\Model\Usuario;

$repo = new RelTipoTramiteInstanciaRepository();
$tis = array();

$tis = $repo->getAll();

//tipos de tramite
$repoTT = new TipoTramiteRepository();
$tiposTramite = $repoTT->getAll();

//instancias
$repoI = new InstanciaRepository();
$instancias = $repoI->getAll();


if(isset($_GET['forSelect'])){

	foreach ($tis as $ti) {
		$text = "";
		//busco el tipo de tramite
		foreach ($tiposTramite as $tipoTramite) {
			if($tipoTramite->getIdTipoTramite() == $ti->getIdTipoTramite())
				$text .= $tipoTramite->getCodigoNombre();
		}
		foreach ($instancias as $instancia) {
			if($instancia->getIdInstancia() == $ti->getIdInstancia())
				$text .= " - ". $instancia->getNombre();
		}
		$return[]=array("value"=>$ti->getIdRelTipoTramiteInstancia(), "text"=>$text);
	}
	$tis = $return;
}
Controller::renderJson("OK", $tis);