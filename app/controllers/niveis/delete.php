<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_nivel = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_niveis WHERE id_nivel=:id_nivel");
    $sentencia->bindParam('id_nivel', $id_nivel);
    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensagem'] = "Nível Eliminado";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/niveis");
        } else {
            session_start();
            $_SESSION['mensagem'] = "Nível Não Eliminado";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/niveis");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensagem'] = "Nível relacionada a um Usuário";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/niveis");
    }
}
