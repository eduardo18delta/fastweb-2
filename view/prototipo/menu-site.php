<?php
  include 'links-cdn-site.php';
  include 'icons.php'
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Menu</title>
    <style>
      div#menu{
        background-color:#000;
        color:#fff;
        height:50px;
      }
      div#campo-busca{
        width:35%;
        height:65%;
      }
      div#logo{
        height:100%;
        width:50px;
        background-image:url("logo.png");
        background-repeat:no-repeat;
        background-size:contain;
      }
      .icons-white{
        fill:#fff;
        width:25px;
        height:25px;
      }
      .icons-black{
        fill:#000;
        width:20px;
        height:20px;
      }
      a:hover{
        text-decoration:none;
      }
    </style>
  </head>
  <body>
    <div class="d-flex align-items-center justify-content-between" id="menu">
      <div class="" id="logo">

      </div>
      <div class="d-flex justify-content-center" id="campo-busca">
        <form class="h-100 w-100" id="form-busca">
          <div class="input-group input-group-sm h-100">
            <input class="form-control input rounded-0 h-100" type="text" placeholder="Buscar podutos...">
            <div class="input-group-prepend">
              <button class="btn bg-white">
                <svg class="icons-black">
                  <use xlink:href="#magnifier"></use>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="">
        <svg class="icons-white">
          <use xlink:href="#man-user"></use>
        </svg>
        <a href="#" class="text-white"><b>Entrar</b></a> <span class="mx-2">|</span> <a href="#" class="text-white">Cadastrar</a>
      </div>
      <div class="">
        <a href="#" class="mr-4">
          <svg class="icons-white">
            <use xlink:href="#shopping-cart-black-shape"></use>
          </svg>
        </a>
        <a href="#" class="mx-4">
          <svg class="icons-white">
            <use xlink:href="#valentines-heart"></use>
          </svg>
        </a>
      </div>
    </div>
  </body>
</html>
