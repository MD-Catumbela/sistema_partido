<?php
include('../../config.php');

$nome = $_POST['nome'];
$username = $_POST['username'];
$password_user = $_POST['password_user'];
$password_repet = $_POST['password_repet'];
$id_usuario = $_POST['id_usuario'];
$nivel = $_POST['nivel'];

if (trim($nome) === "") {
    session_start();
    $_SESSION['mensagem'] = "Preencha o campo";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/usuarios/create.php?id=" . $id_usuario);
} else {
    if ($password_user !== "" && $password_user === $password_repet) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT); // Criptografar palavra passe
        $sql = 'UPDATE tb_usuarios
                SET
                    nome = :nome,
                    username = :username,
                    password_user = :password_user,
                    id_nivel = :id_nivel,
                    d_actualizacao = :d_actualizacao
                WHERE id_usuario = :id_usuario';

        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':password_user', $password_user);
    } else if ($password_user === "") {
        $sql = 'UPDATE tb_usuarios
                SET
                    nome = :nome,
                    username = :username,
                    id_nivel = :id_nivel,
                    d_actualizacao = :d_actualizacao
                WHERE id_usuario = :id_usuario';

        $sentencia = $pdo->prepare($sql);
    } else {
        session_start();
        $_SESSION['mensagem'] = "As senhas não são iguais";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/usuarios/update.php?id=" . $id_usuario);
        exit();
    }

    $sentencia->bindParam(':nome', $nome);
    $sentencia->bindParam(':username', $username);
    $sentencia->bindParam(':id_nivel', $nivel);
    $sentencia->bindParam(':d_actualizacao', $data_hora);
    $sentencia->bindParam(':id_usuario', $id_usuario);

    try {
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensagem'] = "Usuário Atualizado";
            $_SESSION['icone'] = "success";
            header('Location:' . APP_URL . "/admin/usuarios");
        } else {
            session_start();
            $_SESSION['mensagem'] = "Usuário Não Atualizado";
            $_SESSION['icone'] = "error";
            header('Location:' . APP_URL . "/admin/usuarios/update.php?id=" . $id_usuario);
        }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensagem'] = "Este Usuário já existe";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/usuarios/update.php?id=" . $id_usuario);
    }
}
