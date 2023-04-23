<?php

    $p = 300;
    $m = 500;
    $k = 100;

    //ovo je realni kusur - kad se od upisanog kusura oduzme apsolutna vrednost razlike izmedju dve osobe, realni kusur se podeli sa 2 da se vidi kom je sta ostalo, ili ko sta duguje
    $kusur = ($k - abs($p-$m))/2;
    // ovaj deo je samo razlika koju su dale dve osobe ali organizovana preko funkcije da vrednost ne bi mogla da bude negativna
    $deo_p = max($p-$m, 0);
    $deo_m = max($m-$p, 0);

    echo "<hr>";
    echo "Pera ce dobiti : " . $kusur + $deo_p . "din";
    echo "<hr>";
    echo "Mika ce dobiti : " . $kusur + $deo_m . "din";
    echo "<hr>";

    



?>