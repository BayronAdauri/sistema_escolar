<?php

include ('../../../app/config.php');

$nombre = $_POST['nombre'];
$id_rol = $_POST['id_rol'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];


if($password ==$password2){
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    
$sentencia = $pdo->prepare('INSERT INTO usuarios (nombre, id_rol, email, password, fyhCreacion, estado)
VALUES (:nombre, :id_rol, :email, :password, :fyhCreacion, :estado )');

$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':id_rol', $id_rol);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam(':fyhCreacion', $fecha_hora);
$sentencia->bindParam(':estado', $estado_de_registro);

try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Registro realizado con 'exito";
        $_SESSION['icono'] ="succes";
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no coinciden";
        $_SESSION['icono'] ="error";
        header('Location:'.APP_URL."/admin/usuarios/create.php");
        ?> <script>window.history.back();</script><?php
    }

}catch(Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Este usuario ya existe en el sistema";
    $_SESSION['icono'] ="error";
    ?> <script>window.history.back();</script><?php
}


}
