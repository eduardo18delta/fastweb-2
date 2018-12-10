<?php
  include 'links.php';
?>
<html>
  <head>
    <title></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <style>
  /*RESPONSIVE CSS */
  @media(max-width:600px) {
    .borda{
      border:1px solid #000;
    }
    .prod{
      border:1px solid rgb(223, 223, 223);

    }
    .info-prod{
      font-size:15pt;
    }
    .preco{
      font-size:15pt;
    }
    .btn-comprar{
      font-size:10pt;
    }
    .img-prod{
      height:220px;
    }
  }
/*DESKTOP CSS*/
  @media(min-width:601px){
    .prod{
      border:1px solid rgb(223, 223, 223);
    }
    .img-prod{
      height:280px;
    }
    .titulo{
      /* border-bottom:1px solid rgb(223, 223, 223); */
    }
  }


  </style>
  <body>
    <main class="container-fluid my-4" style="border:1px solid red;">

      <div class="row m">
        <div class="col-12 titulo">
          <h2 class="text-center text-danger">Destaques</h2>
          <h5 class="text-center">Aproveite antes que acabe!</h5>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/miojo.png" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Miojo</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/acai.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Açai</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/danone.png" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/miojo.png" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Miojo</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/acai.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Açai</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/danone.png" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>

        <div class="col-6 col-lg-2 prod">
          <div class="text-center img-prod">
            <img src="_img/home/prod1.jpg" class="w-100"/>
          </div>
          <div class="text-center info-prod">
            <p class="d-inline align-middle">Calabresa</p>
          </div>
          <div class="text-center preco">
            <p class="d-inline align-middle text-danger">R$ 10,00</p>
          </div>
          <div class="text-center">
            <input type="submit" class="btn btn-danger my-2 w-50 btn-comprar" value="Comprar"/>
          </div>
        </div>
        <div class="col-12 mt-3 text-center">
          <input type="submit" class="btn btn-warning" value="Clique aqui e veja mais produto"/>
        </div>
      </div>
    </main>
  </body>
</html>
