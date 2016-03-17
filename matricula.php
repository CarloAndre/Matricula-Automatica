<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once 'config.php';
$cadena = $_POST['cadena'];
$fkAlumno = $_SESSION["idUsuario"];
for($i = 0 ; $i < count($cadena) ; $i++) {
    $curso = substr($cadena[$i], 0, 6);
    $seccion = substr($cadena[$i], 6);
    if ($conn->connect_error) die($conn->connect_error);
    $query = "INSERT INTO AlumnoxCursoxSeccion (fkAlumno,fkCursoxSeccion) VALUES (".$fkAlumno.",(select a.pkCursoxSeccion from CursoxSeccion a , Seccion b , Curso cu where cu.codCurso = '".$curso."' and cu.pkCurso = a.fkCurso and b.codSeccion = '".$seccion."' and a.fkSeccion = b.pkSeccion));";
   // $query = "select a.pkCursoxSeccion from CursoxSeccion a , Seccion b , Curso cu where cu.codCurso = '$curso' and cu.pkCurso = a.fkCurso and b.codSeccion = '$seccion' and a.fkSeccion = b.pkSeccion;";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed: " . $conn->error);
}
?>
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
            for($i = 0 ; $i < count($cadena) ; $i++){
            $curso = substr($cadena[$i], 0, 6);
            $seccion = substr($cadena[$i], 6);
            if ($conn->connect_error) die($conn->connect_error);
            $query = "SELECT cicloCurso, creditos , descCurso FROM Curso where codCurso = '" . $curso . "' ORDER BY cicloCurso,descCurso ASC";
            $result = $conn->query($query);
            if (!$result) die ("Database access failed: " . $conn->error);
            while ($row = mysqli_fetch_array($result))
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
                        <th>Condicion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    }
                    $ciclo = $row['cicloCurso'];
                    echo "<tr>";
                    echo "<td class='codCurso'>" .$curso.$seccion. "</td>";
                    echo "<td class='center'>" . $row['descCurso'] . "</td>";
                    echo "<td class='center'>" . $row['cicloCurso'] . "</td>";
                    echo "<td class='center'>" . $row['creditos'] . "</td>";
                    echo "<td class='center'>MATRICULADO</td>";
                    echo "</tr>";
                    }
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    ?>
            </div><!--/span-->

        </div><!--/row-->
