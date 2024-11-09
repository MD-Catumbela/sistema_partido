<?php

require_once('../../app/TCPDF/tcpdf.php');
include('../../app/config.php');

// Inclui os dados do militante

include('../../app/controllers/militantes/carregar_militante.php');
include('../../app/controllers/cas/lista_cas.php');
include('../../app/controllers/cap/lista_cap.php');

// Criação do documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configurações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Comite Comunal do Gama');
$pdf->SetTitle('Ficha de Militante');
$pdf->SetSubject('Relatório de Militante');

// Remover cabeçalho e rodapé padrão
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Configurações de margem
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();


// HTML do Relatório
$html = '
<h1 style="text-align: center; color: #333;">Ficha de Militante</h1>

<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr>
    <td style="width: 20%;"><strong>PROVÍNCIA</strong></td><td>' . htmlspecialchars($provincia) . '</td> </tr>
<tr>    <td style="width: 20%;"><strong>MUNICÍPIO</strong></td><td>' . htmlspecialchars($municipio) . '</td> </tr>
 <tr>   <td style="width: 20%;"><strong>COMUNA</strong></td><td>' . htmlspecialchars($comite) . '</td>
   
</tr>
</table>

<br><br>

<h3 style="color: #333;">DADOS PESSOAIS</h3>
<hr>

<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr style="background-color: #f2f2f2;">
    <th style="width: 40%;"><strong>Nome Completo</strong></th>
    <th style="width: 30%;"><strong>Nome do Pai</strong></th>
    <th style="width: 30%;"><strong>Nome da Mãe</strong></th>
</tr>
<tr>
    <td>' . htmlspecialchars($nome_mi) . '</td>
    <td>' . htmlspecialchars($nome_pai) . '</td>
    <td>' . htmlspecialchars($nome_mae) . '</td>
</tr>
</table>

<hr>

<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr style="background-color: #f2f2f2;">
    <th style="width: 20%;"><strong>Gênero</strong></th>
    <th style="width: 30%;"><strong>Nº B.I</strong></th>
     <th style="width: 30%;"><strong>Data Nascimento</strong></th>
    <th style="width: 20%;"><strong>Idade</strong></th>
    
</tr>
<tr>
    <td>' . htmlspecialchars($genero) . '</td>
    <td>' . htmlspecialchars($bi) . '</td>
    <td>' . htmlspecialchars($d_nascimento) . '</td>
      <td>' . htmlspecialchars($idade) . '</td>
</tr>
</table>

<hr>

<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr style="background-color: #f2f2f2;">
    <th style="width: 40%;"><strong>Endereço</strong></th>
    <th style="width: 30%;"><strong>Nível Acadêmico</strong></th>
     <th style="width: 30%;"><strong>Especialidade</strong></th>    
</tr>
<tr>
    <td>' . htmlspecialchars($endereco) . '</td>
    <td>' . htmlspecialchars($n_academico) . '</td>
    <td>' . htmlspecialchars($especialidade) . '</td>
</tr>
</table>

<hr>

<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr style="background-color: #f2f2f2;">
 <th style="width: 45%;"><strong>Trabalho</strong></th>
     <th style="width: 55%;"><strong>Local de Trabalho</strong></th>    
</tr>
<tr>
   <td>' . htmlspecialchars($trabalho) . '</td>
    <td>' . htmlspecialchars($local_trabalho) . '</td>
</tr>
</table>

<br><br>

<h3 style="color: #333;">INFORMAÇÃO DO PARTIDO</h3>
<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<hr>
<tr style="background-color: #f2f2f2;">
     <th style="width: 35%;"><strong>Comité</strong></th>
     <th style="width: 25%;"><strong>Organização</strong></th>
     <th style="width: 20%;"><strong>CAP</strong></th>
     <th style="width: 20%;"><strong>CAS</strong></th>
</tr>
<tr>
    <td>' . htmlspecialchars($comite) . '</td>
    <td>' . htmlspecialchars($organizacao) . '</td>
    <td>' . htmlspecialchars($cap) . '</td>
    <td>' . htmlspecialchars($cas) . '</td>
</tr>


</table>

<hr>
<table border="0" cellpadding="6" style="width: 100%; border-collapse: collapse;">
<tr style="background-color: #f2f2f2;">
     <th style="width: 40%;"><strong>Função</strong></th>
       <th style="width: 25%;"><strong>Nº Cartão</strong></th>
     <th style="width: 25%;"><strong>Data Ingresso</strong></th>
      <th style="width: 10%;"><strong>Anos</strong></th>
</tr>
<tr>
   <td>' . htmlspecialchars($funcao) . '</td>
    <td>' . htmlspecialchars($n_cartao) . '</td>
    <td>' . htmlspecialchars($d_ingresso) . '</td>
     <td>' . htmlspecialchars($anos) . '</td>
</tr>


</table>';

// Adiciona o conteúdo HTML ao PDF
$pdf->writeHTML($html, true, false, true, false, '');


// Saída do PDF para o navegador
$pdf->Output('ficha_militante.pdf', 'I');
