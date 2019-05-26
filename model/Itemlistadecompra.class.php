<?php 

require_once "autoload.php";

class Itemlistadecompras extends Conexao
{
    public $cliente_fk;
    public $lista_compras_fk;
    public $produtos_fk;


	public function listaItemlistadecompras($idusuario)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM item_lista_compras WHERE cliente_fk = $idusuario";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarItemlistadecompras()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarListadecompras = $conexao->prepare("

        INSERT INTO item_lista_compras
        (id, cliente_fk, lista_compras_fk, produtos_fk) VALUES 
        (NULL, :cliente_fk, :lista_compras_fk, :produtos_fk);");
        
        $this->cadastrarListadecompras->bindValue(":cliente_fk", $this->cliente_fk, PDO::PARAM_STR);
        $this->cadastrarListadecompras->bindValue(":lista_compras_fk", $this->lista_compras_fk, PDO::PARAM_STR);
        $this->cadastrarListadecompras->bindValue(":produtos_fk", $this->produtos_fk, PDO::PARAM_STR);
        $this->cadastrarListadecompras->execute();

    }

    


}


