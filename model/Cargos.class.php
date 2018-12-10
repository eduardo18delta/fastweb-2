<?php 

include_once 'autoload.php';

class Cargos extends Conexao{

	public $id;
	public $descricao;
	
	public function listarcargos()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM cargo;";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function deletarcargo()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->deletar = $conexao->prepare("DELETE FROM cargo WHERE id_cargo = :id");
    	$this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->deletar->execute();
        echo "<script> alert('Apagado com sucesso!'); </script>";
        echo "<script> window.location.href = '../view/list-cargos.php' </script>";
    }

    public function cadastrarCargo()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarCargo = $conexao->prepare("
        INSERT INTO cargo (id_cargo, descricao) VALUES (NULL,:descricao) ;");              
        $this->cadastrarCargo->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);  
        $this->cadastrarCargo->execute();
        echo "<script> alert('Cadastrado com sucesso!'); </script>";
        echo "<script> window.location.href = '../view/list-cargos.php' </script>";
    }

    public function listaEspecificaCargo()
    {
        $conexao = Conexao::conectarBanco();
        $this->listaEspecifica = $conexao->prepare("
        SELECT * FROM cargo WHERE id_cargo = :id" );
        $this->listaEspecifica->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->listaEspecifica->execute();       
        $listausuario = $this->listaEspecifica->fetch();
        return $listausuario;
    }

    public function atualizar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->atualizar = $conexao->prepare("
        UPDATE cargo SET descricao = :descricao WHERE id_cargo = :id ");
    	$this->atualizar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
        $this->atualizar->bindValue(":descricao", $this->descricao, PDO::PARAM_STR); 
    	$this->atualizar->execute();
    }

    public function verificadelete()
    {
        $conexao = Conexao::conectarBanco();
        $this->deletar = $conexao->prepare("SELECT * FROM users WHERE cargo_fk = :id");
        $this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->deletar->execute();
    
    if ($this->deletar->rowCount() > 0) 
    {
        echo "<script> alert('Você não pode apagar esse cargo!'); </script>";
        echo "<script> window.location.href = '../view/list-cargos.php' </script>";
    } 
    else
    {
        $this->deletarcargo();

    }

    }
   
}




 
