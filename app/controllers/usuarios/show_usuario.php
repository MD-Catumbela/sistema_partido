<?php

$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT us.id_usuario as id_usuario, us.nome as nome, us.username as username, nivel.nivel as nivel
                FROM `tb_usuarios` as us INNER JOIN tb_niveis as nivel ON us.id_nivel = nivel.id_nivel 
                WHERE id_usuario='$id_usuario_get'";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$dados_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_usuarios as $dado_usuario) {
    $nome = $dado_usuario['nome'];
    $username = $dado_usuario['username'];
    $nivel = $dado_usuario['nivel'];
}
