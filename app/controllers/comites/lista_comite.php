<?php

$sql_comites = "SELECT * FROM tb_comites";
$query_comites = $pdo->prepare($sql_comites);
$query_comites->execute();
$dados_comites = $query_comites->fetchAll(PDO::FETCH_ASSOC);
