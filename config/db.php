<?php
namespace Stel\Lib;

//Singleton para encapsular la libreria PDO
class DB {
    // Propiedad estática db. Aquí guardamos la instancia de PDO.
    private static $db;

    // Método estático para retornar la *única* instancia de PDO con la *única* conexión abierta contra la DB.
    public static function getConnection(){

        // Si $db esta vacia, es porque no existe la conexión. Si es así, se instancia.
        if (empty(self::$db)) {
            self::$db = new \PDO("mysql:host=localhost;dbname=stel",
                                "root",
                                "root",
                                array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }

        // Retornamos la instancia, ya sea recién generada o no.
        return self::$db;
    }

    // Método estático para retornar el statement generado por el método prepare de PDO.
    public static function getStatement($query){
        // Se prepara la consulta y se retorna el statement.
        return self::getConnection()->prepare($query);
    }

    //Método estatico para obtener los resultados de un query con o sin parametros
    public static function fetchAll($query, $params=null){
        $stmt = self::getStatement($query);
        if($params && count($params)){
            foreach ($params as $key => $value) {
                self::bindParam($stmt, $key, $value);
            }
        }

        self::executeStatement($stmt);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    //sobrecarga para aceptar parametros
    public static function fetchAllClass($query, $className=null, $params=null){
        $stmt = self::getStatement($query);
        if($params && count($params)){
            foreach ($params as $key => $value) {
                self::bindParam($stmt, $key, $value);
            }
        }

        self::executeStatement($stmt);
        if($className){
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $className);
        }else return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    //Método estatico para obtener UN resultado de un query con o sin parametros
    public static function fetchOne($query, $params=null){
        $stmt = self::getStatement($query);
        if($params && count($params)){
            foreach ($params as $key => $value) {
                self::bindParam($stmt, $key, $value);
            }
        }

        self::executeStatement($stmt);
        if($className){
            return $stmt->fetch(\PDO::FETCH_CLASS, $className);
        }else return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    //sobrecarga para aceptar parametros
    public static function fetchOneClass($query, $className=null, $params=null){
        $stmt = self::getStatement($query);

        if($className){ $stmt->setFetchMode( \PDO::FETCH_CLASS, $className); }
        else { $stmt->setFetchMode( \PDO::FETCH_OBJ ); }

        if($params && count($params)){
            foreach ($params as $key => $value) {
                self::bindParam($stmt, $key, $value);
            }
        }

        self::executeStatement($stmt);
        return $stmt->fetch();
    }

    //inserta un registro en la tabla indicada
    public static function insert($table, $params, $idField=null){
        $columns = implode(",",array_keys($params));
        $queryParams = array_map(function($element){ return ":".$element; }, array_keys($params));
        $values = implode(",",$queryParams);

        $sql = "insert into ".$table." (".$columns.") values (".$values.")";
        //echo($sql);die;
        $stmt = self::getStatement($sql);
        //var_dump($params);die;
        foreach($params as $key => $value){
            self::bindParam($stmt, ":".$key, $value);
        }
        //var_dump($stmt);die;
        self::executeStatement($stmt);
        if($idField) return self::$db->lastInsertId($idField);
        else return true;
    }

    //actualiza los datos de un registro por id
    public static function update($table, $idField, $idValue, $params){
        $columns = array_keys($params);
        $asignation = array_map(
                        function($element){ 
                            return $element . " = :" . $element;
                        }
                        ,$columns);
        $values = implode(", ",$asignation);

        $sql = "update ".$table." set ".$values." where $idField = $idValue";
        $stmt = self::getStatement($sql);

        foreach($params as $key => $value){
            self::bindParam($stmt, ":".$key, $value);
        }
        self::executeStatement($stmt);
        if($idField) return self::$db->lastInsertId($idField);
        else return true;   
    }
    //borra un registro por id
    public static function delete($table, $idField, $idValue){
        $sql = "delete from ".$table." where ".$idField." = ".$idValue;
        $stmt = self::getStatement($sql);
        self::executeStatement($stmt);
        return true;
    }

    //Agrega un parametro al statement de utilizando los metodos de abajo
    public static function bindParam($stmt, $paramName, $paramValue){
        $value = self::processParamValue($paramValue);
        $type = self::guessDataType($paramValue);
        $stmt->bindParam($paramName, $value, $type);
    }

    //Devuelve la variable PDO_PARAM_* de acuerdo al tipo de dato
    public static function guessDataType($param){
        if($param === null) return \PDO::PARAM_NULL;
        if(is_bool($param)) return \PDO::PARAM_BOOL;
        if(is_integer($param)) return \PDO::PARAM_INT;
        if($param instanceof \DateTime) return \PDO::PARAM_STR;
        if($param instanceof Stel\Model\Entity) return \PDO::PARAM_INT;
        if(is_string($param) || is_float($param)) return \PDO::PARAM_STR;
    }

    //Preproceso de valores de parametros
    public static function processParamValue($paramValue){
        //si es un datetime lo parseo como string con el formato compatile con Mysql
        if($paramValue instanceof \DateTime && $paramValue != null) 
            return $paramValue->format("Y-m-d h:i:s");

        //si el objeto es una entity devuelvo solo el id
        if($paramValue instanceof Stel\Model\Entity){
            $id = $paramValue->getIdField();
            return $paramValue->$id;
        }

        return $paramValue;
    }

    //ejecuta el statement, con manejo de errores
    public static function executeStatement($stmt){
        try{
            $rc = $stmt->execute();  
            //$stmt->debugDumpParams();  
        }catch(\PDOException $ex){
            die("lalala");
        }
    }
}
