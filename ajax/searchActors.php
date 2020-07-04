<?php
use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/../vendor/autoload.php';

$stars = filter_var(trim($_POST['stars']), FILTER_SANITIZE_STRING);

$objDb = new InquiriesDb();
$actors = $objDb->searchByActor($stars);

echo json_encode($actors);