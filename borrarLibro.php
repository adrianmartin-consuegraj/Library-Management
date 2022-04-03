<?php include 'conexion.php';?>


<?php

$id = $_REQUEST['id'];

$sql = "DELETE FROM libros WHERE id='" . $id . "'";
//echo $sql;

$conn->query($sql);

$conn->close();

header('Location: listaLibros.php');

?>