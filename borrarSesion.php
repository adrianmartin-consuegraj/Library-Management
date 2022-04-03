<?php include 'conexion.php';
//BORRAR SESIÓN

session_unset();
session_destroy();

header('Location: index.html');
?>

