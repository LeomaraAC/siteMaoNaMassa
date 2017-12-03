<?php
require_once '../DB/dbRelatorios.php';
require_once '../Bibliotecas/fpdf/fpdf.php';
class PDF extends FPDF{

    function lerDados(){
        //Leitura dos dados
        $retorno = relatorioEstoqueProd();
        return $retorno;
    }
    function Header(){
        // Logo
        $this->Image('../Imagens/logo.png',10,6,30);
        // Fonte do Cabeçalho
        $this->SetFont('Arial','B',15);
        // Cria uma linha
        $this->Cell(60);
        // Titulo
        $this->Cell(90,25,"Relatório do Estoque de Produtos",0,0,'C'); //largura da célula, altura da célula, conteudo, borda, ... , centralizada
        // Pula uma linha
        $this->Ln(35);
    }
    function Footer()
    {
        // Margin bottom
        $this->SetY(-15);
        // Fonte do Footer
        $this->SetFont('Arial','B',10);
        $this->SetTextColor(170, 178, 189);
        // Número da pagina
        $this->Cell(0,10,date("d/m/Y"),0,0,'L');
        $this->Cell(0,10,$this->PageNo(),0,0,'R');
    }
    function tabela($cabecalho, $dados){
        //Cria a tabela
        // Colors, line width and bold font
        $this->SetFillColor(255, 153, 51);
        $this->SetTextColor(255);
        $this->SetDrawColor(170, 178, 189);
        $this->SetLineWidth(.1);
        $this->SetFont('','B');
        // Header
        $w = array(15, 65, 50, 30,30);//Tamanhos das colunas
        for($i=0;$i<count($cabecalho);$i++)
            $this->Cell($w[$i],7,$cabecalho[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(209, 216, 225);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        while ($linha = $dados->fetch_assoc())
        {
           /* if ($linha["qtde"] <= $linha["estoqueMin"]){
                $this->SetFillColor(245, 35, 56);
            }
            else{
                $this->SetFillColor(209, 216, 225);
            }*/

            $this->Cell($w[0],6,$linha["idProd"],'LR',0,'C',$fill);
            $this->Cell($w[1],6,$linha["descricao"],'LR',0,'C',$fill);
            $this->Cell($w[2],6,$linha["cat"],'LR',0,'C',$fill);
            $this->Cell($w[3],6,$linha["estoqueMin"],'LR',0,'C',$fill);
            $this->Cell($w[4],6,$linha["qtde"],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}
$pdf = new PDF();
$header = array('ID', 'Descrição', 'Categoria', 'Qtde Minima', 'Qtde Atual');
$data = $pdf->lerDados();
$pdf->PageNo();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->tabela($header,$data);
$pdf->Output('I', 'Estoque_Produtos.pdf');