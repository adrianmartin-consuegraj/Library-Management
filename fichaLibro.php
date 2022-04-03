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
        <?php include 'validar.js';?>
    </script>

    <?php include 'conexion.php';?>
    
    <?php

//Acción - Modificar o Alta
$accion = $_REQUEST['accion'];
echo "ACCION: " . $accion;

if ($accion == "Modificar" ){
    $id = $_REQUEST['id'];
    $sqlCondicion = " WHERE id=" .  $id . "";
    $sql = "SELECT id, isbn, titulo, autor, categoria, editorial, resumen FROM libros" . $sqlCondicion . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            //$id = $row["id"];
            $isbn = $row["isbn"];
            $titulo = $row["titulo"];
            $autor = $row["autor"];
            //$categoria = "";
            $editorial = $row["editorial"];
            $resumen = $row["resumen"];

        }
    }

} elseif ($accion == "Alta"){
    $id = "";
    $sqlCondicion = "";

    $id = "";
    $isbn = "";
    $titulo = "";
    $autor = "";
    //$categoria = "";
    $editorial = "";
    $resumen = "";

}

$sqlCategorias= "SELECT idCat, descripcion FROM categorias";

$resultCategorias = $conn->query($sqlCategorias);

echo "<br>

<form id='formulario' method='POST' action='grabarLibro.php?accion=" . $accion . "' onsubmit='return validarISBNInside()'>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>ID</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='id' type='text' name='id' value='" . $id . "'
              maxlength='60' readonly onfocus='entrar(this)' onblur='salir(this);'
              onkeyup='validarStringInside(this,2,60)'>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

  <div class='col-5'>
      <label class='fs-5'>ISBN</label><br>
  </div>


  <div class='col-2'>
          <input class='form-control' id='isbn' type='text' name='isbn' value='" . $isbn . "'
              maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
              onkeyup='validarISBNInside(this,errorISBN, errorISBNExiste)'>
          <p class='invalid-feedback' id='errorISBN' style='text-align: center;'>El ISBN es incorrecto</p>
          <p class='invalid-feedback' id='errorISBNExiste' style='text-align: center;'>El ISBN ya existe</p>
      </div>


    </div>
    <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Título</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='titulo' type='text' name='titulo' value='" . $titulo . "'
              maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
              onkeyup='validarStringInside(this,2,60)'>
          <p class='invalid-feedback' id='errorTitulo' style='text-align: center;'>El título debe introducirse</p>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Autor</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='autor' type='text' name='autor' value='" . $autor . "'
              maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
              onkeyup='validarStringInside(this,2,60)'>
          <p class='invalid-feedback' id='errorAutor' style='text-align: center;'>El autor debe introducirse</p>
      </div>

  </div>
  <br>";

  
  echo "<div class='row align-items-center text-end'>

  <div class='col-5'>
      <label class='fs-5'>Categoría</label><br>
  </div>

  <div class='col-2'>
    <select name='categoria' class='btn btn-primary'>";

        if ($resultCategorias->num_rows > 0) {

            while($rowCat = $resultCategorias->fetch_assoc()) {
               echo "<option value='" . $rowCat["idCat"] . "'>" . $rowCat["descripcion"] . "</option>";
            }
        }    

    echo "</select>

  </div>

  </div>
  <br>";

  echo "<div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Editorial</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='editorial' type='text' name='editorial' value='" . $editorial . "'
              maxlength='60' onfocus='entrar(this)' onblur='salir(this);'
              onkeyup='validarStringInside(this,2,60)'>
          <p class='invalid-feedback' id='errorEditorial' style='text-align: center;'>La editorial debe introducirse</p>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Resumen</label><br>
      </div>

      <div class='col-2'>
        <textarea class='form-control' id='resumen' name='resumen' rows='10' cols='50' onfocus='entrar(this)' onblur='salir(this);'
        onkeyup='validarStringInside(this,2,600)'>" . $resumen . "</textarea>

              
          <p class='invalid-feedback' id='errorResumen' style='text-align: center;'>El resumen debe introducirse</p>
      </div>

  </div>
  <br>
  
  <div class='container'>
    <div class='row align-items-center text-end'>

      <div class='col-5'>
      <a href='listaLibros.php' class='btn btn-primary' title='alta'>Volver</a>
        </div>
        
        <div class='col-1'>
          <button id='botonBuscar' class='btn btn-primary' type='submit' value='submit' onmouseover='entrar(this);'
          onmouseout='salir(this);'>" . $accion . "</button>
	    </div>

	    </div>
    </div>
    <br>

    </form>";

      ?>

</head>

<html>