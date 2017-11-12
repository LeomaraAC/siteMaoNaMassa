<?php
//echo 'asdcld\n';
        //echo $corTema;
    if(ISSET($_COOKIE["tema"])) 
    {
        $corTema = "../CSS/".$_COOKIE["tema"].".css";
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$corTema\">";
    }
    else
    {
        setcookie("tema","TemaLaranja", time()+12000,"/");
       echo '<link rel="stylesheet" type="text/css" href="../CSS/TemaLaranja.css">';
    }
?>
