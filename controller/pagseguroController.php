<?php

if (!isset($_SESSION)) {
  session_start();
} 

//==================SE NÃO HAVER A SESSÃO CARRINHO, ELA SERÁ CRIADO, DO TIPO ARRAY================
if(!isset($_SESSION['carrinho'])){
     $_SESSION['carrinho'] = array();
  }

       //ALTERAR QUANTIDADE
      $id_produto = intval($_POST['form-produto-id']);

            if(is_array($_POST['carrinho-qtd-produto'])){
               foreach($_POST['carrinho-qtd-produto'] as $id_produto => $qtd){
                  $id_produto  = intval($id_produto);
                  $qtd = intval($qtd);
                  if(!empty($qtd) && $qtd > 0 && is_numeric($qtd)){
                     $_SESSION['carrinho'][$id_produto] = $qtd;
                  }else{
                    $_SESSION['carrinho'][$id_produto] = 1;
                  }
               }
            }
        
    //  }               
  
           
require_once '../model/autoload.php'; $produtos = new Produtos(); 

$id = 1;           
$valor_total = 0;
$qtd_produtos = 0;
 if(count($_SESSION['carrinho']) == 0){
                     //echo json_encode("0");
                     }else{   
        
        foreach($_SESSION['carrinho'] as $id_produto => $qtd){ 
        $listaEspecifica=$produtos->setId($id_produto);
        $listaEspecifica=$produtos->listaEspecifica();
        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;
        //$id = $listaEspecifica['id_produto'];
        $valor = $listaEspecifica['valor'];
        $valor = number_format($valor,2,".",".");
        //echo $valor;
        $data['token'] ='D82D294D0618483687CCBAEB7ABFF314';
        //$data['token'] ='7b9e4105-5146-4c8b-984a-60ea699720710c3282f4470190ffaadd8b8f6c68584295dc-1b91-43be-8806-b0f281ae4f15';
		$data['email'] = 'rosivan7qi@gmail.com';
		$data['currency'] = 'BRL';
		$data['itemId'.$id] = $listaEspecifica['id_produto'];
		$data['itemQuantity'.$id] = $qtd;
		$data['itemDescription'.$id] = $listaEspecifica['nome'];
		$data['itemAmount'.$id] = $valor;
		$data['senderName'] = $_SESSION['nome']; //nome do usuário deve conter nome e sobrenome
		$data['senderAreaCode'] = '96';
		//  $data['senderPhone'] = $_SESSION['telefone'];
    $data['senderPhone'] = '988095018';
    //$data['senderEmail'] = $_SESSION['email'];
		$data['senderEmail'] = 'teste2@sandbox.pagseguro.com.br';
		$data['senderCPF'] = '01927015251';
		//$data['shippingAddressPostalCode'] = '68909844';
		//$data['billingAddressPostalCode'] = '68909844';
		//$data['receiverEmail'] = 'rosivan7qi@gmail.com';
		//$data['senderEmail'] = 'teste@sandbox.pagseguro.com.br';
		//echo $data['itemAmount'.$id];
       $id++; 

}


}

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';;
//$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$xml= curl_exec($curl);
//echo $xml;
curl_close($curl);

$xml= simplexml_load_string($xml);
echo $xml -> code;
//echo $xml; exit;
//$xml = simplexml_load_string($xml);

//===========================================
/*
$data['token'] ='7b9e4105-5146-4c8b-984a-60ea699720710c3282f4470190ffaadd8b8f6c68584295dc-1b91-43be-8806-b0f281ae4f15';
$data['email'] = 'rosivan7qi@gmail.com';
$data['currency'] = 'BRL';
$data['itemId1'] = '1';
$data['itemQuantity1'] = '1';
$data['itemDescription1'] = 'Uva Melissa';
$data['itemAmount1'] = '20.00';

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$xml= curl_exec($curl);

curl_close($curl);

$xml= simplexml_load_string($xml);
echo $xml -> code;
//echo $xml; exit;
//$xml = simplexml_load_string($xml);
*/
?>