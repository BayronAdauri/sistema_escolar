<?php

include('../../../app/config.php');

$id_rol = $_POST['id_rol'];
$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = "Debes llenar los campos requeridos";
    $_SESSION['icono'] = "error";
    header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
} else {


    $sentencia = $pdo->prepare("UPDATE roles 
                                SET nombre_rol= :nombre_rol,
                                fyhActualizacion = :fyhActualizacion
                            WHERE idRol = :idRol ");

    $sentencia->bindParam('nombre_rol', $nombre_rol);
    $sentencia->bindParam('fyhActualizacion', $fecha_hora);
    $sentencia->bindParam('idRol', $id_rol);


    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Actualizacion exitosa";
            $_SESSION['icono'] = "success";
            header('Location:' . APP_URL . "/admin/roles");
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error inesperado, comunicate con el Administrador";
            $_SESSION['icono'] = "error";
            header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensaje'] = "Este rol, ya ha sido registrado con anterioridad";
        $_SESSION['icono'] = "error";
        header('Location:' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
    }
}
