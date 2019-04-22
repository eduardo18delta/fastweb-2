<?php
//==================SE NÃO HAVER SESSÃO, A SESSÃO SERÁ STARTADA===================
if (!isset($_SESSION)) {
  session_start();
} 

//==================SE NÃO HAVER A SESSÃO CARRINHO, ELA SERÁ CRIADO, DO TIPO ARRAY================
if(!isset($_SESSION['carrinho'])){
     $_SESSION['carrinho'] = array();
  }

//--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
//--+++++++++++++++++++++BEM VINDO A CLASSE DE CONTROLLE CARRINHO+++++++++++++++++++++++++++++-->
//--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
class Carrinho{

//===================================ADICIONAR CARRINHO==========================================
public function adicionarProduto(){        
    $id_produto = intval($_POST['form-produto-id']);
      if(!isset($_SESSION['carrinho'][$id_produto])){
       $_SESSION['carrinho'][$id_produto] = 1;
    }else{ 
       $_SESSION['carrinho'][$id_produto] += 1;
    }
}

//===================================ALTERAR VALOR CARRINHO==========================================
public function alterarQtd(){
	 //ALTERAR QUANTIDADE
        if(is_array($_POST['qtd-produto'])){
           foreach($_POST['qtd-produto'] as $id_produto => $qtd){
              $id_produto  = intval($id_produto);
              $qtd = intval($qtd);
              if(!empty($qtd) || $qtd <> 0){
                 $_SESSION['carrinho'][$id_produto] = $qtd;
              }else{
                 unset($_SESSION['carrinho'][$id_produto]);
              }
           }
        }
}

//===================================ADICIONAR CARRINHO==========================================
public function alterarValores(){

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

           
$valor_total = 0;
$qtd_produtos = 0;
 if(count($_SESSION['carrinho']) == 0){
                     echo json_encode("0");
                     }else{   
        
        foreach($_SESSION['carrinho'] as $id_produto => $qtd){ 
        $listaEspecifica=$produtos->setId($id_produto);
        $listaEspecifica=$produtos->listaEspecifica();
        $valor_produtos = $listaEspecifica['valor'] * $qtd;  
        $valor_total += $listaEspecifica['valor'] * $qtd;
        $qtd_produtos++;
        
        $teste[]=$listaEspecifica['id_produto']; // ID do Produto
        $teste[]=$listaEspecifica['valor']; //Valor da soma de cada produtos
        $teste[]=$valor_total; //Valor total do cliente
        $teste[]=$qtd_produtos; //Quantidade dos produtos no carrinho
        //$teste[]=$qtd; //Quantidade por produto
        

}


}
        
        
        
        //$teste[]=$qtd_produtos; //Quantidade dos produtos no carrinho
//$id_produto = intval($_POST['form-produto-id']);        

echo json_encode($teste);  



}

public function removerCarrinho(){
	 //REMOVER CARRINHO


 $id_produto = intval($_POST['form-produto-id']);
            if(isset($_SESSION['carrinho'][$id_produto])){
               unset($_SESSION['carrinho'][$id_produto]);
            }
            
}

} //fim da classe

$carrinho = new Carrinho;

if (isset($_POST['add-carrinho'])){
$carrinho->adicionarProduto();
}
$carrinho->alterarQtd();
$carrinho->alterarValores();
if(isset($_POST['rm-produto'])){
$carrinho->removerCarrinho();
} 	

?>

