<?php 

include_once 'autoload.php';

class Menu extends Conexao
{

	public function listarusuarios()
    	{       
        	$conexao = Conexao::conectarBanco();
        	$query = "SELECT * FROM users";
        	$resultado = $conexao->query($query);        	
        	$numerousers = $resultado->rowCount();
        	return $numerousers;
    }

    public function listarclientes()
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM clientes";
            $resultado = $conexao->query($query);           
            $numeroclientes = $resultado->rowCount();
            return $numeroclientes;
    }

    public function listarcargos()
    	{       
        	$conexao = Conexao::conectarBanco();
        	$query = "SELECT * FROM cargo";
        	$resultado = $conexao->query($query);        	
        	$numerocargos = $resultado->rowCount();
        	return $numerocargos;
    }

        public function listarprodutos()
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM produtos";
            $resultado = $conexao->query($query);           
            $numeroprodutos = $resultado->rowCount();
            return $numeroprodutos;
    }

}

