<?php

if ($id == "Home") {
    echo "<div class=\"row bg-title\">"
    . "<div class=\"col-lg-3 col-md-4 col-sm-4 col-xs-12\">"
    . "<h4 class=\"page-title\">" . $id . "</h4> </div>"
    . "<div class=\"col-lg-9 col-sm-8 col-md-8 col-xs-12\">"
    . "<ol class=\"breadcrumb\">"
    . "<li class=\"active\">" . $id . "</li>"
    . "</ol>"
    . "</div>"
    . "</div>";
} else {
    echo "<div class=\"row bg-title\">"
    . "<div class=\"col-lg-3 col-md-4 col-sm-4 col-xs-12\">"
    . "<h4 class=\"page-title\">" . end($id) . "</h4> </div>"
    . "<div class=\"col-lg-9 col-sm-8 col-md-8 col-xs-12\">"
    . "<ol class=\"breadcrumb\">"
    . "<li><a href=\"#\">Home</a></li>";
    $cont = count($id);
    $i = 0;
    if ($cont > 1) {
        foreach ($id as $result) {
            if ($i == $cont - 1) {
                echo "<li class=\"active\">" . $result . "</li>";
            } else {                
            echo "<li><a href=\"#\">" . $result . "</a></li>";
            }
            $i++;
        }
    } else {
        echo "<li class=\"active\">" . reset($id) . "</li>";
    }
    echo "</ol>"
    . "</div>"
    . "</div>";
}
?>