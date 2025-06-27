<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DVD Store</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-gg0yR01XcbMQv3Xipma34MD+dH/lfQ784/j6cY/iJTQUOhCWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>

<body>

    <!-- Навигация -->
    <nav class="navbar">
        <div class="container">
            <ul class="nav-links">
                <details>
                    <summary><?= tr("Žanrid", "Жанры") ?></summary>
                    <li>
                        <ul class="submenu">
                            <?php
                            Controller::AllGenres();
                            ?>
                        </ul>
                    </li>
                </details>
                <li><a href="./" class="nav-link"><?= tr("Stardileht", "Домой") ?></a></li>
                <?php
                if (!$_SESSION['logged_in']) {
                    echo '<li><a href="registerForm" class="nav-link">Register</a></li>';
                    echo '<li><a href="loginForm" class="nav-link">Login</a></li>';
                }
                ?>
                <li style="margin-left: auto;" />
                <?php
                if ($_SESSION["logged_in"]) {
                    echo "<li><a class='nav-link'>" . $_SESSION["user"]["username"] . "</a></li>";
                } else {
                    goto end;
                }
                if ($_SESSION["user"]["status"] === "admin") {
                    echo "<li><a href='/admin' class='nav-link'>" . tr("Admin paanel", "Панель Администратора") . "</a></li>";
                }
                end:
                ?>
            </ul>
        </div>
    </nav>

    <!-- Главный контент -->
    <main class="content">
        <h1 class="page-title"><?= tr("Müügil olevad DVD mängud", "DVD игры на продажу") ?></h1>

        <!-- Пример диска (можешь сгенерировать через PHP) -->
        <?php
        if (isset($content)) {
            echo $content;
        } else {
            echo '<h1>Content is gone!</h1>';
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2025 Gleb Pushin</p>
    </footer>
    <script>
        document.querySelectorAll('.disk-card').forEach((el, i) => {
            el.style.animation = `fadeIn 0.8s ease-in-out ${i * 100}ms forwards`;
        });
    </script>
</body>

</html>
