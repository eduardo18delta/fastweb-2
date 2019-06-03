<html>
  <head>        
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
    <!-- Links css's -->
    <link rel="stylesheet" type="text/css" href="../assets/css/carrinho.css"/>
    <!-- Css do slide da home-->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <!-- Css do Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
    <!-- Css FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  </head>
  <body>  
    <div id="menu-space"> 
    </div>
    <div class="d-flex align-items-center justify-content-between desfocar" id="menu">
        <div id="logo-div">
            <a href="index-site.php">
                <img id="logo-home" src="../assets/img/logo_small.png">
            </a>
        </div>
        
        <div class="d-flex justify-content-center" id="campo-busca">
            <form method="post" class="h-100 w-100 esconder" id="form-busca" action="../view/buscaView.php">
                <div class="input-group input-group-sm h-100">                    
                    <input name="busca" class="form-control input rounded-0 h-100" type="text" placeholder="Buscar podutos...">
                    <input name="busca-cod-barra" class="d-none form-control input rounded-0 h-100" type="text" placeholder="Digite o código de barra ou use o leitor...">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn bg-white">
                        <i class="fas fa-search"></i>
                        </button>  
                        <button class="btn bg-white busca_cod_barra">
                        <i class="fas fa-barcode"></i>
                        </button>    
                        <button class="d-none enviar-cod-barra" type="submit">
                        </button>                                      
                    </div>
                </div>
            </form>
        </div>

        <div class="cadastros desfocar"> 
                <?php if(!empty($_SESSION['id'])){ ?>
                <a href="perfilclienteView.php" class="text-white">
                    <i class="fas fa-user"></i>
                    <b>Perfil</b>
                </a>   
                        
                <?php }else{?>
                <a href="loginclienteView.php" class="text-white">
                    <i class="fas fa-user"></i>
                    <b>Entrar</b>
                </a>   
                <?php } ?>                    
                <span> 
                    | 
                </span>
                <a href="cadastroclienteView.php" class="text-white">
                    <i class="fas fa-edit"></i>
                    Cadastrar
                </a>
        </div>
        
        <div class="icons-cart">
            <a href="../view/carrinhoView.php">
                <div class="cont_add_produto carrinho_compra_ativo carrinho-compra-alert"></div>
               <i class="fas fa-shopping-cart"></i>
            </a>
            <span> 
               | 
            </span>
            <a class="mr-5 icon-white" href="../view/list-listadecomprasView.php">
                <i class="fas fa-clipboard-list"></i>
            </a>
        </div>
    </div>

    <!-- Script de notificação do carrinho-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="../assets/js/carrinho.js"></script>