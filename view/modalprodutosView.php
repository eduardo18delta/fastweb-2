<!--Janela Modal - Produtos-->
<?php 

include '../parts/scriptmodal.php';

?>

<!--=============LINK EXTERNO PARA QUE O MODAL ESTEJA INPEPENDENTE=============-->
<link rel="stylesheet" href="../assets/css/estilo_modal.css">
<script type="text/javascript" src="../assets/js/script_modal.js"></script>


<!--=============INÍCIO BACKGROUND MODAL=============-->
<div class="background_modal">

<!--=============INÍCIO MODAL=============-->
<form method="POST" id="modal_produtos" enctype="multipart/form-data">
<div class="modal"><input type="hidden" name="form-produto-id" class="form-produto-id" value="">
  <div class="header_modal"><div class="fechar_modal">X</div></div>
      <div class="body_modal_pai">
        <div class="body_modal_filho">

          <!--++++++++++++++++++++++++++++++++++IMAGENS NA LATERAL++++++++++++++++++++++++++++++++++++++++-->
          <div class="modelos">
            <img class="img_produto_hover01" onerror="this.src='../assets/img/bk_produto.png'">
            <img class="img_produto_hover02" onerror="this.src='../assets/img/bk_produto.png'">
            <img class="img_produto_hover03" onerror="this.src='../assets/img/bk_produto.png'">
            <img class="img_produto_hover04" onerror="this.src='../assets/img/bk_produto.png'">
            <img class="img_produto_hover05" onerror="this.src='../assets/img/bk_produto.png'">
            <img class="img_produto_hover06" onerror="this.src='../assets/img/bk_produto.png'">
          </div>

        <!--++++++++++++++++++++++++++++++CONTAINER DAS IMAGENS DO PRODUTOS++++++++++++++++++++++++++++++++-->

          <!--=============ICONE DE DESCONTO=============-->
          <div class="apresentacao">
            <div class="container_desconto">
               <div class="desconto-icon">10%</div>
               <i class="fas fa-bookmark"></i>
            </div>

            <!--=============BOTÃO VOLTAR=============-->
            <div class="slide_modal"><a href="#" id="slide_esquerda" class="slide_controle"><</a></div>

            <!--=============SLIDE DOS PRODUTOS=============-->
            <div class="slides_img">
                <img class="slide_produtos produto_img_01" onerror="this.src='../assets/img/bk_produto.png'">
                <img class="slide_produtos produto_img_02" onerror="this.src='../assets/img/bk_produto.png'">
                <img class="slide_produtos produto_img_03" onerror="this.src='../assets/img/bk_produto.png'">
                <img class="slide_produtos produto_img_04" onerror="this.src='../assets/img/bk_produto.png'">
                <img class="slide_produtos produto_img_05" onerror="this.src='../assets/img/bk_produto.png'">
                <img class="slide_produtos produto_img_06" onerror="this.src='../assets/img/bk_produto.png'">
            </div>

            <!--=============BOTÃO AVANÇAR=============-->
            <div class="slide_modal"><a href="#" id="slide_direita" class="slide_controle">></a></div>
          </div><!--fim de "apresentacao"-->

        <!--++++++++++++++++++++++++++++++++CONTAINER DAS INFORMAÇÕES DO PRODUTO++++++++++++++++++++++++++++-->
        <div class="informacao">   

          <!--=============ZOOM=============-->
          <div  class="container_zoom">
            <div id="container_image">
              <img class="img_produto_hover01" id="image01">
              <img class="img_produto_hover02" id="image02">
              <img class="img_produto_hover03" id="image03">
              <img class="img_produto_hover04" id="image04">
              <img class="img_produto_hover05" id="image05">
              <img class="img_produto_hover06" id="image06">
            </div> 
          </div>
  
          <!--=============DETALHES DO PRODUTO=============-->
          <div class="detalhes">
            <h3 class="nome">Aqui fica o título</h3>

              <!--====AVALIAÇÃO====-->
              <p class="avaliacao">
                <i class="fa"></i>
                <i class="fa"></i>
                <i class="fa"></i>
                <i class="fa"></i>
                <i class="fa"></i>
              </p>

              <!--====DESCONTO====-->
              <div>
                <div class="desconto">
                  <strike>R$ 25,00</strike>
                </div>
                <h1 class="valor">Aqui fica o Preço</h1>
              </div>

              <!--====DESCRIÇÃO====-->
            <span class="container_descricao">
              <span>
                <strong>Descrição: </strong>
              </span>
              <span class="descricao">Aqui fica a descrição</span>
            </span>       

          </div><!--fim de "detalhes"-->

          <!--====MEDIDA DO PRODUTO====-->
          <p class="aviso-medida">Escolher quantidade de produto por unidade (UND), quilograma (Kg) ou valor (R$)</p>

          <table class="table-medida">
          <tr>
              <td class="item-medida rs">R$</td>
              <td class="item-medida kg">Kg</td>
              <td class="item-medida und">Und</td>
              <td class="qtd-medida rm-medida">-</td>
              <td class="valor-medida">
                <input type="number" class="form-control modal-qtd-produto" value='1' min="1">
                <input type="hidden" class="opcao-medida" name="opcao-medida[]" value="und">
              <!--  <input type="number" class="form-control modal-qtd-produto" value='1' min="1">
                <input type="number" class="form-control modal-qtd-produto" value='1' min="1">
                <input type="number" name="carrinho-qtd-produto[<?=$listaEspecifica['id_produto']?>]" class="form-control qtd-produto<?=$listaEspecifica['id_produto']?>"  min="1" value="<?=$qtd?>" required>-->
              </td>
              <td class="qtd-medida add-medida">+</td>
          </tr>
          </table>
          
          <!--====COMPRAR PRODUTO====-->
          <?php echo "<div class='btn-action-modal comprar-produto'>Comprar<i class='fas fa-cash-register dnone'></i></div>"; ?>

          <!--====ADICIONAR AO CARRINHO====-->
          <?php echo "<button name='add-carrinho' class='btn-action-modal add-carrinho dnone'>Adicionar ao Carrinho<i class='fas fa-shopping-cart'></i></button>"; ?>

          <!--====REMOVER PRODUTO====-->
          <?php echo "<button name='rm-produto' class='btn-action-modal remover-produto dnone'>Remover do Carrinho<i class='fas fa-times'></i></button>"; ?>
          
          <!--====ADICIONAR LISTA====-->
          <?php echo "<div class='btn-action-modal dnone'>Adicionar a lista de Compras<i class='fas fa-clipboard-list'></i></div>"; ?>
          
        </div><!--fim de "informação"-->

      </div><!--fim de "body_modal_filho"-->

    </div> <!--fim de "body_modal_pai"-->

  </div> <!--fim do "modal"-->
</form>
</div>

 