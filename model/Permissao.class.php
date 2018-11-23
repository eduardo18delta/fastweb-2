<?php 

include_once 'autoload.php';

class Permissao extends Conexao{
	
	function listapermissoes()
	{
	    $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM permissao";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
	}

}










