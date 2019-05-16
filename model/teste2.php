<?php
if (!isset($_SESSION)) {
  session_start();
} 

//==================SE NÃO HAVER A SESSÃO CARRINHO, ELA SERÁ CRIADO, DO TIPO ARRAY================
if(!isset($_SESSION['carrinho'])){
     $_SESSION['carrinho'] = array();
  }

//if(isset($_POST['opcao-medida5'])){
    $id_produto = intval($_POST['form-produto-id']);
    
    $_SESSION['teste2'][$id_produto] = $_POST['opcao-medida'];
    echo $_SESSION['teste2'][$id_produto];
    
 //}

?>