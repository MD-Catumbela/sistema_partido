<?php
include('../../config.php');

session_start();

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

$image = $_POST['image'];

$nomeArquivo = date("Y-m-d-h-i-s");
$filename = $nomeArquivo . "__" . $_FILES['image']['name'];
$location = "../../../militantes/img/" . $filename;

move_uploaded_file($_FILES['image']['tmp_name'], $location);

$sentencia = $pdo->prepare('INSERT INTO tb_militantes 
    (nome, genero, bi, provincia, municipio, comuna , d_nascimento, residencia, tel, n_academico, a_formacao, organizacao, id_cap, id_cas, d_ingresso, n_cartao, funcao, imagen, d_criacao) VALUES 
    (:nome, :genero, :bi, :provincia, :municipio, :comuna, :d_nascimento, :residencia, :tel, :n_academico, :a_formacao, :organizacao, :id_cap, :id_cas, :d_ingresso, :n_cartao, :funcao, :imagen, :d_criacao)');

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
$sentencia->bindParam(':imagen', $filename);
$sentencia->bindParam(':d_criacao', $data_hora);

if ($sentencia->execute()) {
    $_SESSION['mensagem'] = "Militante adicionado com sucesso";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/militantes");
} else {
    $_SESSION['mensagem'] = "Erro ao adicionar Militante";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/militantes/create.php");
}