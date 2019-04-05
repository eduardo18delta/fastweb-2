<!-- Ultimos produtos adicionados-->
<?php require_once '../model/autoload.php'; $produtos = new Produtos(); $lista=$produtos->listar();

foreach($lista as $produtos): ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../assets/img/upload_produtos/<?= $produtos['img_01']?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $produtos['nome'] ?></h5>
    <p class="card-text">
    	R$ <?= $produtos['valor'] ?>
    </p>
    <a href="#" class="btn btn-primary">Ver mais</a>
  </div>
</div>

<?php endforeach?>
				

				