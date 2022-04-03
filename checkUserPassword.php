<?php
session_start();

$mysqli = new mysqli("localhost", "biblio", "biblio", "biblioteca");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT tipo_usu FROM usuarios WHERE usuarios.usuario = ? AND password = ?";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_GET['user'], $_GET['pass']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($tipo);
$stmt->fetch();
$stmt->close();

if($tipo!=null && $tipo!=""){
  $_SESSION["user"] = $_GET['user'];
  $_SESSION["pass"] = $_GET['pass'];
  if($tipo=="administrador"){
    $_SESSION["tipo"] = "admin";
  }else{
    $_SESSION["tipo"] = "no-admin";

  }
}

echo $tipo;

?>