<?php include_once '../view/menuView.php'; ?>

  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-4">
        <div class="form-signin">
          <h2>Cadastrar Usuário</h2>
          <?php
            if(isset($_SESSION['msg']))
            {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>      
          <form method="POST" action="">
            <div class="form-group">
              <input type="text" name="nome" placeholder="Digite o nome e o sobrenome" class="form-control">
            </div>

            <div class="form-group">          
              <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control">
            </div>

            <div class="form-group">
              <input type="text" name="usuario" placeholder="Digite o usuário" class="form-control">
            </div>

            <div class="form-group">          
              <input type="password" name="senha" placeholder="Digite a senha" class="form-control">
            </div>
          
            <div class="form-group">
                <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success">
            </div>
          
            <div class="form-group">
              Lembrou? <a href="loginclienteView.php">Clique aqui</a> para logar
            </div>          
          </form>
        </div>
      </div>
    </div>
  </div>
   