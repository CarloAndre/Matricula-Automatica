<?php
require_once '../config.php';

$codAlumno=$_POST['codigo'];
$nombreAlumno=$_POST['nombre'];
$passAlumno=$_POST['password'];
$emailAlumno=$_POST['email'];
$dniAlumno=$_POST['dni'];
$fnacAlumno=$_POST['fnac'];
$sexoAlumno=$_POST['sexo'];


$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
// A Crypt no le gustan los '+' así que los vamos a reemplazar por puntos.
$salt = strtr($salt, array('+' => '.'));
// Generamos el hash
$hash = crypt($passAlumno, '$2y$10$' . $salt);
// Guardamos los datos en la base de datos'mysql:host=localhost;dbname=facemash', $un, $pw
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
$stmt = $db->prepare('INSERT INTO Alumno (codAlumno,nombreAlumno,passAlumno,emailAlumno,dniAlumno,fnacAlumno,sexoAlumno) VALUES (?, ?, ?, ? ,? ,? ,?);');
$stmt->execute(array($codAlumno, $nombreAlumno, $hash , $emailAlumno ,$dniAlumno,$fnacAlumno,$sexoAlumno));

if (!$stmt) {
    echo "\nPDO::errorInfo():\n";
    print_r($db->errorInfo());
}

if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT pkAlumno FROM Alumno WHERE codAlumno = '$codAlumno';";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
while($row = mysqli_fetch_array($result)){
    $pkAlumno = $row['pkAlumno'];
}

if ($conn->connect_error) die($conn->connect_error);
$query = "CALL doAxC(".$pkAlumno.");";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);

header("location:../index.php");

//Correo
// $destinatario = "$email";
// $asunto = "activacion de tu cuenta en Facemash";
// $cuerpo = "
// <html>
// <head>
//  <title>Facemash</title>
// </head>
// <body>
// <h1>Solo falta una paso!</h1>
// <p>
// <b>Bienvenid@ a Facemash!</b>. Debes activar tu cuenta , para esto recibiste el codigo $link.
//   Debes dar el click en el siguiente boton para activar tu cuenta!.
// </p>
// <a href='http://facemash-koel.rhcloud.com/log/activacion?link=$link'>Activar cuenta </a>
// </body>
// </html>
// ";
//
// //para el envío en formato HTML
// $headers = "MIME-Version: 1.0\r\n";
// $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//
// if(mail($destinatario,$asunto,$cuerpo,$headers)){
//     echo "Se ha enviado un mensaje a tu correo electronico con el código de activación";
//     header("location:http://facemash-koel.rhcloud.com");
// }else{
//     echo "Ha ocurrido un error y no se puede enviar el correo";
// }
?>
