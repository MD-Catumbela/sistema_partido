<?php
include('../../config.php');

$cas = $_POST['cas'];
$descricao_cas = $_POST['descricao_cas'];
$id_cas = $_POST['id_cas'];

if (trim($cas) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cas/create.php?id=" . $id_cas);
}

$sql = 'UPDATE tb_cas
                SET
                    cas = :cas,
                    descricao_cas = :descricao_cas,
                    d_actualizacao = :d_actualizacao
                WHERE id_cas = :id_cas';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':cas', $cas);
$sentencia->bindParam(':descricao_cas', $descricao_cas);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_cas', $id_cas);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Sector Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/cas");
} else {
    session_start();
    $_SESSION['mensagem'] = "Sector Não Atualizado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cas/update.php?id=" . $id_cas);
}
