<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

// Задание 1.
echo 'Задание 1<br>';
$a = rand(-100, 100);
$b = rand(-100, 100);

echo "a = $a <br> b = $b <br>";

if ($a > 0 && $b > 0){
    echo "Разность чисел = ".($a - $b)."<br>";
}elseif ($a < 0 && $b < 0){
    echo "Произведение чисел = ".($a * $b)."<br>";
}elseif ($a != 0 || $b != 0){
    echo "Сумма чисел = ".($a + $b)."<br>";
}
// Задание 2.
echo '<br>Задание 2<br>';
$a = rand(0, 15);

echo '$a = '.$a."<br>";

switch ($a){
    case 0:
        echo $a++." ";
    case 1:
        echo $a++." ";
    case 2:
        echo $a++." ";
    case 3:
        echo $a++." ";
    case 4:
        echo $a++." ";
    case 5:
        echo $a++." ";
    case 6:
        echo $a++." ";
    case 7:
        echo $a++." ";
    case 8:
        echo $a++." ";
    case 9:
        echo $a++." ";
    case 10:
        echo $a++." ";
    case 11:
        echo $a++." ";
    case 12:
        echo $a++." ";
    case 13:
        echo $a++." ";
    case 14:
        echo $a++." ";
    case 15:
        echo $a++."<br>";
        break;
    default:
        echo 'Число выходит за рамки диапазона';
}

// Задание 3.
echo '<br>Задание 3<br>';
$addition = function ($x, $y){
    return $addition = $x + $y;
};
$substraction = function ($x, $y){
    return $substraction = $x - $y;
};
$multiplication = function ($x, $y){
    return $multiplication = $x * $y;
};
$division = function ($x, $y){
    return $division = $x / $y;
};
echo "x = 1, y = 3<br>";
echo "Результат работы функции addition: ".$addition(1, 3)."<br>";
echo "Результат работы функции substraction: ".$substraction(1, 3)."<br>";
echo "Результат работы функции multiplication: ".$multiplication(1, 3)."<br>";
echo "Результат работы функции division: ".$division(1, 3)."<br>";

// Задание 4.
echo '<br>Задание 4<br>';
$math = function ($x, $y, $operation){
    global $addition, $substraction, $multiplication, $division;
    switch ($operation){
        case 'add':
            return $addition($x, $y);
            break;
        case 'substr':
            return $substraction($x, $y);
            break;
        case 'multipl':
            return $multiplication($x, $y);
            break;
        case 'divis':
            return $division($x, $y);
            break;
        default:
            echo 'Такой математической операции не существует или не предусмотрено';

    }
};
echo $math(2, 2, 'substr')."<br>";

echo '<br>Задание 5<br>';
echo '<a href = "template.php">Перейти на шаблон</a><br>';

// Задание 5. Это задание из другого потока. я прошел три урока прежде чем перевелся к вам.
echo '<br>Footer<br>';
$title = 'Задание 5';
$footer = '<div class="footer">Все права не защищены (c). '.date('Y').' год</div>';
$html =  file_get_contents('tmp.html');
$html = str_replace('{title}', $title, $html);
$html = str_replace('{footer}', $footer, $html);
echo $html."<br>";

// Задание 6.
echo '<br>Задание 6<br>';
function power($val, $pow){
   /* if ($pow != 1){
        $val = $val * $val;
        $pow--;
        power($val, $pow);
    }
    return $val;
*/
    if ($pow == 0){
        return 1;
    }
    if ($pow < 0){
        return power(1/$val, -$pow);
    }
    return $val * power($val, ($pow - 1));
}
echo '2 в степени 3 = '.power(2, 3).'<br>';