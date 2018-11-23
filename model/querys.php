<?php 

$query01 = "

SELECT 
    users.id,
    users.nome, 
    users.email,
    cargo.descricao as cargo,
    permissao.descricao as permissao
FROM  
    users,cargo,permissao
WHERE
    users.id = cargo.id_cargo AND
    users.id = permissao.id_permissao AND
    id = :id"
?>