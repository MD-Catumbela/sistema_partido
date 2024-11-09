<?php

session_start();
if (isset($_SESSION['session_username'])) {
    $username_session = $_SESSION['session_username'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nome as nome, us.username as username, nivel.nivel as nivel 
                FROM `tb_usuarios` as us INNER JOIN tb_niveis as nivel ON us.id_nivel = nivel.id_nivel 
                WHERE username = '$username_session'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $nome = $usuario['nome'];
        $nivel = $usuario['nivel'];
        $id_usuario = $usuario['id_usuario'];
    }
} else {
    header('Location:' . APP_URL . '/login');
}