<?php 

session_start();

require_once '../model/autoload.php';

$id = $_POST['id'];
$nome = $_POST['nome'];


$listadecompras = new Listadecompras();

$listadecompras->nome = $nome;
$listadecompras->id =$id;

$listadecompras->atualizar();

header("Location: ../view/list-listadecomprasView.php");

 ?>

