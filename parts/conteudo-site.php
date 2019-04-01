<?php
  include 'links-site.php';
?>
<html>
  <head>
    <title></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>  

  <main style="display: flex;">
    
<!-- ====================================CATEGORIAS ========================================-->
    <aside>
      <nav class="categorias">
        <section id="seccategoria">
        <h2 style="position: relative; top: 10px">Categorias</h2>
        </section>
        <section>
          <ul class="lista2">
          <li><a href="ap-categoria01.php"><i class="fa fa-tv"></i><br> Eletronicos e Celulares</a></li>
          <li><a href="ap-categoria02.php"><i class="fa fa-shower"></i><br> Artigos para casa</a></li>
          <li><a href="ap-categoria03.php"><i class="fa fa-gamepad"></i> <br> Games</a></li>
          <li><a href="ap-categoria04.php"><i class="fa fa-futbol-o"></i><br> Esportes e Lazer</a></li>
          <li><a href="ap-categoria05.php"><i class="fa fa-headphones"></i><br> Música</a></li>
          <li><a href="ap-categoria06.php"><i class="fa fa-car"></i><br> Automóveis</a></li>
          <li><a href="ap-categoria07.php"><i class="fa fa-puzzle-piece"></i><br>Artigos Infantis</a></li>
          <li><a href="ap-categoria08.php"><i class="fa fa-paw"></i><br>Animais de Estimação</a></li>
          <li><a href="ap-categoria09.php"><i class="fa fa-heartbeat"></i><br>Beleza e Saúde</a></li>
          <li><a href="ap-categoria10.php"><i class="fa fa-tag"></i><br>Roupas e Calçados</a></li>  
          <li><a href="ap-categoria11.php"><i class="fa fa-spinner"></i><br>Bijuterias e Acessórios</a></li>
          <li><a href="ap-categoria12.php"><i class="fa fa-wrench"></i><br>Ferramentas de Manutenção</a></li>
          <li><a href="ap-categoria13.php"><i class="fa fa-book"></i><br>Livros</a></li>
          <li><a href="ap-categoria14.php"><i class="fa fa-bookmark"></i><br>Objetos de Decoração</a></li>
          <li><a href="ap-categoria15.php"><i class="fa fa-leaf"></i><br>Agro e Indústria</a></li>
          <li><a href="ap-categoria16.php"><i class="fa fa-cubes"></i><br>Materias de Construção</a></li>
          <li><a href="ap-categoria17.php"><i class="fa fa-gavel"></i><br>Equipamentos Mobiliários</a></li>
          <li><a href="ap-categoria18.php"><i class="fa fa-beer"></i><br>Alimentos e Bebidas</a></li>
          <li><a href="ap-categoria19.php"><i class="fa fa-clone"></i><br>Coleções</a></li>
          <li><a href="ap-categoria20.php"><i class="fa fa-laptop"></i><br>Informática</a></li>
          <li><a href="ap-categoria21.php"><i class="fa fa-list-alt"></i><br>Ingressos</a></li>
          <li><a href="ap-categoria22.php"><i class="fa fa-users"></i><br>Adulto</a></li>
          <li><a href="ap-categoria23.php"><i class="fa fa-university"></i><br>Antiguidades</a></li>
          <li><a href="ap-categoria24.php"><i class="fa fa-check-circle"></i><br>Outros</a></li>

        <!-- <div style="height: 80px; width: 100%; margin-top: 20px;">
          <img src="imagens/anuncie_gratis.jpg" width="100%"; height="100%">
        </div> -->
        <div style="height: 400px; width: 100%; margin-top: 20px; box-shadow: 0 0 10px;">
          <img src="imagens/banner.jpg" width="100%" height="100%">
        </div>

        </ul>
        </section>


      </nav>
      
    </aside>
<!-- ++++++++++++++++++++++++++++++++++++++PRODUTOS +++++++++++++++++++++++++++++++++++++-->

    <article id="principal">
      <h1 class="titulos">Destaques </h1>
      <ul class="produtos-container">
      
      <?php include_once ("destaque-ap.php"); ?>
    
          </ul>
          <h1 class="titulos">Automoveis</h1>
      <div class="produtos-container">

      <?php //include_once ("php/automoveis-ap.php"); ?>

      </div>
    </article>
  </main>

  </body>
</html>
