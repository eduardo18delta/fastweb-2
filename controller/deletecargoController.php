<?php 

session_start();

require_once '../model/autoload.php';

$cargo = new Cargos();

$cargo->id = $_POST['id'];

$cargo->verificadelete();




/*
if (isset($_POST['id'])  && !empty($_POST['id']))
{
	$cargo->deletarcargo();
	header("Location: ../view/list-cargos.php");
} 


*/

