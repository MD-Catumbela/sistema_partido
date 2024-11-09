<?php
$id_funcao_get = $_GET['id'];

$sql_funcoes = "SELECT * FROM tb_funcoes WHERE id_funcao='$id_funcao_get'";
$query_funcoes = $pdo->prepare($sql_funcoes);
$query_funcoes->execute();
$dados_funcoes = $query_funcoes->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_funcoes as $dado_funcao) {
    $funcao = $dado_funcao['funcao'];
    $d_criacao = $dado_funcao['d_actualizacao'];
}