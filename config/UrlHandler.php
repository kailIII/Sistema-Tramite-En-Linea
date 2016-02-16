<?php
namespace Stel\Lib;

/**
*	@author Mariano
*	Clase encargada de manejar las Urls y el routing
**/
class UrlHandler{
	private $uri;
	
	public function __construct(){
		$this->loadUri();
	}

	public function loadUri(){
		$this->uri = new \stdClass();
		$this->uri->base = $_SERVER["BASE"];

		$this->uri->redirectUrl = $_SERVER["REQUEST_URI"];
		//var_dump($_SERVER["QUERY_STRING"]);die("jajaja");
		if(!empty($_SERVER["QUERY_STRING"])){
			$this->uri->redirectUrl = str_replace("?".$_SERVER["QUERY_STRING"], "", $_SERVER["REQUEST_URI"]);
		}
		//var_dump($_SERVER);die;
	}

	public function getRoute(){
		$route = str_replace($this->uri->base,"",$this->uri->redirectUrl);

		//si al final tiene un / se lo saco asi matchan los dos casos 
		//Ej: /be/login y /be/login/ deberian ir al mismo controlador
		if(strripos($route, "/") == (strlen($route) - 1))
			$route = substr($route, 0, (strlen($route) - 1));
		return $route;
	}

	public function getAppRoot(){
		return $this->uri["BASE"];
	}
}