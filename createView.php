<?php

use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$objDb = new InquiriesDb();
$formats = $objDb->getFormat();

?>

<?php require_once "views/header.php" ?>
<br>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" id="name" placeholder="Название фильма">
                </div>
                <div class="form-group">
                    <label for="release_year">Год выпуска</label>
                    <input type="text" class="form-control" id="release_year" placeholder="Год выпуска">
                </div>
                <div class="form-group">
                    <select name="format" id="format">
                        <?php
                        foreach ($formats as $format){
                            echo '<option value="'.$format["format"].'">'.$format["format"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stars">Список актеров</label>
                    <input type="text" class="form-control" id="stars" placeholder="Список актеров">
                </div>
                <input type="submit" name="done" id="done" value="Сохранить">
                <div id="massegeShow"></div>
        </div>
    </div>
</div>

    <script src="js/jquery.js"></script>
    <script src="js/create.js"></script>

<?php require_once "views/footer.php" ?>