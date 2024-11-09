<?php
include('../../config.php');
session_start();

$nome_mi = $_POST['nome_mi'];
$nome_pai = $_POST['nome_pai'];
$nome_mae = $_POST['nome_mae'];
$genero = $_POST['genero'];
$bi = $_POST['bi'];
$d_nascimento = $_POST['d_nascimento'];
$endereco = $_POST['endereco'];
$tel = $_POST['tel'];
$n_academico = $_POST['n_academico'];
$especialidade = $_POST['especialidade'];
$trabalho = $_POST['trabalho'];
$local_trabalho = $_POST['local_trabalho'];
$organizacao = $_POST['organizacao'];
$d_ingresso = $_POST['d_ingresso'];
$n_cartao = $_POST['n_cartao'];
$id_cap = $_POST['id_cap'];
$id_cas = $_POST['id_cas'];
$id_funcao = $_POST['id_funcao'];
$id_usuario = $_POST['id_usuario'];
$id_comite = $_POST['id_comite'];
$idade = $_POST['idade'];
$anos = $_POST['anos'];

$data_hora = date("Y-m-d H:i:s"); // Definição da data e hora atual

// Verificação do envio do arquivo
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $nomeArquivo = date("Y-m-d-H-i-s");
    $filename = $nomeArquivo . "__" . basename($_FILES['image']['name']);
    $location = "../../../admin/militantes/img/" . $filename;

    // Mover o arquivo para o local especificado
    move_uploaded_file($_FILES['image']['tmp_name'], $location);
} else {
    $filename = null; // Caso não haja imagem
}

$sentencia = $pdo->prepare('INSERT INTO tb_militantes 
    (nome_mi, nome_pai, nome_mae, genero, bi, d_nascimento, endereco, tel, n_academico, especialidade, trabalho, local_trabalho, organizacao, d_ingresso, n_cartao, id_cap, id_cas, id_funcao, id_usuario, id_comite, idade, anos, imagen, d_criacao, d_actualizacao) 
    VALUES 
    (:nome_mi, :nome_pai, :nome_mae, :genero, :bi, :d_nascimento, :endereco, :tel, :n_academico, :especialidade, :trabalho, :local_trabalho, :organizacao, :d_ingresso, :n_cartao, :id_cap, :id_cas, :id_funcao, :id_usuario, :id_comite, :idade, :anos, :imagen, :d_criacao, :d_actualizacao)');

$sentencia->bindParam(':nome_mi', $nome_mi);
$sentencia->bindParam(':nome_pai', $nome_pai);
$sentencia->bindParam(':nome_mae', $nome_mae);
$sentencia->bindParam(':genero', $genero);
$sentencia->bindParam(':bi', $bi);
$sentencia->bindParam(':d_nascimento', $d_nascimento);
$sentencia->bindParam(':endereco', $endereco);
$sentencia->bindParam(':tel', $tel);
$sentencia->bindParam(':n_academico', $n_academico);
$sentencia->bindParam(':especialidade', $especialidade);
$sentencia->bindParam(':trabalho', $trabalho);
$sentencia->bindParam(':local_trabalho', $local_trabalho);
$sentencia->bindParam(':organizacao', $organizacao);
$sentencia->bindParam(':d_ingresso', $d_ingresso);
$sentencia->bindParam(':n_cartao', $n_cartao);
$sentencia->bindParam(':id_cap', $id_cap);
$sentencia->bindParam(':id_cas', $id_cas);
$sentencia->bindParam(':id_funcao', $id_funcao);
$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':idade', $idade);
$sentencia->bindParam(':anos', $anos);
$sentencia->bindParam(':imagen', $filename);
$sentencia->bindParam(':d_criacao', $data_hora);
$sentencia->bindParam(':d_actualizacao', $data_hora);

if ($sentencia->execute()) {
    $_SESSION['mensagem'] = "Militante adicionado com sucesso";
    $_SESSION['icone'] = "success";
    header('Location:' . APP_URL . "/admin/militantes");
} else {
    $_SESSION['mensagem'] = "Erro ao adicionar Militante";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/militantes/create.php");
}
