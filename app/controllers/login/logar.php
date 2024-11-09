<?php

include('../../config.php');

$username = $_POST['username'];
$password_user = $_POST['password_user'];

$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE username ='$username'";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $username_tabela = $usuario['username'];
    $nome = $usuario['nome'];
    $password_user_tabela = $usuario['password_user'];
}

if (($contador > 0) && (password_verify($password_user, $password_user_tabela))) {

    session_start();
    $_SESSION['session_username'] = $username;
    $_SESSION['mensagem'] = "Bem-vindo! " . $nome;
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . '/admin/index.php');
} else {
    echo "Dados incorectos";
    session_start();
    $_SESSION['mensagem'] = "Dados Incorectos";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . '/login');
}
