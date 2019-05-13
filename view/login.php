<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
   	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <title>Login</title>
  </head>

  <body class="text-center">
    <form id="loginadmin" class="form-signin" method="POST" class="log" action="../controller/loginController.php" autocomplete="off">
      <img class="mb-4" src="../assets/img/logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="inputEmail" class="sr-only">Email:</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Seu e-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Senha:</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <a href="mailto:meajuda@fastweb.com">meajuda@fastweb.com</a>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="../assets/js/validacoes.js"></script>
  </body>
</html>
