<?php 

require_once "autoload.php";

class Itemlistadecompras extends Conexao
{
    public $cliente_fk;
    public $lista_compras_fk;
    public $produtos_fk;


	public function listaItemlistadecompras($idusuario, $itemlistacompras)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT 
        produtos.id_produto,
        produtos.img_01, 
        produtos.nome, 
        produtos.valor,
        produtos.quantidade 
        FROM item_lista_compras 
        JOIN lista_compras 
        JOIN produtos 
        ON item_lista_compras.lista_compras_fk=lista_compras.id AND item_lista_compras.produtos_fk=produtos.id_produto 
        WHERE lista_compras.id = $itemlistacompras AND item_lista_compras.cliente_fk=$idusuario;";
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


