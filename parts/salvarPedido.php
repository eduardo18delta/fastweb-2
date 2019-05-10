<?php
if (!isset($_SESSION)) {
  session_start();
} 
 
require_once '../model/autoload.php'; 

$idusuario = $_SESSION['id'];

$pedido = new Pedido(); 
 
$pedido->salvarPedido();

$result = $pedido->consultarUltimoPedido();

foreach ($result as $lista){
	
} 
$_SESSION['referencia'] = $lista["id"];

?>

