<?php
require_once "../models/Race.php";

if(isset($_POST["operacion"])){
  
  $race = new Race();


  if($_POST["operacion"] == 'listar'){
    $datos = $race->listarRace();
    if ($datos){
      echo json_encode($datos);
    }
  }
}