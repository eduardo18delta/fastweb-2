<?php 

require_once "autoload.php";

class Users extends Conexao {

	public $email;
	public $password;	
	public $id;

	public function setLogged()
	{
	  $conexao = Conexao::conectarBanco();
      $this->login = $conexao->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
      $this->login->bindValue(":email", $this->email, PDO::PARAM_STR);
      $this->login->bindValue(":password", $this->password, PDO::PARAM_STR);
      $this->login->execute();

	if ($this->login->rowCount() > 0) 
	{
		$sql = $this->login->fetch();
		$id = $sql['id'];
		$email = $sql['email'];
		$_SESSION['user'] = $id;
		$_SESSION['email'] = $email;
		header("Location: ../view/menu.php?login_sucess");
	} 
	else
	{
		echo "<script> alert('Email ou senha incorretos!'); </script>";
		echo "<script> window.location.href = '../view/login.php' </script>";

	}

	}

	public function Logout()
	{
		unset($_SESSION['user']);
		unset($_SESSION['email']);	

	}


	public function listar()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM users";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public function deletar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->deletar = $conexao->prepare("DELETE FROM users WHERE id = :id");
    	$this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->deletar->execute();
    }

    public function atualizar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->atualizar = $conexao->prepare("UPDATE users SET email = :email ,password = md5(:pass) WHERE id = :id");
    	$this->atualizar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->atualizar->bindValue(":email", $this->email, PDO::PARAM_STR);  
    	$this->atualizar->bindValue(":pass", $this->password, PDO::PARAM_STR);  
    	$this->atualizar->execute();
    }



}



