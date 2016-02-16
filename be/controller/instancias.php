<?php
use Stel\Repository\InstanciaRepository;
use Stel\Model\Instancia;

$repo = new InstanciaRepository();

$entities = $repo->getAll();

Controller::render("instancias.php", array("entities"=>$entities));