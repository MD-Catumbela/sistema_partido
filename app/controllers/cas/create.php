<?php
include('../../config.php');

$cas = $_POST['cas'];
$descricao_cas = $_POST['descricao_cas'];

$sentencia = $pdo->prepare('INSERT INTO tb_cas (cas,descricao_cas, d_criacao)
                                VALUES (:cas,:descricao_cas ,:d_criacao)');

$sentencia->bindParam(':cas', $cas);
$sentencia->bindParam(':descricao_cas', $descricao_cas);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Sector Salvo";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/cas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Sector Não Salvo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cas/create.php");
}