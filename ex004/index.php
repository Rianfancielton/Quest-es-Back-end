<?php

    $c = intval(trim(fgets(STDIN))); 
    $a = intval(trim(fgets(STDIN))); 

    $capacidadeUtil = $c - 1;


    $viagens = ceil($a / $capacidadeUtil); 

    echo $viagens . "\n";
?>
