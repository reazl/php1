<?php
$h1 = 'Hello World!';
$title = 'Lesson1';
$year = date(Y);
$a = 1;
$b = 4;


$html = <<<EOL
 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>$title</title>
    <style>
        .from-php{
            width: 200px;
            background-color: darkseagreen;
            color: #fff;
            padding: 15px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="from-php"> 
EOL;

echo $html;
echo $h1;
echo "<p>Now is {$year} year!</p>";

echo "Было: a = $a, b = $b<br>";

$a=$a+$b-$b=$a;
echo "Стало: a = $a, b = $b";

echo '</div></body></html>';
?>

