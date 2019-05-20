<?php 

require_once '../model/autoload.php'; 

$produtos = new Produtos(); 
$produtos->id = $_POST['id'];

$lista = $produtos->listaEspecifica(); 

$categorias = new Categoria();

$listacategorias=$categorias->listarCategorias();

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; 

?>


<div class="container">

<div class="alert alert-info mt-4">
	Editando : <?= $lista['nome']?>
</div>

	<form method="post" action="../controller/updateprodutosController.php">	

		<div class="row">  
		<div class="col-md-12 col-sm-12 form-group produtos-selecionados">
		    <label for='input-img-produto-01' class="produtos-adicionados add-produto-principal" id="add-img-produto-01">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_01']?>" width="100%" height="100%">
		    <span>PRINCIPAL</span> 
		    </label>
		    <label for='input-img-produto-02' class="produtos-adicionados" id="add-img-produto-02">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_02']?>" width="100%" height="100%" class="teste"> 
		    </label>
		    <label for='input-img-produto-03' class="produtos-adicionados" id="add-img-produto-03">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_03']?>" width="100%" height="100%"> 
		    </label>
		    <label for='input-img-produto-04' class="produtos-adicionados" id="add-img-produto-04">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_04']?>" width="100%" height="100%"> 
		    </label>
		    <label for='input-img-produto-05' class="produtos-adicionados" id="add-img-produto-05">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_05']?>" width="100%" height="100%"> 
		    </label>
		    <label for='input-img-produto-06' class="produtos-adicionados" id="add-img-produto-06">
		    <img src="../assets/img/upload_produtos/<?= $lista['img_06']?>" width="100%" height="100%"> 
		    </label>
		 

		    <input type="file" name="img_01" id='input-img-produto-01' class="dnone">
		    <input type="file" name="img_02" id='input-img-produto-02' class="dnone">
		    <input type="file" name="img_03" id='input-img-produto-03' class="dnone">
		    <input type="file" name="img_04" id='input-img-produto-04' class="dnone">
		    <input type="file" name="img_05" id='input-img-produto-05' class="dnone">
		    <input type="file" name="img_06" id='input-img-produto-06' class="dnone">

		  </div> 
		</div>

		<div class="form-group">
		<label>Nome:</label>
		<input class="form-control" type="text" name="nome" value="<?= $lista['nome']?>">
		</div>		

		<div class="form-group">
		<label>Valor:</label>
		<input class="form-control" type="number" step="0.01" name="valor" value="<?= $lista['valor']?>">
		</div>

		<div class="form-group">
		<label>Fornecedor</label>
		<input class="form-control" type="text" name="fornecedor" value="<?= $lista['fornecedor']?>">
		</div>

		<div class="form-group">
		<label>Validade</label>
		<input class="form-control" type="date" name="validade" value="<?= $lista['validade']?>">
		</div>

		<div class="form-group">
		<label>Quantidade</label>
		<input class="form-control" type="number" name="quantidade" value="<?= $lista['quantidade']?>">
		</div>

		<div class="form-group">
		<label>Marca</label>
		<input class="form-control" type="text" name="marca" value="<?= $lista['marca']?>">
		</div>

		<div class="form-group">
      	<label>Categoria:</label>
      	<select name="categoria" class="form-control">
      	<?php foreach ($listacategorias as $categorias):?>	
		<option value="<?=$categorias['id_categoria']?>"><?=$categorias['descricao']?></option>
		<?php endforeach?>
      	</select>
      	</div>

		<input type="hidden" name="id" value="<?= $lista['id_produto']?>">						

		<div class="form-group">
		<button class="btn btn-block" type="submit">Atualizar</button>			
		</div>

	</form>
</div>


<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>






