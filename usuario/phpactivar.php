<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);


$email = Request::post("email");
$clave = Request::post("clave1");
$alias = $email;
$fechaAlta = date("Y-m-d");
$activo = 0;

if($email != "" && $clave != ""){
    $usuario = new User($email, $clave, $alias, $fechaAlta, $activo, 0, 0);
    $gestor->insert($usuario);
    var_dump($bd->getError());
    header("Location:../correo/oauth/enviar.php?op=0&usuario=$email");
}else{
    $mensaje = "Email y/o contraseña estan vacio/s";
    header("Location:index.php?mensaje=$mensaje");
}
$bd->close();

   



