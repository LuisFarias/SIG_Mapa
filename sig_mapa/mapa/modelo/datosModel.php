<?php


  class datosModel{

      private $db;

      private $datos;

      public function __construct()
      {

        require_once ("conectar.php");

        $this->db = conectar::conexion();
        $this->datos=array();

      }

      public function getDatos($nombre, $apellido, $agencia,$lat,$lon){

        $sql = "INSERT INTO persona (NOMBREPERSONA, APELLIDOPERSONA, IDAGENCIA,LAT, LON)
        VALUES ('$nombre','$apellido','$agencia','$lat','$lon')";

        $ingreso =  mysql_query($sql);

        $consulta =  mysql_query('select * from persona');

        while ($fila = mysql_fetch_array($consulta)) {
          $this->datos[] = $fila;
        }

        return $this->datos;
       }
       public function getBuscarDatos($nombreBuscar){



        $consulta =  mysql_query('select * from persona where NOMBREPERSONA like "%'.$nombreBuscar.'%" ');

        while ($fila = mysql_fetch_array($consulta)) {
          $this->datos[] = $fila;
        }

        return $this->datos;
       }

 
}



 ?>
