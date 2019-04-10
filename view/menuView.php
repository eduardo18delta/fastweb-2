<html>
  <head>    
    <?php #require_once 'iconsView.php'?>
    <title>FastWeb - Supermercado Online</title>
    <meta charset="utf-8"/>  
    <link href="../assets/img/logo_small.png" rel="icon" type="image/png">     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta Tags - Open Graph -->       
    <meta property="og:url" content="https://www.fastweb.com"/>
    <meta property="og:title" content="FastWeb"/>
    <meta property="og:description" content="FastWeb - Supermercado Online"/>        
    <meta property="og:locale" content="pt_BR"/>
    <meta property="og:type" content="website">
    <meta property="og:image" content="">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content=""> 
    <meta property="og:image:height" content=""> 
    <!-- Meta Tags Comuns -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="FastWeb">      
    <meta name="description" content="FastWeb - Supermercado Online">
    <meta name="keywords" content="Varejo, Supermercado Online, Ecommerce, Vendas"/>  
    <!-- Links css's -->
    <link rel="stylesheet" type="text/css" href="../assets/css/novo-css.css"/>
    <!-- Links css's responsivo -->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsivo.css" media="screen">
    <!-- Css do slide da home-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <!-- Css do Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
    <!-- Css FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>
  <body>  

    <div class="d-flex align-items-center justify-content-between" id="menu">
        <div id="logo-div">
            <a href="index-site.php">
                <img id="logo-home" src="../assets/img/logo_small.png">
            </a>
        </div>
        
        <div class="d-flex justify-content-center" id="campo-busca">
            <form class="h-100 w-100 esconder" id="form-busca">
                <div class="input-group input-group-sm h-100">
                    <input class="form-control input rounded-0 h-100" type="text" placeholder="Buscar podutos...">
                    <div class="input-group-prepend">
                        <button class="btn bg-white">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="cadastros">
            <svg class="icons-white">
                <use xlink:href="#man-user"></use>
            </svg>
                <a href="loginclienteView.php" class="text-white"><b>Entrar</b></a> 
                <span class="mx-2">|</span>
                <a href="cadastroclienteView.php" class="text-white">Cadastrar</a>
        </div>
        
        <div class="">
            <a href="#" class="mr-5 icon-white">
               <i class="fas fa-shopping-cart"></i>
            </a>
            <a class="esconder mr-5 icon-white" href="#" class="mx-4">
                <i class="fas fa-heart"></i>
            </a>
        </div>
    </div>