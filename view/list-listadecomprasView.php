<?php  session_start(); include '../view/menuView.php'; if(isset($_SESSION['id'])) { ?>

<?php 

require_once '../model/autoload.php'; 

$listadecompras = new Listadecompras(); 
$idusuario = $_SESSION['id'];

$listadecompras = $listadecompras->listaListadecompras($idusuario); 

?>
   <!-- Adicionando JQuery -->
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

           
                               
                                                         

        }); // FIm do Jquery

    </script>


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
                      <a class=""href="list-historicocomprasView.php">  
                      <i class="fas fa-shopping-cart"></i>
                      Histórico de Compras
                      <i class="fas fa-arrow-circle-right icon-plus"></i>
                      </a>  
                    </div>          
                </div>

                <div class="row">
                    <div class="col">                                  
                      <a class="menu-marcado"href="list-listadecomprasView.php">  
                      <i class="fas fa-heart"></i>
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
						<b>Listas de compras cadastradas</b>	
					</div>
                        <?php
                            if(isset($_SESSION['msgcadastro']))
                            {
                                echo $_SESSION['msgcadastro'];
                                unset($_SESSION['msgcadastro']);
                            }
                        ?>

                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-12" href="">Cadastrar nova lista de compra</a>

                    <div class="col mt-4">
                        <div class="row">
                            <div class="col">
                                    Nome da lista
                                                
                           </div>
                        </div>
                           <div class="row">
                                <div class="col">
                                <form method="POST" id="form_endereco" enctype="multipart/form-data">
                                <?php foreach ($listadecompras as $lista):?>
                                
                                <div class="btn btn-info d-flex justify-content-between">
                                    <div class="fas fa-plus icon-plus"></div>
                                    <div><?= $lista['nome']?></div> 
                                    <div class="d-flex"> 
                                        <div class="btn btn-success">Adicionar Produto</div>
                                        <div class="btn btn-info"><i class="fas fa-edit"></i></div>
                                        <div class="btn btn-info"><i class="fas fa-trash"></i></div>
                                             
                                    </div>             
                                </div>
                                  

                                
                                <?php endforeach?>  
                                </form> 
                                              
                            </div>
                        </div>            
                    

				</div>   
			</div>
		</div>
	</div>

<?php
include "../parts/modal_listadecompra.php";
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

