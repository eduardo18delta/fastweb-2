<?php 
//==========================================INCLUDES=============================================
include '../view/modalprodutosView.php';
include '../view/lista-comprasView.php';
include '../view/menuView.php';
require_once '../model/autoload.php'; $produtos = new Produtos(); 
echo '<img src="../assets/img/carrinho-vazio.jpg" width="100%" height="100%" class="bk-carrinho">';
//==================SE A SESSÃO "CARRINHO" TIVER VALOR 0, NÃO TEM NADA NO CARRINHO================
if(count($_SESSION['carrinho']) == 0){
    echo '<div>
    <div class="carrinho-vazio-msg">NÃO HÁ PRODUTOS NO CARRINHO</div>
    <img src="../assets/img/carrinho-vazio.jpg" class="carrinho-vazio-img">
    </div>';

//==================SENÃO, HAVENDO VALORES, SERÁ CONSTRUIDO AS INFORMAÇÕES DO CARRINHO===========
}else{   
$total_produtos = 0; //variável total dos valores iniciando com zero
$qtd_produtos = 0; //variável que conta a quantidade de produtos iniciando com zero
        foreach($_SESSION['carrinho'] as $id_produto => $qtd): //Listando valores da sessão "carrinho"
            $listaEspecifica=$produtos->setId($id_produto); //Setando o ID dos produtos da sessão 
            $listaEspecifica=$produtos->listaEspecifica(); //Em seguida lista específicamente o setado
            $desconto = $listaEspecifica['desconto'];
            $listaEspecifica['desconto'] = 100-$listaEspecifica['desconto'];
            $valor_com_desconto = $listaEspecifica['valor'];
            $valor_com_desconto = ($listaEspecifica['valor']*$listaEspecifica['desconto'])/100;
            $valor_com_desconto = number_format($valor_com_desconto,2,",",".");
            $listaEspecifica['valor'] = number_format($listaEspecifica['valor'],2,",",".");
            //$subtotal_produtos = $valor_com_desconto * $qtd; //Armazenando o subtotal dos valores 
            //$total_produtos += $valor_com_desconto * $qtd; //Armazenando o TOTAL dos valores
            $qtd_produtos++; //Armazenando a quantidade de produtos
            //$_SESSION['teste2'][$id_produto] = $qtd;
            //$_SESSION['teste2'][$id_produto] = "testeE";
          //echo $_SESSION['teste2'][$id_produto]; 
        ?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++BEM VINDO AO FORMULÁRIO DO CARRINHO DE COMPRAS+++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<form method="POST" id="carrinho_produtos<?= $listaEspecifica['id_produto']?>" enctype="multipart/form-data">     
<input type="hidden" name="form-produto-id" class="form-produto-id" value="<?= $listaEspecifica['id_produto']?>"> 
<div class="container-fluid desfocar">
 
<div class="row mt-4 d-lg-flex flex-lg-row flex-sm-column">  
<!--===========================IMAGEM DO PRODUTO=================================-->          
  <div class="col-md-2 col mt-4 d-flex justify-content-center">
    <section class="carrinho-card-principal">
      <div class="desconto-site">
           <div class="desconto-texto-site"><?=$desconto?>%</div>
           <i class="fas fa-bookmark"></i>
      </div>
      <div class="item-carrinho">
      <img class="card-imagem" src="../assets/img/upload_produtos/<?= $listaEspecifica['img_01']?>">
      </div>         
      <div class="estrelas">
          <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
          <label for="cm_star-1"><i class="fa"></i></label>
          <input type="radio" id="cm_star-1" name="fb" value="1"/>
          <label for="cm_star-2"><i class="fa"></i></label>
          <input type="radio" id="cm_star-2" name="fb" value="2"/>
          <label for="cm_star-3"><i class="fa"></i></label>
          <input type="radio" id="cm_star-3" name="fb" value="3"/>
          <label for="cm_star-4"><i class="fa"></i></label>
          <input type="radio" id="cm_star-4" name="fb" value="4"/>
          <label for="cm_star-5"><i class="fa"></i></label>
          <input type="radio" id="cm_star-5" name="fb" value="5"/>
        </div>
        <div class="row justify-content-center">
          <a class="item btn btn-danger produto<?=$listaEspecifica['id_produto']?>">Vizualizar</a>
        </div>
      </section>
  </div>
  <!--===========================COMPRAR/SALVAR LISTA DE COMPRA/REMOVER=======================-->
    <div class="col-md-4 mt-4">
      <div class="nome-produto-carrinho"><?=$listaEspecifica['nome']?></div>
      <div class="d-lg-flex flex-lg-row flex-sm-column">
        <div class="btn btn-success mr-2  mt-2">Comprar</div>
         <div class='btn btn-primary add-lista-compra mr-2  mt-2'>
          Adicionar a lista de Compras
         </div>
        <button name="rm-produto" class="btn btn-danger remover-produto mr-2  mt-2">Remover</button>
      </div>
    </div>
  <!--===========================QUANTIDADE/VALOR/SUBTOTAL=======================-->
    <div class="col-md-2 mt-2">
      <div class="carrinho-titulo-info carrinho-add-valor<?=$listaEspecifica['id_produto']?>">Quantidade (UND)</div>
      <input type="hidden" class="carrinho-requisicao" value="">
        
        <table class="table-medida">
          <tr>
              <td class="item-medida item-medida<?=$listaEspecifica['id_produto']?> rs<?=$listaEspecifica['id_produto']?>">R$</td>
              <td class="item-medida item-medida<?=$listaEspecifica['id_produto']?> kg<?=$listaEspecifica['id_produto']?>">Kg</td>
              <td class="item-medida item-medida<?=$listaEspecifica['id_produto']?> und<?=$listaEspecifica['id_produto']?>">Und</td>
     
              <td class="valor-medida">
                <input type="number" name="carrinho-qtd-produto[<?=$listaEspecifica['id_produto']?>]" class="form-control carrinho-qtd-produto qtd-produto<?=$listaEspecifica['id_produto']?>"  min="1" value="<?=$qtd?>" required>
                <input type="hidden" name="opcao-medida" value="<?=$_SESSION['teste2'][$id_produto]?>">
              </td>

          </tr>
          </table>

      <div style="display: none;"><?=$listaEspecifica['quantidade']?> Unidades</div>
    </div>
    <div class="col-md-2 mt-4"> 
          <div class="carrinho-titulo-info carrinho-valor<?=$listaEspecifica['id_produto']?>">Valor (UND)</div>
          <div class="valor-carrinho<?=$listaEspecifica['id_produto']?>">
            <span class="valor-sem-desconto text-danger">R$ <strike><?=$listaEspecifica['valor']?></strike></span>
            <span>R$ <?=$valor_com_desconto?></span>       
            </div> 
    </div>
    <div class="col-md-2 mt-4"> 
        <div class="carrinho-titulo-info carrinho-subtotal<?=$listaEspecifica['id_produto']?>">Subtotal (UND)</div>
          <div class="fofo valor-produto<?=$listaEspecifica['id_produto']?>">R$ 00,00</div>
    </div>
  </div>
</div>
</form> 
<?php endforeach?>

<!--===========================FOOTER DO CARRINHO (PREÇO TOTAL)=======================-->
<div class="row mt-4 desfocar carrinho-footer"> 
<div class="col-lg-12 col-sm-12 d-lg-flex flex-lg-row flex-sm-column">      
  <div class="col-md-7 col mt-4">
    <div>Quantidade de Produtos (<?=$qtd_produtos?>)</div>
    <div>

<?php  if(isset($_SESSION['id'])) { 

require_once '../model/autoload.php'; 

$endereco = new Endereco(); 
$idusuario = $_SESSION['id'];

$listadeenderecos = $endereco->listaEnderecos($idusuario); 
?>

 <?php $cont=0; foreach ($listadeenderecos as $lista):?>


<?php

if ($lista['principal']==1) {
$_SESSION['endereco_principal'] = $lista['id'];
$_SESSION['cep'] = $lista['cep'];
$_SESSION['numero'] = $lista['numero'];
 echo 
 "<div>Endereço de Entrega</div>"

 .$lista['rua'].", nº ".$lista['numero'].", ".$lista['bairro'].", ".$lista['cidade']."-".$lista['estado']

 ."| <a class='carrinho-endereco' href='../view/list-enderecoclienteView.php'>Alterar endereço de entrega</a>";
 $cont++;
}   

?>

<?php endforeach?>

<?php 
if ($cont<1) {
  echo "Para finalizar a compra <a class='carrinho-endereco' href='../view/list-enderecoclienteView.php'>adicione o endereço de entrega</a>";
$_SESSION['endereço'] = "ativo";
$cont++;

/*$_SESSION['msgcadastro'] = "
<div class='alert alert-danger mt-4'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close>
    <span aria-hidden='true'>&times;</span>
    </button>Você precisa informar um endereço pra finalizar a compra!
</div>";
*/
} 
}
else 
{ 
  echo "Cadastre-se ou faça login. Aproveite os benefícios oferecidos pela Fastwebstore. "; 
} 

?>

     </div>
  </div>    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
<script>

function enviaPagseguro(codigo){

 
$.post('../controller/pagseguroController.php','',function(data){
  //alert (data)
$('#code').val(data);
$('#comprar').submit();
//window.location.href='https://pagseguro.uol.com.br/v2/checkout/payment.html?code'+data;
      })

 }

</script>

<?php  if(isset($_SESSION['id'])) { 

$cont=0; 
foreach ($listadeenderecos as $lista){

    if ($lista['principal']==1) {

        echo '
        <div class="col-md-3 col mt-4">
            <button onclick="enviaPagseguro()" class="btn btn-danger form-control">FINALIZAR COMPRA</button>
        </div>
        ';
        $cont++;
    } 

}

if ($cont<1) {
        echo '
        <div class="col-md-3 col mt-4">
            <a href="../view/list-enderecoclienteView.php" class="btn btn-danger form-control">FINALIZAR COMPRA</a>
        </div>
        ';
        /*
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-danger mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Você precisa informar um endereço pra finalizar a compra!
        </div>";
        */
        $cont++;
    }

} else {
echo '
<div class="col-md-3 col mt-4">
    <a href="../view/list-enderecoclienteView.php" class="btn btn-danger form-control">FINALIZAR COMPRA</a>
</div>
';  
}
?>
<!--
<form id="comprar" action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
-->

<form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">


<input type="hidden" name="code" id="code" value="" />

</form>

<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

<!--
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
-->

    <div class="col-md-2 col mt-12">
      <h2>Total</h2>
        <h2 class="carrinho-valor-total">R$ 00,00</h2>
    </div> 

    </div> 
</div>       

<?php
} // Fim do IF
?>





<!--=======Esse container levanta os produtos para que não seja ocultado no footer======-->
<div class="bk-footer">
</div>