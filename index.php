<?php
ini_set('display_errors', 0);
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
include_once 'inc/Database.php';
require 'model/Genres.php';
require 'model/Disk.php';
require 'model/Comments.php';
require 'model/Register.php';

include_once 'utils/tr.php';

include_once 'controller/Controller.php';

include_once 'view/comments.php';

include_once 'route/routing.php';
echo $response;
