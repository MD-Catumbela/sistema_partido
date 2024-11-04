<?php


$sql_usuarios = "SELECT us.id_usuario as id_usuario, us.nome as nome, us.username as username, nivel.nivel as nivel 
                FROM `tb_usuarios` as us INNER JOIN tb_niveis as nivel ON us.id_nivel = nivel.id_nivel;";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$dados_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);





