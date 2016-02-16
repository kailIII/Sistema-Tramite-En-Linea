<?php
if(Config::get("debug")){
	Controller::render("exception.php",array("exception"=>$exceptionCatched, "showTrace"=>true));
}else{
	$ex = new Exception("Error desconocido, por favor contacte al administrador.",500);
	Controller::render("exception.php",array("exception"=>$ex, "showTrace"=>false));	
}