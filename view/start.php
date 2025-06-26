<?php
require 'disk.php';
ob_start();
?>
<h1>TOP games </h1>
<br>
<?php
//ViewDisks::DisksByGenre($arr);
ViewDisks::AllDisks($arr);
$content = ob_get_clean();

include_once 'view/layout.php';
?>
