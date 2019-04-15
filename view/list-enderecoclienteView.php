<?php  session_start(); include '../view/menuView.php'; if(isset($_SESSION['id'])) { ?>

   <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
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
        });

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
            			<a class="menu-marcado"href="list-enderecoclienteView.php">  
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

          <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-12" href="">Cadastrar novo endereço</a>

          <div class="col">
              dados do endereço
          </div>

				</div>

			</div>
		</div>
	</div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" action="../controller/cadenderecoController.php">

          <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">

          <div class="form-group">            
            Cep:
            <input class="form-control" name="cep" type="text" id="cep" value=""/>
          </div>

          <div class="form-group">
            Rua:
            <input class="form-control" name="rua" type="text" id="rua">
          </div>

          <div class="form-group">      
           Número:
            <input class="form-control" name="numero" type="text" id="numero"/>
          </div>

          <div class="form-group">      
           Bairro:
            <input class="form-control" name="bairro" type="text" id="bairro"/>
          </div>

          <div class="form-group">
            Cidade:
            <input class="form-control" name="cidade" type="text" id="cidade"/>
          </div>

          <div class="form-group">
           Estado:
            <input class="form-control" name="uf" type="text" id="uf"/>
          </div>

          <div class="form-group">
            IBGE:
            <input class="form-control" name="ibge" type="text" id="ibge"/>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="enviar">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
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
