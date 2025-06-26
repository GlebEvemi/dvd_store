<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= tr("Autentimine", "Авторизация") ?></title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-default">
                    <div class="panel-heading">
                        <h3>Login</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="loginAnswer">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn-primary" name="save">
                                        Login
                                    </button>
                                </div>
                            </div>
                            <p style="padding-top:10px;"><a href="./">Web site</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
