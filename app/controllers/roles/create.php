<?php

include('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol,'UTF-8');

if ($nombre_rol == ""){
    session_start();
    $_SESSION['mensaje'] = "Debes llenar los campos requeridos";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles/create.php");
}else{


    $sentencia = $pdo->prepare("INSERT INTO roles (nombre_rol,fyhCreacion,estado) 
                            VALUES (:nombre_rol,:fyhCreacion,:estado) ");

$sentencia->bindParam('nombre_rol', $nombre_rol);
$sentencia->bindParam('fyhCreacion', $fecha_hora);
$sentencia->bindParam('estado', $estado_de_registro);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Registro exitoso";
        $_SESSION['icono'] = "success";
        header('Location:' . APP_URL . "/admin/roles");
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error inesperado, comunicate con el Administrador";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles/create.php");
    }
}
catch(Exception $e){
    session_start();
        $_SESSION['mensaje'] = "Este rol, ya ha sido registrado con anterioridad";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles/create.php");

}




}

