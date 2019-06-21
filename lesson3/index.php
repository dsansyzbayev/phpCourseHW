<?php

$c = 7;

function calc($a, $b)
{
    $c = 15;
    return $a * $b * $c;
}
# echo $c;
# echo calc(4, 2);
# echo calc(5, 4);

function calcMaterials($a, $b)
{
    $aGips = 120;
    $bGips = 250;
    $aProfile = 300;

    $gipsN = ceil(($a * $b) / ($aGips * $bGips));
    $profileN = ceil((2*($aGips + $bGips) + $aGips) * $gipsN / $aProfile);

    return [
        'gips' => $gipsN*2,
        'profile' => $profileN
    ];
}

print_r(calcMaterials(1200, 310));

function fac($a)
{
    if ($a != 1) {
        return $a * fac($a - 1);
    } else {
        return 1;
    }
}
echo fac(5);