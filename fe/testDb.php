<?php
include("../config/db.php");


$stmt = DB::getStatement("select * from test where nombre = 'nombre's");
$stmt->execute();
var_dump($stmt->fetchAll());