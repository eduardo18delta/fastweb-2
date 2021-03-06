<?php 


require_once "autoload.php";

Class Cliente extends Conexao{

	public $id;
	public $email;
    public $password;
	public $nome;
	public $telefone;
	public $genero;
    public $sexo;
	public $senha;
	public $senha2;
	public $ofertas;
    public $endereco_fk;
    public $foto_perfil;

    public function setId($id){
        $this->id = $id;
    }

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
        (id, nome,email,telefone,sexo,senha,ofertas, foto_perfil) 
        VALUES 
        (NULL,:nome,:email,:telefone,:sexo,:password, NULL, :foto_perfil);");
        $this->cadastrarCliente->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarCliente->bindValue(":email", $this->email, PDO::PARAM_STR);  
        $this->cadastrarCliente->bindValue(":telefone", $this->telefone, PDO::PARAM_STR);  
        $this->cadastrarCliente->bindValue(":sexo", $this->sexo, PDO::PARAM_STR); 
        $this->cadastrarCliente->bindValue(":password", $this->password, PDO::PARAM_STR);
        $this->cadastrarCliente->bindValue(":foto_perfil", $this->foto_perfil, PDO::PARAM_STR); 
        $this->cadastrarCliente->execute();

    }
/*
    public function atualizarCliente()
    {
        $conexao = Conexao::conectarBanco();
        $this->atualizarCliente = $conexao->prepare("UPDATE clientes SET endereco_fk=:endereco_fk WHERE id=:id;");
        $this->atualizarCliente->bindValue(":endereco_fk", $this->endereco_fk, PDO::PARAM_STR);   
        $this->atualizarCliente->bindValue(":id", $this->id, PDO::PARAM_STR);   
        $this->atualizarCliente->execute();

    }
*/
    public function deletar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->deletar = $conexao->prepare("DELETE FROM clientes WHERE id = :id");
    	$this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->deletar->execute();
    }

    public function atualizarCliente()
    {
        $conexao = Conexao::conectarBanco();
        $this->updateCliente = $conexao->prepare("

        UPDATE clientes SET nome = :nome,email = :email,telefone = :telefone,sexo = :sexo

        WHERE id = :id ");
      
        $this->updateCliente->bindValue(":id", $this->id, PDO::PARAM_STR);      
        $this->updateCliente->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->updateCliente->bindValue(":email", $this->email, PDO::PARAM_STR);  
        $this->updateCliente->bindValue(":telefone", $this->telefone, PDO::PARAM_STR);  
        $this->updateCliente->bindValue(":sexo", $this->sexo, PDO::PARAM_STR);
        $this->updateCliente->execute();
    }

    public function atualizarFotoperfil($foto_perfil)
    {
        $conexao = Conexao::conectarBanco();
        $this->updateCliente = $conexao->prepare("

        UPDATE clientes SET $foto_perfil

        WHERE id = :id ");

        //$this->updateCliente->bindValue(":img_01", $this->img_01, PDO::PARAM_STR);
        $this->updateCliente->bindValue(":id", $this->id, PDO::PARAM_STR);
        $this->updateCliente->execute();
    }

    public function atualizarSenha($novasenha)
    {
        $conexao = Conexao::conectarBanco();
        $this->updateCliente = $conexao->prepare("

        UPDATE clientes SET $novasenha

        WHERE id = :id ");

        //$this->updateCliente->bindValue(":img_01", $this->img_01, PDO::PARAM_STR);
        $this->updateCliente->bindValue(":id", $this->id, PDO::PARAM_STR);
        $this->updateCliente->execute();
    }
    /*
    public function consultarSenha($password)
    {
        $conexao = Conexao::conectarBanco();
      $this->login = $conexao->prepare("
        SELECT 

        clientes.id,
        clientes.senha

        FROM clientes WHERE email = :email AND senha = :senha
        ");
      $this->login->bindValue(":email", $this->email, PDO::PARAM_STR);
      $this->login->bindValue(":senha", $this->password, PDO::PARAM_STR);
      $this->login->execute();

        if ($this->login->rowCount() > 0) 
        {
            $sql = $this->login->fetch();
            $id = $sql['id'];

            $_SESSION['id'] = $id;
        }
    }
    */

    public function loginCliente()
	{
	  $conexao = Conexao::conectarBanco();
      $this->login = $conexao->prepare("
        SELECT 

        clientes.id,
        clientes.nome,
        clientes.email,
        clientes.telefone,
        clientes.sexo,
        clientes.senha,
        clientes.ofertas,
        clientes.foto_perfil

        FROM clientes WHERE email = :email AND senha = :senha
        ");
      $this->login->bindValue(":email", $this->email, PDO::PARAM_STR);
      $this->login->bindValue(":senha", $this->password, PDO::PARAM_STR);
      $this->login->execute();

	if ($this->login->rowCount() > 0) 
	{
		$sql = $this->login->fetch();
		$id = $sql['id'];
		$email = $sql['email'];
        $nome = $sql['nome'];
        $telefone = $sql['telefone'];
        $sexo = $sql['sexo'];
        $foto_perfil = $sql['foto_perfil'];
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['sexo'] = $sexo;
        $_SESSION['foto_perfil'] = $foto_perfil;
		header("Location: ../view/perfilclienteView.php");
	} 
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Dados Incorretos!</div>";	
        header("Location: ../view/loginclienteView.php");

	}

	}

	public function Logout()
	{
		unset($_SESSION['user']);
        unset($_SESSION['nome']);  
		unset($_SESSION['email']);	

	}


}
















