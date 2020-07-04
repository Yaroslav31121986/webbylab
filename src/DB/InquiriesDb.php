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
        $result = $this->mysqli->query("SELECT * FROM films ORDER BY title");
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
        $result = $this->mysqli->query("SELECT format FROM films GROUP BY format");
        if (!$result) {
            die("Fatal Error");
        } else {
            return $this->resultToArray ($result);
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
