<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

$_GET["lang"] = $_SESSION["lang"];

if ($path == '' or $path == 'index' or $path == 'index.php') {
    $response = Controller::StartSite();
} elseif ($path == 'all') {
    $response = Controller::AllDisks();
} elseif ($path == 'genres' and isset($_GET['id'])) {
    $response = Controller::DiskByGenre($_GET['id']);
} elseif ($path == 'disk' and isset($_GET['id'])) {
    $response = Controller::DiskByID($_GET['id']);
} elseif ($path == 'insertComment' and isset($_GET['comment'], $_GET['id'])) {
    $response = Controller::InsertComment($_GET['comment'], $_GET['id']);
} elseif ($path == 'registerForm') {
    $response = Controller::registerForm();
} elseif ($path == 'registerAnswer') {
    $response = Controller::registerUser();
} elseif ($path == 'loginAnswer') {
    $response = Controller::loginUser();
} elseif ($path == 'loginForm') {
    $response = Controller::loginForm();
}else {
    error404:
    $response = Controller::error404();
}
