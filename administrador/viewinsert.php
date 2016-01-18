<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);

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
                <form action="phpinsert.php" method="POST">
                    <label>Email</label>
                    <input type="text" name="email" value=""/>
                    <label>Clave</label>
                    <input type="text" name="clave" value="" />
                    <label>Administrador</label>
                    <input type="text" name="administrador" value="" />
                    <label>Personal</label>
                    <input type="text" name="personal" value="" />
                    <label>Activo</label>
                    <input type="text" name="activo" value="" /> 
                    <input type="submit" value="Insertar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();