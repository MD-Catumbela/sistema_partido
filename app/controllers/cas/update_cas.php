<?php

$id_cas_get = $_GET['id'];

$sql_cas = "SELECT * FROM tb_cas WHERE id_cas='$id_cas_get'";
$query_cas = $pdo->prepare($sql_cas);
$query_cas->execute();
$dados_cas = $query_cas->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_cas as $dado_cas) {
    $cas = $dado_cas['cas'];
    $descricao_cas = $dado_cas['descricao_cas'];
    $d_criacao = $dado_cas['d_criacao'];
}
