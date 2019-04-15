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
	public $cliente_fk;

	public function listar()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM  endereco ";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarEndereco()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarEndereco = $conexao->prepare("

        INSERT INTO endereco 
        (id, cep, rua, numero, bairro, cidade, estado, ibge, cliente_fk) VALUES 
        (NULL, :cep , :rua , :numero, :bairro, :cidade , :estado, :ibge, :cliente_fk);");
        
        $this->cadastrarEndereco->bindValue(":cep", $this->cep, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":rua", $this->rua, PDO::PARAM_STR);  
        $this->cadastrarEndereco->bindValue(":numero", $this->numero, PDO::PARAM_STR);  
        $this->cadastrarEndereco->bindValue(":bairro", $this->bairro, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":cidade", $this->cidade, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":estado", $this->estado, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":ibge", $this->ibge, PDO::PARAM_STR); 
        $this->cadastrarEndereco->bindValue(":cliente_fk", $this->cliente_fk, PDO::PARAM_STR); 
        $this->cadastrarEndereco->execute();
        $_SESSION['msgcadastro'] = "<div class='alert alert-success mt-4'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close>
    <span aria-hidden='true'>&times;</span>
  </button>Endereço cadastrado com sucesso!</div>";
    }
}


