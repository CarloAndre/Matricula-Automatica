<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

    require_once('static/header.php');
?>

<div class='container'>
    <div class="row">
        <h1 style="text-align:center;padding-top:1.5em;">RECURSO NO ENCONTRADO</h1><br>
        <span>
        <a href="http://mautomatic-koel.rhcloud.com" class="btn btn-primary btn-large" style="margin-left: 26.7em;"><i class="icon-reply icon-white"></i> Volver a la pagina principal</a>
        </span>
    </div>
</div>
