<?php
/**
* @author Mariano
*	Array de urls de la aplicacion asociadas al controlador que deben llamar
*	ATENCION: NO poner en la url una barra final... o sea usar "/login" en lugar de "/login/"
**/
$routes = array(
	//Controladores html
	"/"=>"index.php",
	"/login"=>"login.php",
	"/logout"=>"logout.php",
	"/administracion"=>"administracion.php",
	"/tiposTramite"=>"tiposTramite.php",
	"/tiposTarea"=>"tiposTarea.php",
	"/direcciones"=>"direcciones.php",
	"/instancias"=>"instancias.php",
	"/tareas"=>"tareas.php",
	"/usuarios"=>"usuarios.php",
	"/permisos"=>"permisos.php",
	"/tipoTramiteInstancia"=>"tipoTramiteInstancia.php",
	"/tipoTramiteInstanciaTarea"=>"tipoTramiteInstanciaTarea.php",
	"/misTareas"=>"misTareas.php",
	"/historial"=>"historial.php",
	"/nuevoTramite"=>"nuevoTramite.php",
	"/abrirTarea"=>"abrirTarea.php",
	"/cargaObservacion"=>"cargaObservacion.php",
	"/sintesisGlobal"=>"sintesisGlobal.php",
	"/tramites"=>"tramites.php",
	"/solfa"=>"solfa.php",
	"/libredisp"=>"libredisp.php",
	"/simbolos"=>"simbolos.php",
	"/solfacompleta"=>"solfacompleta.php",
	"/solfafamiliares"=>"solfafamiliares.php",
	"/solfachoferes"=>"solfachoferes.php",
	"/solfavehiculo"=>"solfavehiculo.php",
	"/solfainst"=>"solfainst.php",
	"/solfainstcompleta"=>"solfainstcompleta.php",
	
	
	//Controladores ajax
	"/json_abmUsuarios" => "json_abmUsuarios.php",
	"/json_getDataFiltro" => "json_getDataFiltro.php",
	"/json_getTramites" => "json_getTramites.php",
	"/json_getTiposTramite" => "json_getTiposTramite.php",
	"/json_abmTipoTramite" => "json_abmTipoTramite.php",
	"/json_getTipoTarea" => "json_getTipoTarea.php",
	"/json_abmTipoTarea" => "json_abmTipoTarea.php",
	"/json_abmTramiteInstancia" => "json_abmTramiteInstancia.php",
	"/json_getDirecciones" => "json_getDirecciones.php",
	"/json_abmDirecciones" => "json_abmDirecciones.php",
	"/json_getInstancias" => "json_getInstancias.php",
	"/json_abmInstancias" => "json_abmInstancias.php",
	"/json_getTareas" => "json_getTareas.php",
	"/json_abmTareas" => "json_abmTareas.php",
	"/json_getUsuarios" => "json_getUsuario.php",
	"/json_getPermisos" => "json_getPermisos.php",
	"/json_abmPermisos" => "json_abmPermisos.php",
	"/json_getListasItem" => "json_getListasItem.php",
	"/json_getItem" => "json_getItem.php",
	"/json_getHistorial" => "json_getHistorial.php",
	"/json_getTareasForMisTareas" => "json_getTareasForMisTareas.php",
	"/json_abmTramiteInstanciaTarea" =>"json_abmTramiteInstanciaTarea.php",
	"/json_abmObservacion" =>"json_abmObservacion.php",
	"/json_abmTipoTramiteInstancia" => "json_abmTipoTramiteInstancia.php",
	"/json_getTiposTramiteInstancia" => "json_getTiposTramiteInstancia.php",
	"/json_abmTipoTramiteInstanciaTarea" => "json_abmTipoTramiteInstanciaTarea.php"
);