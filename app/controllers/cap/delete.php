<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_cap = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_caps WHERE id_cap=:id_cap");
    $sentencia->bindParam('id_cap', $id_cap);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "CAP Eliminado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/cap");
    } else {
        session_start();
        $_SESSION['mensagem'] = "CAP Não Eliminado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/cap");
    }
}