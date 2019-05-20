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
    public $descricao;
    public $peso;
    public $medida;
    public $desconto;
    public $cod_barra;
    public $destaque;
    public $img_01;
    public $img_02;
    public $img_03;
    public $img_04;
    public $img_05;
    public $img_06;
    	
    public function setId($id){
        $this->id = $id;
    }

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
            produtos.descricao,
            produtos.peso,
            produtos.medida,
            produtos.desconto,
            produtos.cod_barra,
            produtos.destaque,
			categoria.descricao,
            produtos.img_01,
            produtos.img_02,
            produtos.img_03,
            produtos.img_04,
            produtos.img_05,
            produtos.img_06            
		FROM 

			produtos, categoria

		WHERE             
			categoria.id_categoria = produtos.categoria_fk order by id_produto desc";

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarDestaque()
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
            produtos.descricao,
            produtos.peso,
            produtos.medida,
            produtos.desconto,
            produtos.cod_barra,
            produtos.destaque,
            categoria.descricao as descricao_categoria,
            produtos.img_01,
            produtos.img_02,
            produtos.img_03,
            produtos.img_04,
            produtos.img_05,
            produtos.img_06            
        FROM 

            produtos, categoria

        WHERE    
            produtos.destaque = 1 AND          
            categoria.id_categoria = produtos.categoria_fk order by id_produto desc
            LIMIT 4";

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listaBebidas()
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
            produtos.descricao,
            produtos.peso,
            produtos.medida,
            produtos.desconto,
            produtos.cod_barra,
            produtos.destaque,
            categoria.descricao as descricao_categoria,
            produtos.img_01,
            produtos.img_02,
            produtos.img_03,
            produtos.img_04,
            produtos.img_05,
            produtos.img_06            
        FROM 

            produtos, categoria

        WHERE             
            categoria.id_categoria = produtos.categoria_fk
            and 
            categoria.id_categoria = 8
             order by id_produto desc
            LIMIT 4";

        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listaAlimentos()
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
            produtos.descricao,
            produtos.peso,
            produtos.medida,
            produtos.desconto,
            produtos.cod_barra,
            produtos.destaque,
            categoria.descricao as descricao_categoria,
            produtos.img_01,
            produtos.img_02,
            produtos.img_03,
            produtos.img_04,
            produtos.img_05,
            produtos.img_06            
        FROM 

            produtos, categoria

        WHERE             
            categoria.id_categoria = produtos.categoria_fk
            and 
            categoria.id_categoria = 1
             order by id_produto desc
            LIMIT 4";

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
            produtos.descricao,
            produtos.peso,
            produtos.medida,
            produtos.desconto,
            produtos.cod_barra,
            produtos.destaque,
			categoria.descricao,
            produtos.img_01,
            produtos.img_02,
            produtos.img_03,
            produtos.img_04,
            produtos.img_05,
            produtos.img_06

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
        (id_produto,nome,valor,categoria_fk,fornecedor,validade,quantidade,marca,descricao,peso,medida,desconto,cod_barra,destaque,img_01,img_02,img_03,img_04,img_05,img_06) 

        VALUES 

        (NULL,:nome,:valor,:categoria,:fornecedor,:validade,:quantidade,:marca,:descricao,:peso,:medida,:desconto,:cod_barra,:destaque,:img_01,:img_02,:img_03,:img_04,:img_05,:img_06) ;");
        
        $this->cadastrarProduto->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":valor", $this->valor, PDO::PARAM_STR);  
        $this->cadastrarProduto->bindValue(":categoria", $this->categoria, PDO::PARAM_STR);  
        $this->cadastrarProduto->bindValue(":fornecedor", $this->fornecedor, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":validade", $this->validade, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":quantidade", $this->quantidade, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":marca", $this->marca, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":peso", $this->peso, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":medida", $this->medida, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":desconto", $this->desconto, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":cod_barra", $this->cod_barra, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":destaque", $this->destaque, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":img_01", $this->img_01, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_02", $this->img_02, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_03", $this->img_03, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_04", $this->img_04, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_05", $this->img_05, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_06", $this->img_06, PDO::PARAM_STR); 
        $this->cadastrarProduto->execute();
    }

    public function atualizar()
    {
    	$conexao = Conexao::conectarBanco();
    	$this->updateProduto = $conexao->prepare("

        UPDATE produtos SET nome = :nome,valor = :valor,categoria_fk = :categoria,fornecedor = :fornecedor,
        validade = :validade,quantidade = :quantidade,marca = :marca,descricao = :descricao,peso = :peso,medida = :medida,desconto = :desconto,cod_barra = :cod_barra,destaque = :destaque,img_01 = :ima_01,img_02 = :img_02,img_03 = :ima_03,img_04 = :img_04,img_05 = :ima_05,img_06 = :img_06

        WHERE id_produto = :id ");
      
    	$this->updateProduto->bindValue(":id", $this->id, PDO::PARAM_STR);    	
        $this->updateProduto->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":valor", $this->valor, PDO::PARAM_STR);  
        $this->updateProduto->bindValue(":categoria", $this->categoria, PDO::PARAM_STR);  
        $this->updateProduto->bindValue(":fornecedor", $this->fornecedor, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":validade", $this->validade, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":quantidade", $this->quantidade, PDO::PARAM_STR); 
        $this->updateProduto->bindValue(":marca", $this->marca, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":descricao", $this->descricao, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":peso", $this->peso, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":medida", $this->medida, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":desconto", $this->desconto, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":cod_barra", $this->cod_barra, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":destaque", $this->destaque, PDO::PARAM_STR);
        $this->cadastrarProduto->bindValue(":img_01", $this->img_01, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_02", $this->img_02, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_03", $this->img_03, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_04", $this->img_04, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_05", $this->img_05, PDO::PARAM_STR); 
        $this->cadastrarProduto->bindValue(":img_06", $this->img_06, PDO::PARAM_STR); 
    	$this->updateProduto->execute();
    }

}

