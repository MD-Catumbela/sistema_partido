<?php
$id_cas_get = $_GET['id'];

$sql_cas = "SELECT *, cas.id_cas as id_cas, comite.id_comite as id_comite FROM tb_cass as cas 
        INNER JOIN tb_comites as comite ON cas.id_comite = comite.id_comite WHERE cas.id_cas = '$id_cas_get'";

$query_cas = $pdo->prepare($sql_cas);
$query_cas->execute();
$dados_cas = $query_cas->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_cas as $dado_cas) {
    $id_cas = $dado_cas['id_cas'];
    $cas = $dado_cas['cas'];
    $id_comite = $dado_cas['id_comite'];
    $comite = $dado_cas['comite'];
}