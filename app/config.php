<?php

require_once 'conexion.php';
/*define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemaescolar');*/

define('APP_NAME','SISTEMA ESCOLAR');
define('APP_URL','http://localhost/sistemaescolar');
define('KEY_API_MAPS','');




try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


}catch (PDOException $e){

    die("Could not connect to the database $dbname :" . $pe->getMessage());
    /*  print_r($e);
        echo "No se pudo conectar a la base de datos";*/
};

date_default_timezone_set("America/Guatemala");
$ano_actual = date ('Y');

$fecha_hora = date ('Y-m-d H:i:s');
$dia_actual = date ('d');
$mes_actual = date ('m');
$ano_actual = date ('Y');

$estado_de_registro = '1';