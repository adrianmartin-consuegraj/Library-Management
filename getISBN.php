<?php
$mysqli = new mysqli("localhost", "biblio", "biblio", "biblioteca");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT titulo FROM libros WHERE isbn = ?";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s",$_GET['isbn']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($titulo);
$stmt->fetch();
$stmt->close();

echo $titulo;

?>