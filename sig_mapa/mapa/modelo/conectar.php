<?php




  class conectar{

      public static function conexion(){


        $connection = mysql_connect('localhost',  'root', '');
        mysql_select_db("mapa", $connection) or die('No se pudo conectar: ' . mysql_error());



      }

  }


?>
