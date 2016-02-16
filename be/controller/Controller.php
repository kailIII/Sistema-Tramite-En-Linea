<?php

class Controller{
	
	private $viewsDir;

	public function __construct(){
		$this->viewsDir = dirname(dirname(__FILE__)) . "/views/";
	}

	public static function render($view, $params=null){
		$c = new Controller();
		$viewParams = $params;
		require($c->viewsDir . $view);
	}
	public static function renderJson($status, $content, $message=null){
		ob_clean();
		ob_start();
		echo json_encode(array(
				"status"=>$status,
				"content"=>($content)?$content:"",
				"message"=>($message)?$message:"",
			));
		die;
	}
	public static function redirect($url){
		//por las dudas verifico si la url solicitada comienza con /
		if(substr($url, 0, 1) != "/")
			$url = "/".$url;

		ob_clean();
		header("Location: ".$_SERVER["REDIRECT_BASE"].$url);
		die;
	}
}