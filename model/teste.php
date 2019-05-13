<?php


session_start();  if(isset($_SESSION['id'])) { 

require_once '../model/autoload.php'; 


$idcliente = $_SESSION['id'];
$endereco_fk = $_POST['endereco'];


$clientes = new Cliente();

$clientes->endereco_fk = intval($endereco_fk);
$clientes->id = intval($idcliente);

$clientes->atualizarCliente();
$_SESSION['endereco_fk'] = $endereco_fk;
echo json_encode(intval($endereco_fk));


}


?>