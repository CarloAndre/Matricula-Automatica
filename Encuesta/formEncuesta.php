<?php

require_once '../config.php';
$descpResultado = '';
for($i =1 ; $i < 7 ; $i++){
  $descpResultado = $descpResultado.' '.$_POST['Pregunta'.$i];
}

$curso = $_POST['curso'];
$conn = new mysqli($db_host,$db_username,$db_password,$db_name);
if($conn->connect_error)die($conn->connect_error);

$query = "INSERT INTO ResultadoxCursoxSeccion (fkCursoxSeccion,descpResultado) values (".$curso.",'".$descpResultado."');";
$result = $conn ->query($query);
if(!$result)die ("Database access failed: ".$conn->error);

header("location:../reporte.php");
/*
$fkCurso = $_POST['pregunta'];
  $fkSeccion = $_POST['fkSeccion'];

  //String de Respuestas
  $descpResultado = $_POST['Pregunta1'];
  for ($i = 2 ; $i < 7 ; ++$i ){
    $descpResultado = $descpResultado.','.$_POST['Pregunta'.$i];
  }

  $conn = new mysqli($hn,$un,$pw,$db);
  if($conn->connect_error)die($conn->connect_error);

  $query = "INSERT INTO ResultadoxCursoxSeccion (fkCurso,fkSeccion,descpResultado) values ($fkCurso,$fkSeccion,$descpResultado);";
  $result = $conn ->query($query);
*/
?>
