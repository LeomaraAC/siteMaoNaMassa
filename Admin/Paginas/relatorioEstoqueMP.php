<?php
session_start();
require_once '../PHP/seguranca.php';
require_once '../DB/dbRelatorios.php';
require_once '../Classe/PDF.php';
function lerDados(){
    //Leitura dos dados
    $retorno = relatorioEstoqueMP();
    return $retorno;
}
$pdf = new PDF();

// Informações do documento
$pdf->SetCreator('FPDF');
$pdf->SetAuthor(utf8_decode('Mão na Massa'));
$pdf->SetTitle(utf8_decode('Estoque de Matérias Primas'));
$pdf->SetSubject(utf8_decode('Relatório do estoque de matéria prima'));
$pdf->SetKeywords(utf8_decode('Relatórios, Mão na Massa, Estoque, Materiais, Matéria Prima'));

$header = array('ID', 'Descrição', 'Qtde Mínima', 'Qtde Atual');
$data = lerDados();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(27, 77, 42, 42));

$campos = array("idMateriaP","descricao","estoqueMin","qtde");
$pdf->tabela($header,$data,$campos,false);

$pdf->Output('I','Estoque_Materiais.pdf');