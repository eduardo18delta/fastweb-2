<?php 

session_start();

require_once '../model/autoload.php';

$listadecompras = new Listadecompras();

$listadecompras->id = $_POST['id'];


if (isset($_POST['id']))
{
	$listadecompras->deletarListadecompras();
	header("Location: ../view/list-listadecomprasView.php");
} 

