<?php 

include_once 'autoload.php';

class Categoria extends Conexao
{
	
	public function listarCategorias()
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM categoria;";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
}