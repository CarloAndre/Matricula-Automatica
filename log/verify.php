<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once '../config.php';

if(!isset($_POST["username"]) AND !isset($_POST['password'])){
  header("location:../index");
}

$username = $_POST['username'];
$password = $_POST['password'];
// Validamos $nombre, bla bla bla..
// Extraemos el hash de la base de datos
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
$stmt = $db->prepare('SELECT passAlumno
                      FROM Alumno
                      WHERE codAlumno = ?');

$stmt->execute(array($username));
$dbHash = $stmt->fetchcolumn();

// Recalculamos a ver si el hash coincide.
// if (hash_equals($dbHash, crypt($password, $dbHash))){
 
if (crypt($password, $dbHash) == $dbHash){
  echo 'El usuario ha sido autenticado correctamente';
    $traer = $db->prepare('SELECT DISTINCT a.* from Alumno a , AlumnoxCurso b WHERE a.pkAlumno = b.fkAlumno and a.codAlumno = ?');
  //
  // $stmt = $db->prepare('SELECT Id_Usuario
  //                       FROM Usuario
  //                       WHERE username = ?');
  $traer->execute(array($username));
  $resultado = $traer->fetch(PDO::FETCH_ASSOC);
  // echo $resultado["Id_Usuario"];
  // echo $resultado["BOOL_ADMIN"];
  // print_r($resultado);
  $Id_Usuario = $resultado["pkAlumno"];
  //$_SESSION["admin"] = $resultado["BOOL_ADMIN"];
  //$_SESSION["accesoGrupo"] = $resultado["Id_Grupo"];
  $_SESSION["nombreAlumno"] = $resultado["nombreAlumno"];
  $_SESSION["username"] = $username;
  $_SESSION["idUsuario"] = $Id_Usuario;

  header("location:../index.php");
}else{
  die('Mal Password');
  header("location:http:login.php");
}


// // ?>
