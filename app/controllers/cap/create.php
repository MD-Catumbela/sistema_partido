<?php
include('../../config.php');

$cap = $_POST['cap'];
$id_cas = $_POST['id_cas'];
$descricao_cap = $_POST['descricao_cap'];

$sentencia = $pdo->prepare('INSERT INTO tb_caps (cap,id_cas,descricao_cap, d_criacao)
                                VALUES (:cap,:id_cas,:descricao_cap ,:d_criacao)');

$sentencia->bindParam(':cap', $cap);
$sentencia->bindParam(':id_cas', $id_cas);
$sentencia->bindParam(':descricao_cap', $descricao_cap);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "CAP Salvo";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/cap");
} else {
    session_start();
    $_SESSION['mensagem'] = "CAP Não Salvo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cap/create.php");
}