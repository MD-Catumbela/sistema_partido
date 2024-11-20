<?php
include('../../config.php');
$cas = $_POST['cas'];
$id_comite = $_POST['id_comite'];

$sentencia = $pdo->prepare('INSERT INTO tb_cas (cas,id_comite, d_criacao) VALUES (:cas,:id_comite, :d_criacao)');

$sentencia->bindParam(':cas', $cas);
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Sector Salvo";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/cas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Sector Não Salvo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/cas/create.php");
}