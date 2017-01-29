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

<div class="row">
    
    <br>
<div class="col-sm-1"></div>

<div class="col-sm-10">

    <table class="table table-striped table-hover">
      <tr>
        <th>ID</th>
        <th>Nombres </th>
        <th>Apellidos</th>
        <th>Agencia</th>
        <th>Lat</th>
        <th>Lon</th>
      </tr>

    <?php
      foreach ($matrizDatos as $key  => $registro) {
        echo "<tr><td>". ($key+1)."</td>";
        echo "<td>". $registro["NOMBREPERSONA"]."</td>";
        echo "<td>". $registro["APELLIDOPERSONA"]."</td>";
        echo "<td>". $registro["IDAGENCIA"]."</td>";
        echo "<td>". $registro["LAT"]."</td>";
        echo "<td>". $registro["LON"]."</td></tr>";
      }
 
     ?>
    </table>
    <br>
    <a href="/mapa/vista/buscarView.php" class="btn btn-success">Buscar</a>
</div>
<div class="col-sm-1"></div>

 
  
</div>
</div>

</body>
</html>
