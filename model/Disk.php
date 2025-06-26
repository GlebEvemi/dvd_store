<?php

class Disk
{


    public static function getAllDisks($language)
    {
        $db = new Database();
        $arr = $db->getAll("
            SELECT d.*, g.name AS genre
            FROM disks d
            LEFT JOIN disk_genres dg ON d.id = dg.disk_id
            LEFT JOIN genres g ON dg.genre_id = g.id
            WHERE g.language = ?
            ORDER BY d.id DESC
        ", [$language]);
        return $arr;
    }


    public static function getDisksByGenreID($language, $id)
    {
        $query = "
            SELECT d.*, g.name AS genre
            FROM disks d
            LEFT JOIN disk_genres dg ON d.id = dg.disk_id
            LEFT JOIN genres g ON dg.genre_id = g.id
            WHERE g.language = ? AND g.id = ?
            ORDER BY d.id DESC
        ";
        $db = new Database();
        $arr = $db->getAll($query, [$language, $id]);
        return $arr;
    }

    public static function getDiskByID($id, $language)
    {
        $query = "
            SELECT d.*, g.name AS genre
            FROM disks d
            LEFT JOIN disk_genres dg ON d.id = dg.disk_id
            LEFT JOIN genres g ON dg.genre_id = g.id
            WHERE g.language = ? AND d.id = ? 
            ORDER BY d.id DESC
        ";
        $db = new Database();
        $n = $db->getOne($query, [$language, $id]);
        return $n;
    }
}
