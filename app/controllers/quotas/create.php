<?php
include('../../config.php');

$id_militante = $_POST['id_militante'];
$mes_pago = $_POST['mes_pago'];
$valor_pago = $_POST['valor_pago'];
$data_pago = $_POST['data_pago'];

$sentencia = $pdo->prepare('INSERT INTO tb_quotas (mes_pago,valor_pago,data_pago,id_militante, d_criacao)
                                VALUES (:mes_pago,:valor_pago,:data_pago,:id_militante, :d_criacao)');

$sentencia->bindParam(':id_militante', $id_militante);
$sentencia->bindParam(':mes_pago', $mes_pago);
$sentencia->bindParam(':valor_pago', $valor_pago);
$sentencia->bindParam(':data_pago', $data_pago);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Quota Salvo";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/quotas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Quota Não Salvo";
    $_SESSION['icone'] = "error";
    ?><script>window.history.back();</script><?php
    //header('Location:' . APP_URL . "/admin/quotas/create.php");
}