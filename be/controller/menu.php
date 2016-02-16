<?php
use Stel\Model\Usuario;

$user = Usuario::getSessionUser();

if($user['id'] != 1) Controller::render("menu.php");
else Controller::render("menuAdmin.php");