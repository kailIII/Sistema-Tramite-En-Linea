<?php
use Stel\Repository\TipoTareaRepository;
use Stel\Model\TipoTarea;

$repo = new TipoTareaRepository();

$tipos = $repo->getAll();

Controller::render("tiposTarea.php", array("tipos"=>$tipos));