<?php
session_start();

$tipo = $_SESSION['tipo'];

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista Libros</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script>

    function entrar(elemento) {
			elemento.style.backgroundColor = "lightblue";
		}

		function salir(elemento) {
			elemento.style.backgroundColor = "";
		}

    </script>

<?php include 'conexion.php';?>

<?php
//require_once("conexion.php");

//SQL - BASE
$sqlBase = "SELECT id, isbn, titulo, autor, categoria, editorial, resumen FROM libros";

//SQL datos recuperados- BUSQUEDA
$busqueda = null;
$buscarPor = null;

if (isset($_REQUEST['inputBuscar'])){
  $busqueda = $_REQUEST['inputBuscar'];
}

if (isset($_REQUEST['buscarPor'])){
  $buscarPor = $_REQUEST['buscarPor'];
}

//echo "Buscar por: " . $buscarPor . "";
//echo "<br>";

if ($busqueda!=""){
  if ($buscarPor==""){

    $sqlBusqueda = "";

  } else{

    $sqlBusqueda = " WHERE " . $buscarPor . " LIKE '%" . $busqueda . "%'";
  }
  
} else{

  $sqlBusqueda = "";

}

//SQL datos recuperados- ORDEN
$orden = null;
$desc = null;

if (isset($_REQUEST['orden'])){
  $orden = $_REQUEST['orden'];
}

if (isset($_REQUEST['desc'])){
  $desc = $_REQUEST['desc'];
}

if ($orden!=""){

  if ($desc == 'si'){
    $sqlOrden = " ORDER BY " . $orden . " desc";
  } else{
    $sqlOrden = " ORDER BY " . $orden . "";
  }
  
} else{
  $sqlOrden = "";
}


$sqlFinal = $sqlBase . $sqlBusqueda . $sqlOrden;
//echo $sqlFinal;

$result = $conn->query($sqlFinal);

