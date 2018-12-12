<?php 

require_once "autoload.php";

	

class Produtos extends Conexao
{
	public $id;
	public $nome;
	public $valor;
	public $fornecedor;
	public $validade;
	public $quantidade;
	public $marca;
	public $categoria;
	public $url_imagem;
	
	public function listar()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "

        SELECT 

			produtos.id_produto,
			produtos.nome,
			produtos.valor,
			produtos.fornecedor,
			produtos.validade,
			produtos.quantidade,
			produtos.marca,
			produtos.url_imagem,
			categoria.descricao

		FROM 

			produtos, categoria

		WHERE 

			categoria.id_categoria = produtos.categoria_fk";

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listaEspecifica()
    {
        $conexao = Conexao::conectarBanco();
        $this->listaEspecifica = $conexao->prepare("

         SELECT 

			produtos.id_produto,
			produtos.nome,
			produtos.valor,
			produtos.fornecedor,
			produtos.validade,
			produtos.quantidade,
			produtos.marca,
			produtos.url_imagem,
			categoria.descricao

		FROM 

			produtos, categoria

		WHERE 

			categoria.id_categoria = produtos.categoria_fk 

			AND

			id_produto = :id

			" );

        $this->listaEspecifica->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->listaEspecifica->execute();       
        $listausuario = $this->listaEspecifica->fetch();
        return $listausuario;
    }


    public function deletar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->deletar = $conexao->prepare("DELETE FROM produtos WHERE id_produto = :id");
    	$this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);    	
    	$this->deletar->execute();
    }


    public function cadastrarProduto()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarProduto = $conexao->prepare("

        INSERT INTO produtos 
        (id_produto,nome,valor,categoria_fk,fornecedor,validade,quantidade,marca,url_imagem) 

        VALUES 

        (NULL,:nome,:valor,:categoria,:fornecedor,:validade,:quantidade,:marca, NULL) ;");
        
        $this->cadastrarProduto->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":valor", $this->valor, PDO::PARAM_STR);  
        $this->cadastrarProduto->bindValue(":categoria", $this->categoria, PDO::PARAM_STR);  
        $this->cadastrarProduto->bindValue(":fornecedor", $this->fornecedor, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":validade", $this->validade, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":quantidade", $this->quantidade, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":marca", $this->marca, PDO::PARAM_STR); 
        $this->cadastrarProduto->execute();
    }

    public function atualizar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->updateProduto = $conexao->prepare("

        UPDATE produtos SET nome = :nome,valor = :valor,categoria_fk = :categoria,fornecedor = :fornecedor,
        validade = :validade,quantidade = :quantidade,marca = :marca

        WHERE id_produto = :id ");
      
    	$this->updateProduto->bindValue(":id", $this->id, PDO::PARAM_STR);    	
        $this->updateProduto->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":valor", $this->valor, PDO::PARAM_STR);  
        $this->updateProduto->bindValue(":categoria", $this->categoria, PDO::PARAM_STR);  
        $this->updateProduto->bindValue(":fornecedor", $this->fornecedor, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":validade", $this->validade, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":quantidade", $this->quantidade, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":marca", $this->marca, PDO::PARAM_STR); 
    	$this->updateProduto->execute();
    }

}

