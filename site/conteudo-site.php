<?php
  include 'links.php';
?>
<html>
  <head>
    <title></title>
    <meta charset="utf-8"/>
  </head>
  <style>
    .borda{
      border:1px solid #000;
    }
    .info-prod{
      font-size:20pt;
    }
    .preco{
      font-size:25pt;
    }
    .btn-comprar{
      font-size:20pt;
    }
  </style>
  <body>
    <main class="container-fluid borda">
      <div class="row borda" style="border:1px solid red;">
        <div class="borda">
          <div class="borda">
            <img src="_img/home/prod1.jpg" class=""/>
          </div>
          <div class="text-center borda info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco borda">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center borda">
            <input type="text" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>
      </div>
      <div class="">

      </div>
      <div class="">

      </div>
    </main>
  </body>
</html>
