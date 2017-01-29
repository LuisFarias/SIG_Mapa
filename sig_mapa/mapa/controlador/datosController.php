<?php
	  /*Llama al modelo*/
      require_once('modelo/datosModel.php');

	  $datos = new datosModel();
	  
	  if (!empty($nombre) && !empty($apellido)  && !empty($agencia) ) {

	  $matrizDatos =  $datos->getDatos($nombre, $apellido, $agencia, $lat, $lon);
      
      /*Llama a la vista*/
      require_once ('vista/reporte-datosView.php');

	  } 

	 if (!empty($nombreBuscar)  ) {

	  $matrizBuscarDatos =  $datos->getBuscarDatos($nombreBuscar);
     
      /*Llama a la vista*/
      require_once ('vista/mapaView.php');

	  } 

 ?>
