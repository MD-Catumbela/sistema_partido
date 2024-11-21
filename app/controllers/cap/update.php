<?php
include('../../config.php');

$cap = $_POST['cap'];
$id_comite = $_POST['id_comite'];
$id_cap = $_POST['id_cap'];

if (trim($cap) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cap/create.php?id=" . $id_cap);
}

$sql = 'UPDATE tb_caps SET cap = :cap, id_comite=:id_comite, d_actualizacao = :d_actualizacao WHERE id_cap = :id_cap';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':cap', $cap);
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_cap', $id_cap);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "CAP Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/cap");
} else {
    session_start();
    $_SESSION['mensagem'] = "CAP Não Atualizado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/cap/update.php?id=" . $id_cap);
}