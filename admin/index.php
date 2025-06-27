<?php
ini_set('display_errors', 0);
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

require("../inc/Database.php");

include_once("../model/Disk.php");
include_once("../model/Genres.php");

include_once("modelAdmin/modelAdmin.php");
include_once("modelAdmin/modelAdminDisks.php");
include_once("modelAdmin/modelAdminGenre.php");

include_once("controllerAdmin/controllerAdmin.php");
include_once("controllerAdmin/controllerAdminDVD.php");

include_once("routeAdmin/routingAdmin.php"); //!!!!!

echo $response;
