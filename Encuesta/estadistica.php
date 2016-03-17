<?php
 $title = substr($_POST['estado'], 0, 7);
 $curso = substr($_POST['estado'],7,strlen($_POST['estado']));
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title> MATRICULA - ENCUESTA </title>
  <!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified JavaScript -->
</head>
<body>
<div class='container'>
  <h4 class="center"><small>RESULTADOS DE ENCUESTAS DEL CURSO <?php echo $title;?></small></h4>
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">insert_chart</i><p style="display: none" id="course"><?php echo $curso;?></p></div>
      <div class="collapsible-body" id="container" style="min-width: 310px; height: 400px; margin: 0 auto; display:block"></div>
    </li>
  </ul>
</div>
<!-- <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js" charset="utf-8"></script>
<script src="../js/evento.js" charset="utf-8"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script src="../js/conecta.js"></script>
<script src="../js/script.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</body>
</html>