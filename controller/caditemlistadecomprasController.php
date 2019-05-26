<?php 

session_start();

require_once '../model/autoload.php';

$cliente_fk = $_GET['cliente_fk'];
$lista_compras_fk = $_GET['lista_compras_fk'];
$produtos_fk = $_GET['produtos_fk'];

$item_lista_compras = new Itemlistadecompras();

$item_lista_compras->cliente_fk = $cliente_fk;
$item_lista_compras->lista_compras_fk = $lista_compras_fk;
$item_lista_compras->produtos_fk = $produtos_fk;



$item_lista_compras->cadastrarListadecompras();
header("Location: ../view/list-listadecomprasView.php");



