<?php require_once '../model/autoload.php';

$menu = new Menu();

$numerousuarios = $menu->listarusuarios();
$numerocargos = $menu->listarcargos();
$numeroprodutos = $menu->listarprodutos();



?>

<?php  session_start();if(isset($_SESSION['user'])) { ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <title>Sistema Login</title>
        <!-- Bootstrap 4 -->
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.min.css">
		<!-- CSS da INDEX -->
        <link rel="stylesheet" href="../assets/css/index.css">
        <!-- GoogleFonts - OpenSans -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!-- Fontawesome 5.0-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
    <body>

        <div class="d-flex">
            <nav class="sidebar">
                <ul class="list-unstyled">

                	<!-- Image of Company -->

                	<div class="image_company">
						<img src="../assets/img/logo.png" class="rounded-circle rounded mx-auto d-block">
					</div><br><br>

                    

                    <span class="text-center logo">
                        Fastweb
                    </span><br><br>

					<!-- End Img -->




					<!-- List of Menu and Icons -->

                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>

                    <li><a href="list-cliente.php"><i class="fas fa-user"></i> Clientes </a></li>
               
                    <li><a href="list-reports.php"><i class="fas fa-paste"></i> Relatórios </a></li>

                    <li><a href="list-produtos.php"><i class="fas fa-dolly"></i> Estoque </a></li>

                    <li><a href="list-financeiro.php"><i class="fas fa-handshake"></i> Financeiro</a></li>

                    <li><a href="list-users.php"><i class="fas fa-users"></i> Usuários</a></li>

                    <li><a href="list-cargos.php"><i class="fas fa-address-card"></i> Cargos</a></li>


                    <!-- Button of Logoff -->

                    <li><a href="../controller/logoutController.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>

                    <!-- End - Button of Logoff -->

                </ul>
            </nav>

            <!-- End of Menu -->



            <!-- Navbar -->

            <div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo text-center">Menu Principal <i class="fas fa-store"></i></h2><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-cliente.php">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <i class="fas fa-users fa-3x"></i>
                                    <h6 class="card-title">Clientes</h6>
                                    <h2 class="lead">324</h2>
                                </div>
                            </div>
                            </a>
                        </div>
<!--                         <div class="col-lg-3 col-sm-6">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <i class="fas fa-paste fa-3x"></i>
                                    <h6 class="card-title"> Relatórios </h6>
                                    <h2 class="lead">56</h2>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-produtos.php">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <i class="fas fa-dolly fa-3x"></i>
                                    <h6 class="card-title"> Estoque</h6>
                                    <h2 class="lead"><?=$numeroprodutos;?></h2>
                                </div>
                            </div>
                            </a>
                        </div>
<!--                         <div class="col-lg-3 col-sm-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-handshake fa-3x"></i>
                                    <h6 class="card-title">Financeiro</h6>
                                    <h2 class="lead">13</h2>
                                </div>
                            </div>
                        </div> -->
                    </div>

                <div class="row mb-3">
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-users.php">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <i class="fas fa-users fa-3x"></i>
                                    <h6 class="card-title"> Usuários </h6>
                                    <h2 class="lead"><?=$numerousuarios;?></h2>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="list-cargos.php">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <i class="fas fa-address-card fa-3x"></i>
                                    <h6 class="card-title">Cargos </h6>
                                    <h2 class="lead"><?=$numerocargos;?></h2>
                                </div>
                            </div>
                            </a>
                        </div>
   
                        
                    </div>

                </div>
            </div>

            <!-- End of Navbar -->

        </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>

<script type="text/javascript">   
    $( document ).ready(function() {
     swal({
        position: 'top-end',
        type: 'success',
        title: 'Menu Principal',
        showConfirmButton: false,
        timer: 1000
})
});

</script>



    </body>
</html>

<?php  } else { header("Location: ../login.php?acess_denied"); } ?>