<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once 'config.php';

if(!isset($_SESSION["username"])){
header("location:log/login.php");
}

if($conn->connect_error)die($conn->connect_error);
$query="SELECT a.* FROM Curso a , AlumnoxCursoxSeccion b ,CursoxSeccion c , Seccion d WHERE b.fkCursoxSeccion = c.pkCursoxSeccion AND c.fkCurso = a.pkCurso AND c.fkSeccion = d.pkSeccion AND b.fkAlumno = ".$_SESSION['idUsuario'];
$result=$conn->query($query);
if(!$result)die ("Database access failed: ".$conn->error);
$row = mysqli_fetch_array($result);
if($row !== null){
    header("location:reporte.php");
}

$lol = 'css';
$lola = 'js';
$indica = 0;
global $lol,$lola,$indica;
include_once 'static/header.php';
?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <!-- start: User Dropdown -->
                    <li class="dropdown" style="margin-right: 64em;">
                        <a href="index.php" style="color:white;"><h2><strong style="font-size: 1.3em">MATRICULA</strong></h2></a>
                    </li>
                    <!-- end: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#" style="margin-top: .6em;">
                            <div class="avatar"><img src="img/avatar.jpg" alt="Avatar" /></div>
                            <div class="user">
                                <span class="hello">Welcome!</span>
                                <span class="name">
                                    <?php
                                    echo $_SESSION["nombreAlumno"];
                                    ?>
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">

                            </li>
                            <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                            <li><a href="log/logout.php"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->
	<!-- start: Content -->

			<div id="content" class="span12">

			<div class="row-fluid">
				<div class="box span12" id="Cursos" style="margin-left: 3em;">
					<div class="box-header" data-original-title="">
						<h2><i class="icon-user"></i><span class="break"></span>Cursos</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
                  <?php
                  $ciclo = 0;
                  $i = 1;
                  if($conn->connect_error)die($conn->connect_error);
                  $query="SELECT DISTINCT a.* FROM Curso a , AlumnoxCurso b where a.pkCurso = b.fkCurso and b.situacionCurso = 0 ORDER BY cicloCurso,descCurso ASC";
                  $result=$conn->query($query);
                  if(!$result)die ("Database access failed: ".$conn->error);
                  while($row = mysqli_fetch_array($result))
                  {
                    if ($ciclo != $row['cicloCurso']) {
                      ?>
                      <div class="box-content">
            						<table class="table table-striped table-bordered bootstrap-datatable">
            						  <thead>
            							  <tr>
                              <th>Codigo del curso</th>
            								  <th>Nombre del Curso</th>
            								  <th>Ciclo</th>
            								  <th>Creditos</th>
                              <th>Pre-Requisitos</th>
            								  <th>Elegir</th>
            							  </tr>
            						  </thead>
            						  <tbody>
                      <?php
                    }
                    $ciclo = $row['cicloCurso'];
                    echo "<tr>";
                    echo "<td class='codCurso' id='codCurso".$i."'>".$row['codCurso']."</td>";
                    echo "<td class='center'>".$row['descCurso']."</td>";
                    echo "<td class='center'>".$row['cicloCurso']."</td>";
                    echo "<td class='center'>".$row['creditos']."</td>";
                    echo "<td class='center'>".$row['preRequisito']."</td>";
                    echo "<td style='text-align: center;'>";
                      echo "<button type='button' class='btn btn-info btn-lg elegir' data-toggle='modal' data-target='#myModal".$i."' value='".$i."'>Seleccionar Seccion </button>
                        <div id='myModal".$i."' class='modal fade' role='dialog' data-backdrop='static' data-keyboard='false'>
                          <div class='modal-dialog'>

                            <!-- Modal content-->
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>SECCIONES</h4>
                              </div>
                              <div class='modal-body' style='text-align: center;'>
                                <button id='".$i."U' class='btn btn-success seccion' value='U' href='#' style='margin-right: 1em;margin-left: .5em;'>U</button>
                                <button id='".$i."V' class='btn btn-success seccion' value='V' href='#' style='margin-right: 1em;margin-left: .5em;'>V</button>
                                <button id='".$i."X' class='btn btn-success seccion' value='X' href='#' style='margin-right: 1em;margin-left: .5em;'>X</button>
                                <button id='".$i."W' class='btn btn-success seccion' value='W' href='#' style='margin-right: 1em;margin-left: .5em;'>W</button>
                              </div>
                              <div class='modal-footer'>
                                <button class='btn btn-success envioSeccion' data-dismiss='modal' href='#' style='margin-right: 1em;margin-left: .5em;'>Terminar la seleccion</button>
                              </div>
                            </div>
                          </div>
                        </div>";
                    //echo "<button class='btn btn-success' value='".$i."' href='#' style='margin-right: 1em;margin-left: .5em;'><i class='icon-ok '></i>";
                      echo "<button class='btn btn-success optional' value='".$i."' href='#'>Optional</button> ";
                      echo "<button class='btn btn-danger resetear' value='".$i."' href='#'><i class='icon-remove '></i></button>";
                      echo "</td>";
                    echo "</tr>";
                    $i = $i + 1;

                  }
                  echo "</tbody>";
                  echo "</table>";
                  echo "</div>";
                  ?>
				</div><!--/span-->

			</div><!--/row-->
          <button class='btn btn-primary' type="button" name="generar" id="generar">GENERAR HORARIOS</button>
          <button class='btn btn-default' type="button" name="regresar" id="regresar"><i class="icon-arrow-left"></i> VOLVER A ELEGIR</button>
          <div class='container' id='u1'></div>
     <?php
          //$indica = $indica +1 ;
          //echo  "<div class='container' id='MostrarMatricula".$indica."'></div>";
          //echo "<button class='btn btn-primary matricular' value='".$indica."'>GENERAR HORARIOS</button>";

		$lola = "js";
		require_once('static/footer.php')
	;?>

