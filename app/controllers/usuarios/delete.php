<?php
include('../../config.php');

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Código para excluir o usuário do banco de dados
    $sql = "DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id_usuario', $id_usuario);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Usuário Eliminado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/usuarios");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Usuário Não Eliminado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/usuarios");
    }
}