<?php 

require_once "autoload.php";

class Users extends Conexao {

    public $nome;
	public $email;
	public $password;	
	public $id;
    public $permissaodesc;
    public $cargo;
    public $permissao;

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
        $query = "

        SELECT 
            users.id,
            users.nome, 
            users.email,
            users.password,
            cargo.descricao as cargo,
            permissao.descricao as permissao
        FROM  
            users,cargo,permissao
        WHERE
            users.cargo_fk = cargo.id_cargo AND
            users.permissao = permissao.id_permissao";

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
    	$this->atualizar = $conexao->prepare("


        UPDATE users SET 

        nome = :nome, 
        email = :email,
        password = :pass,
        cargo_fk = :cargo,
        permissao = :permissao

        WHERE id = :id ");

    	$this->atualizar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
        $this->atualizar->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
    	$this->atualizar->bindValue(":email", $this->email, PDO::PARAM_STR);  
    	$this->atualizar->bindValue(":pass", $this->password, PDO::PARAM_STR);  
        $this->atualizar->bindValue(":cargo", $this->cargo, PDO::PARAM_STR); 
        $this->atualizar->bindValue(":permissao", $this->permissao, PDO::PARAM_STR); 
    	$this->atualizar->execute();
    }

    public function listaEspecifica()
    {
        $conexao = Conexao::conectarBanco();
        $this->listaEspecifica = $conexao->prepare("

        SELECT 
            users.id,
            users.nome, 
            users.email,
            users.password,
            cargo.descricao as cargo,
            permissao.descricao as permissao
        FROM  
            users,cargo,permissao
        WHERE
            users.cargo_fk = cargo.id_cargo AND
            users.permissao = permissao.id_permissao AND
            id = :id" );

        $this->listaEspecifica->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->listaEspecifica->execute();       
        $listausuario = $this->listaEspecifica->fetch();
        return $listausuario;
    }

    public function listarpermissao()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM permissao";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarcargo()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM cargo";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function recuperandosenha()
    {
        $conexao = Conexao::conectarBanco();
        $this->recuperandosenha = $conexao->prepare("SELECT users.password FROM users WHERE id = :id" );
        $this->recuperandosenha->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->recuperandosenha->execute();       
        $listausuario = $this->recuperandosenha->fetch();
        return $listausuario;
    }


}



 