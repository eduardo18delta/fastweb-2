<?php  
session_start(); 
include '../view/menuView.php';
?>

<?php if(isset($_SESSION['email'])) { ?>

<div class="container-fluid">

	<div class="row mt-4">
		<div class="col">
			<nav aria-label="breadcrumb">
  				<ol class="breadcrumb">
    				<li class="breadcrumb-item active"><a href="perfilclienteView.php">Perfil</a></li>
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
                  <a class=""href="list-historicocomprasView.php">  
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
						<b>Resumo do seu perfil</b>	
					</div>

					<!--
          <div class="alert alert-danger">
						<b>Aqui vão as últimas compras feitas</b>	
					</div>
          -->

          <!-- Navbar -->

            <div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">

                    <div class="row mb-3">
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-cliente.php">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <i class="fas fa-users fa-3x"></i>
                                    <h6 class="card-title">Meus Endereços</h6>
                                    <h2 class="lead"><?=$numeroclientes;?>3</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="col-lg-3 col-sm-6">
                            <a href="list-reportsView.php">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <i class="fas fa-paste fa-3x"></i>
                                    <h6 class="card-title"> Listas de compras </h6>
                                    <h2 class="lead">56</h2>
                                </div>
                            </div>
                            </a>
                        </div> 
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-produtos.php">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <i class="fas fa-dolly fa-3x"></i>
                                    <h6 class="card-title">Compras Feitas</h6>
                                    <h2 class="lead"><?=$numeroprodutos;?>10</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                         <!--<div class="col-lg-3 col-sm-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-handshake fa-3x"></i>
                                    <h6 class="card-title">Financeiro</h6>
                                    <h2 class="lead">13</h2>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-cargos.php">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <i class="fas fa-address-card fa-3x"></i>
                                    <h6 class="card-title">Investimento</h6>
                                    <h2 class="lead"><?=$numerocargos;?>R$ 6,00</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
          <div class="alert alert-primary resumo">
            <b>Últimas compras</b> 
          </div>
          <div class="alert alert-secondary d-flex justify-content-around">
            <b>Pedido 70</b><br>3 produtos</br><b>Data: 11/06/2019</b> <br>R$ 3,00 o Kg</b> <b class="text-success">pagamento aprovado</b> 
          </div>
          <div class="alert alert-secondary d-flex justify-content-around">
            <b>Pedido 71</b><br>3 produtos</br><b>Data: 11/06/2019</b> <br>R$ 3,00 o Kg</b> <b class="text-success">pagamento aprovado</b> 
          </div>
          <div class="alert alert-secondary d-flex justify-content-around">
            <b>Pedido 70</b><br>3 produtos</br><b>Data: 11/06/2019</b> <br>R$ 3,00 o Kg</b> <b class="text-success">pagamento aprovado
          

                </div>
            </div>

            <!-- End of Navbar -->


				</div>

			</div>
		</div>
	</div>

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

