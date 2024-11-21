<?php

if (!isset($_SESSION['session_username'])) {
    header('Location: ' . APP_URL . '/login');
    exit();
}

$username_session = $_SESSION['session_username'];
// Consulta para obter o nível do usuário
$sql = "SELECT nivel FROM tb_usuarios AS us 
        INNER JOIN tb_niveis AS nivel ON us.id_nivel = nivel.id_nivel 
        WHERE us.username = :username";

$query = $pdo->prepare($sql);
$query->bindParam(':username', $username_session, PDO::PARAM_STR);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && $usuario['nivel'] !== 'Administrador') {
    $_SESSION['mensagem'] = "Você não tem permissão para acessar esta área.";
    $_SESSION['icone'] = "warning";
    header('Location: ' . APP_URL . "/admin");
    exit();
}