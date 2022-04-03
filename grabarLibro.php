<?php include 'conexion.php';?>

<?php

$accion = $_REQUEST['accion'];

    $id = $_REQUEST['id'];
    $isbn = $_REQUEST['isbn'];
    $titulo = $_REQUEST['titulo'];
    $autor = $_REQUEST['autor'];
    $categoria = $_REQUEST['categoria'];
    $editorial = $_REQUEST['editorial'];
    $resumen = $_REQUEST['resumen'];

    //cho "accion: " . $accion;

if ($accion == "Modificar"){
    $sql = "UPDATE libros SET isbn='" . $isbn . "', titulo='" . $titulo . "', autor='" . $autor . "', categoria='" . $categoria . "', editorial='" . $editorial . "', resumen='" . $resumen . "' WHERE id = '" . $id . "'";
} 

echo "accion: " . $accion;

if ($accion == "Alta"){
    $sql = "INSERT INTO libros VALUES ('', '" . $isbn . "','" . $titulo . "','" . $autor . "','" . $categoria ."','" . $editorial . "','" . $resumen . "')";
}

echo $sql;

$conn->query($sql);

$conn->close();

//echo "CATEGORIA INSERTADA: " . $categoria;

header('Location: listaLibros.php');

?>