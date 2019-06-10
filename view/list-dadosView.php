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
            			<a class=""href="list-ClienteclienteView.php">  
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
						<b>Endereços cadastrados</b>	
					</div>
                        <?php
                            if(isset($_SESSION['msgupdate']))
                            {
                                echo $_SESSION['msgupdate'];
                                unset($_SESSION['msgupdate']);
                            }
                        ?>
<form method="POST" action="../controller/updateclientesController.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$_SESSION['id']?>">    
                            <input type="submit" class="btn btn-success col-10" href="" value="Atualizar dados cadastrados">

<div class="form-group d-flex justify-content-center" style="position: absolute; right: 40px; top: 20px">
                                          <label for="input-foto-perfil" class="foto-perfil" id="add-foto-perfil">
                                            <img src="../assets/img/upload_perfil/<?=$_SESSION['foto_perfil']?>" width="100%" height="100%" onerror="this.src='../assets/img/perfil.jpg'">
                                          </label>
                                          <input type="file" name="foto_perfil" id="input-foto-perfil" class="d-none">
                                        </div>
                    <div class="col mt-4">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Sexo</th>
                                </tr>
                            </thead>                    
                           
                            <tbody>                 
                                <tr>
                                    <td>
                                        <div class="form-group">
                                          <input type="text" name="nome" placeholder="Digite o seu nome" class="form-control" value="<?=$_SESSION['nome']?>">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control" value="<?=$_SESSION['email']?>">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input id="telefone" type="text" name="telefone" placeholder="Digite o seu telefone" class="form-control" value="<?=$_SESSION['telefone']?>">
                                        </div>
                                    </td>  

                                    <td>
                                        <div class="form-group">          
                                          <select class="form-control" name="sexo">
                                            <option value="<?=$_SESSION['sexo']?>"><?=$_SESSION['sexo']?></option>
                                            <?php
                                            if ($_SESSION['sexo']=="Masculino"){
                                            ?>
                                            <option value="Feminino">
                                            <?php
                                                } else {
                                            ?>
                                            <option value="Masculino">
                                            <?php
                                                }
                                            ?>
                                            
                                                <?php
                                                if ($_SESSION['sexo']=="Masculino"){
                                                    echo "Feminino";
                                                } else {
                                                    echo "Masculino";
                                                }
                                                ?>
                                            </option>
                                          </select>
                                        </div>
                                    </td>
                          
                                </tr>

                            </tbody>
                        </table>
                        </div>            
                    </div>
</form>

                    <div class="col mt-4">
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Senha Atual</th>
                                    <th>Nova Senha</th>
                                    <th>Confirmar senha</th>
                                    <th></th>
                                </tr>
                            </thead>                    
                           
                            <tbody>
                                <form method="POST" action="../controller/alterarsenhaclientesController.php" enctype="multipart/form-data">                    
                                
                                <tr>
                                    <td>
                                        <div class="form-group">
                                          <input id="password" type="password" name="password" placeholder="Digite a senha" class="form-control">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input type="text" name="newpassword" placeholder="Digite a nova senha" class="form-control">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input type="password" name="password_again" placeholder="Repita a senha" class="form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="submit" name="x" class="btn btn-success" href="" value="Alterar Senha">
                                    </td>                              
                                </tr>

                                </form> 
                                              
                            </tbody>
                        </table>
                        </div>            
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

