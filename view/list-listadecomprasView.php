<?php  session_start(); include '../view/menuView.php'; if(isset($_SESSION['id'])) { ?>

<?php 

require_once '../model/autoload.php'; 

$listadecompras = new Listadecompras(); 
$idusuario = $_SESSION['id'];

$listadecompras = $listadecompras->listaListadecompras($idusuario);

$produtos = new Produtos(); $lista_produtos=$produtos->listar();?>

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
                  <!--      <div class="row">
                            <div class="col">
                                    Nome da lista
                                                
                           </div> -->
                        </div>
                           <div class="row">
                                <div class="col">
                                <form method="POST" id="form_endereco" enctype="multipart/form-data">
                                <?php foreach ($listadecompras as $lista):?>
                                
                                <div class="btn btn-primary d-flex justify-content-between">
                                    <div class="fas fa-plus icon-plus"></div>
                                    <div><?= $lista['nome']?></div> 
                                    <div class="d-flex"> 
                                        <div data-toggle="modal" data-target="#modalprodutos" class="btn btn-success">Adicionar Produto</div>
                                        <div class="btn btn-primary"><i class="fas fa-edit"></i></div>
                                        <div class="btn btn-primary"><i class="fas fa-trash"></i></div>
                                             
                                    </div>             
                                </div>
                                  
                                <div class="bg-default">Adicione produtos na lista</div>
                                
                                <?php endforeach?>  
                                </form> 
                                              
                            </div>


                            <!-- Modal -->
<div class="modal fade" id="modalprodutos" tabindex="-1" role="dialog" aria-labelledby="modalprodutos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
        
        <table class="table table-striped table-hover table-bordered mt-4">
          <thead>
            <tr><input style="width: 50%; margin: 0px auto" class="form-control" id="filtro-nome" placeholder="Pesquisar..." /></tr>
            <tr>
                <th></th>
                <th>Descrição</th>
                <th>Desconto</th>
                <th>Preço</th>
                <th>Medida</th>
            </tr>
          </thead>

          <tbody class="listar-pacientes">
          <?php foreach ($lista_produtos as $produtos):?>  
      <tr>
        <td><img src="../assets/img/upload_produtos/<?=$produtos['img_01']?>" whidth="50px" height="50px"></td>
        <td><?=$produtos['nome']?></td>
        <td><?=$produtos['desconto']?>%</td>
        <td><?=$produtos['valor']?></td>
        <td class="btn btn-success">Adicionar</td>
      </tr>     
      <?php endforeach?>
      </tbody>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
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

