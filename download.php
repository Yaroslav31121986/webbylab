<?php

require_once __DIR__ . '/vendor/autoload.php';

?>

<?php require_once "views/header.php" ?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <form enctype="multipart/form-data" method="post" action="download/readFile.php" >
                <p><input type="file" name="filename">
                    <input type="submit" value="Отправить"></p>
            </form>
        </div>
    </div>
</div>

<?php require_once "views/footer.php" ?>
