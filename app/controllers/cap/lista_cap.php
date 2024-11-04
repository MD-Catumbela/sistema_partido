<?php

$sql_cap = " SELECT *, cap.id_cap as id_cap, cas.id_cas as id_cas
            FROM tb_caps as cap 
            INNER JOIN tb_cas as cas ON cap.id_cas = cas.id_cas";

$query_cap = $pdo->prepare($sql_cap);
$query_cap->execute();
$dados_cap = $query_cap->fetchAll(PDO::FETCH_ASSOC);
