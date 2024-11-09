<?php
include('../../config.php');

$comite = strtoupper($_POST['comite']);
$municipio = strtoupper($_POST['municipio']);
$provincia = strtoupper($_POST['provincia']);

$sentencia = $pdo->prepare('INSERT INTO tb_comites (comite, municipio, provincia, d_criacao)
                                VALUES (:comite,:municipio, :provincia ,:d_criacao)');

$sentencia->bindParam(':comite', $comite);
$sentencia->bindParam(':municipio', $municipio);
$sentencia->bindParam(':provincia', $provincia);
$sentencia->bindParam(':d_criacao', $data_hora);
try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Comité Salvo";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/admin/comites");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Comité Não Salvo";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/comites/create.php");
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Este Comité já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/comites/create.php");
}
