<?php
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8"/>
	<title>Matricula Automatica Test</title>
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="css/style.min.css" rel="stylesheet" />
	<link href="css/style-responsive.min.css" rel="stylesheet" />
	<link href="css/retina.css" rel="stylesheet" />
	<link href="css/estilos.css" rel="stylesheet" />
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
	<link rel="shortcut icon" href="ico/favicon.png" />
	<!-- end: Favicon and Touch Icons -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	<!-- start: Content -->

			<div id="content" class="span10">


			<div class="row-fluid">
				<div class="box span12" id="Cursos">
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
                  $query="SELECT a.* FROM Curso a , AlumnoxCurso b where a.pkCurso = b.fkCurso and b.situacionCurso = 0 ORDER BY cicloCurso,descCurso ASC";
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
                    echo "<td class='center'>";
                    echo "<button class='btn btn-success' value='".$i."' href='#' style='margin-right: 1em;margin-left: .5em;'>";
                    echo "<i class='icon-ok '></i></button><button class='btn btn-danger' value='".$i."' href='#'><i class='icon-remove '></i></button>";
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
          <div class='container' id='u1'>
      </div>
	<!-- start: JavaScript-->
		<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/jquery.dataTables.min.js'></script>
		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<script src="js/jquery.flot.time.js"></script>

		<script src="js/jquery.chosen.min.js"></script>
		<script src="js/jquery.uniform.min.js"></script>
		<script src="js/jquery.cleditor.min.js"></script>
		<script src="js/jquery.noty.js"></script>
		<script src="js/jquery.elfinder.min.js"></script>
		<script src="js/jquery.raty.min.js"></script>
		<script src="js/jquery.iphone.toggle.js"></script>
		<script src="js/jquery.uploadify-3.1.min.js"></script>
		<script src="js/jquery.gritter.min.js"></script>
		<script src="js/jquery.imagesloaded.js"></script>
		<script src="js/jquery.masonry.min.js"></script>
		<script src="js/jquery.knob.modified.js"></script>
		<script src="js/jquery.sparkline.min.js"></script>
		<script src="js/counter.min.js"></script>
		<script src="js/raphael.2.1.0.min.js"></script>
	<script src="js/justgage.1.0.1.min.js"></script>
		<script src="js/jquery.autosize.min.js"></script>
		<script src="js/retina.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
		<script src="js/wizard.min.js"></script>
		<script src="js/core.min.js"></script>
		<script src="js/charts.min.js"></script>
		<script src="js/custom.min.js"></script>
		<script src="otro.js"></script>
		<script src="color.js"></script>
	<!-- end: JavaScript-->

</body>
</html>
