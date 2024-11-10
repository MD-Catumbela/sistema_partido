<?php
include('../../../app/config.php');

if (isset($_GET['id'])) {
    $id_quota = $_GET['id'];

    $sentencia = $pdo->prepare("DELETE FROM tb_quotas WHERE id_quota=:id_quota");
    $sentencia->bindParam('id_quota', $id_quota);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Quotas Eliminado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/admin/quotas");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Quotas Não Eliminado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/quotas");
    }
}
