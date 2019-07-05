<?php

function getRestsFromPage($page)
{
    if($page == 1){
        $subject = file_get_contents('https://restolife.kz/restoran/');
    }
    else{
        $subject = file_get_contents('https://restolife.kz/restoran/page-'.$page.'/?sorting=1');
    }

    $pattern = '/<div class="cat-item">/u';
    $blocks = preg_split($pattern, $subject);
    unset($blocks[0]);
    #print_r($blocks);

    $rest = [];
    foreach ($blocks as $block) {
    $pattern = '/<a href="(\/restoran\/(.+?)\/)">(.+?)<\/a>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);
    
    #print_r($result);
    
    if(!empty($result[0]) && !empty($result[1]) && !empty($result[2])){
    $rest = [
        'name' => $result[2][0],
        'link' => $result[1][0],
    ];}
    #print_r($rest);
    
    $pattern = '/<div class="row"><span class="title">(.+?)<\/span>(\s{0,}?)(.+?)<\/div>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);

    #print_r($result);
    
    
    $paramsMap = [
        'cuisine' => 'Кухня:',
        'worktime' => 'ВРЕМЯ РАБОТЫ:',
        'address' => 'АДРЕС:'
    ];

    foreach ($paramsMap as $key => $value) {
        $index = array_search($value, $result[1]);
        if ($index !== false) {
            $rest[$key] = strip_tags($result[3][$index]);
        }
    }

    $rests[] = $rest;
    }

    return $rests;
}

$fullRestList = [];
$maxPage = 18;

for($i = 2; $i < $maxPage; $i++){
    $fullRestList [] = getRestsFromPage($i);
}

print_r($fullRestList);
?>