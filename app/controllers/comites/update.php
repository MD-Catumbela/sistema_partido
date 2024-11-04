<?php
include('../../config.php');

$comite = strtoupper($_POST['comite']);
$municipio = strtoupper($_POST['municipio']);
$provincia = strtoupper($_POST['provincia']);
$id_comite = $_POST['id_comite'];

if (trim($comite) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/comites/create.php?id=" . $id_comite);
}

$sql = 'UPDATE tb_comites
                SET
                    comite = :comite,
                    municipio = :municipio,
                      provincia = :provincia,
                    d_actualizacao = :d_actualizacao
                WHERE id_comite = :id_comite';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':comite', $comite);
$sentencia->bindParam(':municipio', $municipio);
$sentencia->bindParam(':provincia', $provincia);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_comite', $id_comite);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensagem'] = "Comité Atualizado";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/comites");
} else {
    session_start();
    $_SESSION['mensagem'] = "Comité Não Atualizado";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/comites/update.php?id=" . $id_comite);
}
