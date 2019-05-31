<?php 

$busca = $_POST['busca'];

require_once '../model/autoload.php';

$buscador = New Busca();
$buscador->busca = $busca;
	

$buscaconcluida = $buscador->buscarprodutoscod_barra($busca);

include '../view/modalprodutosView.php';
include '../view/menuView.php';


?>




<img src="../assets/img/carrinho-vazio.jpg" width="100%" height="100%" class="bk-carrinho">
<div class="container-fluid desfocar">
      <div class="row d-flex justify-content-center">        
        <?php 
        $qtd = 0;
        foreach($buscaconcluida as $destaque) {   
        $qtd++;
        }
        if ($qtd<=1) {
          echo "<span class='alert alert-danger col-12 text-center'>".$qtd." Resultado encontrado</span>";
        } else {
          echo "<span class='alert alert-success col-12 text-center'>".$qtd." Resultados encontrados</span>";
        }

        ?>
      </div>
      <div class="row d-flex justify-content-center">        
        <?php foreach($buscaconcluida as $destaque): ?>               
        <div class="col-md-2 col mt-4">
        <section class="card-principal">
          <div class="desconto-site">
               <div class="desconto-texto-site"><?=$destaque['desconto']?>%</div>
               <i class="fas fa-bookmark"></i>
          </div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $destaque['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$destaque['nome']?></div>
            <div> 
              <div class="valor-produto"><strike>R$ <?=number_format($destaque['valor'],2,",",".")?></strike></div>
              <div class="valor-produto-desconto">R$ <?= number_format(($destaque['valor']*(100-$destaque['desconto']))/100,2,",",".")?></div>
              <div class="unidade-produto<?=$destaque['id_produto']?>">(Uni)</div>
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
              <a class="item btn btn-danger produto<?=$destaque['id_produto']?>">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 


<?php
include '../view/footerView.php';
?>
