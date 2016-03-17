<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once 'config.php';

if(!isset($_SESSION["username"])){
    header("location:log/login.php");
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
                            <li><a href="Encuesta/encuesta.php"><i class="icon-cog"></i> Encuesta</a></li>
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
            $query="SELECT DISTINCT b.codCurso, b.cicloCurso, b.creditos , b.descCurso ,d.pkCursoxSeccion , c.codSeccion FROM AlumnoxCursoxSeccion a , Curso b , Seccion c , CursoxSeccion d WHERE fkAlumno = ".$_SESSION['idUsuario']." AND a.fkCursoxSeccion = d.pkCursoxSeccion AND d.fkCurso = b.pkCurso AND d.fkSeccion = c.pkSeccion ORDER BY b.cicloCurso,b.descCurso ASC";
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
                        <th>Encuesta</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    }
                    $ciclo = $row['cicloCurso'];
                    echo "<tr>";
                    echo "<td class='codCurso' id='codCurso".$i."'>".$row['codCurso'].$row['codSeccion']."</td>";
                    echo "<td class='center'>".$row['descCurso']."</td>";
                    echo "<td class='center'>".$row['cicloCurso']."</td>";
                    echo "<td class='center'>".$row['creditos']."</td>";
                    echo "<td style='text-align: center;'>";
                    echo "<form action='Encuesta/estadistica.php' method='post'>";
                    echo "<button type='submit' class='btn estadistica' name='estado' value=".$row['codCurso'].$row['codSeccion'].$row['pkCursoxSeccion']." href='#'><i class='icon-ok'></i></button>";
                    echo "</form>";
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
        <a href="Encuesta/encuesta.php"><button class='btn' type="button">ENCUESTA <i class="icon-arrow-right"></i></button></a>
        <div class='container' id='u1'></div>

        <?php
        //$indica = $indica +1 ;
        //echo  "<div class='container' id='MostrarMatricula".$indica."'></div>";
        //echo "<button class='btn btn-primary matricular' value='".$indica."'>GENERAR HORARIOS</button>";

        $lola = "js";
        require_once('static/footer.php')
        ;?>

