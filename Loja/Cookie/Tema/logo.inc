<?php
//echo 'asdcld\n';
        //echo $corTema;
    if(ISSET($_COOKIE["tema"])) 
    {
        $logoTema = "../Imagens/Logo/MenuLateral/".$_COOKIE["tema"].".png";
        echo "<img src=\"".$logoTema."\" class=\"img-responsive\" id=\"img-sidebar\">";
    }
    else
    {
        setcookie("tema","TemaLaranja", time()+12000,"/");
        echo '<img src="../Imagens/Logo/MenuLateral/TemaLaranja.png" class="img-responsive" id="img-sidebar">';
    }
?>
