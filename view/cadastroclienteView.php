<?php include_once '../controller/facebookloginController.php'; ?>
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
          <form id="cadcliente"  method="POST" action="../controller/cadclientesController.php">
            <div class="form-group">
              <input type="text" name="nome" placeholder="Digite o seu nome" class="form-control">
            </div>

            <div class="form-group">          
              <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control">
            </div>

            <div class="form-group">          
              <input id="telefone" type="text" name="telefone" placeholder="Digite o seu telefone" class="form-control">
            </div>

            <div class="form-group">          
              <select class="form-control" name="sexo">
                <option disable="" value="">Escolha o sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>

            <div class="form-group">          
              <input id="password" type="password" name="password" placeholder="Digite a senha" class="form-control">
            </div>

            <div class="form-group">          
              <input type="password" name="password_again" placeholder="Repita a senha" class="form-control">
            </div>
          
            <div class="form-group">
                <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success btn-block">
            </div>
          
            <div class="form-group">
              Lembrou? <a href="loginclienteView.php">Clique aqui</a> para logar
            </div>          

            <div class="form-group">
              <a class="ml-2 btn btn-primary" href="<?=$loginUrl;?>">  <i class="fab fa-facebook"></i> Cadastro com Facebook
                  </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   
<?php include_once '../view/footerView.php'; ?>