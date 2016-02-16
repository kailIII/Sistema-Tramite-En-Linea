<?php
use Stel\Model\Institucion;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Model\Usuario;
use Stel\Repository\InstitucionRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\InstanciaRepository;

$user = Usuario::getSessionUser();
if(!$user) Controller::redirect("login");

if($user['id'] != 1) Controller::render("error.php", array("errorMessage"=>"No tiene permisos para ver esto."));
else Controller::render("solfainst.php");


if($_POST && count($_POST) > 0){

	if($_POST["duplicado"] == "") {
		$p = new Institucion();
		//var_dump(method_exists($p,'getDenominacionSocial'));die;
		$p->setDenominacionSocial($_POST["densoc"]);
		$p->setCuit($_POST["cuit"]);
		
		$repoInstitucion = new InstitucionRepository();
		$p->setIdInstitucion($repoInstitucion->insert($p));
		//echo "Ingresada persona id: ".$p->getIdPersona()."<br>"; die;

		$t = new Tramite();
		$t->setNumero("TR-002");
		$t->setIdEstado(Estado::$TramiteAbierto);
		$t->setIdInstitucion($p->getIdInstitucion());
		$t->setFechaInicio(new DateTime());
		$t->setIdTipoTramite(2);

		$repo = new TramiteRepository();
		$t->setIdTramite($repo->insert($t));
		echo "<strong> Se ha generado el tramite: ".$t->getIdTramite()."</strong> <br>";

		$repo->cambiarInstancia($t);
		//Controller::redirect("misTareas");
	}
	else
		echo "<strong> Ya existe Una Franquicia Automotor para el cuit ingresado. </strong> <br>";
}
