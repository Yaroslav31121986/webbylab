<?php require_once "views/header.php" ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form>
                    <div class="form-group">
                        <label for="stars">Живой поиск</label>
                        <input type="text" class="form-control" id="stars" aria-describedby="emailHelp" placeholder="Введите название Актера">
                    </div>
                    </br>
                    </br>
                    <div id="massegeShow"></div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/searchByActors.js"></script>
<?php require_once "views/footer.php" ?>