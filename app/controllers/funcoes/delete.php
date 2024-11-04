<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_funcao = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_funcoes WHERE id_funcao=:id_funcao");
    $sentencia->bindParam('id_funcao', $id_funcao);
    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensagem'] = "funcao Eliminado";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/funcoes");
        } else {
            session_start();
            $_SESSION['mensagem'] = "funcao Não Eliminado";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/funcoes");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensagem'] = "funcao relacionada a um Usuário";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/funcoes");
    }
}
