<?php

class Controller
{

    public static function StartSite()
    {
        $lang = $_GET['lang'] ?? 'ee';
        $arr = Disk::getAllDisks($lang);
        include_once 'view/start.php';
    }

    public static function AllGenres()
    {
        $lang = $_GET['lang'] ?? 'ee';
        $arr = Genres::getAllGenres($lang);
        include_once 'view/genres.php';
    }

    public static function AllDisks()
    {
        $lang = $_GET['lang'] ?? 'ee';
        $arr = Disk::getAllDisks($lang);
        include_once 'view/disk.php';
        ob_start();
        ViewDisks::AllDisks($arr);
        $content = ob_get_clean();
        include_once 'view/layout.php';
    }

    public static function DiskByGenre($genre_id)
    {
        $lang = $_GET['lang'] ?? 'ee';
        $arr = Disk::getDisksByGenreID($lang, $genre_id);
        include_once 'view/disk.php';
        ob_start();
        ViewDisks::AllDisks($arr);
        $content = ob_get_clean();
        include_once 'view/layout.php';
    }

    public static function DiskByID($id)
    {
        $lang = $_GET['lang'] ?? 'ee';
        $n = Disk::getDiskByID($id, $lang);
        include_once 'view/readdisk.php';
    }

    public static function error404()
    {
        include_once 'view/error404.php';
    }


    public static function InsertComment($comment, $diskId)
    {

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


    public static function Comments($diskid)
    {
        $arr = Comments::getCommentByDiskID($diskid);
        ViewComments::CommentsByDisk($arr);
    }

    public static function CommentsCount($diskid)
    {
        $arr = Comments::getCommentsCountByDiskID($diskid);
        ViewComments::CommentsCount($arr);
    }

    public static function CommentsCountWithAncor($diskid)
    {
        $arr = Comments::getCommentsCountByDiskID($diskid);
        ViewComments::CommentsCountWithAncor($arr);
    }

    public static function registerForm()
    {
        include_once('view/formRegister.php');
    }
    public static function loginForm()
    {
        include_once('view/formLogin.php');
    }
    public static function registerUser()
    {
        $result = Register::registerUser();
        include_once('./index.php');
        header("Location: /");
    }

    public static function loginUser()
    {
        $result = Register::login();
        $_SESSION["logged_in"] = true;
        $_SESSION["user"] = $result;
        header('Location', '/');
        self::StartSite();
    }
}
