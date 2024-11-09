<?php
$sql_funcoes = "SELECT * FROM tb_funcoes";
$query_funcoes = $pdo->prepare($sql_funcoes);
$query_funcoes->execute();
$dados_funcoes = $query_funcoes->fetchAll(PDO::FETCH_ASSOC);