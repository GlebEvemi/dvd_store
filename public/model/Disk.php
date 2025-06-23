<?php

class Disk{


    public static function getAllDisks() {
    $query = "SELECT * FROM disks ORDER BY id DESC";
    $db = new Database();
    $arr = $db->getAll($query);
    return $arr;}


    public static function getDisksByGenreID($id) {
    $query = "SELECT * FROM disks where genres_id=".(string)$id." ORDER BY id DESC";
    $db = new Database();
    $arr = $db->getAll($query);
    return $arr;}

    public static function getDiskByID($id) {
    $query = "SELECT * FROM disks where id=".(string)$id;
    $db = new Database();
    $n = $db->getOne($query);
    return $n;
    }

}