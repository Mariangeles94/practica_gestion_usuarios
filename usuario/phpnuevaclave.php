<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$clave1 = Request::get("clave1");
$clave2 = Request::get("clave2");

    if($clave1 === $clave2 && $clave1 !==" "){
        $gestor->setClave($email, $clave1);
        $mensaje = "Constraseña restablecida con exito";
        header("Location:index.php?mensaje=$mensaje");
    }else{
        $mensaje = "Error al introducir la contraseña";
         header("Location:index.php?mensaje=$mensaje");
    }