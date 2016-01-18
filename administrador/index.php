<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageUser($bd);
$usuarios = $gestor->getList2();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		
    </head>
    <body>
      <header>
            <nav>
                <a href="viewinsert.php">Alta usuario</a>
                <a href="../usuario/index.php">Salir</a>
            </nav>
        </header>
        
        <table border="1">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Clave</th>
                    <th>Alias</th>
                    <th>Fecha alta</th>
                    <th>Administrador</th>
                    <th>Personal</th>
                    <th>Activo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key => $usuario) { ?>
                    <tr>
                        <td><?= $usuario->getEmail(); ?></td>
                        <td><?= $usuario->getClave(); ?></td>
                        <td><?= $usuario->getAlias() ?></td>
                        <td><?= $usuario->getFechaAlta(); ?></td>
                        <td><?= $usuario->getAdministrador() ?></td>
                        <td><?= $usuario->getPersonal() ?></td>
                        <td><?= $usuario->getActivo() ?></td>
                        <td>
                            <a class='borrar' href='phpdelete.php?email=<?= $usuario->getEmail() ?>'> Borrar</a>
                            <a href='viewedit.php?email=<?= $usuario->getEmail() ?>'> Editar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    <script src="../js/scripts.js"></script>
</html>
<?php
$bd->close();
