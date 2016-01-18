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
       <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
        <div id="topbar">
          <a href="../usuario/index.php">Back</a>
        </div>
  
  <div id="w">
    <div id="content" class="clearfix">
      <div id="userphoto"><img src="../images/avatar.png" alt="default avatar"></div>
      <h1>User Profile</h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#settings">Settings</a></li>
        </ul>
      </nav>
            
            <div id="form_sample">
                <form action="phpedit.php" method="POST">
                    <label>Email</label>
                    <input type="text" name="pkemail" value="<?php echo $usuario->getEmail(); ?>"/>
                    <label>Clave</label>
                    <input type="text" name="clave" value="<?php echo $usuario->getClave(); ?>" />
                    <input type="submit" value="Modificar"/>
                </form>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
<?php
$bd->close();