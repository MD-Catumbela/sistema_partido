<?php
include('../../config.php');

session_start();

$nome = $_POST['nome'];
$username = $_POST['username'];
$password_user = $_POST['password_user'];
$password_repet = $_POST['password_repet'];
$nivel = $_POST['nivel'];

if ($password_user === $password_repet) {
    $password_user = password_hash($password_user, PASSWORD_DEFAULT); // Criptografar senha

    $sentencia = $pdo->prepare('INSERT INTO tb_usuarios 
                                (nome, username,  password_user, id_nivel, d_criacao)
                                VALUES (:nome, :username, :password_user, :id_nivel, :d_criacao)');

    $sentencia->bindParam(':nome', $nome);
    $sentencia->bindParam(':username', $username);
    $sentencia->bindParam(':password_user', $password_user);
    $sentencia->bindParam(':id_nivel', $nivel);
    $sentencia->bindParam(':d_criacao', $data_hora);

    try {
        if ($sentencia->execute()) {
            $_SESSION['mensagem'] = "Usuário Salvo";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/usuarios");
        } else {
            $_SESSION['mensagem'] = "Usuário Não Salvo";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/usuarios/create.php");
        }
    } catch (Exception $exception) {
        $_SESSION['mensagem'] = "Este Usuário já existe";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/usuarios/create.php");
    }
} else {
    $_SESSION['mensagem'] = "As senhas não são iguais";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/usuarios/create.php");
}
