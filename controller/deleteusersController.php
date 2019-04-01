<?php 

session_start();

require_once '../model/autoload.php';

$users = new Users();

$users->id = $_POST['id'];


if (isset($_POST['id'])  && !empty($_POST['id']))
{
	$users->deletar();
	header("Location: ../view/list-users.php");
} 

