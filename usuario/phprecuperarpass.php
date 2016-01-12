<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);

$email = Request::post("email");
if($gestor->get($email)){
    header("Location:../correo/oauth/enviar.php");//pasar parametros para recuperar password
}else{
    $mensaje="Email no encontrado";
}
