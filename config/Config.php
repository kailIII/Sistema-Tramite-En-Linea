<?php
namespace Stel\Lib;

class Config{
	private static $params = array(
			"debug"=>true
		);
	
	public static function get($value){
		if(isset(self::$params[$value])){
			return self::$params[$value];
		}else return false;
	}
}