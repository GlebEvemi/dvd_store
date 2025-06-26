<?php
class controllerAdminDisks
{

    //list News
    public static function DisksList()
    {
        $arr = modelAdminDisks::getDisksList(); 
        include_once 'viewAdmin/disksList.php';
    }

    public static function diskAddForm(): void
    {
        $arr = modelAdminGenre::getGenreList();
        include_once 'viewAdmin/diskAddForm.php';
    }

    public static function diskAddResult(): void
    {
        $result = modelAdminDisks::getDiskAdd();
        include_once 'viewAdmin/diskAddForm.php';
    }

    public static function diskEditForm($id)
    {
        $arr = modelAdminGenre::getGenreList();
        $detail = modelAdminDisks::getDiskDetail($id);
        include_once('viewAdmin/diskEditForm.php');
    }

    public static function diskEditResult($id)
    {
        $test = modelAdminDisks::getDiskEdit($id);
        include_once('viewAdmin/diskEditForm.php');
    }

    public static function diskDeleteForm($id)
    {
        $arr = modelAdminGenre::getGenresByDisk($id);
        $detail = modelAdminDisks::getDiskDetail($id);
        include_once('viewAdmin/diskDeleteForm.php');
    }

    public static function diskDeleteResult($id)
    {
        // Проверяем, была ли отправлена форма
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = modelAdminDisks::getDiskDelete($id);
            include_once('viewAdmin/diskDeleteForm.php');
        } else {
            // Если форма не отправлена, показываем форму подтверждения
            self::diskDeleteForm($id);
        }
    }
} // class

