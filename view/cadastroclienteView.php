<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
  include_once 'conexao.php';
  $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  
  $erro = false;
  
  $dados_st = array_map('strip_tags', $dados_rc);
  $dados = array_map('trim', $dados_st);
  
  if(in_array('',$dados)){
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário preencher todos os campos!</div>";
  }elseif((strlen($dados['senha'])) < 6){
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger'>A senha deve ter no minímo 6 caracteres!</div>";
  }elseif(stristr($dados['senha'], "'")) {
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na senha é inválido!</div>";
  }else{
    $result_usuario = "SELECT id FROM usuarios WHERE usuario='". $dados['usuario'] ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      $_SESSION['msg'] = "<div class='alert alert-danger'>Este usuário já está sendo utilizado!</div>";
    }
    
    $result_usuario = "SELECT id FROM usuarios WHERE email='". $dados['email'] ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      $_SESSION['msg'] = "<div class='alert alert-danger'>Este e-mail já está cadastrado!</div>";
    }
  }
  
  
  //var_dump($dados);
  if(!$erro){
    //var_dump($dados);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
    
    $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
            '" .$dados['nome']. "',
            '" .$dados['email']. "',
            '" .$dados['usuario']. "',
            '" .$dados['senha']. "'
            )";
    $resultado_usario = mysqli_query($conn, $result_usuario);
    if(mysqli_insert_id($conn)){
      $_SESSION['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
      header("Location: login.php");
    }else{
      $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário!</div>";
    }
  }
  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Celke - Cadastrar</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="form-signin" style="background: #42dea4;">
        <h2>Cadastrar Usuário</h2>
        <?php
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
        ?>
        <form method="POST" action="">
          <!--<label>Nome</label>-->
          <input type="text" name="nome" placeholder="Digite o nome e o sobrenome" class="form-control"><br>
          
          <!--<label>E-mail</label>-->
          <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control"><br>
          
          <!--<label>Usuário</label>-->
          <input type="text" name="usuario" placeholder="Digite o usuário" class="form-control"><br>
          
          <!--<label>Senha</label>-->
          <input type="password" name="senha" placeholder="Digite a senha" class="form-control"><br>
          
          <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success"><br><br>
          
          <div class="row text-center" style="margin-top: 20px;"> 
            Lembrou? <a href="login.php">Clique aqui</a> para logar
          </div>
        </form>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>