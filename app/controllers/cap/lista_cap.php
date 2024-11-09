<?php

$sql_cap = " SELECT *, cap.id_cap as id_cap, comite.id_comite as id_comite
            FROM tb_caps as cap 
            INNER JOIN tb_comites as comite ON cap.id_comite = comite.id_comite";

$query_cap = $pdo->prepare($sql_cap);
$query_cap->execute();
$dados_cap = $query_cap->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_cap as $dado_cap) {
    $cap = $dado_cap['cap'];
    $id_comite = $dado_cap['id_comite'];
    $comite = $dado_cap['comite'];
}

