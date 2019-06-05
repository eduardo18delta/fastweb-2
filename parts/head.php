<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Gestão - FastWeb">
      <meta name="author" content="Eduardo Henrique">
      <title>FastWeb</title>    
      <link href="../assets/css/styles.css" rel="stylesheet">    
      <link href="../assets/css/cadastro-produto.css" rel="stylesheet">
      <link href="../assets/img/icons/dev-icon.png" rel="icon" type="image/png">            
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
      <!-- Css FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="../view/menu.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">    Info.
       </button>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1/fastweb-2/controller/logoutController.php">Sair</a>
      </li> 
    </ul>
  </div> 
</nav>
    
<!-- Small modal -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
     <div class="modal-content">      
     <div class="container">   

     <div class="alert alert-info mt-4">
      <h5 class="alert-heading">Sessão:</h5>  
      Usuário: <?php echo $_SESSION['nome']; ?></div>          
     </div>

    </div>
  </div>
</div>