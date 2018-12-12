<?php 

session_start();

require_once '../model/autoload.php';

$produto = new Produtos();

$produto->id = $_POST['id'];


if (isset($_POST['id'])  && !empty($_POST['id']))
{
	$produto->deletar();
	header("Location: ../view/list-produtos.php");
} 

