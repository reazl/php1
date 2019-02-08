<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

// Задание 1.
echo '<br>Задание 1<br>------------<br>';

$i = 0;
while ($i <= 100){
    if($i % 3 == 0)
    echo $i . ' ';
    $i++;
}

// Задание 2.
echo '<br><br>Задание 2<br>------------<br>';

$j = 0;
do {
    if ($j == 0) {
        echo $j . ' - это ноль.<br>';
    }elseif ($j % 2 == 0){
        echo $j . ' - это четное число.<br>';
    }else{
        echo $j . ' - это нечетное число.<br>';
    }
    $j++;
} while ($j <= 10);

// Задание 3.
echo '<br><br>Задание 3<br>------------<br>';

$citys = [
    'Алтайский край' => ['Барнаул', 'Бийск', 'Рубцовск'],
    'Крым' => ['Евпатория', 'Керчь', 'Севастополь', 'Феодосия', 'Ялта'],
    'Ленинградская область' => ['Выборг', 'Кронштадт', 'Петергоф', 'Санкт-Петербург'],
    'Московская область' => ['Балашиха', 'Жуковский', 'Москва', 'Одинцово', 'Химки']
];
foreach ($citys as $key => $value) {
    echo $key.":<br>";
//    foreach ($value as $index => $city){
for ($a = 0; $a < count($value); $a++){
if($value[$a] == end($value)) {
    echo $value[$a];
}else {
    echo $value[$a] . ", ";
}
    }
    echo "<br>";
}

// Задание 4, 5.
echo '<br><br>Задание 4, 5<br>------------<br>';

// Не добавлял заглавные буквы
function getLetters(){
    return ['а'=> 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's',
        'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
        'ъ' => '"', 'ы' => 'y', 'ь' => '\'',  'э' => 'eh', 'ю' => 'yu', 'я' => 'ya', ' ' => '_'];
};

function translit($text)
{
    $letters = getLetters();
    for ($b = 0; $b < mb_strlen($text); $b++) {
        echo $letters[mb_substr($text, $b, 1)];
    }
};
translit('текст');

// Задание 6.
echo '<br><br>Задание 6<br>------------<br>';

$menu = [
    'Главная',
    'Новости' => ['Новости спорта','Новости политики','Новости шоу-бизнеса'],
    'О нас',
    'Контакты'
];
echo "<ul>";
foreach ($menu as $key => $value){

    if(is_array($value)){
        echo "<li><a href='#'><span>$key</span></a><ul>";
        foreach ($value as $subMenu => $val){
            echo "<li><a>$val</a></li>";
        }
        echo "</ul></li>";
        continue;
    }
    echo "<li><a href='#'><span>$value</span></a></li>";
}
echo "</ul>";
