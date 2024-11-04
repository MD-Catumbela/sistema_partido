<?php

$sql_militantes = "SELECT *, ca.id_cap as id_cap, cs.id_cas as id_cas
                FROM tb_militantes as m INNER JOIN tb_cas as cs ON m.id_cas = cs.id_cas
                INNER JOIN tb_caps as ca ON m.id_cap = ca.id_cap";

$query_militantes = $pdo->prepare($sql_militantes);
$query_militantes->execute();
$dados_militantes = $query_militantes->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_militantes as $dado_militante) {
    $nome = $dado_militante['nome'];
    $genero = $dado_militante['genero'];
    $bi = $dado_militante['bi'];
    $d_nascimento = $dado_militante['d_nascimento'];
    $residencia = $dado_militante['endereco'];
    $tel = $dado_militante['tel'];
    $n_academico = $dado_militante['f_academico'];
    $organizacao = $dado_militante['organizacao'];
    $id_cap = $dado_militante['id_cap'];
    $cap = $dado_militante['cap'];
    $id_cas = $dado_militante['id_cas'];
    $cas = $dado_militante['cas'];
    $d_ingresso = $dado_militante['d_ingresso'];
    $n_cartao = $dado_militante['n_cartao'];
    $funcao = $dado_militante['id_funcao'];
    $imagen = $dado_militante['imagen'];
}
