<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link href="../admin/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admin/public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/public/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/ajaxupload.3.5.js"></script>
</head>

<body>
    <div class="container">

        <?php if ($_SESSION["logged_in"] && isset($_SESSION["user"]["id"])): ?>

            <div class="header clearfix">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <?php
                        if (isset($_SESSION["user"]["status"]) && $_SESSION["user"]["status"] == "admin") {
                            echo "<a class='btn' href='/'>Home</a>";
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
