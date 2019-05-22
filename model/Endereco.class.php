<?php 

require_once "autoload.php";

class Endereco extends Conexao
{

	public $cep;
	public $rua;
	public $numero;
	public $bairro;	
	public $cidade;
	public $estado;
	public $ibge;
	public $principal;

	public function listaEnderecos($principal)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM endereco where principal = $principal";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarEndereco()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarEndereco = $conexao->prepare("

        INSERT INTO endereco 
        (id, cep, rua, numero, bairro, cidade, estado, ibge, principal) VALUES 
        (NULL, :cep , :rua , :numero, :bairro, :cidade , :estado, :ibge, :principal);");
        
        $this->cadastrarEndereco->bindValue(":cep", $this->cep, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":rua", $this->rua, PDO::PARAM_STR);  
        $this->cadastrarEndereco->bindValue(":numero", $this->numero, PDO::PARAM_STR);  
        $this->cadastrarEndereco->bindValue(":bairro", $this->bairro, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":cidade", $this->cidade, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":estado", $this->estado, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":ibge", $this->ibge, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":principal", $this->principal, PDO::PARAM_STR); 
        $this->cadastrarEndereco->execute();
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Endereço cadastrado com sucesso!
        </div>";
    }

public function principalEndereco()
    {
        $conexao = Conexao::conectarBanco();
        $this->atualizarCliente = $conexao->prepare("UPDATE endereco SET principal=:principal WHERE id=:id;");
        $this->atualizarCliente->bindValue(":principal", $this->principal, PDO::PARAM_STR);   
        $this->atualizarCliente->bindValue(":id", $this->id, PDO::PARAM_STR);   
        $this->atualizarCliente->execute();

    }

}


