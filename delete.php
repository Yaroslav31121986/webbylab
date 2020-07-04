<?php
use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$id = $_GET['id'];

$objDb = new InquiriesDb();
$formats = $objDb->deleteMovie($id);

header ("Location:/");
