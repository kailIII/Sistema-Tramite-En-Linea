<?php
namespace Stel\BackEnd;

use Stel\Lib\UrlHandler;
use Stel\Lib\ErrorHandler;
use Stel\Lib\Config;

class FrontController{
	private $controllerDir;
	private $routes;
	private $urlHandler;

	public function __construct(){
		$this->loadAplication();

		$this->controllerDir = dirname(__FILE__) . "/controller/";
		ErrorHandler::init();

		$this->urlHandler = new UrlHandler();
		//control del informe de errores
		$this->displayErrors(Config::get("debug"));
	}

	public function __destroy(){
		ErrorHandler::end();	
	}

	public static function init(){
		$fc = new FrontController();

		//incluyo la clase Controller para no tener que incluirla en cada controlador
		include_once $fc->controllerDir . "Controller.php";
		try{
			//var_dump($fc->urlHandler->getRoute());die();
			$controller = $fc->getController($fc->urlHandler->getRoute());
			require($controller);
		}catch(Exception $e){
			$exceptionCatched = $e;
			require($fc->controllerDir."exception.php");
		}
	}
	
	public static function embebController($controller){
		$fc = new FrontController();
		ob_start();		
		//hago require del controller
		$controller = $fc->controllerDir . $controller;
		if(require($controller)){
			$value = ob_get_contents();
			ob_end_clean();
			return $value;
		}else{
			$exceptionCatched = new Exception("No se encontro el controlador solicitado para embeber.");
			ob_end_clean();
			require($fc->controllerDir."exception.php");
		}
	}

	private function getController($urlPart, $routes=null){

		if(!$routes){
			if(!$this->routes){
				$this->loadRouting();
			}
			$routes = $this->routes;
		}
		if(isset($routes[$urlPart])){
			return $this->controllerDir . $routes[$urlPart];
		}else{
			throw new \Exception("Url desconocida", 1);
		}
		return;	
	}

	private function loadRouting(){
		if(require("../config/beRouting.php")){
			$this->routes = $routes;
		}else{
			throw new \Exception("No se encuentra el listado de rutas", 1);	
		}
	}

	private function loadAplication(){
		include_once(dirname(__FILE__)."/autoload.php");
	}

	private function getUrlPart(){
		//si existe el path_info es porque se esta accediendo directamente al html.php
		if(isset($_SERVER["PATH_INFO"])){
			return $_SERVER["PATH_INFO"];
		}
		//si existe el redirect_url quiere decir que paso por el htaccess
		if(isset($_SERVER["REDIRECT_URL"])){
			return str_replace($this->appName . "/", "", $_SERVER["REDIRECT_URL"]);
		}else{
			return "/";
		}
	}

	private function displayErrors($display){
		if($display){
			error_reporting(E_ALL); 
			ini_set('display_errors', 1);
		}else{
			error_reporting(0); 
			ini_set('display_errors', 0);
		}		
	}
}