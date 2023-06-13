<?php
require_once "../models/Publishers.php";

if(isset($_POST["operacion"])){
  
  $publisher = new Publishers();


  if($_POST["operacion"] == 'listar'){
    $datos = $publisher->listarPublishers();
    if ($datos){
      echo json_encode($datos);
    }
  }
}