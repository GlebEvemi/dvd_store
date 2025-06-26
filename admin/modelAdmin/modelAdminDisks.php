<?php
class modelAdminDisks
{

    public static function getDisksList()
    {
        $db = new Database();
        $arr = $db->getAll("
            SELECT * FROM disks ORDER BY id DESC; 
        ");
        return $arr;
    }


    public static function getDiskAdd()
    {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['title'], $_POST['description'], $_POST['idGenre'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $idGenre = $_POST['idGenre'];
                $price = $_POST['price'];
                $year = $_POST['year'];
                $imageUrl = null;
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true); // создаём папку при необходимости
                    }

                    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                    $uniqueName = uniqid('img_', true) . '.' . $ext;
                    $uploadPath = $uploadDir . $uniqueName;

                    if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath)) {
                        $imageUrl = '/uploads/' . $uniqueName; // путь сохраняем в БД
                    }
                }

                $db = new Database();
                if ($imageUrl !== null) {
                    $sql = "INSERT INTO disks (title, description, image_url, user_id, price, release_year) 
                        VALUES (:title, :text, :image, :userId, :price, :year)";
                    $params = [
                        ':title' => $title,
                        ':text' => $description,
                        ':image' => $imageUrl,
                        ':year' => $year,
                        ':price' => $price,
                        ':userId' => $_SESSION["user"]["id"]
                    ];
                } else {
                    $sql = "INSERT INTO disks (title, description, user_id, price, release_year) 

                        VALUES (:title, :text, :userId, :price, :year)";
                    $params = [
                        ':title' => $title,
                        ':text' => $description,
                        ':year' => $year,
                        ':price' => $price,
                        ':userId' => $_SESSION["user"]["id"]
                    ];
                }

                $test = $db->insertAndGetId($sql, $params);

                if ($test) {
                    if (!is_array($idGenre)) {
                        $db->executeRun("
                        INSERT INTO disk_genres (disk_id, genre_id)
                        VALUES (?, ?)
                    ", [$test, $idGenre]);
                    } else {
                        foreach ($idGenre as $g) {
                            $db->executeRun("
                            INSERT INTO disk_genres (disk_id, genre_id)
                            VALUES (?, ?)
                        ", [$test, $g]);
                        }
                    }
                    $test = true;
                }
            }
        }
        return $test;
    }

    public static function getDiskDetail($id)
    {
        return Disk::getDiskByID($id, 'ee');
    }

    public static function getDiskEdit($id)
    {
        $test = false;
        if (isset($_POST['save'])) {
            if (isset($_POST['title'], $_POST['description'], $_POST['idGenre'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $idGenre = $_POST['idGenre'];
                $price = $_POST['price'];
                $year = $_POST['year'];
                $imageUrl = null;
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/uploads/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0755, true); // создаём папку при необходимости
                    }

                    $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                    $uniqueName = uniqid('img_', true) . '.' . $ext;
                    $uploadPath = $uploadDir . $uniqueName;

                    if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath)) {
                        $imageUrl = '/uploads/' . $uniqueName; // путь сохраняем в БД
                    }
                }
                if ($imageUrl == "") {
                    $sql = "UPDATE disks SET title = '$title', description = '$description', price = $price, release_year=$year WHERE id = $id";
                } else {
                    $sql = "UPDATE disks SET title = '$title', description = '$description', image_url='$imageUrl', price = $price, release_year=$year WHERE id = $id";
                }

                $db = new Database();
                $test = $db->executeRun($sql);
                if (!$test) {
                    return $test;
                }
                $db->executeRun("DELETE FROM disk_genres WHERE disk_id=?", [$id]);
                if (!is_array($idGenre)) {
                    $db->executeRun("
                        INSERT INTO disk_genres (disk_id, genre_id)
                        VALUES (?, ?)
                    ", [$id, $idGenre]);
                } else {
                    foreach ($idGenre as $g) {
                        $db->executeRun("
                            INSERT INTO disk_genres (disk_id, genre_id)
                            VALUES (?, ?)
                        ", [$id, $g]);
                    }
                }
            }
        }
        return $test;
    }

    public static function getDiskDelete($id)
    {
        try {
            $db = new Database();

            $sql = "DELETE FROM disks WHERE id = ?";
            return $db->executeRun($sql, [$id]);
        } catch (Exception $e) {
            error_log("Ошибка удаления: " . $e->getMessage());
            return false;
        }
    }
}
