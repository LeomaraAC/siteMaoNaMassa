<?php
session_start();
require_once '../PHP/seguranca.php';
require_once '../DB/dbRelatorios.php';
require_once '../Classe/PDF.php';

function lerDados(){
    //Leitura dos dados
    $retorno = relatorioEstoqueProd();
    return $retorno;
}
$pdf = new PDF();

// Informações do documento
$pdf->SetCreator('FPDF');
$pdf->SetAuthor(utf8_decode('Mão na Massa'));
$pdf->SetTitle('Estoque de Produtos');
$pdf->SetSubject(utf8_decode('Relatório do estoque de produtos'));
$pdf->SetKeywords(utf8_decode('Relatórios, Mão na Massa, Estoque, Produtos'));

$header = array('ID', 'Descrição', 'Categoria', 'Qtde Mínima', 'Qtde Atual');
$data = lerDados();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(12, 65, 45, 30,28));

$campos = array("idProd","descricao","cat","estoqueMin","qtde");
$pdf->tabela($header,$data,$campos,false);
$pdf->Output('I','Estoque_Produtos.pdf');