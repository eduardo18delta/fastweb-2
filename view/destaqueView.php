<!-- Ultimos produtos adicionados-->
<?php 

require_once '../model/autoload.php'; $produtos = new Produtos(); 

$listadestaque=$produtos->listarDestaque();

$listaBebidas=$produtos->listaBebidas(); 

$listaAlimentos=$produtos->listaAlimentos();?>



<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-md-3">
    
    </div>

    <div class="col-md-9">

      <div class="row">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Ofertas <a href="#">Veja mais-></a>
          </div>
        </div>
      </div>


      <div class="row">        
        <?php foreach($listadestaque as $destaque): ?>               
        <div class="col-md-3 mt-4">
        <section class="card-principal">
          <div class="nome-produto"><i class="fas fa-cart-arrow-down"></i></div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $destaque['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$destaque['nome']?></div>
            <div> 
              <div class="valor-produto">R$ <?= $destaque['valor']?></div>
              <div class="unidade-produto">(Unidade)</div>
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
              <a class="item btn btn-danger" href="">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 


      <div class="row mt-4">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Bebidas<a href="#">Veja mais-></a>
          </div>
        </div>
      </div>

        <div class="row">        
        <?php foreach($listaBebidas as $produtos): ?>               
        <div class="col-md-3 mt-4">
        <section class="card-principal">
          <div class="nome-produto"><i class="fas fa-cart-arrow-down"></i></div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $produtos['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$produtos['nome']?></div>
            <div> 
              <div class="valor-produto">R$ <?= $produtos['valor']?></div>
              <div class="unidade-produto">(Unidade)</div>
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
              <a class="item btn btn-danger" href="">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="titulo-produtos">
            Alimentos<a href="#">Veja mais-></a>
          </div>
        </div>
      </div>

        <div class="row">        
        <?php foreach($listaAlimentos as $produtos): ?>               
        <div class="col-md-3 mt-4">
        <section class="card-principal">
          <div class="nome-produto"><i class="fas fa-cart-arrow-down"></i></div>
          <div class="item">
          <img class="card-imagem" src="../assets/img/upload_produtos/<?= $produtos['img_01']?>">  
          </div>        
            <div class="nome-produto"><?=$produtos['nome']?></div>
            <div> 
              <div class="valor-produto">R$ <?= $produtos['valor']?></div>
              <div class="unidade-produto">(Unidade)</div>
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
              <a class="item btn btn-danger" href="">Comprar</a>
            </div>
        </section>
        </div>
        <?php endforeach?>
      </div> 

    </div>
  </div>

</div>

				












