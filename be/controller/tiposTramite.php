<?php
use Stel\Repository\TipoTramiteRepository;
use Stel\Model\TipoTramite;

$repo = new TipoTramiteRepository();

$tipos = $repo->getAll();

Controller::render("tiposTramite.php", array("tipos"=>$tipos));