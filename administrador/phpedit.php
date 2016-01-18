<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);

$email = Request::post("pkemail");
$clave = Request::post("clave");
$alias = Request::post("alias");
$fechaAlta = Request::post("fechaAlta");
$administrador = Request::post("administrador");
$personal = Request::post("personal");
$activo = Request::post("activo");



$user = new User($email, $clave, $alias, $fechaAlta, $activo, $administrador, $personal);



$r = $gestor->set($user, $email);
$bd->close();
var_dump($bd->getError());
header("Location:index.php?email=$email&op=edit&r=$r");