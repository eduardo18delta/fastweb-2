<?php  session_start(); include '../view/menuView.php'; if(isset($_SESSION['id'])) { ?>

<?php 

require_once '../model/autoload.php'; 

$pedido = new Pedido(); 

$idusuario = $_SESSION['id'];
 
$result = $pedido->listarPedidos($idusuario);

?>


<div class="container-fluid">

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
            			<a class=""href="#!">  
            			<i class="fa fa-users"></i>
            			Dados 
            			<i class="fas fa-arrow-circle-right icon-plus"></i>
            			</a>  
          			</div>          
        		</div>  

                <div class="row">
                    <div class="col">                                  
                      <a class="menu-marcado"href="list-comprasView.php">  
                      <i class="fas fa-shopping-cart"></i>
                      Compras
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

                            
                                
                                <?php foreach ($result as $lista_pedido):?>
                        <div class="col mt-4">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>

                                    <th>Satus</th>
                                    <th>valor</th>

                                </tr>
                            </thead>                    

                            <tbody>
                                <tr>

                                    <td><?= $lista_pedido['status']?></td> 
                                    <td><?= $lista_pedido['id']?></td> 
              
                                </tr>
                                  
                                <?php
                                $result_item = $pedido->listaritemPedidos($lista_pedido['id']);
                                ?>

                                <?php foreach ($result_item as $lista_produto):?>

                                <tr>

                                    <td>nome do produto<?= $lista_produto['nome']?></td> 
                                    <td>valor do produto<?= $lista_produto['valor']?></td> 
              
                                </tr>

                                <?php endforeach?>    

                                
                                </tbody>
                        </table>
                        </div>            
                    </div>
                                <?php endforeach?>  
                                
                                              
                            

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

