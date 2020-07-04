<?php

require_once __DIR__ . '/vendor/autoload.php';

use User\Webbylab\DB\InquiriesDb;

$id = $_GET['id'];

$objDb = new InquiriesDb();
$fimls = $objDb->getMovie($id);

foreach ($fimls as $fiml){
    $fiml = $fiml;
}

?>

<?php require_once "views/header.php" ?>
    <br>
<?php

echo '<div class="container">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="alert alert-success" role="alert">
                            <p>
                            Название фильма: '.$fiml["title"].' 
</p>
                            <p>
                            Год выпуска: '.$fiml["release_year"].'
</p>
                            <p>
                            Формат: '.$fiml["format"].'
</p>
                            <p>
                            Список актеров: '.$fiml["stars"].'
</p>
                        </div>
                    </div>
                </div>
          </div>';

?>

<?php require_once "views/footer.php" ?>