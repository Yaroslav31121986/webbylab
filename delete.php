<?php
use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$id = $_POST['id'];

$objDb = new InquiriesDb();
$formats = $objDb->deleteMovie($id);
echo json_encode("Фильм успешно удалился");

