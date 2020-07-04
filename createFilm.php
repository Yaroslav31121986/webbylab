<?php

use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$release_year = filter_var(trim($_POST['release_year']), FILTER_SANITIZE_STRING);
$format = filter_var(trim($_POST['format']), FILTER_SANITIZE_STRING);
$stars = filter_var(trim($_POST['stars']), FILTER_SANITIZE_STRING);


$objDb = new InquiriesDb();
$objDb->setAddMovie($name, $release_year, $format, $stars);
