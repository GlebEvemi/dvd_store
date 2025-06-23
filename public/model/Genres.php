<?php
class Genres{
    public static function getAllGenres() {
    $query = "SELECT * FROM genres";
    $db = new Database();
    $arr = $db->getAll($query);
    return $arr;
}
}


?>