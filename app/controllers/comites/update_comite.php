<?php
$id_comite_get = $_GET['id'];

$sql_comites = "SELECT * FROM tb_comites WHERE id_comite='$id_comite_get'";
$query_comites = $pdo->prepare($sql_comites);
$query_comites->execute();
$dados_comites = $query_comites->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_comites as $dado_comite) {
    $comite = $dado_comite['comite'];
    $municipio = $dado_comite['municipio'];
    $provincia = $dado_comite['provincia'];
    $d_criacao = $dado_comite['d_criacao'];
}