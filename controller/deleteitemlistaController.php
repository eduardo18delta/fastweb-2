<?php 

session_start();

require_once '../model/autoload.php';

$itemlistadecompras = new Itemlistadecompras();

$itemlistadecompras->id = $_POST['id'];


if (isset($_POST['id']))
{
	$itemlistadecompras->deletarItemlistadecompras();
	header("Location: ../view/list-listadecomprasView.php");
} 

