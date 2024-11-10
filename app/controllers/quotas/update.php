<?php
include('../../config.php');

$id_militante = $_POST['id_militante'];
$mes_pago = $_POST['mes_pago'];
$valor_pago = $_POST['valor_pago'];
$data_pago = $_POST['data_pago'];
$id_quota = $_POST['id_quota'];

$sql = 'UPDATE tb_quotas SET mes_pago = :mes_pago, valor_pago=:valor_pago,data_pago=:data_pago,id_militante=:id_militante, d_actualizacao = :d_actualizacao WHERE id_quota = :id_quota';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':id_militante', $id_militante);
$sentencia->bindParam(':mes_pago', $mes_pago);
$sentencia->bindParam(':valor_pago', $valor_pago);
$sentencia->bindParam(':data_pago', $data_pago);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_quota', $id_quota);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Quota Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/quotas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Quota Não Atualizado";
    $_SESSION['icone'] = "error";
    ?><script>window.history.back();</script><?php
}