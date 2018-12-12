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






