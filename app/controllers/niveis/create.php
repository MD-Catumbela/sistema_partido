<?php
include('../../config.php');

$nivele = $_POST['nivel'];

$sentencia = $pdo->prepare('INSERT INTO tb_niveis (nivel, d_criacao)
                                VALUES (:nivel, :d_criacao)');

$sentencia->bindParam(':nivel', $nivele);
$sentencia->bindParam(':d_criacao', $data_hora);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Nível Salvo";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/niveis");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Nível Não Salvo";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/niveis/create.php");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Está Nível já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/niveis/create.php");
}
