<?php  
session_start(); 
include '../view/menuView.php';

require_once '../model/autoload.php';

$perfil = new Perfil();

$idusuario = $_SESSION['id'];

$numeroenderecos  = $perfil->listarenderecos($idusuario);

$numerolistadecompras = $perfil->listarlistasdecompras($idusuario);
$numerohistorico = $perfil->listarhistorico($idusuario);
$geralhistorico = $perfil->listargeralhistorico($idusuario);
$valorpedido = $perfil->listarvalorpedido($idusuario);

$somatotal = 0;

foreach ($valorpedido as $id_pedido) {

  $qtd_produto[$id_pedido['id']] = 0;

  $valoritempedido = $perfil->listarvaloritemPedido($id_pedido['id']);
  foreach ($valoritempedido as $lista_produto){
    $valor_sem_desconto = ($lista_produto['valor']*(101+$lista_produto['desconto']))/100;
    $economia = $valor_sem_desconto - $lista_produto['valor'];
    $somatotal+=$economia;

    $qtd_produto[$id_pedido['id']]++;

  }
  
}

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
            			<i class="fa fa-home"></i>
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
                        <div class="col-lg-4 col-sm-6">
                            <a href="list-enderecoclienteView.php">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <i class="fas fa-home fa-3x"></i>
                                    <h6 class="card-title">Meus endereços</h6>
                                    <h2 class="lead"><?=$numeroenderecos?></h2>
                                </div>
                            </div>
                            </a>
                        </div>
                         <div class="col-lg-4 col-sm-6">
                            <a href="list-listadecomprasView.php">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <i class="fas fa-paste fa-3x"></i>
                                    <h6 class="card-title"> Listas de compras </h6>
                                    <h2 class="lead"><?=$numerolistadecompras?></h2>
                                </div>
                            </div>
                            </a>
                        </div> 
                        <div class="col-lg-4 col-sm-6">
                            <a href="list-historicocomprasView.php">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <i class="fas fa-dolly fa-3x"></i>
                                    <h6 class="card-title">Histórico de compras</h6>
                                    <h2 class="lead"><?=$numerohistorico;?></h2>
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
                        <!--
                        <div class="col-lg-3 col-sm-6">
                            <a>
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <i class="fa fa-coins fa-3x"></i>
                                    <h6 class="card-title">Economia</h6>
                                    <h2 class="lead">R$ <?=number_format($somatotal,2,",",".");?></h2>
                                </div>
                            </div>
                            </a>
                        </div>
                      -->
                    </div>
          <div class="alert alert-primary resumo">
            <b>Últimas compras</b> 
          </div>

          <?php if ($numerohistorico>0) { ?>

          <div class="h-200">
          <?php foreach ($geralhistorico as $lista):?>
          <div class="alert alert-secondary d-lg-flex flex-lg-row flex-sm-column">
          <div class="col-lg-2 col-sm-6">
            <b>Pedido <?=$lista['id']?></b>
          </div>
          <div class="col-lg-2 col-sm-6">
            <span>
            <?php
            if ($qtd_produto[$lista['id']]=="1") {
              echo $qtd_produto[$lista['id']]." produto";
            } else {
              echo $qtd_produto[$lista['id']]." produtos";
            }              
            ?> 
              </span>
            </div>
            <div class="col-lg-2 col-sm-6">
            <span>Total de R$ <?=number_format($lista['valor'],2,",",".")?></span>
            </div>
            <div class="col-lg-3 col-sm-6 d-flex">
            <span>Data: <?=$lista['pedido_efetuado']?></span>
          </div>
          <div class="col-lg-3 col-sm-6 d-flex">
            <b class="text-success">pagamento aprovado</b> 
          </div>
          </div>
          <?php endforeach?>
          </div>

          <?php } else { ?>

          <div class="alert alert-danger">
            <b>Aqui será exibido as últimas compras realizadas</b> 
          </div>

          <?php } ?>

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

