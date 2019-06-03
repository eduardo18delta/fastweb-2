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
            			<a class=""href="#!">  
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

					<div class="alert alert-danger">
						<b>Aqui vão as últimas compras feitas</b>	
					</div>
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

