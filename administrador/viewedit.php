<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$email = Request::get("email");
$usuario = $gestor->get($email);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"  href="../css/style2.css"/>
    </head>
    <body>
          <header>
            <nav>
                <a href="viewinsert.php">Alta usuario</a>
                <a href="../usuario/index.php">Salir</a>
            </nav>
        </header>
        <div id="main">
            <h2>Introduzca los nuevos datos del usuario</h2>
            <div id="form_sample">
                <form action="phpedit.php" method="POST">
                    <label>Email</label>
                    <input type="text" name="pkemail" value="<?php echo $usuario->getEmail(); ?>"/>
                    <label>Clave</label>
                    <input type="text" name="clave" value="<?php echo $usuario->getClave(); ?>" />
                    <label>Alias</label>
                    <input type="text" name="alias" value="<?php echo $usuario->getAlias(); ?>" />
                    <label>Fecha alta</label>
                    <input type="date" name="fechaAlta" value="<?php echo $usuario->getFechaAlta(); ?>" />
                    <label>Administrador</label>
                    <input type="text" name="administrador" value="<?php echo $usuario->getAdministrador(); ?>" />
                    <label>Personal</label>
                    <input type="text" name="personal" value="<?php echo $usuario->getPersonal(); ?>" />
                    <label>Activo</label>
                    <input type="text" name="activo" value="<?php echo $usuario->getActivo(); ?>" /> 
                    <input type="submit" value="Modificar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();