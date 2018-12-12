<?php 

session_start();

require_once '../model/autoload.php';

$cliente = new Cliente();

$cliente->id = $_POST['id'];


if (isset($_POST['id'])  && !empty($_POST['id']))
{
	$cliente->deletar();
	header("Location: ../view/list-cliente.php");
} 

