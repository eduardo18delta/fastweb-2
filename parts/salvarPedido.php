<?php
if (!isset($_SESSION)) {
  session_start();
} 
 
require_once '../model/autoload.php'; 

$pedido = new Pedido(); 
 
$pedido->salvarPedido();

$result = $pedido->consultarUltimoPedido();

foreach ($result as $lista){
	
} 
$_SESSION['referencia'] = $lista["id"];

?>

