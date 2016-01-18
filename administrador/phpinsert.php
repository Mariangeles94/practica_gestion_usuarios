<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);


$email = Request::post("email");
$clave = Request::post("clave");
$alias = $email;
$fechaAlta = date("Y-m-d");
$activo = Request::post("activo");
$administrador = Request::post("administrador");
$personal = Request::post("personal");

$user = new User($email, $clave, $alias, $fechaAlta, $activo, $administrador, $personal);


$r = $gestor->insert($user);
$bd->close();
var_dump($bd->getError());
header("Location:index.php");
