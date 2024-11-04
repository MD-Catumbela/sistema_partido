<?php
include('../../config.php');

$funcao = $_POST['funcao'];
$id_funcao = $_POST['id_funcao'];

if (trim($funcao) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/funcoes/create.php?id=" . $id_funcao);
}

$sql = 'UPDATE tb_funcoes
                SET
                    funcao = :funcao,
                    d_actualizacao = :d_actualizacao
                WHERE id_funcao = :id_funcao';
$sentencia = $pdo->prepare($sql);

$sentencia->bindParam(':funcao', $funcao);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_funcao', $id_funcao);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "funcao Atualizado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/funcoes");
    } else {
        session_start();
        $_SESSION['mensagem'] = "funcao Não Atualizado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/funcoes/update.php?id=" . $id_funcao);
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Esta funcao já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/funcoes/update.php?id=" . $id_funcao);
}
