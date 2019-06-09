<?php  session_start(); if(isset($_SESSION['id'])) { include '../view/menuView.php';  ?>

<?php 

require_once '../model/autoload.php'; 

$endereco = new Endereco(); 
$idusuario = $_SESSION['id'];

$listadeenderecos = $endereco->listaEnderecos($idusuario); 

?>
   <!-- Adicionando JQuery -->
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });

            <?php foreach ($listadeenderecos as $lista):?>
            if (<?= $lista['principal']?>==1) {
            
                $('.endereco'+<?= $lista['id']?>).prop('checked', true)

            }
                                      
             <?php endforeach?> 

                //$('.endereco1').prop('checked', true)
      
                    $('.endereco').click(function() {   
                        //var endereco = $('#form_endereco').serialize();
                       // alert (cont_pacientes)
                         var endereco = new FormData($('#form_endereco')[0]);
             
                        $.ajax({
                            type: 'POST',
                            //dataType: 'json',
                            url: '../model/teste.php',
                            //async: true,
                            contentType: false,
                            processData: false,
                            data: endereco,
                            success: function(id) {

                     $('.endereco'+id).prop('checked', true)
                     window.location.href = "../view/carrinhoView.php";
                               if (response=='null') {
                                //alert ('SELECIONE PACIENTES')
                                alert(id)
                               } else {
                       alert(id)

                             }

                             },
                             error: function(response){
                                alert ('erro')
                             }
                        });
                        
                    
                        return false;
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
                            if(isset($_SESSION['msgcadastro']))
                            {
                                echo $_SESSION['msgcadastro'];
                                unset($_SESSION['msgcadastro']);
                            }
                        ?>

                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-12" href="">Editar dados cadastrados</a>

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
                                <form method="POST" id="form_endereco" enctype="multipart/form-data">                       
                                
                                <tr>
                                    <td>
                                        <div class="form-group">
                                          <input type="text" name="nome" placeholder="Digite o seu nome" class="form-control" disabled="true">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input id="telefone" type="text" name="telefone" placeholder="Digite o seu telefone" class="form-control">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <select class="form-control" name="sexo">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                          </select>
                                        </div>
                                    </td>                             
                                </tr>

                                </form> 
                                              
                            </tbody>
                        </table>
                        </div>            
                    </div>

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
                                <form method="POST" id="form_endereco" enctype="multipart/form-data">                     
                                
                                <tr>
                                    <td>
                                        <div class="form-group">
                                          <input type="text" name="nome" placeholder="Digite o seu nome" class="form-control" disabled="true">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control">
                                        </div>
                                    </td>  
                                    <td>
                                        <div class="form-group">          
                                          <input id="telefone" type="text" name="telefone" placeholder="Digite o seu telefone" class="form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success" href="">Alterar Senha</a>
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

<?php
include "../parts/modal_endereco.php";
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

