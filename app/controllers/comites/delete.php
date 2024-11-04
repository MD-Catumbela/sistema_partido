<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_comite = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_comites WHERE id_comite=:id_comite");
    $sentencia->bindParam('id_comite', $id_comite);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensagem'] = "Comité Eliminado";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/comites");
        } else {
            session_start();
            $_SESSION['mensagem'] = "Comité Não Eliminado";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/comites");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensagem'] = "Comité relacionada a um CAP";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/comites");
    }
}
