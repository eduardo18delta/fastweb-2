<?php 

session_start();

require_once '../model/autoload.php';

$listadecompras = new Listadecompras(); 
$idusuario = $_SESSION['id'];

$listadecompras = $listadecompras->listaListadecompras($idusuario);


foreach ($listadecompras as $lista){

$consulta[] = $lista['id'];
$consulta[] = $lista['nome'];


}

echo json_encode($consulta);
