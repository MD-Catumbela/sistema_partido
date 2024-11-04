<?php
include('../../config.php');

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$bi = $_POST['bi'];
$provincia = $_POST['provincia'];
$municipio = $_POST['municipio'];
$comuna = $_POST['comuna'];
$d_nascimento = $_POST['d_nascimento'];
$residencia = $_POST['residencia'];
$tel = $_POST['tel'];
$n_academico = $_POST['n_academico'];
$a_formacao = $_POST['a_formacao'];
$organizacao = $_POST['organizacao'];
$id_cap = $_POST['id_cap'];
$id_cas = $_POST['id_cas'];
$d_ingresso = $_POST['d_ingresso'];
$n_cartao = $_POST['n_cartao'];
$funcao = $_POST['funcao'];
$id_militante = $_POST['id_militante'];
$image_text = $_POST['image_text'];

if ($_FILES['image']['name'] != null) {
    //echo "Contem Imagen";
    $nomeArquivo = date("Y-m-d-h-i-s");
    $image_text = $nomeArquivo . "__" . $_FILES['image']['name'];
    $location = "../../../militantes/img/" . $image_text;
    move_uploaded_file($_FILES['image']['tmp_name'], $location);
} else {
    //  echo "Não contem Imagen";

}

$sentencia = $pdo->prepare("UPDATE tb_militantes
        SET  
    nome = :nome,
    genero = :genero,
    bi = :bi,
    provincia = :provincia,
    municipio = :municipio,
    comuna = :comuna,
    d_nascimento = :d_nascimento,
    residencia = :residencia,
    tel = :tel,
    n_academico = :n_academico,
    a_formacao = :a_formacao,
    organizacao = :organizacao,
    id_cap = :id_cap,
    id_cas = :id_cas,
    d_ingresso = :d_ingresso,
    n_cartao = :n_cartao,
    funcao = :funcao,
    imagen = :imagen,
            d_actualizacao = :d_actualizacao
        WHERE id_militante = :id_militante");

$sentencia->bindParam(':nome', $nome);
$sentencia->bindParam(':genero', $genero);
$sentencia->bindParam(':bi', $bi);
$sentencia->bindParam(':provincia', $provincia);
$sentencia->bindParam(':municipio', $municipio);
$sentencia->bindParam(':comuna', $comuna);
$sentencia->bindParam(':d_nascimento', $d_nascimento);
$sentencia->bindParam(':residencia', $residencia);
$sentencia->bindParam(':tel', $tel);
$sentencia->bindParam(':n_academico', $n_academico);
$sentencia->bindParam(':a_formacao', $a_formacao);
$sentencia->bindParam(':organizacao', $organizacao);
$sentencia->bindParam(':id_cap', $id_cap);
$sentencia->bindParam(':id_cas', $id_cas);
$sentencia->bindParam(':d_ingresso', $d_ingresso);
$sentencia->bindParam(':n_cartao', $n_cartao);
$sentencia->bindParam(':funcao', $funcao);
$sentencia->bindParam(':imagen', $image_text);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_militante', $id_militante);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Militante Atualizado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/militantes");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Militante Não Atualizado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/militantes/update.php?id=" . $id_militante);
    }
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Este Militante já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/militantes/update.php?id=" . $id_militante);
}
