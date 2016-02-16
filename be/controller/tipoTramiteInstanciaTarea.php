<?php
use Stel\Repository\RelTipoTramiteInstanciaTareaRepository;
use Stel\Model\RelTipoTramiteInstanciaTarea;

$repo = new RelTipoTramiteInstanciaTareaRepository();

$entities = $repo->getAll();

Controller::render("tipoTramiteInstanciaTarea.php", array("entities"=>$entities));