<?php  session_start(); if(isset($_SESSION['id'])) { include '../view/menuView.php';  ?>

<?php 

require_once '../model/autoload.php'; 

$cliente = new Cliente(); 
$idusuario = $_SESSION['id'];

$dadoscliente = $cliente->listar(); 

?>
   <!-- Adicionando JQuery -->
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            $("#input-foto-perfil").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-perfil");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-perfil"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

  });
                                                         

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
            			<a class="menu-marcado"href="list-dadosView.php">  
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
                      <a class=""href="list-listadecomprasView.php" data-toggle="modal" data-target="#exampleModalCenter">  
                      <i class="fas fa-key"></i>
                      Trocar senha
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
				<div class="col-md-12">
					<div class="alert alert-primary resumo">
						<b>Dados cadastrados</b>	
					</div>
                        <?php
                            if(isset($_SESSION['msgupdate']))
                            {
                                echo $_SESSION['msgupdate'];
                                unset($_SESSION['msgupdate']);
                            }
                        ?>
                </div>  

                <div class="col-md-12">            
                    <form id="updatecliente" method="POST" action="../controller/updateclientesController.php" enctype="multipart/form-data">
                        
                            <div class="col-md-12 d-flex justify-content-center">
                            <label for="input-foto-perfil" class="foto-perfil" id="add-foto-perfil">
                                <img title="clique para alterar" src="../assets/img/upload_perfil/<?=$_SESSION['foto_perfil']?>" width="100%" height="100%" onerror="this.src='../assets/img/perfil.jpg'">
                            </label>  
                            </div>          
                            <input type="file" name="foto_perfil" id="input-foto-perfil" class="d-none">                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Digite seu nome: </label>
                                <input type="text" required="" name="nome" class="form-control" value="<?=$_SESSION['nome']?>">
                            </div>
                                  
                            <div class="form-group col-md-6">       
                                <label>Digite seu Email:</label>
                                <input type="text" name="email" class="form-control" value="<?=$_SESSION['email']?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">       
                                <label>Digite seu telefone:</label>  
                                <input id="telefone" type="text" name="telefone" class="form-control" value="<?=$_SESSION['telefone']?>">
                            </div>
      
                            <div class="form-group col-md-6">       
                                <label>Escolha seu gênero:</label> 
                                    <select class="form-control" name="sexo">
                                        <option value="<?=$_SESSION['sexo']?>"><?=$_SESSION['sexo']?></option>
                                            <?php if ($_SESSION['sexo']=="Masculino"){?>                        
                                            <option value="Feminino">
                                            <?php } else {?>
                                            <option value="Masculino">
                                            <?php } ?>
                                            <?php if ($_SESSION['sexo']=="Masculino"){ echo "Feminino"; } else { echo "Masculino";}?>
                                        </option>
                                    </select>
                            </div>
                            </div>

                            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">

                            <div class="form-group">       
                                <input type="submit" class="btn btn-success btn-block" href="" value="Atualizar dados cadastrados">           
                            </div>           
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>



            
<!-- Modal Mudança de senha - Start -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mudar Senha:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="trocarsenha" method="POST" action="../controller/alterarsenhaclientesController.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                        <div class="form-group">          
                            <input type="password" id="newpassword" name="newpassword" placeholder="Digite a nova senha" class="form-control">
                        </div>
                        <div class="form-group">          
                            <input type="password" name="password_again" placeholder="Repita a senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" href="" value="Alterar Senha">
                        </div>
                </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>    
      </div>
    </div>
  </div>
</div> 
<!-- Modal Mudança de senha - End -->


<?php  
} 
else 
{ 
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: loginclienteView.php"); 
} 


include_once '../view/footerView.php';

?>

