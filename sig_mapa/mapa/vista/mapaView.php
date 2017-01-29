<!DOCTYPE html>
<html>
    <head>

       <link rel="stylesheet" href="../estilo/css/bootstrap.min.css" >


       
    </head>
<body class="bg bg-primary">
   
<h3>Usuarios  Registrados</h3>

<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");

  var mapOptions = {
    center: new google.maps.LatLng(0.9726616, -79.6583853), 
    zoom: 10
  }

  var map = new google.maps.Map(mapCanvas, mapOptions);

<?php foreach ($matrizBuscarDatos as $i) { ?>
  var myLatLng = {lat: <?php echo $i["LAT"]?>, lng: <?php echo $i["LON"]?>};
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'NOMBRE: <?php echo $i["NOMBREPERSONA"]?>'
  });
<?php  } ?>
}
</script>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHK5XI8GLLVx3gq_OlsGJdntUozYAnjS8&callback=myMap"></script>
      </script> <br>
 <a href="/mapa/vista/creacion-datosView.php" class="btn btn-success"> Crear</a>
</body>
</html>