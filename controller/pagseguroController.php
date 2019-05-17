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
  
           
require_once '../model/autoload.php'; $produtos = new Produtos(); $pedido = new Pedido();  

//===============================================

$cliente_fk = $_SESSION['id'];
$endereco_fk = $_SESSION['endereco_fk'];
$valor = 0; 
$pedido_efetuado = "23-03-2019";
$pagamento_autorizado = "23-03-2019";
$nf_emitida = "23-03-2019";
 
$pedido->salvarPedido($cliente_fk, $endereco_fk, $valor, $pedido_efetuado, $pagamento_autorizado, $nf_emitida);

$result = $pedido->consultarUltimoPedido();

foreach ($result as $lista){
  
} 

$_SESSION['referencia'] = $lista["id"];
//===============================================


$id = 1;           
$valor_total = 0;
$qtd_produtos = 0;
 if(count($_SESSION['carrinho']) == 0){
                     //echo json_encode("0");
                     }else{   
        
        foreach($_SESSION['carrinho'] as $id_produto => $qtd){ 
        $listaEspecifica=$produtos->setId($id_produto);
        $listaEspecifica=$produtos->listaEspecifica();





        if ($_SESSION['teste2'][$id_produto]=="rs") {
        /*
        $valor_produtos = $qtd;  
        $valor_total += $qtd; 
        $qtd_produtos++;
        $teste[]=$listaEspecifica['id_produto']; // ID do Produto
        $teste[]=number_format($valor_produtos,2,",","."); //Valor da soma de cada produtos
        $teste[]=number_format($valor_total,2,",","."); //Valor total do cliente
        $teste[]=$qtd_produtos; //Quantidade dos produtos no carrinho
        $teste[]=$_SESSION['teste2'][$id_produto]; //Medida
        $teste[]=$listaEspecifica['peso'];
        $teste[]=$qtd; //Quantidade por produto
        */

        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;
        //$id = $listaEspecifica['id_produto'];
        $valor = $listaEspecifica['valor'];
        $valor = number_format($valor,2,".",".");
        //echo $valor;
        //$pedido = preg_replace('/[^[:alnum:]-]/','',$_POST["idPedido"]);
        //$data['token'] ='D82D294D0618483687CCBAEB7ABFF314';
        $data['token'] ='7762809c-5f2f-4e70-be96-aba16d699bc6a596937248bc91fb6606f70861aa04f8192a-a55b-4282-9e0a-d8bf2ac619be';
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
        $data['senderEmail'] = $_SESSION['email'];
        //$data['senderEmail'] = 'teste2@sandbox.pagseguro.com.br';
        $data['senderCPF'] = '01927015251';
        $data['reference'] = intval($_SESSION['referencia']);
        //$data['shippingAddressStreet']     = "avenida 8";
        //$data['shippingAddressNumber']     = "2156";
        //$data['shippingAddressComplement'] = "igreja";
        //$data['shippingAddressDistrict']   = "Marabaixo 2";
        //$data['shippingAddressPostalCode'] = '68.909-844';
        //$data['shippingAddressCity']       = "Macapá";
        //$data['shippingAddressState']      = "ap";
       // $data['shippingAddressCountry']    = 'BRA';
        //$data['shippingAddressPostalCode'] = "68.909-844";
        //$data['billingAddressPostalCode'] = '68909844';
        //$data['receiverEmail'] = 'rosivan7qi@gmail.com';
        //$data['senderEmail'] = 'teste@sandbox.pagseguro.com.br';
        //echo $data['itemAmount'.$id];
           $id++; 

    //======salvar item pedido ========
    $pedido_fk = $_SESSION['referencia'];
    $pedido->salvaritemPedido($pedido_fk, $id_produto, $valor, $qtd);

    //--------------------------------



        } 

        else if ($_SESSION['teste2'][$id_produto]=="kg") {
        /*
        $valor_produtos = $listaEspecifica['valor']*$qtd/$listaEspecifica['peso']; 
        $valor_total += $valor_produtos;
        $qtd_produtos++;
        $teste[]=$listaEspecifica['id_produto']; // ID do Produto
        $teste[]=number_format($valor_produtos,2,",","."); //Valor da soma de cada produtos
        $teste[]=number_format($valor_total,2,",","."); //Valor total do cliente
        $teste[]=$qtd_produtos; //Quantidade dos produtos no carrinho
        $teste[]=$_SESSION['teste2'][$id_produto]; //Medida
        $teste[]=$listaEspecifica['peso'];
        $teste[]=$qtd; //Quantidade por produto
        */

        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;
        //$id = $listaEspecifica['id_produto'];
        $valor = $listaEspecifica['valor'];
        $valor = number_format($valor,2,".",".");
        //echo $valor;
        //$pedido = preg_replace('/[^[:alnum:]-]/','',$_POST["idPedido"]);
        //$data['token'] ='D82D294D0618483687CCBAEB7ABFF314';
        $data['token'] ='7762809c-5f2f-4e70-be96-aba16d699bc6a596937248bc91fb6606f70861aa04f8192a-a55b-4282-9e0a-d8bf2ac619be';
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
        $data['senderEmail'] = $_SESSION['email'];
        //$data['senderEmail'] = 'teste2@sandbox.pagseguro.com.br';
        $data['senderCPF'] = '01927015251';
        $data['reference'] = intval($_SESSION['referencia']);
        //$data['shippingAddressStreet']     = "avenida 8";
        //$data['shippingAddressNumber']     = "2156";
        //$data['shippingAddressComplement'] = "igreja";
        //$data['shippingAddressDistrict']   = "Marabaixo 2";
        //$data['shippingAddressPostalCode'] = '68.909-844';
        //$data['shippingAddressCity']       = "Macapá";
        //$data['shippingAddressState']      = "ap";
       // $data['shippingAddressCountry']    = 'BRA';
        //$data['shippingAddressPostalCode'] = "68.909-844";
        //$data['billingAddressPostalCode'] = '68909844';
        //$data['receiverEmail'] = 'rosivan7qi@gmail.com';
        //$data['senderEmail'] = 'teste@sandbox.pagseguro.com.br';
        //echo $data['itemAmount'.$id];
           $id++; 

    //======salvar item pedido ========
    $pedido_fk = $_SESSION['referencia'];
    $pedido->salvaritemPedido($pedido_fk, $id_produto, $valor, $qtd);

    //--------------------------------

        }   

        else if ($_SESSION['teste2'][$id_produto]=="und") {
        /*
        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;     
        $teste[]=$listaEspecifica['id_produto']; // ID do Produto
        $teste[]=number_format($valor_produtos,2,",","."); //Valor da soma de cada produtos
        $teste[]=number_format($valor_total,2,",","."); //Valor total do cliente
        $teste[]=$qtd_produtos; //Quantidade dos produtos no carrinho
        $teste[]=$_SESSION['teste2'][$id_produto]; //Medida
        $teste[]=$listaEspecifica['peso'];
        $teste[]=$qtd; //Quantidade por produto
        */

        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;
        //$id = $listaEspecifica['id_produto'];
        $valor = $listaEspecifica['valor'];
        $valor = number_format($valor,2,".",".");
        //echo $valor;
        //$pedido = preg_replace('/[^[:alnum:]-]/','',$_POST["idPedido"]);
        //$data['token'] ='D82D294D0618483687CCBAEB7ABFF314';
        $data['token'] ='7762809c-5f2f-4e70-be96-aba16d699bc6a596937248bc91fb6606f70861aa04f8192a-a55b-4282-9e0a-d8bf2ac619be';
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
        $data['senderEmail'] = $_SESSION['email'];
        //$data['senderEmail'] = 'teste2@sandbox.pagseguro.com.br';
        $data['senderCPF'] = '01927015251';
        $data['reference'] = intval($_SESSION['referencia']);
        //$data['shippingAddressStreet']     = "avenida 8";
        //$data['shippingAddressNumber']     = "2156";
        //$data['shippingAddressComplement'] = "igreja";
        //$data['shippingAddressDistrict']   = "Marabaixo 2";
        //$data['shippingAddressPostalCode'] = '68.909-844';
        //$data['shippingAddressCity']       = "Macapá";
        //$data['shippingAddressState']      = "ap";
       // $data['shippingAddressCountry']    = 'BRA';
        //$data['shippingAddressPostalCode'] = "68.909-844";
        //$data['billingAddressPostalCode'] = '68909844';
        //$data['receiverEmail'] = 'rosivan7qi@gmail.com';
        //$data['senderEmail'] = 'teste@sandbox.pagseguro.com.br';
        //echo $data['itemAmount'.$id];
           $id++; 

        //======salvar item pedido ========
        $pedido_fk = $_SESSION['referencia'];
        $pedido->salvaritemPedido($pedido_fk, $id_produto, $valor, $qtd);

        //--------------------------------
        
        }




        


}


}

//$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';;
$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

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
//select * from pedido, status_pedido where status_pedido.id = 1 and status_pedido.id = pedido.status_fk;

//select * from pedido join clientes join endereco join status_pedido on pedido.cliente_fk=clientes.id and pedido.endereco_fk=endereco.id and pedido.status_fk=status_pedido.id where clientes.id='2';


//select * from item_pedido join produtos on item_pedido.produto_fk=produtos.id_produto where item_pedido.pedido_fk='1';


$id_ultimo_pedido = $_SESSION['referencia'];
//echo $id_ultimo_pedido;
$pedido->atualizarvalorPedido($id_ultimo_pedido, $valor_total);

?>