<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){
    header("location:../index.php");
}

  $lol = "../css";
  require_once('../static/header.php');
?>
<div class="container-fluid-full">
  <div class="row-fluid">

    <div class="row-fluid">
      <div class="login-box">
        <h2>Inicia Sesion</h2>
        <form class="form-horizontal" action="../log/verify.php" method="post" />
        <fieldset>

          <input class="input-large span12" name="username" id="username" type="text" placeholder="Ingresar Codigo" required/>

          <input class="input-large span12" name="password" id="password" type="password" placeholder="Ingresar Contraseña" required/>

          <button type="submit" class="btn btn-primary span12" id="loginbutton">Login</button>
        </fieldset>
        </form>
        <hr />
        <h3>Test de Usuario</h3>
        <p>
          <a href="register.php" style="text-decoration: underline">Click Aqui </a> para crear nuevo usuario.
        </p>
      </div>
    </div><!--/row-->

  </div><!--/fluid-row-->

</div><!--/.fluid-container-->

<?php
$lola = "../js";
require_once('../static/footer.php')
;?>
