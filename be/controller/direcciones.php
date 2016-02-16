<?php
use Stel\Repository\DireccionRepository;
use Stel\Model\Direccion;

$repo = new DireccionRepository();

$entities = $repo->getAll();

Controller::render("direcciones.php", array("entities"=>$entities));