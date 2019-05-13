<?php

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='D82D294D0618483687CCBAEB7ABFF314';
//$data['token'] ='7b9e4105-5146-4c8b-984a-60ea699720710c3282f4470190ffaadd8b8f6c68584295dc-1b91-43be-8806-b0f281ae4f15';
$data['email'] = 'rosivan7qi@gmail.com';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
$status = $xml->status;

if($reference && $status){
require_once '../model/autoload.php'; $pedido = new Pedido(); 

$pedido = new Pedido(); 
 
$result = $pedido->consultarPedido($reference);

$result_pedido = $pedido->consultarPedido($reference);
foreach ($result_pedido as $lista){}

$pedido_consultado = $lista["id"];
echo $pedido_consultado;
if($pedido_consultado){
$pedido->atualizarPedido($reference,$status);

}

}

?>