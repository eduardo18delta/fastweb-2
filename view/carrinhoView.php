<?php 
//==========================================INCLUDES=============================================
include '../view/modalprodutosView.php';
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
            $subtotal_produtos = $listaEspecifica['valor'] * $qtd; //Armazenando o subtotal dos valores 
            $total_produtos += $listaEspecifica['valor'] * $qtd; //Armazenando o TOTAL dos valores
            $qtd_produtos++; //Armazenando a quantidade de produtos
        ?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!--+++++++++++++++++++++BEM VINDO AO FORMULÁRIO DO CARRINHO DE COMPRAS+++++++++++++++++++++++-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<form method="POST" id="carrinho_produtos<?= $listaEspecifica['id_produto']?>" enctype="multipart/form-data">     
<input type="hidden" name="form-produto-id" value="<?= $listaEspecifica['id_produto']?>"> 
<div class="container-fluid desfocar">
 
<div class="row mt-4">  
<!--===========================IMAGEM DO PRODUTO=================================-->          
  <div class="col-md-2 col mt-4">
    <section class="carrinho-card-principal">
      <div class="desconto-site">
           <div class="desconto-texto-site"><?=$listaEspecifica['desconto']?>%</div>
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
    <div class="col-md-4 col mt-4">
      <div class="nome-produto-carrinho"><?=$listaEspecifica['nome']?></div>
      <div class="carrinho-opcao">
        <div class="btn btn-success">Comprar</div>
        <div class="btn btn-primary">Salvar na listade compras</div>
        <button name="rm-produto" class="btn btn-danger remover-produto">Remover</button>
      </div>
    </div>
  <!--===========================QUANTIDADE/VALOR/SUBTOTAL=======================-->
    <div class="col-md-2 col mt-2">
      <div class="carrinho-titulo-info">Quantidade (UND.)</div>
      <input type="number" name="carrinho-qtd-produto[<?=$listaEspecifica['id_produto']?>]" class="form-control carrinho-qtd-produto qtd-produto<?=$listaEspecifica['id_produto']?>"  min="1" value="<?=$qtd?>" required>
      <div><?=$listaEspecifica['quantidade']?> Unidades</div>
    </div>
    <div class="col-md-2 col mt-4"> 
          <div class="carrinho-titulo-info">Valor (UND.)</div>
          <div>R$ <?=$listaEspecifica['valor']?></div> 
    </div>
    <div class="col-md-2 col mt-4"> 
        <div class="carrinho-titulo-info">Sub Total (UND.)</div>
          <div class="fofo valor-produto<?=$listaEspecifica['id_produto']?>"><?=$subtotal_produtos?></div>
    </div>
  </div>
</div>
</form> 
<?php endforeach?>

<!--===========================FOOTER DO CARRINHO (PREÇO TOTAL)=======================-->
<div class="row mt-4 desfocar carrinho-footer">       
  <div class="col-md-7 col mt-4">
    <div>Quantidade de Produtos (<?=$qtd_produtos?>)</div>
    <div>Endereço de Entrega</div>
    <div>Rua Sucupira, 244, Ipê | <span class="carrinho-endereco">Alterar endereço de entrega</span></div>
  </div>    
    <div class="col-md-3 col mt-4">
    <div class="btn btn-danger form-control">FINALIZAR COMPRA</div>
    </div>
    <div class="col-md-2 col mt-4">
      <h2>Total</h2>
        <h2 class="carrinho-valor-total">R$ <?=$total_produtos?></h2>
    </div>  
</div>       



<?php
} // Fim do IF
?>

<!--=======Esse container levanta os produtos para que não seja ocultado no footer======-->
<div class="bk-footer">
</div>