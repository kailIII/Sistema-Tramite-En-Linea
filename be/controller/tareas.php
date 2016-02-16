<?php
use Stel\Repository\TareaRepository;
use Stel\Model\Tarea;

$repo = new TareaRepository();

$entities = $repo->getAllOrderBy("nombre");

Controller::render("tareas.php", array("entities"=>$entities));