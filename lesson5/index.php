<?php

$subject = file_get_contents('https://restoran.kz/restaurant');
$pattern = '/<div class="place-story" data-site-id="[0-9]+">/u';
$blocks = preg_split($pattern, $subject);
unset($blocks[0]);
#print_r($blocks);

$rests = [];
foreach ($blocks as $block) {
    $pattern = '/<a class="place-story__title__link" href="(\/restaurant\/[0-9a-z\-]{1,})">(.{1,}?)<\/a>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);
    
    $rest = [
        'name' => $result[2][0],
        'link' => $result[1][0],
    ];
    
    $pattern = '/<dl class="row place-story__param"><dt class="col-xs-5 col-sm-3 place-story__param__title">(.+?)<\/dt><dd class="col-xs-7 col-sm-9 place-story__param__content">(.+?)<\/dd><\/dl>/u';
    $result = [];
    preg_match_all($pattern, $block, $result);

    $paramsMap = [
        'cuisine' => 'Кухня',
        'price' => 'Средний счёт',
        'worktime' => 'Время работы',
        'address' => 'Адрес'
    ];

    foreach ($paramsMap as $key => $value) {
        $index = array_search($value, $result[1]);
        if ($index !== false) {
            $rest[$key] = strip_tags($result[2][$index]);
        }
    }

    $rests[] = $rest;
}

print_r($rests);