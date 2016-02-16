<?php
namespace Stel\Model;


/**
* @author Mariano
* Clase padre para las entidades, implementa funcionalidad de base de datos
* ATENCION!! no extender de esta clase si su clase no representa una tabla con PK numerico
**/

class Entity implements \JsonSerializable {

	public function getIdField(){
		throw new Exception("La entidad no tiene campo id declarado", 1);
	}

	public function jsonSerialize(){
		throw new Exception("No se implemento el metodo para serializar en Json", 1);	
	}
	
}