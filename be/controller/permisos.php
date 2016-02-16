<?php
use Stel\Repository\PermisoRepository;
use Stel\Repository\UsuarioRepository;
use Stel\Repository\TareaRepository;
use Stel\Model\Permiso;

function byUserName($a, $b)
{
    return strcmp(strtolower($a->getUsuario()->getUsuario()), strtolower($b->getUsuario()->getUsuario()));
}

$repo = new PermisoRepository();
$repoUsuarios = new UsuarioRepository();
$repoTareas = new TareaRepository();

$entities = $repo->getAll();

foreach ($entities as $entity) {

	$usuario = $repoUsuarios->getOne($entity->getIdUsuario());

	$entity->setUsuario($usuario);

	$tarea = $repoTareas->getOne($entity->getIdTarea());

	$entity->setTarea($tarea);
}

usort($entities, "byUserName");

Controller::render("permisos.php", array("entities"=>$entities));

