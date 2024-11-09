<?php
include('../../../app/config.php');

$id_militante = $_POST['id_militante'];

$sentencia = $pdo->prepare("DELETE FROM tb_militantes WHERE id_militante=:id_militante");
$sentencia->bindParam('id_militante', $id_militante);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Militante Eliminado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/militantes");
} else {
    session_start();
    $_SESSION['mensagem'] = "Militante Não Eliminado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/militantes/delete.php?id=".$id_militante);
}