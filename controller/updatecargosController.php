<?php 

session_start();

require_once '../model/autoload.php';

$id = $_POST['id'];
$nome = $_POST['cargos'];

$cargos = new Cargos();
$cargos->id = $id;

$cargos->id = $id;
$cargos->descricao = $nome;
$cargos->atualizar();

header("Location: ../view/list-cargos.php");

?>