<?php

namespace User\Webbylab\DB;

class InquiriesDb
{
    private const HOST = "localhost";
    private const DATABASE = "webbylab";
    private const USERNAME = "Joker";
    private const PASSWORD = "Footboll777";
    private $mysqli;

    //Соединяемся с DB
    public function __construct()
    {
        $this->mysqli = new \mysqli(self::HOST, self::USERNAME,
            self::PASSWORD, self::DATABASE);
        if ($this->mysqli->connect_errno) {
            echo "Не удалось подключиться к MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    //Достаем список фильмов, отсортированных по названию в алфавитном порядке
    public function getMovieList()
    {
        $result = $this->mysqli->query("SELECT * FROM films ORDER BY title COLLATE  utf8_unicode_ci");
        if (!$result) {
            die("Fatal Error");
        } else {
            return $this->resultToArray ($result);
        }
    }

    //Добавляем новый фильм
    public function setAddMovie($title, $release_year, $format, $stars)
    {
        $result = $this->mysqli->query("INSERT INTO films (title,release_year,format,stars) VALUES ('$title', '$release_year', '$format', '$stars')");

        if (!$result) {
            die($this->mysqli->error);
        }
    }

    //Удаляем Фильм
    public function deleteMovie($id)
    {
        $result = $this->mysqli->query("DELETE FROM films WHERE id = '$id'");

        if (!$result) {
            die("Fatal Error");
        }
    }

    //Показать информацию о фильме
    public function getMovie($id)
    {
        $result = $this->mysqli->query("SELECT * FROM films WHERE id = '$id'");
        if (!$result) {
            die("Fatal Error");
        } else {
            return $this->resultToArray ($result);
        }
    }

    //Найти фильм по названию
    public function searchByName($name)
    {
        $result = $this->mysqli->query("SELECT * FROM films WHERE title LIKE '%$name%'");
        if (!$result) {
            die("Fatal Error");
        } else {
            return $this->resultToArray ($result);
        }
    }

    //Выбираем форматы фильмов
    public function getFormat()
    {
        $result = $this->mysqli->query("SHOW COLUMNS FROM films WHERE field = 'format' ");
        if (!$result) {
            die($this->mysqli->connect_errno);
        } else {
            $formats_arr = $this->resultToArray ($result);

            foreach ($formats_arr as $format_arr){
                $format_reg = $format_arr;
            }

            preg_match_all("(\'[A-Za-z-]{1,}\')", $format_reg['Type'], $matches, PREG_UNMATCHED_AS_NULL);

            foreach ($matches as $formats){
                foreach ($formats as $value){
                    $result_format[] = trim($value, '\'');
                }
            }

            return $result_format;
        }
    }

    //Найти фильм по имени актера
    public function searchByActor($name)
    {
        $result = $this->mysqli->query("SELECT * FROM films WHERE stars LIKE '%$name%'");
        if (!$result) {
            die("Fatal Error");
        } else {
            return $this->resultToArray ($result);
        }
    }

    //Проверяем существует ли такой фильм
    public function searchСoincidence($title, $release_year, $format, array $stars)
    {
        $sql_like = '';

        for ($i = 0; $i < count($stars); $i++) {
            if ($i > 0) {
                $sql_like .= " AND stars LIKE '%$stars[$i]%'";
            } else {
                $sql_like .= " stars LIKE '%$stars[$i]%'";
            }
        }

        $result = $this->mysqli->query("SELECT COUNT(id) FROM `films` WHERE title LIKE '%$title%' AND release_year LIKE '%$release_year%' AND format LIKE '%$format%' AND ($sql_like)");


        if (!$result) {
            die($this->mysqli->error);
        } else {
            while (($row = $result->fetch_assoc()) != false){
                $array[] = $row;
            }
            return $array;
        }

    }

    //Подсчитываем количество фильмов
    public function countPages()
    {
        $result =  $this->mysqli->query("SELECT COUNT(id) FROM films");

        if (!$result) {
            die("Fatal Error");
        }
        else {
            $countPages = $result->fetch_assoc();
            $count = $countPages["COUNT(id)"];
            return $count;
        }
    }

    //Достаем нужное количество фильмов
    public function getPages($limit)
    {
        $max = 3;
        $result = $this->mysqli->query("SELECT * FROM films ORDER BY title COLLATE  utf8_unicode_ci LIMIT $limit,$max");

        if (!$result) {
            die($this->mysqli->error);
        } else {
            return $this->resultToArray ($result);
        }
    }

    //Помещяем результат в массив
    public function resultToArray($result)
    {
        $array = [];
        while (($row = $result->fetch_assoc()) != false) {
            $array[] = $row;
        }
        return $array;
    }

    //Закрываем соединение с DB
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
