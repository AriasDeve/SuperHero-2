<?php

require_once "../models/Superhero.php";

if(isset($_POST['operacion'])){
  $superhero = new SuperHero();

  if($_POST['operacion'] == 'listar'){
    $datos = $superhero->listarSuperHero($_POST["publisher_id"]);
    if ($datos){
      echo json_encode($datos);
    }
  }
}