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
        $_SESSION['mensagem'] = "funcao Salvo";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/funcoes");
    } else {
        session_start();
        $_SESSION['mensagem'] = "funcao Não Salvo";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/funcoes/create.php");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Está funcao já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/funcoes/create.php");
}
