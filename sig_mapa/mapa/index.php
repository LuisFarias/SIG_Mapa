<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="./estilo/css/bootstrap.min.css" >

</head>
<body class="bg-info">

<div class="container">

  
  <div class="jumbotron">
    <h1>SIG</h1> 
    <p>Sistema de Información Geográfica creado por <code>Luis Farias.</code></p><br> 
    <a href="/mapa/vista/creacion-datosView.php" class="btn btn-success">Crear datos</a>
  </div>



  <?php
    if( (!empty($_POST['nombre'])) && (!empty($_POST['apellido'])) && (!empty($_POST['agencia'])) ) {


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $agencia = $_POST['agencia'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
 
    require_once ("controlador/datosController.php");

    }

    if(!empty($_POST['nombreBuscar'])){

      $nombreBuscar = $_POST['nombreBuscar'];
      require_once ("controlador/datosController.php");

    }
 
   ?> 



  

</div>

</body>
</html>
