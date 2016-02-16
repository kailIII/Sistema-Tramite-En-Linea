<?php
use Stel\Repository\UsuarioRepository;
use Stel\Model\Usuario;

$repo = new UsuarioRepository();

$entities = $repo->getAll();
//$entities = array_slice($entities, 1, 1);

Controller::render("usuarios.php", array("entities"=>$entities));