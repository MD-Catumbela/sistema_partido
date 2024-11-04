<?php

$id_nivel_get = $_GET['id'];

$sql_niveis = "SELECT * FROM tb_niveis WHERE id_nivel='$id_nivel_get'";
$query_niveis = $pdo->prepare($sql_niveis);
$query_niveis->execute();
$dados_niveis = $query_niveis->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_niveis as $dado_nivel) {
    $nivel = $dado_nivel['nivel'];
    $d_criacao = $dado_nivel['d_actualizacao'];
}
