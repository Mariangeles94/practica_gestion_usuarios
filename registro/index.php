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
        <link rel="stylesheet" type="text/css" href="../css/normalize.css" />
    		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
    		<link rel="stylesheet" type="text/css" href="../css/component.css" />
    		<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
        <link rel="icon" href="http://designshack.net/favicon.ico">
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
      <h1>Minimal User Profile Layout</h1>

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#settings">Settings</a></li>
        </ul>
      </nav>
      
      <section id="bio">
        <p>Bienvenido </p>
      </section>
      
      
      <section id="settings" class="hidden">
        <p>Edit your user settings:</p>
        
        <p class="setting"><span>E-mail <a href="viewedit.php?email=<?= $email?>"><img src="../images/edit.png" alt="*Edit*"></a></span><?= $usuario->getEmail()?></p>
        
        <p class="setting"><span>Clave <a href="viewedit.php?email=<?= $email?>"><img src="../images/edit.png" alt="*Edit*"></a></span> <?= $usuario->getClave() ?></p>
        
        <p class="setting"><span>Profile Status <img src="../images/edit.png" alt="*Edit*"></span> Public</p>
        
        <p class="setting"><span>Update Frequency <img src="../images/edit.png" alt="*Edit*"></span> Weekly</p>
        
        <p class="setting"><span>Connected Accounts <img src="../images/edit.png" alt="*Edit*"></span> None</p>
      </section>
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>
</html>

