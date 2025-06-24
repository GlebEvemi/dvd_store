<?php

class Controller{

public static function StartSite() {
    $arr = Disk::getAllDisks();
    include_once 'view/start.php';
}

public static function AllGenres() {
    $arr = Genres::getAllGenres();
    include_once 'view/category.php';
}

public static function AllDisks() {
    $arr = Disk::getAllDisks();
    include_once 'view/allnews.php';
}

public static function DiskByID($id) {
    $n = Disk::getDiskByID($id);
    include_once 'view/readnews.php';
}

public static function error404() {
    include_once 'view/error404.php';
}


public static function InsertComment($comment, $diskId) {

    $diskId = (int)$diskId;
    $comment = trim($comment);
    
    if (empty($comment)) {
        die("Текст комментария не может быть пустым");
    }
    
    if ($diskId <= 0) {
        die("Неверный ID новости");
    }
    
    $db = new Database();
    
    $disk = $db->getOne("SELECT id FROM disks WHERE id = ?", [$diskId]);
    if (!$disk) {
        die("Диск с ID $diskId не найдена");
    }
    
    $result = Comments::insertComment($comment, $diskId);
    
    if ($result) {
        header("Location: disk?id=" . $diskId);
        exit();
    } else {
        die("Ошибка при добавлении комментария");
    }
}


public static function Comments($diskid) {
    $arr = Comments::getCommentByDiskID($diskid);
    ViewComments::CommentsByDisk($arr);
}

public static function CommentsCount($diskid) {
    $arr = Comments::getCommentsCountByDiskID($diskid);
    ViewComments::CommentsCount($arr);
}

public static function CommentsCountWithAncor($diskid) {
    $arr = Comments::getCommentsCountByDiskID($diskid);
    ViewComments::CommentsCountWithAncor($arr);
}

public static function registerForm()
{
    include_once('view/formRegister.php');
}

public static function registerUser()
{
    $result = Register::registerUser();
    include_once('view/answerRegister.php');
}

}
?>