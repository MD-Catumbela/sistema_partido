<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_cas = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_cas WHERE id_cas=:id_cas");
    $sentencia->bindParam('id_cas', $id_cas);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensagem'] = "Sector Eliminado";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/cas");
        } else {
            session_start();
            $_SESSION['mensagem'] = "Sector Não Eliminado";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/cas");
        }
    } catch (Exception $e) {
        session_start();
        $_SESSION['mensagem'] = "Sector relacionada a um CAP";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/cas");
    }
}
