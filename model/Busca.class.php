<?php 

include_once 'autoload.php';
	
class Busca extends Conexao
{
	public $busca;

  	public function buscarprodutos($busca)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM produtos WHERE nome LIKE '%$busca%'";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function buscarprodutoscod_barra($busca)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM produtos WHERE cod_barra LIKE '%$busca%'";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
}

