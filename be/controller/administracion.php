<?php
use Stel\Model\Usuario;

$user = Usuario::getSessionUser();
if(!$user) Controller::redirect("login");

if($user['id'] != 1) Controller::render("error.php", array("errorMessage"=>"No tiene permisos para ver esto."));
else Controller::render("administracion.php");