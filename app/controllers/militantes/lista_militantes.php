<?php

$sql_militantes = "SELECT *, ca.id_cap as id_cap, cs.id_cas as id_cas, cm.id_comite as  id_comite, fn.funcao as funcao
                FROM tb_militantes as m 
                INNER JOIN tb_cas as cs ON m.id_cas = cs.id_cas
                INNER JOIN tb_caps as ca ON m.id_cap = ca.id_cap
                INNER JOIN tb_comites as cm ON m.id_comite = cm.id_comite
                INNER JOIN tb_funcoes as fn ON m.id_funcao = fn.id_funcao";

$query_militantes = $pdo->prepare($sql_militantes);
$query_militantes->execute();
$dados_militantes = $query_militantes->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_militantes as $dado_militante) {
    $nome_mi = $dado_militante['nome_mi'];
    $nome_pai = $dado_militante['nome_pai'];
    $nome_mae = $dado_militante['nome_mae'];
    $genero = $dado_militante['genero'];
    $bi = $dado_militante['bi'];
    $d_nascimento = $dado_militante['d_nascimento'];
    $endereco = $dado_militante['endereco'];
    $tel = $dado_militante['tel'];
    $n_academico = $dado_militante['n_academico'];
    $especialidade = $dado_militante['especialidade'];
    $trabalho = $dado_militante['trabalho'];
    $local_trabalho = $dado_militante['local_trabalho'];
    $organizacao = $dado_militante['organizacao'];
    $d_ingresso = $dado_militante['d_ingresso'];
    $n_cartao = $dado_militante['n_cartao'];
    $id_cap = $dado_militante['id_cap'];
    $cap = $dado_militante['cap'];
    $id_cas = $dado_militante['id_cas'];
    $cas = $dado_militante['cas'];
    $id_funcao = $dado_militante['id_funcao'];
  
    $id_usuario = $dado_militante['id_usuario'];
   
    $id_comite = $dado_militante['id_comite'];
    $comite = $dado_militante['comite'];
    $idade = $dado_militante['idade'];
    $anos = $dado_militante['anos'];
    $imagen = $dado_militante['imagen']; 
}