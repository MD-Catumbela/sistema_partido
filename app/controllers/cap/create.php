<?php
include('../../config.php');

$cap = $_POST['cap'];
$id_comite = $_POST['id_comite'];

$sentencia = $pdo->prepare('INSERT INTO tb_caps (cap,id_comite, d_criacao)
                                VALUES (:cap,:id_comite, :d_criacao)');

$sentencia->bindParam(':cap', $cap);
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "CAP Salvo";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/cap");
} else {
    session_start();
    $_SESSION['mensagem'] = "CAP Não Salvo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/cap/create.php");
}