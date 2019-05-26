<?php 

session_start();

require_once '../model/autoload.php';

$cliente_fk = $_POST['cliente_fk'];
$lista_compras_fk = $_POST['lista_compras_fk'];
$produtos_fk = $_POST['produtos_fk'];

$item_lista_compras = new Itemlistadecompras();

$item_lista_compras->cliente_fk = $cliente_fk;
$item_lista_compras->lista_compras_fk = $lista_compras_fk;
$item_lista_compras->produtos_fk = $produtos_fk;



$item_lista_compras->cadastrarItemlistadecompras();
header("Location: ../view/list-listadecomprasView.php");



