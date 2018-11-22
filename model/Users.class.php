<?php 

require_once "autoload.php";

class Users extends Conexao {

	public $email;
	public $password;	

	public function setLogged(){
	  $conexao = Conexao::conectarBanco();
      $this->login = $conexao->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
      $this->login->bindValue(":email", $this->email, PDO::PARAM_STR);
      $this->login->bindValue(":password", $this->password, PDO::PARAM_STR);
      $this->login->execute();


		if ($this->login->rowCount() > 0) {
			$sql = $this->login->fetch();
			$id = $sql['id'];
			$_SESSION['user'] = $id;

			header("Location: ../view/index.php?login_sucess");

		} else

		{
			echo "<script> alert('Email ou senha incorretos!'); </script>";
			echo "<script> window.location.href = '../login.php' </script>";

		}



	}


	public function Logout(){
		unset($_SESSION['user']);

	}








}



