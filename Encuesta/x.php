<?php
require_once '../config.php';
$fkCursoxSeccion = $_POST['fkCursoxSeccion'];
$conn = new mysqli($db_host,$db_username,$db_password,$db_name);
if($conn->connect_error)die($conn->connect_error);

$query = "SELECT *FROM ResultadoxCursoxSeccion WHERE fkCursoxSeccion = ".$fkCursoxSeccion;
$result = $conn ->query($query);
if(!$result)die ("Database access failed: ".$conn->error);

$arr = array();
while ($obj = $result -> fetch_object()) {
    $arr[] = array('Id' => $obj->pkResultado,
        'a' => $obj->fkCursoxSeccion,
        'b' => $obj->descpResultado,
    );
}
echo json_encode($arr);
?>

