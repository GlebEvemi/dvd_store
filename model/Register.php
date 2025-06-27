<?php
class Register
{
    public static function userLogout() {
        session_unset();
        session_destroy();
        header("Location: /");
    }

    public static function registerUser() {
        $controll = array(0 => false, 1 => 'Ошибка регистрации');

        if (isset($_POST['save'])) {
            $errorString = "";
            $name = trim($_POST['name']);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if (!$email) {
                $errorString .= "Неправильный email<br />";
            }

            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            if (!$password || !$confirm || mb_strlen($password) < 6) {
                $errorString .= "Пароль должен быть больше 6 символов<br />";
            }

            if ($password !== $confirm) {
                $errorString .= "Пароли не совпадают<br />";
            }

            if (mb_strlen($errorString) === 0) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $date = date("Y-m-d");

                $sql = "INSERT INTO users (username, email, password, status, created_at)
                        VALUES (?, ?, ?, 'user', ?)";

                $db = new Database();

                try {
                    $item = $db->executeRun($sql, [$name, $email, $passwordHash, $date]);
                    if ($item) {
                        $controll = array(0 => true);
                    } else {
                        $controll = array(0 => false, 1 => 'Ошибка при сохранении данных');
                    }
                } catch (Exception $e) {
                    if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                        $controll = array(0 => false, 1 => 'Пользователь с таким именем или email уже существует');
                    } else {
                        $controll = array(0 => false, 1 => 'Ошибка БД: ' . $e->getMessage());
                    }
                }
            } else {
                $controll = array(0 => false, 1 => $errorString);
            }
        }

        return $controll;
    }

    public static function login()
    {
        if (!isset($_POST["save"])) {
            return;
        }

        $username = $_POST["name"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM users WHERE username=?";

        $db = new Database();

        $user = $db->getOne($sql, [$username]);
        if (!is_array($user) || empty($user)) {
            return;
        }

        if (password_verify($password, $user["password"])) {
            return $user;
        } else {
            self::userLogout();
        }
    }
}
