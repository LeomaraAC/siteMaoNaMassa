<?php
session_start();
require_once '../PHP/seguranca.php';
require_once '../DB/dbRelatorios.php';
require_once '../Classe/PDF.php';

function lerDadosSaidaEntrada(){
    //Leitura dos dados do Banco de Dados
    $retorno = relatorioEntradaSaida();
    return $retorno;
}

$pdf=new PDF();
/** Informações do documento, como: Autor, Titulo, Subtitulo, Palavras chaves */
$pdf->SetCreator('FPDF');
$pdf->SetAuthor(utf8_decode('Mão na Massa'));
$pdf->SetTitle(utf8_decode('Movimentação de Produto'));
$pdf->SetSubject(utf8_decode('Relatório da movimentação dos produtos'));
$pdf->SetKeywords(utf8_decode('Relatórios, Mão na Massa, Movimentação, Produtos, Revenda, Devolução'));

$header = array('ID', 'Data',"Produto/Qtde", 'Tipo'); /** Array contendo o cabeçalho da Tabela */
$data = lerDadosSaidaEntrada(); /** Lendo os dados do Banco*/
$pdf->AddPage(); /** Adicionando uma página */
$pdf->SetFont('Arial','',14); /** Definido a fonte */
$pdf->SetWidths(array(30, 50,56, 52)); /** Definindo a qtde e os tamanhos das colunas da tabela */

//$campos = array("","",""); /** Array contendo quais os campos retornados do Banco de Dados*/
$pdf->tabela($header,$data,'',true); /** Chamando o método para a criação das tabelas*/
$pdf->Output('I',"Movimetacao_Produtos.pdf");






