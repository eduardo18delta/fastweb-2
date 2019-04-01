<?php 


require_once "autoload.php";

Class Cliente extends Conexao{

	public $id;
	public $email;
	public $nome;
	public $telefone;
	public $genero;
	public $senha;
	public $senha2;
	public $ofertas;

	public function listar()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "

        SELECT * FROM  clientes ";

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
	
    public function cadastrarCliente()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarCliente = $conexao->prepare("

        INSERT INTO clientes 
        (id, nome,email,telefone,sexo,senha,ofertas) 

        VALUES 

        (NULL,:nome,:email,:telefone,:genero,:senha,:ofertas);");
        
        $this->cadastrarCliente->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarCliente->bindValue(":email", $this->email, PDO::PARAM_STR);  
        $this->cadastrarCliente->bindValue(":telefone", $this->telefone, PDO::PARAM_STR);  
        $this->cadastrarCliente->bindValue(":genero", $this->genero, PDO::PARAM_STR); 
        $this->cadastrarCliente->bindValue(":senha", $this->senha, PDO::PARAM_STR); 
        $this->cadastrarCliente->bindValue(":ofertas", $this->ofertas, PDO::PARAM_STR); 
        $this->cadastrarCliente->execute();
    }

    public function deletar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->deletar = $conexao->prepare("DELETE FROM clientes WHERE id = :id");
    	$this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->deletar->execute();
    }


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
        $nome = $sql['nome'];
		$_SESSION['user'] = $id;
		$_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
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
        unset($_SESSION['nome']);  
		unset($_SESSION['email']);	

	}


}
















