<?php

$sql_niveis = "SELECT * FROM tb_niveis";
$query_niveis = $pdo->prepare($sql_niveis);
$query_niveis->execute();
$dados_niveis = $query_niveis->fetchAll(PDO::FETCH_ASSOC);
