$("document").ready(function(){
  $("input[name='cpf']").mask("999.999.999-99");
  $("input[name='datanasc']").mask("99/99/9999");
  $("input[name='telefone']").mask("(99)99999-9999");

  $("#cadastro-site").validate({
    rules:{
      email:{
        required: true, email: true
      },
      nome:{
        required:true
      },
      telefone:{
        required:true
      },
      genero:{
        required:true
      },
      senha:{
        required:true, minlength: 6
      },
      senha2:{
        required:true,
        minlength:6,
        equalTo:"#senha"
      }
    },
    messages:{
      email:{
        required: "<div style='position:absolute; width:200px; top:60px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Digite o e-mail</div>",
        email: "<div style='position:absolute; width:200px; top:60px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Digite um e-mail válido</div>"
      },
      nome:{
        required: "<div style='position:absolute; width:200px; top:160px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Digite um nome</div>"
      },
      telefone:{
        required:"<div style='position:absolute; width:250px; top:260px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Informe um número de telefone</div>"
      },
      genero:{
        required:"<div style='position:absolute; width:250px; top:340px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Informe o sexo</div>"
      },
      senha:{
        required: "<div style='position:absolute; width:200px; top:440px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Digite a senha</div>"  ,
        minlength: "<div style='position:absolute; width:400px; top:440px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>A senha deve conter, no minimo, 6 caracteres</div>"
      },
      senha2:{
        required: "<div style='position:absolute; width:200px; top:540px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>Digite a senha</div>" ,
        minlength:"<div style='position:absolute; width:400px; top:530px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>A senha deve conter, no minimo, 6 caracteres</div>",
        equalTo:"<div style='position:absolute; width:400px; top:530px; left:15px; color:rgb(255, 0, 0); font-weight: bolder;'>O valor deve ser identico ao campo Senha</div>"
      }
    }
  });

})

/*
rules:{
  nome:{
    required: true, minlength: 6
  },
  email:{
    required: true, email: true
  },
  password:{
    required: true, minlength: 6
  },
  password_again:{
    required: true, minlength: 6, equalTo: "#password"
}
},
messages:{
  nome:{
    required: "<div style='color: red;'>Digite o nome</div>",
    minlength: "<div style='color: red;'>O nome deve conter, no minimo, 6 caracteres</div>"
  },
  email:{
    required: "<div style='color: red;'>Digite o e-mail</div",
    email: "<div style='color: red;'>Digite um e-mail válido</div>"
  },
  password:{
    required: "<div style='color: red;'>Digite a senha</div"  ,
    minlength: "<div style='color: red;'>A senha deve conter, no minimo, 6 caracteres</div>"
  },
  password_again:{
    required: "<div style='color: red;'>Digite a confirmação da senha</div",
    equalTo: "<div style='color: red;'>O valor deve ser identico ao campo Senha</div",
    minlength: "<div style='color: red;'>A senha de confirmação deve conter, no minimo, 6 caracteres</div>"
  }*/
