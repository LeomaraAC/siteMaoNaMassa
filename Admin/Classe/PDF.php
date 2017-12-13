<?php
require_once '../DB/dbRelatorios.php';
require_once '../Bibliotecas/fpdf/fpdf.php';
class PDF extends FPDF
{
    var $widths;

    function SetWidths($w)
    {
        //Recebe um array com tamanhos das colunas
        $this->widths=$w;
    }
    function Row($data,$fill)
    {
        //Calcular a altura da linha
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=7*$nb;
        //Inserir uma nova página, caso necesário
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $this->SetFillColor(209, 216, 225);
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            if($fill)
                $this->Rect($x,$y,$w,$h,'FD');
            else
                $this->Rect($x,$y,$w,$h);
            $this->MultiCell($w,7,$data[$i],'LR','C');
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
    function Header(){
        $this->Image('../Imagens/logo.png',10,6,30);
        $this->SetFont('helvetica','B',15);
        $this->SetXY($this->w/3, 10);
        $this->Cell(90,25,"Relatório do Estoque de Produtos",0,0,'C'); //largura da célula, altura da célula, conteudo, borda, ... , centralizada
        $this->Ln(30);
        $this->Cell(188, 0, '', 'T', 0, 'C');
        $this->Ln(5);
    }
    function Footer()
    {
        // Margin bottom
        $this->SetY(-15);
        // Fonte do Footer
        $this->SetFont('helvetica','B',10);
        $this->SetTextColor(170, 178, 189);
        //Imprimindo a data e o número da página
        $this->Cell(0,10,date("d/m/Y"),0,0,'L');
        $this->Cell(0,10,$this->PageNo(),0,0,'R');
    }
    function lerDadosProdSaidaEntrada($id){
        $retorno = produtos($id);
        return $retorno;
    }
    function tabela($cabecalho, $dados, $campos, $movimentacao){

        //Cores, tamanho da linha, e font em negrito
        $this->SetFillColor(255, 153, 51);
        $this->SetTextColor(255);
        $this->SetDrawColor(170, 178, 189);
        $this->SetLineWidth(.1);
        $this->SetFont('','B');
        $w=$this->widths;
        //Cabeçalho
        for($i=0;$i<count($cabecalho);$i++){
            $this->Cell($w[$i],7,$cabecalho[$i],1,0,'C',true);
        }
        $this->Ln();//Pula uma linha
        //Resetando a fonte
        $this->SetTextColor(0);
        $this->SetFont('','',13);
        $fill = false; //Quando for true colore a linha
        if ($movimentacao){
            while ($linha = $dados->fetch_assoc())
            {
                $str = '';
                $prod = $this->lerDadosProdSaidaEntrada($linha["idOperacao"]);
                while ($mv = $prod->fetch_assoc()){
                    $str .= $mv["descricao"]." - ".$mv["qtde"]."\n";
                }
               // echo "<script>alert('".$str."')</script>";
                $arrayDados = array($linha["idOperacao"],$linha["dataOperacao"],$str,$linha["tipo"]);
                $this->Row($arrayDados,$fill);
                $fill = !$fill;
            }
        }else{
            while ($linha = $dados->fetch_assoc())
            {
                for($i=0;$i<count($cabecalho);$i++){
                    $arrayDados[$i] = $linha[$campos[$i]];
                }
                $this->Row($arrayDados,$fill);
                $fill = !$fill;
            }
        }
    }
}