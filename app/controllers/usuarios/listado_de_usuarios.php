<?php

$sql_usuarios = "SELECT * FROM usuarios as usu INNER JOIN roles as rol
                                on rol.idRol = usu.id_rol where usu.estado = '1'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

