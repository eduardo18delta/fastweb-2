<?php
  include '../parts/links-site.php';
  include '../parts/menu-site.php';
?>
<html>
  <head>
    <title>Cadastro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../css/cadastro-site.css"/>
  </head>
  <body>
    <main>
      <div class="d-flex flex-column align-items-center div-form">
        <i class="fas fa-user fa-3x"></i>
        <h3>Cadastre-se</h3>
        <P class="frase-form">Preencha o formulário abaixo</P>
        <form class="col-6">
          <div class="d-flex flex-column">
            E-mail:
            <input type="email" name="email" placeholder="Ex: joaosilva@gmail.com" class="form-control margem"/>
            Senha:
            <input type="password" name="senha" class="form-control margem"/>
            Nome Completo:
            <input type="text" name="nome" placeholder="Ex: Maria" class="form-control margem"/>
            CPF:
            <input type="text" name="cpf" placeholder="Ex: 123.456.789-12" class="form-control margem"/>
            Data de Nascimento:
            <input type="date" name="data-nasc" class="form-control margem"/>
            Sexo:
            <div class="margem">
              <input type="radio" name="genero" value="masculino"/> Masculino
              <input type="radio" name="genero" value="feminino"/> Feminino
            </div>
            Telefone:
            <input type="text" name="telefone" placeholder="Ex: (99)99999-9999" class="form-control margem"/>
            <div class="margem">
              <input type="checkbox" name="ofertas" checked/> Desejo resceber ofertas por e-mail
            </div>
            <input type="button" value="Criar cadastro" class="btn btn-danger btn-cadastro"/>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
<?php
  include '../parts/rodape-site.php';
?>
