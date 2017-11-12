<?php
$corTema = $_GET["tema"];
setcookie("tema","$corTema", time()+79200000,"/");
header("Location:../../Paginas/index.php");
?>
