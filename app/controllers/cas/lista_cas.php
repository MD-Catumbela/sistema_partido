<?php

$sql_cas = " SELECT *, cas.id_comite as id_comite, comite.id_comite as id_comite FROM tb_cas as cas 
        INNER JOIN tb_comites as comite ON cas.id_comite = comite.id_comite";

$query_cas = $pdo->prepare($sql_cas);
$query_cas->execute();
$dados_cas = $query_cas->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_cas as $dado_cas) {
    $cas = $dado_cas['cas'];
    $id_comite = $dado_cas['id_comite'];
    $comite = $dado_cas['comite'];
}