<?php
class Genres
{
    public static function getAllGenres($language)
    {
        $query = "SELECT * FROM genres WHERE language=?";
        $db = new Database();
        $arr = $db->getAll($query, [$language]);
        return $arr;
    }
}

