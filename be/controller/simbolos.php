<?php
use Stel\Model\Persona;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Model\Usuario;
use Stel\Repository\PersonaRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\InstanciaRepository;

$user = Usuario::getSessionUser();
if(!$user) Controller::redirect("login");

if($user['id'] != 1) Controller::render("error.php", array("errorMessage"=>"No tiene permisos para ver esto."));
else Controller::render("simbolos.php");

if($_POST && count($_POST) > 0){

	if($_POST["duplicado"] == "") {
		$p = new Persona();
		$p->setNombre($_POST["nombre"]);
		$p->setApellido($_POST["apellido"]);
		$p->setIdTipoDocumento($_POST["doc"]);
		$p->setNroDoc($_POST["nrodoc"]);
		
		$repoPersona = new PersonaRepository();
		$p->setIdPersona($repoPersona->insert($p));

		$t = new Tramite();
		$t->setNumero("TR-001");
		$t->setIdEstado(Estado::$TramiteAbierto);
		$t->setFechaInicio(new DateTime());
		$t->setIdPersona($p->getIdPersona());
		$t->setIdTipoTramite(5);

		$repo = new TramiteRepository();
		$t->setIdTramite($repo->insert($t));
		echo "<strong> Se ha generado el tramite: ".$t->getIdTramite()."</strong> <br>";

		$repo->cambiarInstancia($t);
		//Controller::redirect("misTareas");
	}
	else
		echo "<strong> Ya existen Simbolos para el documento ingresado. </strong> <br>";
}
