<html>
  <head>
    <title>Cadastro</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="assets/js/plugins/mask.js"></script>
    <script>
      $("document").ready(function(){
        /*==========FUNÇÃO JAVASCRIPT CPF===============*/
  function validarCPF(cpf) {
     cpf = cpf.replace(/[^\d]+/g,'');
      if(cpf == '') return false;

       // Elimina CPFs invalidos conhecidos
      if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
        return false;

// Valida 1o digito
     add = 0;
     for (i=0; i < 9; i ++)
       add += parseInt(cpf.charAt(i)) * (10 - i);
       rev = 11 - (add % 11);
     if (rev == 10 || rev == 11)
       rev = 0;
     if (rev != parseInt(cpf.charAt(9)))
       return false;

// Valida 2o digito
   add = 0;
    for (i = 0; i < 10; i ++)
      add += parseInt(cpf.charAt(i)) * (11 - i);
      rev = 11 - (add % 11);
      if (rev == 10 || rev == 11)
        rev = 0;
      if (rev != parseInt(cpf.charAt(10)))
        return false;

        return true;

}
/*=============JQUERY CPF============*/
$("input[name='cpf']").mask("999.999.999-99");
$("input[name='criar-cadastro']").click(function() {
  
     if(validarCPF($("input[name='cpf']").val())) {
       $("body").css("background-color","#000")
     }else{
       $("body").css("background-color","green")
     }

    });

  /*==============================*/
      })
    </script>
  </head>
  <body>
    <main class="mt-4" id="main-cadastro">
      <div class="d-flex flex-column align-items-center div-form">
        <i class="fas fa-user fa-3x mt-4"></i>
        <h3>Cadastre-se</h3>
        <P class="frase-form">Preencha o formulário abaixo</P>
        <form class="col-6" id="cadastro-site">
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
            <input type="date" name="datanasc" class="form-control margem date"/>
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
            <input type="submit" value="Criar cadastro" name="criar-cadastro" class="btn btn-danger btn-cadastro mb-4"/>
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
