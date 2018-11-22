<?php 

/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once '../model/autoload.php';

$users = new Users();

$users->email = $_POST['email'];
$users->password = md5($_POST['password']);



if (isset($_POST['email'])  && !empty($_POST['email']))
{
	$users->setLogged();
} ;




 ?>