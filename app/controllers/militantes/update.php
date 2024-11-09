<?php
include('../../config.php');

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
$id_comite = $_POST['id_comite'];
$idade = $_POST['idade'];
$anos = $_POST['anos'];
$id_militante = $_POST['id_militante'];
$image_text = $_POST['image_text'];

if ($_FILES['image']['name'] != null) {
    //echo "Contem Imagen";
    $nomeArquivo = date("Y-m-d-h-i-s");
    $image_text = $nomeArquivo . "__" . $_FILES['image']['name'];
    $location = "../../../admin/militantes/img/" . $image_text;
    move_uploaded_file($_FILES['image']['tmp_name'], $location);
} else {
    //  echo "Não contem Imagen";

}

$sentencia = $pdo->prepare("UPDATE tb_militantes
    SET  
    nome_mi = :nome_mi,             -- Nome Completo do Militante
    nome_pai = :nome_pai,        -- Nome do Pai
    nome_mae = :nome_mae,        -- Nome da Mãe
    genero = :genero,
    bi = :bi,
    d_nascimento = :d_nascimento,
    endereco = :endereco,      -- Endereço ou Residência
    tel = :tel,
    n_academico = :n_academico,
    especialidade = :especialidade, -- Área de Formação
    trabalho = :trabalho,        -- Trabalho
    local_trabalho = :local_trabalho, -- Local de Trabalho
    organizacao = :organizacao,
    d_ingresso = :d_ingresso,
    n_cartao = :n_cartao,
    id_cap = :id_cap,
    id_cas = :id_cas,
    id_funcao = :id_funcao,         -- Função ou Nível
    id_comite = :id_comite,      -- ID do Comitê
    idade = :idade,              -- Idade
    anos = :anos,                -- Anos
    imagen = :imagen,
    d_actualizacao = :d_actualizacao
    WHERE id_militante = :id_militante");


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
$sentencia->bindParam(':id_comite', $id_comite);
$sentencia->bindParam(':idade', $idade);
$sentencia->bindParam(':anos', $anos);
$sentencia->bindParam(':imagen', $image_text);
$sentencia->bindParam(':d_actualizacao', $data_hora);
$sentencia->bindParam(':id_militante', $id_militante);

try {
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensagem'] = "Militante Atualizado";
        $_SESSION['icone'] = "success";
        header('Location:' . APP_URL . "/admin/militantes");
    } else {
        session_start();
        $_SESSION['mensagem'] = "Militante Não Atualizado";
        $_SESSION['icone'] = "error";
        header('Location:' . APP_URL . "/admin/militantes/update.php?id=" . $id_militante);
    }
  
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensagem'] = "Este Militante já existe";
    $_SESSION['icone'] = "error";
    header('Location:' . APP_URL . "/admin/militantes/update.php?id=" . $id_militante);
}