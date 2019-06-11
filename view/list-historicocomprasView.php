<?php  session_start(); include '../view/modalprodutosView.php'; include '../view/menuView.php'; if(isset($_SESSION['id'])) { ?>

<?php 

require_once '../model/autoload.php'; 

$pedido = new Pedido(); 

$idusuario = $_SESSION['id'];
 
$result = $pedido->listarPedidos($idusuario);

?>


<div class="container-fluid desfocar">

	<div class="row mt-4">
		<div class="col">
			<nav aria-label="breadcrumb">
  				<ol class="breadcrumb">
    				<li class="breadcrumb-item"><a href="perfilclienteView.php">Perfil</a></li>
    				<li class="breadcrumb-item active" aria-current="page">Endereços</li>
  				</ol>
			</nav>
		</div>	
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="sidenavcliente">       
        		<div class="row">
          			<div class="col">                         			
            			<a id="nome-cliente" href="perfilclienteView.php">              
            			<i class="fas fa-bars"></i>
            			Minha conta - Olá  <?=$_SESSION['nome'] ?>    
            			</a>  
          			</div>          
        		</div>

        		<div class="row">
          			<div class="col">                                  
            			<a class=""href="list-enderecoclienteView.php">  
            			<i class="fas fa-address-card"></i>
            			Endereços    
            			<i class="fas fa-arrow-circle-right icon-plus"></i>      
            			</a>  
          			</div>          
        		</div>    

        		<div class="row">
                    <div class="col">                                  
                        <a class=""href="list-dadosView.php">  
                        <i class="fa fa-users"></i>
                        Dados 
                        <i class="fas fa-arrow-circle-right icon-plus"></i>
                        </a>  
                    </div>          
                </div>  

                <div class="row">
                    <div class="col">                                  
                      <a class="menu-marcado"href="list-historicocomprasView.php">  
                      <i class="fas fa-shopping-cart"></i>
                      Histórico de Compras
                      <i class="fas fa-arrow-circle-right icon-plus"></i>
                      </a>  
                    </div>          
                </div>

                <div class="row">
                    <div class="col">                                  
                      <a class=""href="list-listadecomprasView.php">  
                      <i class="fas fa-clipboard-list"></i>
                      Lista de Compras
                      <i class="fas fa-arrow-circle-right icon-plus"></i>
                      </a>  
                    </div>          
                </div>

        		<div class="row">
          			<div class="col">                                  
            			<a class=""href="../controller/logoutfacebookController.php">  
            			<i class="fas fa-sign-out-alt"></i>
            			Sair
            			<i class="fas fa-arrow-circle-right icon-plus"></i>
            			</a>  
          			</div>          
        		</div>       
      		</div>
		</div>

		<div class="col-md-8">
			<div class="row">
				<div class="col">
					<div class="alert alert-primary resumo">
						<b>Histórico de Compras</b>	
					</div>
                        <?php
                            if(isset($_SESSION['msgcadastro']))
                            {
                                echo $_SESSION['msgcadastro'];
                                unset($_SESSION['msgcadastro']);
                            }
                        ?>

                            
                        <div style="border: 4px solid #ccc; overflow: auto; height: 700px">     
                                <?php foreach ($result as $lista_pedido):?>
                        <div class="col mt-4 border border-secondary">
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <td>Pedido: <strong><?= $lista_pedido['id']?></strong></td> 
                                    <td>Data: <strong>11/06/2019</strong></td> 
                                    <td>Status: <strong><?= $lista_pedido['status']?></strong></td> 
                                    <td class="d-flex">Total:<strong><span class="text-danger ml-2"> R$ <?= number_format($lista_pedido['valor'],2,",",".")?></span></strong></td> 
              
                                </tr>
                            </thead>                    

                            <tbody>
                                  
                                <?php
                                $result_item = $pedido->listaritemPedidos($lista_pedido['id']);
                                ?>

                                <?php foreach ($result_item as $lista_produto):?>

                                <tr>

                                    <td>


                                      <div class="desconto-site">
                                           <div class="desconto-texto-site"><?=$lista_produto['desconto']?>%</div>
                                           <i class="fas fa-bookmark"></i>
                                      </div>
                                      <div class="item-carrinho">
                                      <img width="70" height="70px" src="../assets/img/upload_produtos/<?= $lista_produto['img_01']?>">
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

                                    </td>  
                                    <td><?= $lista_produto['nome']?></td>
                                    <td class="text-center d-flex justify-content-around">
                                    <span class="text-danger">
                                      <strike>
                                      R$ <?= number_format(($lista_produto['valor']*(101+$lista_produto['desconto']))/100,2,",",".")?>
                                        
                                      </strike>
                                    </span>
                                    <span>
                                      R$ <?=number_format($lista_produto['valor'],2,",",".")?>
                                    </span>
                                    </td> 
                                    <td>
                                    <a class="item btn btn-info mais-detalhes produto<?=$lista_produto['id_produto']?>">Mais de detalhes...</a>
                                    </td>
                                    <!--<td>Avaliar Produto</td>--> 
              
                                </tr>
                                
                                <?php endforeach?>  
                                <tr>    

                                    <td colspan="4">
                                        <hr class="bg-success p-1">
                                    </td> 
              
                                </tr>  
                                <tr>

                                    <td>
                                        <div align="center">Pedido efetuado</div>
                                        <div align="center">11/06/2019</div>
                                    </td> 
                                    <td>
                                        <div align="center">Pagamento autorizado</div>
                                        <div align="center">11/06/2019</div>
                                    </td> 
                                    <td>
                                        <div align="center">Nota Fiscal emitida</div>
                                        <div align="center">11/06/2019</div>
                                    </td> 
                                    <td>
                                        <div align="center">Pedido entregue</div>
                                        <!--<div align="center">11/06/2019</div>-->
                                        <div align="center">Em andamento</div>
                                    </td> 
              
                                </tr>
                        
                                <tr>
                                    <td colspan="4">
                                    <div class="d-flex justify-content-around">
                                    <div class="btn btn-danger">Avaliar Serviço</div> 
                                    <div class="btn btn-primary">Gerar Nota Fiscal</div> 
                                    </div> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                    <div class="d-flex justify-content-between">
                                    <div>
                                        <div><strong>Pagamento</strong></div>
                                        <div>Cartão de Crédito</div>
                                        <div>752.39####5214</div>
                                        <div>R$ <?= number_format($lista_pedido['valor'],2,",",".")?> em 1x</div>
                                    </div> 
                                    <div>
                                        <div><strong>Total Pago</strong></div>
                                        <div> R$ <?= number_format($lista_pedido['valor'],2,",",".")?></div>
                                        <div>Desconto R$ <?= number_format(($lista_pedido['valor']*($lista_produto['desconto']))/100,2,",",".")?></div>
                                        <hr class="bg-success">
                                        <div class="d-flex justify-content-between"><strong>Total </strong><div><?= number_format($lista_pedido['valor'],2,",",".")?></div></div>
                                    </div> 
                                    <div>
                                        <div><strong>Endereço</strong></div>
                                        <div><?php
                                         echo $lista_pedido['rua'];
                                        ?>
                                        </div>
                                        <div><?php
                                         echo "nº ".$lista_pedido['numero'].", ".$lista_pedido['bairro'].", ".$lista_pedido['cidade']."-".$lista_pedido['estado'];
                                        ?>
                                        </div>
                                        <div>CEP, <?= $lista_pedido['cep']?></div>
                                        <div><?= $lista_pedido['nome']?></div>
                                    </div>
                                </div>
                                    </td> 
              
                                </tr>
                                </tbody>
                        </table>
                        </div>            
                    </div>
                                <?php endforeach?>  
                    </div>               
                                              
                            

				</div>   
			</div>
		</div>
	</div>

<?php
//include "../parts/modal_pedido.php";
?> 

</div>


<?php  
} 
else 
{ 
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: loginclienteView.php"); 
} 


include_once '../view/footerView.php';

?>

