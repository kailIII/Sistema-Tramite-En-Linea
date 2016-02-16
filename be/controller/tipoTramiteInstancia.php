<?php
use Stel\Repository\RelTipoTramiteInstanciaRepository;
use Stel\Model\RelTipoTramiteInstancia;

$repo = new RelTipoTramiteInstanciaRepository();

$entities = $repo->getAll();

Controller::render("tipoTramiteInstancia.php", array("entities"=>$entities));