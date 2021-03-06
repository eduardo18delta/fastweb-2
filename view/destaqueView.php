<?php 

require_once '../model/autoload.php'; $produtos = new Produtos(); 

$listadestaque=$produtos->listarDestaque();

$listaBebidas=$produtos->listaBebidas(); 

$listaAlimentos=$produtos->listaAlimentos();?>



<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md-3">        
      <div class="sidenav">
        
        <div class="row ">
          <div class="col">                                  
            <a id="categorias-gerais" href="#!">              
            Departamentos       
            </a>  
          </div>          
        </div>

        <div class="row">
          <div class="col">                                  
            <a class=""href="#!">  
            <i class="fa fa-bars"></i>
            Todos os Produtos            
            </a>  
          </div>          
        </div>

        <div class="row">
          <div class="col">                                  
            <a class=""href="#!">  
            <i class="fas fa-tags"></i>
            Ofertas
            <i class="fas fa-plus icon-plus"></i>
            </a>  
          </div>          
        </div>
        
        <div class="row">
          <div class="col">
            <a class=""href="#!">  
            <i class="fas fa-apple-alt"></i>
            Hortifrúti
            <i class="fas fa-plus icon-plus"></i>
            </a>
          </div>          
        </div>
        
        <div class="row">
          <div class="col">
            <a class=""href="#!">  
            <i class="fas fa-bread-slice"></i>
            Padaria
            <i class="fas fa-plus icon-plus"></i>
            </a> 
          </div>          
        </div>
        
        <div class="row">
          <div class="col">
            <a class=""href="#!">  
            <i class="fas fa-cheese"></i>
            Frios
            <i class="fas fa-plus icon-plus"></i>
            </a> 
          </div>          
        </div>
        
        <div class="row">
          <div class="col">
            <a class=""href="produtoespView.php&id=3">  
            <i class="fas fa-wine-bottle"></i>
            Bebidas
            <i class="fas fa-plus icon-plus"></i>
            </a> 
          </div>          
        </div>
        
      </div>
    </div>

    <div class="col-md-9">

      <div class="row">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Ofertas <a href="#"> Veja mais-></a>
          </div>
        </div>
      </div>


      <div class="row">        
        <?php foreach($listadestaque as $destaque): ?>               
        <div class="col-md-3 col mt-4">
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

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Alimentos<a href="#"> Veja mais-></a>
          </div>
        </div>
      </div>

        <div class="row">        
        <?php foreach($listaAlimentos as $produtos): ?>               
        <div class="col-md-3 col mt-4">
        <section class="card-principal">
          <div class="desconto-site">
               <div class="desconto-texto-site"><?=$produtos['desconto']?>%</div>
               <i class="fas fa-bookmark"></i>
          </div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $produtos['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$produtos['nome']?></div>
            <div> 
              <div> 
              <div class="valor-produto"><strike>R$ <?=number_format($produtos['valor'],2,",",".")?></strike></div>
              <div class="valor-produto-desconto">R$ <?= number_format(($produtos['valor']*(100-$produtos['desconto']))/100,2,",",".")?></div>
              <div class="unidade-produto<?=$produtos['id_produto']?>">(Uni)</div>
            </div> 
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
              <a class="item btn btn-danger produto<?=$produtos['id_produto']?>">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 

       <div class="row mt-4">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Bebidas<a href="#"> Veja mais-></a>
          </div>
        </div>
      </div>

        <div class="row">        
        <?php foreach($listaBebidas as $produtos): ?>               
        <div class="col-md-3 col mt-4">
        <section class="card-principal">
          <div class="desconto-site">
               <div class="desconto-texto-site"><?=$produtos['desconto']?>%</div>
               <i class="fas fa-bookmark"></i>
          </div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $produtos['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$produtos['nome']?></div>
            <div> 
              <div> 
              <div class="valor-produto"><strike>R$ <?=number_format($produtos['valor'],2,",",".")?></strike></div>
              <div class="valor-produto-desconto">R$ <?= number_format(($produtos['valor']*(100-$produtos['desconto']))/100,2,",",".")?></div>
              <div class="unidade-produto<?=$destaque['id_produto']?>">(Uni)</div>
            </div> 
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
              <a class="item btn btn-danger produto<?=$produtos['id_produto']?>">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 

    </div>
  </div>

</div>









