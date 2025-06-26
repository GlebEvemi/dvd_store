<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?= tr("Registreerimine", "Регистрация") ?></title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-default">
                    <div class="panel-heading">
                        <h3><?= tr("Registreerimine", "Регистрация") ?></h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="registerAnswer">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label"><?= tr("Nimi", "Имя") ?></label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label"><?= tr("E-Post", "Э-Почта") ?></label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label"><?= tr("Parol", "Пароль") ?></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label"><?= tr("Kinnita parool", "Повторите пароль") ?></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="confirm" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn-primary" name="save">
                                        <?= tr("Registreerimine", "Регистрация") ?>
                                    </button>
                                </div>
                            </div>
                            <p style="padding-top:10px;"><a href="./"><?= tr("Avalehele", "Домой") ?></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
