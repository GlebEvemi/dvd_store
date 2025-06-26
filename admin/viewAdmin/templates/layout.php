<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="../admin/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/public/css/mystyle.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/public/css/font-awesome.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ajaxupload.3.5.js"></script>
</head>
<body>
    <div class="container">

    <?php if (isset($_SESSION["userId"]) && isset($_SESSION["sessionId"])): ?>

    <div class="header clearfix">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <?php
                echo '<ul class="nav nav-pills pull-right">
                    <li role="button">' . htmlspecialchars($_SESSION["name"], ENT_QUOTES, 'UTF-8') . '
                        <a href="logout" style="display: inline;">Выйти <i class="fa-sign-out"></i></a>
                    </li>
                </ul>';

                if (isset($_SESSION["status"]) && $_SESSION["status"] == "admin") {
                    echo '<h4>
                            <a href="../" target="_blank">WEB SITE</a>
                            &#187; <a href="diskAdmin">Genres</a>
                            &#187; <a href="diskAdmin">Disks</a>
                          </h4>';
                } else {
                    echo '<h4>No grants!</h4>';
                }
                ?>
            </div> <!-- container-fluid -->
        </div> <!-- navbar -->
    </div> <!-- header -->

    <?php endif; ?>

    <div id="content" style="padding-top:20px;">
        <?php echo isset($content) ? $content : ''; ?>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Gleb Pushin <i class="fa-child"></i></p>
    </footer>
</div>
</body>
</html>
