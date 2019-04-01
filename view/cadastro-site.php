<?php
  include '../parts/links-site.php';
  include '../parts/menu-site.php';
?>
<html>
  <head>
    <title>Cadastro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/cadastro-site.css"/>
    <script src="../assets/js/cadastro-site.js"></script>
  </head>
  <body>
    <main class="mt-4" id="main-cadastro">
      <div class="d-flex flex-column align-items-center div-form">
        <i class="fas fa-user fa-3x mt-4"></i>
        <h3>Cadastre-se</h3>
        <P class="frase-form">Preencha o formulário abaixo</P>
        <form class="col-6" id="cadastro-site" method="post" action="../controller/cadclientesController.php">
          <div class="d-flex flex-column">
            E-mail:
            <input type="email" name="email" placeholder="Ex: joaosilva@gmail.com" class="form-control margem"/>
            Nome Completo:
            <input type="text" name="nome" placeholder="Ex: Maria" class="form-control margem"/>
            Telefone:
            <input type="text" name="telefone" placeholder="Ex: (99)99999-9999" class="form-control margem"/>
            Sexo:
            <div class="margem">
              <input type="radio" name="genero" value="Masculino"/> Masculino
              <input type="radio" name="genero" value="Feminino"/> Feminino
            </div>
            Senha:
            <input type="password" name="senha" id="senha" class="form-control margem" placeholder="********"/>
            Repetir Senha:
            <input type="password" name="senha2" class="form-control margem" placeholder="********"/>
            <div class="margem">
              <input type="checkbox" value="1" name="ofertas" checked/> Desejo resceber ofertas por e-mail
            </div>
            <input type="submit" value="Criar cadastro" name="criar-conta" class="btn btn-danger btn-cadastro mb-4"/>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
<?php
  include '../parts/rodape-site.php';
?>
