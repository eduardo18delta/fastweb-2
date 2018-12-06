<?php
  include 'links.php';
?>
<?php
  include 'menu.php';
?>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="_css/login.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    <main>
      <div class="container">
	      <div class="d-flex justify-content-center h-50">
		      <div class="card">
			      <div class="card-body">
				      <form>
					      <div class="input-group form-group">
						      <div class="input-group-prepend">
							      <span class="input-group-text"><i class="fas fa-user"></i></span>
						      </div>
						      <input type="text" class="form-control" placeholder="E-mail">
					      </div>
					      <div class="input-group form-group">
						      <div class="input-group-prepend">
							      <span class="input-group-text"><i class="fas fa-key"></i></span>
						      </div>
						      <input type="password" class="form-control" placeholder="Senha">
					      </div>
					      <div class="form-group">
						      <input type="submit" value="Entrar" class="btn float-right login_btn">
					      </div>
				      </form>
			      </div>
			      <div class="card-footer">
				      <div class="d-flex justify-content-center links">
					           Não possui uma conta?<a href="#">Cadastre-se</a>
				      </div>
				      <div class="d-flex justify-content-center">
					      <a href="#">Esqueceu a senha?</a>
				      </div>
			      </div>
		      </div>
	      </div>
      </div>
    </main>
  </body>
</html>
<?php
include 'rodape.php';
?>                                                                                                                                                                                                                                                                                                                                          
