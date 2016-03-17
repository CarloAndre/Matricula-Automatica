<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once '../config.php';
$fkAlumno = $_SESSION['idUsuario'];
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
      <h5>ENCUESTA</h5>
      <div class="row">
          <div class="col-lg-4">
              <div class="input-field col s12">
                  <form action="formEncuesta.php" method="POST">
                       <select  class="form-control" id="selectCurso" name='curso' style='text-transform: uppercase;'>
                          <option value="0" disabled selected>Elige una opcion</option>
                          <?php
                          $conn = new mysqli($db_host,$db_username,$db_password,$db_name);
                          if($conn->connect_error)die($conn->connect_error);
                          $query="SELECT DISTINCT b.pkCursoxSeccion , a.codCurso , d.codSeccion , a.descCurso FROM Curso a , CursoxSeccion b , AlumnoxCursoxSeccion c , Seccion d , Alumno e where c.fkCursoxSeccion = b.pkCursoxSeccion and b.fkSeccion = d.pkSeccion and b.fkCurso = a.pkCurso and c.fkAlumno = ".$_SESSION['idUsuario'];
                          $result=$conn->query($query);
                          if(!$result)die ("Database access failed: ".$conn->error);
                          while($row = mysqli_fetch_array($result))
                          {
                              echo "<option value = '".$row['pkCursoxSeccion']."' style='text-transform: uppercase;'>".$row['codCurso'].$row['codSeccion']." - ".$row['descCurso']."</option>";
                          }
                          ?>
                      </select>
                <label>Eligir curso de docente a encuestar</label>
              </div>

<?php
    $conn = new mysqli($db_host,$db_username,$db_password,$db_name);
    if($conn->connect_error)die($conn->connect_error);
      $query="SELECT DISTINCT descripcion from Pregunta;";
      $result=$conn->query($query);
      while($row1 = mysqli_fetch_array($result)){
        echo "<div class='input-field col l6 s12 hidden' style='display: block;margin-left: -0.8em;margin-botto:.6em;'>";
        echo "<br>";
        echo "<h6 class='center'>".$row1['descripcion']."</h6>";
        $row1['descripcion'] = str_replace(' ', '', $row1['descripcion']);
        $query2="SELECT * FROM Alternativa";
        $result2=$conn->query($query2);
        if(!$result)die ("Database access failed: ".$conn->error);
        while($row = mysqli_fetch_array($result2))
        {
          echo "<p class='center'><input type='radio'name=".$row1['descripcion']." value=".$row['valorAlternativa']." id=".$row1['descripcion'].$row['pkAlternativa']."><label for=".$row1['descripcion'].$row['pkAlternativa'].">Descripcion de la alternativa</label></p>";
          // echo "<a href='#' style='text-transform: uppercase;'>".$row['valorAlternativa']."</a>";
        }
        echo "</div>";
      }
?>
                    <!-- <h6 class="center">Pregunta1</h6>
                    <p><input type="radio" name="P1" value="A" id="test1"><label for="test1">Red1</label></p>
                    <p><input type="radio" name="P1" value="B" id="test2"><label for="test2">Red2</label></p>
                    <p><input type="radio" name="P1" value="C" id="test3"><label for="test3">Red3</label></p>
                    <p><input type="radio" name="P1" value="D" id="test4"><label for="test4">Red4</label></p>
                  </br>
                  </div>
                  <div class="input-field col s6 hidden">
                    <h6 class="center">Pregunta2</h6>
                    <p><input type="radio" name="P2" value="A" id="test5"><label for="test5">Red1</label></p>
                    <p><input type="radio" name="P2" value="B" id="test6"><label for="test6">Red2</label></p>
                    <p><input type="radio" name="P2" value="C" id="test7"><label for="test7">Red3</label></p>
                    <p><input type="radio" name="P2" value="D" id="test8"><label for="test8">Red4</label></p>
                  </br>
                  </div>
                  <div class="input-field col s6 hidden">
                    <h6 class="center">Pregunta3</h6>
                    <p><input type="radio" name="P3" value="A" id="test9"><label for="test9">Red1</label></p>
                    <p><input type="radio" name="P3" value="B" id="test10"><label for="test10">Red2</label></p>
                    <p><input type="radio" name="P3" value="C" id="test11"><label for="test11">Red3</label></p>
                    <p><input type="radio" name="P3" value="D" id="test12"><label for="test12">Red4</label></p>
                  </br>
                  </div>
                  <div class="input-field col s6 hidden">
                    <h6 class="center">Pregunta4</h6>
                    <p><input type="radio" name="P4" value="A" id="test13"><label for="test13">Red1</label></p>
                    <p><input type="radio" name="P4" value="B" id="test14"><label for="test14">Red2</label></p>
                    <p><input type="radio" name="P4" value="C" id="test15"><label for="test15">Red3</label></p>
                    <p><input type="radio" name="P4" value="D" id="test16"><label for="test16">Red4</label></p>
                  </br>
                  </div>
                  <div class="input-field col s6 hidden">
                    <h6 class="center">Pregunta5</h6>
                    <p><input type="radio" name="P5" value="A" id="test17"><label for="test17">Red1</label></p>
                    <p><input type="radio" name="P5" value="B" id="test18"><label for="test18">Red2</label></p>
                    <p><input type="radio" name="P5" value="C" id="test19"><label for="test19">Red3</label></p>
                    <p><input type="radio" name="P5" value="D" id="test20"><label for="test20">Red4</label></p>
                  </br>
                  </div>
                  <div class="input-field col s6 hidden">
                    <h6 class="center">Pregunta6</h6>
                    <p><input type="radio" name="P6" value="A" id="test21"><label for="test21">Red1</label></p>
                    <p><input type="radio" name="P6" value="B" id="test22"><label for="test22">Red2</label></p>
                    <p><input type="radio" name="P6" value="C" id="test23"><label for="test23">Red3</label></p>
                    <p><input type="radio" name="P6" value="D" id="test24"><label for="test24">Red4</label></p>
                  </br>
                  </div> -->

            <div class="input-field col s12 hidden center">
            </br>
              <button class="btn waves-effect waves-light" type="submit" name="action">Enviar encuesta
                <i class="material-icons right">assignment</i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js" charset="utf-8"></script>
    <script src="../js/evento.js" charset="utf-8"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
  </body>
</html>
