
<!--=============================================DESTAQUE========================================-->
<?php

require_once '../model/autoload.php'; 
$produtos = new Produtos(); 
$lista=$produtos->listar();

 foreach($lista as $produtos):

 $produtos['id_produto'];		

 ?>
<!--
				if (isset($_POST['pesquisar_produto_enviar'])){

				$pesquisar_produto = $_POST['pesquisar_produto'];

									//select enorme from emp where enorme like 'M%';
				$resul_vender = $pdo->query("SELECT * FROM produtos WHERE titulo like '$pesquisar_produto%' AND estado='ap'");

		
				  echo "
				  <div class='produtos produto$id_produto'>
				<img src='../assets/img/upload_produtos/$bd_vender_imagem01' class='produtos_img'>
				<p class='nome_produto'>$nome</p>
				<p class='preco_produto'>
				R$ $valor,00 <p>Em até <span class='parcela_produto'> $bd_vender_qtd_parcela x R$ $bd_vender_valor_parcela,00</span></p>
				</p>
				<p class='ver_produto'>Ver mais</p>
				</div>
				  ";
				  
				} else {
			$q = "'";
				$w = '"';
-->
				
				  <div class="produtos produto<?= $produtos['id_produto'] ?>">
				<img src="../assets/img/upload_produtos/<?= $produtos['img_01']?>" class='produtos_img'>
				<p class='nome_produto'><?= $produtos['nome'] ?></p>
				<p class='preco_produto'>
				R$ <?= $produtos['valor'] ?>,00 <p>Em até <span class='parcela_produto'> 5 x R$ 57</span></p>
				</p>
				<p class='ver_produto'>Ver mais</p>
				</div>
	













		<?php	endforeach	?>
				

				