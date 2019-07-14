<?php

$wordsArr = explode(" ", preg_replace("#[\s]+#", " ", file_get_contents('text.txt')));

$arrCat = [];
$file_handle = fopen('synonyms-base.csv', 'r');

while (!feof($file_handle) ) {
    $arrCat [] = fgetcsv($file_handle);
}
fclose($file_handle);
print_r($wordsArr);


function synReplace($arrCat, $wordsArr)
{
    $index = count($arrCat);
    
        foreach($arrCat as $key => $value){
            if ($value) {
                for($i = 0; $i < count($value); $i++){
                    $key = array_search($value[$i], $wordsArr);
                    if ($key !== false) {
                        $wordsArr[$key] = $value[rand(0,count($value)-1)];
                    }
                }
            }
        }
        return $wordsArr;
}
    
$arrNew = [];
    for($i = 0; $i < 10; $i++){
    $arrNew [] = synReplace($arrCat, $wordsArr);
}

print_r($arrNew);