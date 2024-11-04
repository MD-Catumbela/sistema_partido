<?php
include('../../config.php');

$cap = $_POST['cap'];
$id_cas = $_POST['id_cas'];
$descricao_cap = $_POST['descricao_cap'];
$id_cap = $_POST['id_cap'];

if (trim($cap) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cap/create.php?id=" . $id_cap);
}

$sql = 'UPDATE tb_caps
                SET
                    cap = :cap,
                    id_cas=:id_cas,
                    descricao_cap = :descricao_cap,
                    d_actualizacao = :d_actualizacao
                WHERE id_cap = :id_cap';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':cap', $cap);
$sentencia->bindParam(':id_cas', $id_cas);
$sentencia->bindParam(':descricao_cap', $descricao_cap);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_cap', $id_cap);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "CAP Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/cap");
} else {
    session_start();
    $_SESSION['mensagem'] = "CAP Não Atualizado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/cap/update.php?id=" . $id_cap);
}
