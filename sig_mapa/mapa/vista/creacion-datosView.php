<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAHK5XI8GLLVx3gq_OlsGJdntUozYAnjS8">
    </script>
      <script type="text/javascript">
      var mapa;
      var opcionesMapa;
      function InicializarMapa() {
        //declaramos un objeto de la clase google.maps.LatLng con la posicion
          var AVBCPosition = new google.maps.LatLng(41.392215729, 2.20155715);
          
          //define las opciones del mapa, el centro, el zoom y el tipo (ROADMAP)
          opcionesMapa = {
              center: AVBCPosition,
              zoom: 11,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          //define un objeto de la clase google.maps.Map (el mapa) y define en que elemento aparece y cuales son las opciones
          mapa = new google.maps.Map(document.getElementById("map_canvas"), opcionesMapa);
          
          //define un marcador para esa posicion inicial
          var opcionesMarcador = {
              position: AVBCPosition,
              map: mapa,
              draggable:true,
              animation: google.maps.Animation.DROP,
              title: "Hola."
          }
          //define un objeto de la clase google.maps.Maker 
          var marcador = new google.maps.Marker(opcionesMarcador);
          // activa la escucha del evento clik del raton para que muestre las coord del punto
          google.maps.event.addListener(mapa, "click", function(evento) {
              // mostrar las coordenadas del punto seleccionado
              MostrarCoordenadas(mapa, evento.latLng);
          });
          //muestra las coordenadas en la infoventana de google maps
        function MostrarCoordenadas(mapa, latLng) {
            var opcionesVentana = {
                content: "Las coordenadas del punto son:<br>(" +
                    latLng.lat() + " &deg;N, " +
                    latLng.lng() + " &deg;E)",
                position: latLng
            }
            //define un objeto de la clase google.maps.infoWindow
            var ventanaInfo = new google.maps.InfoWindow(opcionesVentana);
            
            ventanaInfo.open(mapa);
        }
        //========MUESTRA LA POSICION DEL NAVEGADOR===============
        var botonGET = document.getElementById('getPosition');
        botonGET.addEventListener('click', obtenerPosicion, false);
      
        function obtenerPosicion(){
          var geoconfig={
              enableHighAccuracy: true,
              maximumAge: 60000
            };
            control=navigator.geolocation.watchPosition(mostrar, errores, geoconfig);
        }
        function mostrar(posicion){
            var ubicacion=document.getElementById('ubicacion');
          var datos='';
          datos+='Latitud:  '+posicion.coords.latitude+'<br>';

          /*Escribe latitud en el formulario*/
          $('#lat').attr('value', posicion.coords.latitude);
       
          datos+='Longitud: '+posicion.coords.longitude+'<br>';
          /*Escribe longitud en el formulario*/
          $('#lon').attr('value', posicion.coords.longitude);

          datos+='Exactitud: '+posicion.coords.accuracy+'mts.<br>';
          ubicacion.innerHTML=datos;
            
            var miPosicion = new google.maps.LatLng(
              posicion.coords.latitude,posicion.coords.longitude
              );
            //centra el mapa en esa posicion, tambien funciona con:
              //mapa.map.setCenter(miPosicion, 11);
              mapa.panTo(miPosicion);
              mapa.setZoom(11);
              //define un marcador para esa posicion 
            var opcionesMarcadorMe = {
                position:miPosicion,
                map: mapa,
                draggable:true,
                animation: google.maps.Animation.DROP,
                title: "HOLA MUNDO, estoy aquí."
            }
            //define un objeto de la clase google.maps.Maker 
            var marcadorMe = new google.maps.Marker(opcionesMarcadorMe);
        }
        function errores(error){
          alert('Error: '+error.code+' '+error.message);
        }
        //=====EL CENTRO DEL MAPA MUESTRA UNA POSICION AL AZAR======
        var botonRANDOM=document.getElementById('randomPosition');
        botonRANDOM.addEventListener('click', PosicionRandom, false);
        function PosicionRandom () {
          var surOeste = new google.maps.LatLng(51.203405,12.244141);
          var norEste = new google.maps.LatLng(-25.363882,180.044922);
          var longSpan = norEste.lng() - surOeste.lng();
          var latSpan = norEste.lat() - surOeste.lat();
          var randomLat =surOeste.lat() + latSpan * Math.random();
          var randomLon =surOeste.lng() + longSpan * Math.random();
          var randomlocation = new google.maps.LatLng(randomLat,randomLon);
          
          marcador.setPosition(randomlocation);
          //mapa.setCenter(randomlocation, 8);
              //mapa.panTo(randomlocation);
              mapa.setCenter(marcador.getPosition());
              mapa.setZoom(5);
          var datos='';
          datos+='Latitud: '+randomLat+'<br>';
          datos+='Longitud: '+randomLon+'<br>';
          
          document.getElementById('ubicacion').innerHTML=datos;   
        }
        //=====INTRODUCE COORDENADAS DEL LUGAR QUE SE QUIERE MOSTRAR======
        var botonGO=document.getElementById('goToPosition');
        botonGO.addEventListener('click', muestraCoord, false);
        function muestraCoord () {
          document.getElementById('coordenadas').style.display = 'block';
        }
        document.getElementById('go').addEventListener('click', goToCoord, false);
        function goToCoord (){
          var cLat =document.getElementById('Latitud').value;
          var cLon =document.getElementById('Longitud').value;
          var destino;
         destino = new google.maps.LatLng(cLat,cLon);
          
          
          marcador.setPosition(destino);
              mapa.setCenter(marcador.getPosition());
              mapa.setZoom(5);
          var datos='';
          datos+='Latitud: '+cLat+'<br>';
          datos+='Longitud: '+cLon+'<br>';

          document.getElementById('ubicacion').innerHTML=datos;   
        }
      } 
    </script>
  <link rel="stylesheet" href="../estilo/css/bootstrap.min.css" >
 
<script src="../jquery-3.1.1.min.js"></script>
</head>
<body class="bg-info" onload="InicializarMapa()">
  <div class="container">

<div class="row">
  
   <h2 class="text-center">Ingreso de Datos</h2>

</div>

<div style="text-align: center;">
      <button id="getPosition" class="btn btn-primary">Obtener mi posicion</button>
        <button id="randomPosition" class="btn btn-success">Obtener posicion al azar</button>
        <button id="goToPosition" class="btn btn-warning">Ir a una determinada posicion</button>
        <a href="/mapa/index.php" class="btn btn-danger">Principal</a>
      
        <br><br>
      <section id="ubicacion"  >
      </section>
      <div id="coordenadas" style="display:none">
        Latitud<input id="Latitud" name="Latitud" placeholder="4.3922157">
        Longitud<input id="Longitud" name="Longitud" placeholder="-2.2045689">
        <button id="go">GO</button>

      </div>
      <div id="map_canvas" style="width: 800px; height: 500px; background-color:#666; margin: 0 auto;"></div>
      <div><p>Haciendo clik en cualquier posicion del mapa puedes saber las coordenadas</p></div>
</div>


<div class="row">
    <form role="form" method="POST" action="/mapa/index.php">
      <div class="form-group">
        <label for="ejemplo_email_1">Nombres</label>
        <input type="" class="form-control" id="ejemplo_email_1" name="nombre" 
               placeholder="Ingrese los nombres">
      </div> 
       <div class="form-group">
        <label for="ejemplo_email_1" >Apellidos</label>
        <input type="" class="form-control" name="apellido" id="ejemplo_email_1"
               placeholder="Ingrese los apellidos">
      </div>
      <div class="form-group">
        <label for="lat" >Lat</label>
        <input type="" class="form-control" name="lat" id="lat"
               placeholder="Ingrese la latitud">
      </div>

      <div class="form-group">
        <label for="ejemplo_email_1" >Lon</label>
        <input type="" class="form-control" name="lon" id="lon"
               placeholder="Ingrese la longitud">
      </div>
      <div class="form-group">
          <label for="ejemplo_email_1">Agencias</label>

        <select class="form-control" name="agencia">
          <option value="">Seleccione la opción</option>
          <option value="A BABOR VIAJES S">A BABOR VIAJES SL</option>
          <option value="APPLE">APPLE</option>
          <option value="MAZDA">MAZDA</option>
          <option value="CHEVROLET">CHEVROLET</option>
          <option value="KIA MOTORS">KIA MOTORS</option>
          <option value="FORD">FORD</option>
        </select>
      </div>


      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>

   

   </div>

</body>
<script type="text/javascript">

 $('#ubicacion').click(function() {
  
  alert($(this).val());

}); 
</script>
</html>
