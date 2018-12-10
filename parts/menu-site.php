<?php
  include 'links-site.php';
?>
<!--===================MENU==================-->
<html>
  <head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/menu-site.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="../assets/js/menu-site.js">
    </script>
  </head>
  <body>
    <header>
      <nav class="d-flex justify-content-between align-items-center menu">
        <div class="barrasResp">
          <i class="fas fa-bars fa-2x ml-2"></i>
        </div>
        <div class="p-2 logo">
          <a href="#"><img src="../assets/img/logo_redimencionada.png"/></a>
        </div>
        <div class="col-6 pt-3 respDisplay">
          <form class="input-group align-middle buscar" >
            <input class="form-control buscar" type="text" placeholder="O que você procura?"/>
            <button type="submit" class="d-flex justify-content-center align-items-center pesquisar ">
              <i class='fas fa-search'></i>
            </button>
          </form>
        </div>
        <div class="d-flex align-items-center respDisplay">
          <a href="#" class="mr-2 respDisplay" id="linkUser"><i class="far fa-user-circle fa-2x respDisplay"></i></a>
          <span class="respDisplay">Olá, visitante!</span>
        </div>
        <div class="respFast d-flex">
          Fast<span class="respWeb">Web</span>
        </div>
        <div class="d-flex align-items-center respDisplay">
          <a href="#" class="mr-1 respDisplay">CADASTRE-SE</a> <span class="respDisplay">|</span> <a href="#" class="ml-1 respDisplay">LOGIN</a>
        </div>
        <div class="respSearch d-flex justify-content-center align-items-center d-lg-none ml-4">
          <i class="fas fa-search respSearch"></i>
        </div>
        <div class="d-flex justify-content-center align-items-center mr-3" id="divCarrinho">
          <a href="#" id="linkCarrinho"><i class="fas fa-shopping-cart"></i></a>
        </div>
      </nav>
      <div class="menuLateral">
        <div class="btn-close">
          <i class="far fa-times-circle"></i>
        </div>
        <div class="respUser d-flex flex-column align-items-center mt-4">
          <i class="far fa-user-circle fa-3x"></i>
          <p>Olá, visitante!</p>
        </div>
        <div class="d-flex flex-column mt-3 pb-3 login-cad">
          <div class="">
            <i class="fas fa-sign-in-alt fa-1x mr-3"></i>Entrar
          </div>
          <div class="">
            <i class="fas fa-user-plus mr-2"></i>Cadastrar
          </div>
        </div>
        <ul class="d-flex flex-column align-items-center nav navbar">
          <li class="nav-item">Hortfruti</li>
          <li class="nav-item">Higiene e Limpeza</li>
          <li class="nav-item">Perfumaria</li>
          <li class="nav-item">Utilidades</li>
          <li class="nav-item">Padaria</li>
          <li class="nav-item">Açougue</li>
          <li class="nav-item">Enlatados</li>
        </ul>
      </div>
    <!--==============SUBMENU================-->
      <nav class="navbar navbar-expand-lg submenu d-none d-lg-block">
        <button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbarSite">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSite">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="dropdown show">
                <a class="nav-link dropdown-toggle" id="dropCategorias" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Todas as Categorias</a>
                <div class="dropdown-menu" aria-labelledby="dropCategotias">
                  <a class="dropdown-item">Item</a>
                  <a class="dropdown-item">Item</a>
                  <a class="dropdown-item">Item</a>
                  <a class="dropdown-item">Item</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Açougue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Gelados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Limpeza</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Casa</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="fundoBlack">

      </div>

    </header>
  </body>
</html>
