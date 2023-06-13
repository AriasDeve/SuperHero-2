<?php
require_once "../models/Alignment.php";

if(isset($_POST["operacion"])){
  
  $alignment = new Alignment();


  if($_POST["operacion"] == 'listar'){
    $datos = $alignment->listarAlignment();
    if ($datos){
      echo json_encode($datos);
    }
  }
}