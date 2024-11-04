<?php

$id_cap_get = $_GET['id'];

$sql_cap = "SELECT *, cap.id_cap as id_cap, cas.id_cas as id_cas
            FROM tb_caps as cap 
            INNER JOIN tb_cas as cas ON cap.id_cas = cas.id_cas
            WHERE cap.id_cap = '$id_cap_get'";

$query_cap = $pdo->prepare($sql_cap);
$query_cap->execute();
$dados_cap = $query_cap->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_cap as $dado_cap) {
    $id_cap = $dado_cap['id_cap'];
    $cap = $dado_cap['cap'];
    $id_cas = $dado_cap['id_cas'];
    $cas = $dado_cap['cas'];
    $descricao_cap = $dado_cap['descricao_cap']; 
    $descricao_cas = $dado_cap['descricao_cas'];
}
