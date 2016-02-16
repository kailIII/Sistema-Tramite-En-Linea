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
else Controller::render("solfa.php");


if($_POST && count($_POST) > 0){

	$repoTramite = new TramiteRepository();
	$repoPersona = new PersonaRepository();

	if($_POST["duplicado"] == "") {
		$p = new Persona();
		$p->setNombre($_POST["nombre"]);
		$p->setApellido($_POST["apellido"]);
		$p->setIdTipoDocumento($_POST["doc"]);
		$p->setNroDoc($_POST["nrodoc"]);
		$p->setFechaNacimiento($_POST["fecnac"]);
		$p->setCalle($_POST["dom"]);
		if (isset($_POST["prov"]) && $_POST["prov"] != "" ){$p->setIdProvincia($_POST["prov"]);}
	 	if (isset($_POST["loc"]) && $_POST["loc"] != "" ){$p->setIdLocalidad($_POST["loc"]);}
	 	$p->setCodPos($_POST["codpost"]);
	 	$p->setTelCodArea($_POST["telarea"]);
	 	$p->setTelefono($_POST["telnro"]);
	 	$p->setEmail($_POST["email"]);
	 	$p->setCud($_POST["cud"]);
	 	$p->setOcupacion($_POST["ocup"]);
	 	$p->setObraSocial($_POST["osoc"]);
	 	$p->setDomicilioCaba($_POST["domcaba"]);

	 	$p->setHospital($_POST["hosp"]);
	 	$p->setDomicilioHospital($_POST["dirH"]);
	 	if (isset($_POST["provH"]) && $_POST["provH"] != "" ){$p->setIdProvinciaHospital($_POST["provH"]);}
	 	if (isset($_POST["locH"]) && $_POST["locH"] != "" ){$p->setIdLocalidadHospital($_POST["locH"]);}
	 	$p->setCodPosHospital($_POST["codpostH"]);
	 	$p->setTelCodAreaHospital($_POST["telareaH"]);
	 	$p->setTelefonoHospital($_POST["telnroH"]);


		$p->setIdPersona($repoPersona->insert($p));

		//echo "Ingresada persona id: ".$p->getIdPersona()."<br>"; die;

		$t = new Tramite();
		$t->setNumero("TR-001");
		$t->setIdEstado(Estado::$TramiteAbierto);
		$t->setIdPersona($p->getIdPersona());
		$t->setFechaInicio(new DateTime());
		$t->setIdTipoTramite(1);

		
		$t->setIdTramite($repoTramite->insert($t));
		echo "<strong> Se ha generado el tramite: ".$t->getIdTramite()."</strong> <br>";

		$repoTramite->cambiarInstancia($t);
		//Controller::redirect("misTareas");
	}
	else
		echo "<strong> Ya existe una Franquicia Automotor para el documento ingresado. </strong> <br>";
}
