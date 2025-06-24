<?php
    $host = explode('?', $_SERVER['REQUEST_URI'])[0];
    $num = substr_count($host, '/');
    $path = explode('/', $host)[$num];

if($path == '' OR $path == 'index' OR $path == 'index.php')
{
    $response = Controller::StartSite();
}

elseif($path == 'all')
    {
    $response = Controller::AllDisks();
}

elseif($path == 'genre' and isset($_GET['id']))
{
    $response = Controller::NewsByID($_GET['id']);
}

elseif($path == 'disk' and isset($_GET['id']))
{
    $response = Controller::DiskByID($_GET['id']);
}

elseif($path == 'insertComment' and isset($_GET['comment'], $_GET['id']))
{
    $response = Controller::InsertComment($_GET['comment'], $_GET['id']);
}

elseif ($path == 'registerForm')
{
    $response = Controller::registerForm();
}

elseif ($path == 'registerAnswer')
{
    $response = Controller::registerUser();
}

else
{
    $response = Controller::error404();
}