<?php
class controllerAdmin
{
    public static function logoutAction()
    {
        modelAdmin::userLogout();
        include_once('viewAdmin/formLogin.php');
    }
    public static function error404()
    {
        include_once('viewAdmin/error404.php');
    }
}

