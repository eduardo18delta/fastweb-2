<?php
 
 require_once '../model/autoload.php'; 

$pedido = new Pedido(); 
 
$pedido->salvarPedido();

$result = $pedido->consultarUltimoPedido();

foreach ($result as $lista){
	
} 
echo $lista["id"];

?>

