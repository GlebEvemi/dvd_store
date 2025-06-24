<!DOCTYPE html>
<html>
<head>
    <title> DISKS</title>
    <link rel="stylesheet" type ="text/css" href="./style.css">
    <meta charset="utf-8">
    </head>
<body>
    <nav class="one">
    <ul class="topmenu">
    <li><a href="#">Kategooriad</i class="fa-angle-down"></i></a>
    <ul class="submenu">
    <?php
    Controller::AllGenres();
    ?>
    </ul>
    </li>
    <li><a href="testError">Info</a></li>
    <li><a href="/">Stardileht</a></li>
    <li><a href="registerForm">Register </a></li>
    <div class = "pull-right">
        <li>
            <form action="search">
                <input type="text" name = "otsi">
                <input type = "submit" value="Otsi">    
            </form>
        </li>
    </div>
    </ul>
</nav>

<section>
    <div class = 'divBox'>
    <?php
    if(isset($content)){
    echo $content;
    }
    else{
    echo '<h1>Content is gone!</h1>';
    }
    ?>
    </div>
</section>





<hr>
<p style="display:block; text-align:center;">GLEB PUSHIN</p>
</body>

</html>