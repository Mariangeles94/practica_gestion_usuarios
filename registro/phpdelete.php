<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$r = $gestor->delete($email);
$bd->close();
header("Location:index.php?op=delete&r=$r");


