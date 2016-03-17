<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:../index");}
$lol = "../css";
include_once '../static/header.php';
?>
<div class="container-fluid-full">
  <div class="row-fluid">

    <div class="row-fluid">
      <div class="login-box">
        <h2>Test Crear Usuario</h2>
        <form class="form-horizontal" action="../log/addUser.php" method="POST">
        <fieldset>
            <input type="text" class="input-large span12"  id="nombre" name='nombre' placeholder="Introducir nombre" required/>
            <input type="text" class="input-large span12" id="codigo" name="codigo" placeholder="Introducir codigo" required/>
            <input type="password" class="input-large span12" id="password" name="password" placeholder="Introducir contraseña" required style="background: rgb(120, 144, 156) none repeat scroll 0% 0%;"/>
            <input type="email" class="input-large span12" id="email" name="email" placeholder="Introducir email" required style="background: rgb(120, 144, 156) none repeat scroll 0% 0%; height: 40px;" />
            <!--pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"/>-->
            <input type="text" class="input-large span12" id="dni" name="dni" pattern="[0-9]{8}" placeholder="Introducir dni" required/>
            <input type="text" class="input-large span12" id="fnac" name="fnac" placeholder="Introducir fecha de Nacimiento" required/>
            <input type="text" class="input-large span12" id="sexo" name="sexo" placeholder="Introducir sexo" required/>
          <button type="submit" class="btn btn-primary span12">Crear Usuario</button>
        </fieldset>
        </form>
      </div>
    </div><!--/row-->

  </div><!--/fluid-row-->

</div><!--/.fluid-container-->

