<?php
use Stel\Model\Usuario;

$user = Usuario::getSessionUser();
if(!$user) Controller::redirect("login");

Controller::render("historial.php");