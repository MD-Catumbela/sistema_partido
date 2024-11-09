<?php
include('../../config.php');

$funcao = $_POST['funcao'];

$sentencia = $pdo->prepare('INSERT INTO tb_funcoes (funcao, d_criacao)
                                VALUES (:funcao, :d_criacao)');

$sentencia->bindParam(':funcao', $funcao);
$sentencia->bindParam(':d_criacao', $data_hora);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Função Salvo";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/admin/funcoes");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Função Não Salvo";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/funcoes/create.php");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Está Função já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/funcoes/create.php");
}
