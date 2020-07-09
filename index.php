<?php

use User\Webbylab\DB\InquiriesDb;

require_once __DIR__ . '/vendor/autoload.php';

$objDb = new InquiriesDb();

$limit = $numberPage = $currentPage = isset($_GET["p"]) ? (int) $_GET["p"] : 1;
$limit = ($limit - 1) * 3;
$fimls = $objDb->getPages ($limit);
$countPages = $objDb->countPages ();
$allPages = ceil ( $countPages / 3);


?>
<?php require_once "views/header.php" ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="alert alert-primary" role="alert" id="massegeShow">
            </div>
        </div>
    </div>
</div>

<?php

foreach ($fimls as $fiml) {
    echo '<div class="container" id = "block'.$fiml["id"].'">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="alert alert-success" role="alert">
                            '.$fiml["title"].' <a href="show.php?id='.$fiml["id"].'" class="alert-link"> Посмотреть</a>
                            <p>
                            <br>
                            <input class="btn btn-primary" data-id = "'.$fiml["id"].'" type="button" value="Удалить">
</p>
                        </div>
                    </div>
                </div>
          </div>';
}

?>
<div class="containerPage">
    <!-- выводим нумерации страниц -->
    <?

    if ($allPages < 3) {
        $numberPage = 1;
        $maxPage = $allPages;
    } elseif ($numberPage == $allPages) {
        $maxPage = $allPages;
        $numberPage = $numberPage - 2;
    } else {
        $maxPage = $numberPage + 1;
        if ($numberPage > 1) {
            $numberPage = $numberPage - 1;
        }
    }

    for($numberPage; $numberPage <= $maxPage; $numberPage++){ ?>
        <?php if ($numberPage == $currentPage) { ?>
            <span class="currentpage"><a href="?p=<?= $numberPage ?>"><?= $numberPage ?></a></span>
        <?php }else {?>
            <span class="pages"><a href="?p=<?= $numberPage ?>"><?= $numberPage ?></a></span>
        <? } ?>
    <? } ?>

</div>
<script src="js/jquery.js"></script>
<script src="js/delete.js"></script>
<?php require_once "views/footer.php" ?>

<!--<a class="btn btn-primary" id="'.$fiml["id"].'" href="delete.php?id='.$fiml["id"].'" role="button">Удалить</a>-->




