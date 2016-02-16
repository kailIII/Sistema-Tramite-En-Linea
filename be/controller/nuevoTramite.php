<?php
use Stel\Model\Persona;
use Stel\Model\Tramite;
use Stel\Model\Estado;
use Stel\Repository\PersonaRepository;
use Stel\Repository\TramiteRepository;
use Stel\Repository\InstanciaRepository;


$p = new Persona();
$p->setNombre("Daniel");
$p->setApellido("Mazzitelli");
$p->setEmail("usr@snr.gov.ar");
$p->setIdTipoDocumento(1);
$p->setNroDoc(45678921);
$p->setCalle("Dragones");
$p->setNumero(123);
$p->setIdLocalidad(1);
$p->setIdProvincia(1);
$p->setFechaNacimiento(new DateTime());

$repoPersona = new PersonaRepository();
$p->setIdPersona($repoPersona->insert($p));

echo "Ingresada persona id: ".$p->getIdPersona()."<br>";

$t = new Tramite();
$t->setNumero("TR-003");
$t->setIdEstado(Estado::$TramiteAbierto);
$t->setIdPersona($p->getIdPersona());
$t->setFechaInicio(new DateTime());
$t->setIdTipoTramite(2);


$repo = new TramiteRepository();
$t->setIdTramite($repo->insert($t));
echo "Ingresado tramite id: ".$t->getIdTramite()."<br>";

$repo->cambiarInstancia($t);


//cambio de intancia solo
/*$repo = new TramiteRepository();
$t = $repo->getOne(4);
$repo->cambiarInstancia($t);*/