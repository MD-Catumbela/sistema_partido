<?php

$sql_cas = "SELECT * FROM tb_cas";
$query_cas = $pdo->prepare($sql_cas);
$query_cas->execute();
$dados_cas = $query_cas->fetchAll(PDO::FETCH_ASSOC);
