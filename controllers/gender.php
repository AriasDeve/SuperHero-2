<?php
require_once "../models/Gender.php";

if(isset($_POST["operacion"])){
  
  $gender = new Gender();


  if($_POST["operacion"] == 'listar'){
    $datos = $gender->listarGender();
    if ($datos){
      echo json_encode($datos);
    }
  }
}