<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$path = explode('/', $host)[$num];

if ($path == '' or $path == 'index.php') {
    if (!$_SESSION["logged_in"]) {
        goto error404;
    }
    if ($_SESSION["user"]["status"] !== "admin") {
        goto error404;
    }

    goto diskAdm;
    
} elseif ($path == 'logout') {
    // Выход
    $response = controllerAdmin::logoutAction();
} elseif ($path == 'logout') {
    $response = controllerAdmin::logoutAction();
}
//---listNews
elseif ($path == 'diskAdmin') {
    diskAdm:
    $response = controllerAdminDisks::DisksList();
} elseif ($path == 'diskAdd') {
    $response = controllerAdminDisks::diskAddForm();
} elseif ($path == 'diskAddResult') {
    $response = controllerAdminDisks::diskAddResult();
} elseif ($path == 'diskEdit' && isset($_GET['id'])) {
    $response = controllerAdminDisks::diskEditForm($_GET['id']);
} elseif ($path == 'diskEditResult' && isset($_GET['id'])) {
    $response = controllerAdminDisks::diskEditResult($_GET['id']);
}


// Удаление новости
elseif ($path == 'diskDel' && isset($_GET['id'])) {
    $response = controllerAdminDisks::diskDeleteForm($_GET['id']);
} elseif ($path == 'diskDelResult' && isset($_GET['id'])) {
    $response = controllerAdminDisks::diskDeleteResult($_GET['id']);
} else {
    error404:
    // Страница не существует
    $response = controllerAdmin::error404();
}

