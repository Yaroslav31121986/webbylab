<?php

use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$objDb = new InquiriesDb();
$fimls = $objDb->getMovieList();

?>
<?php require_once "views/header.php" ?>
<br>

<?php

foreach ($fimls as $fiml) {
    echo '<div class="container">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="alert alert-success" role="alert">
                            '.$fiml["title"].' <a href="show.php?id='.$fiml["id"].'" class="alert-link"> Посмотреть</a>
                            <p>
                            <br>
                            <a class="btn btn-primary" href="delete.php?id='.$fiml["id"].'" role="button">Удалить</a>
</p>
                        </div>
                    </div>
                </div>
          </div>';
}

?>

<?php require_once "views/footer.php" ?>




