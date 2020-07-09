<?php

use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$messeage = '';

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$release_year = filter_var(trim($_POST['release_year']), FILTER_SANITIZE_STRING);
$format = filter_var(trim($_POST['format']), FILTER_SANITIZE_STRING);
$stars = filter_var(trim($_POST['stars']), FILTER_SANITIZE_STRING);

//Разбиваем строку на массив (каждого актера в отдельную ячейку)
$check = explode( ',', $stars );

//удаляем пробелы и пустые значения
foreach ($check as $value) {
    if(trim($value)) {
        $array_starts[] = trim($value);
    }
}

//Проверяем что бы не было одинаковых актеров
for ($i = 0; $i < count($array_starts); $i++) {
    $b = 0;
    for ($r = 0; $r < count($array_starts); $r++) {
        if ($array_starts[$i] == $array_starts[$r]) {
            $b++;
        }
        if ($b > 1) {
            echo json_encode("Есть одинаковые актеры");
            exit();
        }
    }
}


//Проверяем есть такой фильм в БД
$objDb = new InquiriesDb();
$result = $objDb->searchСoincidence($name, $release_year, $format, $array_starts);

if ($result[0]['COUNT(id)']) {
    echo json_encode("Такой фильм уже есть");
    exit();
}

//Если прошли все проверки сохраняем фильм
$objDb->setAddMovie($name, $release_year, $format, $stars);

$messeage = "Фильм: ".$name." успешно сохранился";

echo json_encode($messeage);
