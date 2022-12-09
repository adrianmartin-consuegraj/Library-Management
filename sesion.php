<?php
session_start();
?>

<?php 
//include 'conexion.php';?>
<?php




$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];

echo "USUARIO: " . $usuario;


//$sql = "SELECT usuario, password, tipo FROM usuarios";
//$conn->query($sql);
//$result = $conn->query($sql);

/*
$location = "index.html";

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

            if($usuario == $row["usuario"] && $password == $row["password"]){
                echo "- Usuario y contraseña introducidos: " . $usuario . " // " . $password . "";
                echo "<br>";
                echo "+ Usuario y contraseña de la Base de Datos: " . $row["usuario"] . " // " . $row["password"] . "";
                echo "<br>";
                echo "+ TIPO obtenido de la Base de Datos: " . $tipo;
                $tipo = $row["tipo"];

                $location = "listaLibros.php";
                
                $_SESSION['usuario'] = $usuario;
                $_SESSION['password'] = $password;
                $_SESSION['tipo'] = $tipo;

            }

    }

}    
*/

$location = "listaLibros.php";
header('Location:' . $location .'');

?>
