<?php
use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/../vendor/autoload.php';

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

$objDb = new InquiriesDb();
$films = $objDb->searchByName($name);

echo json_encode($films);
