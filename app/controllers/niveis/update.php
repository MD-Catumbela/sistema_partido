<?php
include('../../config.php');

$nivel = $_POST['nivel'];
$id_nivel = $_POST['id_nivel'];

if (trim($nivel) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/niveis/create.php?id=" . $id_nivel);
}

$sql = 'UPDATE tb_niveis
                SET
                    nivel = :nivel,
                    d_actualizacao = :d_actualizacao
                WHERE id_nivel = :id_nivel';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_nivel', $id_nivel);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Nível Atualizado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/admin/niveis");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Nível Não Atualizado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/niveis/update.php?id=" . $id_nivel);
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Esta Nível já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/niveis/update.php?id=" . $id_nivel);
}
