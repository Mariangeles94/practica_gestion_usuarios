<?php
echo "hola";
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$email = Request::post("email");
$clave =Request::post("clave");
$misusuarios = $gestor->getList2();
$sesion = new Session();


foreach ($misusuarios as $key => $value) {
  
    if($email == $value->getEmail() && $clave == $value->getClave()){
        if($value->getPersonal() == 1){
            //header("Location:../administrador/index.php");
        }
        if($value->getAdministrador() == 1){
            header("Location:../administrador/index.php");
        }
        if($value->getActivo() == 1 && $value->getAdministrador() == 0 && $value->getPersonal() == 0){
          header("Location:../registro/index.php?email=$email");
        }
        if($value->getActivo() == 0 && $value->getAdministrador() == 0 && $value->getPersonal() == 0){
          header("Location:../administrador/phpdelete.php?email=$email");
        }
    }else{
        $mensaje = "Email y/o contraseña incorrecta";
        header("Location:../usuario/index.php?mensaje=$mensaje");
    }

 $sesion->set("personal", $value->getPersonal());
 $sesion->set("administrador", $value->getAdministrador());
 $sesion->set("usuario", $value->getActivo());
}