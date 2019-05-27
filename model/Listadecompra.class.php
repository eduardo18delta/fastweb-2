<?php 

require_once "autoload.php";

class Listadecompras extends Conexao
{
    public $cliente_fk ;
	public $nome;


	public function listaListadecompras($idusuario)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM lista_compras where cliente_fk = $idusuario ORDER BY lista_compras.id DESC";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarListadecompras()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarListadecompras = $conexao->prepare("

        INSERT INTO lista_compras
        (id, nome, cliente_fk) VALUES 
        (NULL, :nome, :cliente_fk);");
        
        $this->cadastrarListadecompras->bindValue(":cliente_fk", $this->cliente_fk, PDO::PARAM_STR);
        $this->cadastrarListadecompras->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarListadecompras->execute();
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Lista cadastrada com sucesso!
        </div>";
    }


    


}


