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
    
    
    <?php include 'conexion.php';?>
    
    <?php

    $id = $_REQUEST["id"];

    $sql = "SELECT id, isbn, titulo, autor, categoria, editorial, resumen FROM libros where id = '" . $id . "'";

    $result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        echo "<br>

<form id='formulario' method='POST' action='borrarLibro.php' onsubmit='return validarForm()'>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>ID</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='id' type='text' name='id' value='" . $id . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>ISBN</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='isbn' type='text' name='isbn' value='" . $row["isbn"] . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Título</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='titulo' type='text' name='titulo' value='" . $row["titulo"] . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Autor</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='autor' type='text' name='autor' value='" . $row["autor"] . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>";


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
  
  echo "<div class='row align-items-center text-end'>

  <div class='col-5'>
      <label class='fs-5'>Categoría</label><br>
  </div>

  <div class='col-2'>
          <input class='form-control' id='categoria' type='text' name='categoria' value='" . $valorDescripcion . "'
              maxlength='60' readonly>
      </div>

</div>
<br>";

 

  echo "<div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Editorial</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='editorial' type='text' name='editorial' value='" . $row["editorial"] . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>

  <div class='row align-items-center text-end'>

      <div class='col-5'>
          <label class='fs-5'>Resumen</label><br>
      </div>

      <div class='col-2'>
          <input class='form-control' id='resumen' type='text' name='resumen' value='" . $row["resumen"] . "'
              maxlength='60' readonly>
      </div>

  </div>
  <br>

  <div class='container'>
    <div class='row align-items-center text-end'>

      <div class='col-5'>
      <a href='listaLibros.php' class='btn btn-primary' title='Volver'>Volver</a>
        </div>
        
        <div class='col-1'>
          <button id='botonBorrar' class='btn btn-primary' type='submit' value='submit'>Borrar</button>
	    </div>

	    </div>
    </div>
    <br>

    </form>";

    }

}

      ?>

</head>

<html>