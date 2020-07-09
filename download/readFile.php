<?php
use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/../vendor/autoload.php';
require_once "../echo_dump.php";

$objDb = new InquiriesDb();

if(file_exists($_FILES['filename']['tmp_name'])) {
    $lines = file($_FILES['filename']['tmp_name']);

    $i = 0;

    foreach ($lines as $line_num => $line) {

        if ($line != "\n") {
            list($key, $value) = explode(":", $line);
            $file[$i][$key] = $value;
        } else {
            $i++;
        }
    }

    foreach ($file as $array) {

            $objDb->setAddMovie(
                $array['Title'],
                $array['Release Year'],
                trim($array['Format']),
                $array['Stars']
            );
    }
}
header ("Location:/");

