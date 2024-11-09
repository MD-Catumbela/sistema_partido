<?php
include('../../config.php');

$cas = $_POST['cas'];
$id_comite = $_POST['id_comite'];
$id_cas = $_POST['id_cas'];

if (trim($cas) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/cas/create.php?id=" . $id_cas);
}

$sql = 'UPDATE tb_cas
                SET
                    cas = :cas,
                     id_comite = :id_comite,
                    d_actualizacao = :d_actualizacao
                WHERE id_cas = :id_cas';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':cas', $cas);
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_cas', $id_cas);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Sector Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/cas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Sector Não Atualizado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/cas/update.php?id=" . $id_cas);
}
