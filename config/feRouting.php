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
	"/registro"=>"registro.php",
	"/tramites"=>"tramites.php",
	//Controladores ajax
);