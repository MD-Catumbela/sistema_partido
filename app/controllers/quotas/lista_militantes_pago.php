<?php

$sql_quotas = " SELECT *, quota.id_quota as id_quota, militante.id_militante as id_militante
            FROM tb_quotas as quota 
            INNER JOIN tb_militantes as militante ON quota.id_militante = militante.id_militante
            WHERE quota.id_militante = '$id_militante' ";

$query_quotas = $pdo->prepare($sql_quotas);
$query_quotas->execute();
$dados_quotas = $query_quotas->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_quotas as $dado_quota) {
    $mes_pago = $dado_quota['mes_pago'];
    $valor_pago = $dado_quota['valor_pago'];
    $data_pago = $dado_quota['data_pago'];
    $id_militante = $dado_quota['id_militante'];
    $nome_mi = $dado_quota['nome_mi'];
}