if ($result->num_rows > 0) {
  // output data of each row  
  
  echo "<br>
  
  <form id='formulario' method='POST' action='listaLibros.php' onsubmit='return validarForm()'>

  </div>

			<div class='row align-items-center text-end'>

        <div class='col-1'>
          <p style='text-align: center;'>Sesión Iniciada como " . $_SESSION['usuario'] . "</p>
        </div>
      
        <div class='col-1 align-items-center text-center'>
          <a href='index.html' class='btn btn-primary' title='alta'>Cerrar Sesión</a>
        </div>

        <div class='col-4'>
          
				</div>

				<div class='col-3 align-items-center text-end'>
          <input class='form-control' id='buscar' type='text' name='inputBuscar' placeholder='...'
          maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
          onkeyup='validarStringInside(this,2,60)'>
          <p class='invalid-feedback' id=errorBuscar' style='text-align: center;'>El valor introducido debe estar entre 2 y 60 caracteres</p>
				</div>

        <div class='col-1 align-items-center text-center'>

          <select name='buscarPor' class='btn btn-primary'>
            <option value='' selected disabled hidden>Filtrar por...</option>
            <option value='isbn'>ISBN</option>
            <option value='titulo'>Titulo</option>
            <option value='autor'>Autor</option>
            <option value='editorial'>Editorial</option>
            <option value='resumen'>Resumen</option>
          </select>

				</div>
        
        <div class='col-1 align-items-center text-center'>
          <button id='botonBuscar' class='btn btn-primary glyphicon glyphicon-search' type='submit' value='submit' onmouseover='entrar(this);'
          onmouseout='salir(this);'> Buscar</button>
				</div>

			</div>
      <br>

      </form>";

    echo "<table class='".'table table-success table-striped'."'><tr>
    
    <th>ID
    <a href='listaLibros.php?orden=id&desc=no' title='ordenID'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=id&desc=si' title='ordenID'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>ISBN
    <a href='listaLibros.php?orden=isbn&desc=no' title='ordenISBN'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=isbn&desc=si' title='ordenISBN'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>Titulo
    <a href='listaLibros.php?orden=titulo&desc=no' title='ordenTitulo'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=titulo&desc=si' title='ordenTitulo'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>Autor
    <a href='listaLibros.php?orden=autor&desc=no' title='ordenAutor'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=autor&desc=si' title='ordenAutor'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>Categoría
    <a href='listaLibros.php?orden=categoria&desc=no' title='ordenCategoria'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=categoria&desc=si' title='ordenCategoria'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>Editorial
    <a href='listaLibros.php?orden=editorial&desc=no' title='ordenEditorial'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=editorial&desc=si' title='ordenEditorial'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>
    
    <th>Resumen
    <a href='listaLibros.php?orden=resumen&desc=no' title='ordenResumen'><span class='glyphicon glyphicon-chevron-up'></span></a></td>
    <a href='listaLibros.php?orden=resumen&desc=si'title='ordenResumen'><span class='glyphicon glyphicon-chevron-down'></span></a></td>
    </th>";
    
    if($tipo == "administrador"){
      echo "<th>Editar
      </th>
  
      <th>Borrar
      </th></tr>";
      }

  while($row = $result->fetch_assoc()) {

    echo "<tr><td>" . $row["id"] . "</td>" .
    "<td>" . $row["isbn"] . "</td>" .
    "<td>" . $row["titulo"] . "</td>" .
    "<td>" . $row["autor"] . "</td>";

  //SQL para recuperar las opciones de las Categorias
    $sqlCategorias= "SELECT idCat, descripcion FROM categorias";
    $resultCategorias = $conn->query($sqlCategorias);

    if ($resultCategorias->num_rows > 0) {

      while($rowCat = $resultCategorias->fetch_assoc()) {
        if($rowCat["idCat"] == $row["categoria"]){

          $valorDescripcion = $rowCat["descripcion"];

      }
    }
  }

    echo "<td>" . $valorDescripcion . "</td>" .
    "<td>" . $row["editorial"]. "</td>" .
    "<td>" . $row["resumen"]. "</td>";

    if($tipo == "administrador"){
      echo "<td><a href='fichaLibro.php?id=" . $row["id"] . "&accion=Modificar' class='glyphicon glyphicon-pencil' title='editar'></a></td>" .
    "<td><a href='confirmacionBorrarLibro.php?id=" . $row["id"] . "' class='glyphicon glyphicon-minus' title='borrar'></a></td></tr>";
      }
  }

  echo "</table>";
  

} else {

  echo "0 Resultados encontrados.";

  echo "<br>
  
  <form id='formulario' method='POST' action='listaLibros.php' onsubmit='return validarForm()'>

			<div class='row align-items-center text-end'>

				<div class='col-7'>
        </div>

				<div class='col-2 align-items-center text-end'>
          <input class='form-control' id='buscar' type='text' name='inputBuscar' placeholder='...'
          maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
          onkeyup='validarStringInside(this,2,60)'>
          <p class='invalid-feedback' id=errorBuscar' style='text-align: center;'>El valor introducido debe estar entre 2 y 60 caracteres</p>
				</div>

        <div class='col-1 align-items-center text-center'>

          <select name='buscarPor' class='btn btn-primary'>
            <option value='' selected disabled hidden>Filtrar por...</option>
            <option value='isbn'>ISBN</option>
            <option value='titulo'>Titulo</option>
            <option value='autor'>Autor</option>
            <option value='categoria'>Categoria</option>
            <option value='editorial'>Editorial</option>
            <option value='resumen'>Resumen</option>
          </select>

				</div>
        
        <div class='col-1 align-items-center text-center'>
          <button id='botonBuscar' class='btn btn-primary glyphicon glyphicon-search' type='submit' value='submit' onmouseover='entrar(this);'
          onmouseout='salir(this);'> Buscar</button>
				</div>

			</div>
      <br>

      </form>";

}

if($tipo == "administrador"){

  echo "<div class='col-5' style='text-align: center;'>
    <a href='fichaLibro.php?id=&accion=Alta' class='btn btn-primary' title='alta'>Alta Libro</a>
      </div>";

}



$conn->close();
?>

</head>

<html>