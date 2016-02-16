<?php
use Stel\Repository\TramiteRepository;
use Stel\Repository\TramiteInstanciaTareaRepository;
use Stel\Repository\PersonaRepository;
use Stel\Repository\InstitucionRepository;
use Stel\Model\Usuario;
use Stel\Model\Tramite;

$user = Usuario::getSessionUser();
if(!$user) Controller::redirect("login");

if(!isset($_GET["idTramite"])){
	Controller::render("error.php", array("errorMessage"=>"No se encuentra el tramite solicitado."));die;
}
$idTramite = $_GET["idTramite"];

$repo = new TramiteRepository();
$repoTarea = new TramiteInstanciaTareaRepository();
$repoPersona = new PersonaRepository();
$repoInstitucion = new InstitucionRepository();

$tramite = $repo->getOne($idTramite);
if($tramite->getIdPersona()){
	$persona = $repoPersona->getOne($tramite->getIdPersona());	
}else{
	$institucion = $repoInstitucion->getOne($tramite->getIdInstitucion());	
}
$tareas = $repoTarea->getForSintesisGlobal($idTramite);
if(isset($persona)){
	Controller::render("sintesisGlobal.php", array("tramite"=>$tramite, "tareas"=>$tareas, "persona"=>$persona));
}else{
	Controller::render("sintesisGlobal.php", array("tramite"=>$tramite, "tareas"=>$tareas, "institucion"=>$institucion));
}