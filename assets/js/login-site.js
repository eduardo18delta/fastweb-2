$(document).ready( function() {
  $("#login-site").validate({
    rules:{
      email:{
        required: true, email: true
      },
      password:{
        required: true, minlength: 6
      },
    },
    messages:{
      email:{
        required: "<div style='position:absolute; width:200px; top:40px; left:0; color:rgb(255, 0, 0); font-weight: bolder;'>Digite o e-mail</div>",
        email: "<div style='position:absolute; width:200px; top:40px; left:0; color:rgb(255, 0, 0); font-weight: bolder;'>Digite um e-mail válido</div>"
      },
      password:{
        required: "<div style='position:absolute; width:200px; top:60px; left:0; color:rgb(255, 0, 0); font-weight: bolder;'>Digite a senha</div"  ,
        minlength: "<div style='position:absolute; width:400px; top:60px; left:0; color:rgb(255, 0, 0); font-weight: bolder;'>A senha deve conter, no minimo, 6 caracteres</div>"
      },
    }
  });
});
