<?php
namespace Stel\Lib;

/**
 * Utility for catching PHP errors and converting them to an exception
 * that can be caught at runtime
 * @author Jason Hinkle
 * @copyright  1997-2011 VerySimple, Inc.
 * @license    http://www.gnu.org/licenses/lgpl.html  LGPL
 * @version 1.0
 */
class ErrorHandler
{
	public static function init()
	{
		//var_dump(set_error_handler(array("Stel\\Lib\\ErrorHandler", "handleError"), E_ALL));
		$oldHandler = set_error_handler(array("Stel\\Lib\\ErrorHandler", "handleError"), E_ALL);
	}
 
	public static function end()
	{
		restore_error_handler();
	}
 
	public static function handleError($code, $message, $file, $line)
	{ 
		$throwException = new PhpErrorException($code, $message, $file, $line);
		throw $throwException;
	}
}

class PhpErrorException extends \Exception{

	public function __construct($code, $message, $file, $line){
		$message = "<strong>Error:</strong> " . $message . "<br> en <strong>" . $file . "</strong> linea: ".$line;
		parent::__construct($message,$code);
	}

}