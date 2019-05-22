<?php


session_start();  if(isset($_SESSION['id'])) { 

require_once '../model/autoload.php'; 


//$idcliente = $_SESSION['id'];
$idendereco = $_POST['endereco'];


$enderecos = new Endereco();

$enderecos->id = intval($idendereco);
//$enderecos->cliente_fk = intval($idcliente);

$enderecos->principalEndereco();
//$_SESSION['principal'] = $idendereco;
echo json_encode(intval($idendereco));


}


?>