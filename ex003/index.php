<?php 
    $altura_carlito = 120;
    $brinquedos = 6;
    $alturas_mínimas = [200, 90, 100, 123, 120, 169];
    $pode_ir = 0;

    for ($i = 0; $i < $brinquedos; $i++) {
        if ($altura_carlito >= $alturas_mínimas[$i]) {
            $pode_ir++;

        }
    }
    echo "Carlito pode ir em $pode_ir brinquedos de acordo com sua altura.";
?>