<?php

require_once('../app/TCPDF/tcpdf.php');
include('../app/config.php');

// Inclui os dados do militante
include('../app/controllers/armazens/carregar_produto.php');
include('../app/controllers/cas/lista_cas.php');
include('../app/controllers/cap/lista_cap.php');

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
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();




// HTML do Relatório
$html = '
<h2 style="text-align: center; color: #333;">Ficha de Militante</h2>
<hr>

<br><br>
<h3>DADOS PESSOAIS</h3>
<table border="0" cellpadding="6" style="width: 100%;">



<tr>
    <td style="width: 35%;"><strong>Nome Completo:</strong><br>' . htmlspecialchars($nome) . '</td>
    <td style="width: 20%;"><strong>Gênero:</strong><br>' . htmlspecialchars($genero) . '</td>
    <td style="width: 25%;"><strong>Nº do B.I:</strong><br>' . htmlspecialchars($bi) . '</td>
    <td style="width: 20%;"><strong>Província:</strong><br>' . htmlspecialchars($provincia) . '</td>
</tr>
    <tr>
        <td style="width: 20%;"><strong>Município:</strong><br>' . htmlspecialchars($municipio) . '</td>
         <td style="width: 20%;"><strong>Comuna:</strong><br>' . htmlspecialchars($comuna) . '</td>
          <td style="width: 40%;"><strong>Data de Nascimento:</strong><br>' . htmlspecialchars($d_nascimento) . '</td>
           <td style="width: 20%;"><strong>Telefone:</strong><br>' . htmlspecialchars($tel) . '</td>
    </tr>
   <tr>
        <td style="width: 50%;"><strong>Residência:</strong><br>' . htmlspecialchars($residencia) . '</td>
         <td style="width: 50%;"><strong>Nível Acadêmico:</strong><br>' . htmlspecialchars($n_academico) . '</td>
            
    </tr>   
   <tr>
          <td style="width: 50%;"><strong>Área de Formação:</strong><br>' . htmlspecialchars($a_formacao) . '</td>  
    </tr>
</table>




<br><br>
<h3>INFORMAÇÃO DO PARTIDO</h3>
<table border="0" cellpadding="6" style="width: 100%;">
 <tr>
 <td style="width: 15%;"><strong>Nº Cartão:</strong><br>' . htmlspecialchars($n_cartao) . '</td>  
        <td style="width: 20%;"><strong>Organização:</strong><br>' . htmlspecialchars($organizacao) . '</td>
         <td style="width: 20%;"><strong>CAP:</strong><br>' . htmlspecialchars($cap) . '</td>
           <td style="width: 20%;"><strong>CAS:</strong><br>' . htmlspecialchars($cas) . '</td>
             <td style="width: 25%;"><strong>Data de Ingresso:</strong><br>' . htmlspecialchars($d_ingresso) . '</td>         
    </tr>
    <tr>
        <td style="width: 50%;"><strong>Função:</strong>
        <br>' . htmlspecialchars($funcao) . '</td>
    </tr>  
</table>';


// Adiciona o conteúdo HTML ao PDF
$pdf->writeHTML($html, true, false, true, false, '');

// IMAGEN 
if (!empty($imagen)) {
    $img_path = APP_URL . "/armazens/img/" . $imagen;
    $pdf->Image($img_path, 150, 20, 30, 30, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
}

$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false,
    'module_width' => 1, // largura do módulo
    'module_height' => 1 // altura do módulo
);

// Saída do PDF para o navegador
$pdf->Output('ficha_militante.pdf', 'I');
