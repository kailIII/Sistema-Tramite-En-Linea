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
else Controller::render("solfachoferes.php");



/* $p = new Persona();
$p->setNombre("Mariano");
$p->setApellido("Magallon");
$p->setEmail("usr@snr.gov.ar");
$p->setIdTipoDocumento(1);
$p->setNroDoc(12345689);
$p->setCalle("Dragones");
$p->setNumero(456);
$p->setIdLocalidad(1);
$p->setIdProvincia(1);
$p->setFechaNacimiento(new DateTime());

$repoPersona = new PersonaRepository();
$p->setIdPersona($repoPersona->insert($p));

echo "Ingresada persona id: ".$p->getIdPersona()."<br>";

$t = new Tramite();
$t->setNumero("TR-001");
$t->setIdEstado(Estado::$TramiteAbierto);
$t->setIdPersona($p->getIdPersona());
$t->setFechaInicio(new DateTime());
$t->setIdTipoTramite(1);

$repo = new TramiteRepository();
$t->setIdTramite($repo->insert($t));
echo "Ingresado tramite id: ".$t->getIdTramite()."<br>";

$repo->cambiarInstancia($t); */

