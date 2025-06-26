<?php
class ViewDisks
{

    public static function DisksByGenre($arr)
    {
        if (!is_array($arr) || empty($arr)) {
            echo "<p>Игры в этой категории отсутствуют</p>";
            return;
        }

        self::AllDisks($arr);
    }


    public static function AllDisks($arr)
    {
        if (!is_array($arr) || empty($arr)) {
            echo "<p>Игры отсутствуют</p>";
            return;
        }
        echo '<div class="disk-grid">';
        foreach ($arr as $value) {
            $title = htmlspecialchars($value['title'] ?? 'Без названия');
            $genre = htmlspecialchars($value['genre'] ?? 'Жанр не указан');
            $year = htmlspecialchars($value['release_year'] ?? 'Год неизвестен');
            $price = isset($value['price']) ? number_format((float)$value['price'], 2, '.', '') . '€' : 'Цена не указана';
            $img = htmlspecialchars($value['image_url'] ?? 'img/header.jpg'); // путь по умолчанию
            $id = isset($value['id']) ? (int)$value['id'] : null;

            echo "<div class='disk-card'>";
            echo    "<img src='$img' alt='DVD Game'>";
            echo    "<h2>$title</h2>";
            echo    "<p>$genre | $year</p>";
            echo    "<span class='price'>$price</span>";
            if ($id !== null) {
                echo "<div class='actions'>";
                echo "<a href='disk?id=$id'>" . tr("Rohkem infot", "Подробнее");
                Controller::CommentsCount($id);
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        echo '</div>';
    }

    public static function ReadDisk($n)
    {
        if (!is_array($n)) {
            echo "<p>Игра не найдена</p>";
            return;
        }

        echo "<h2>" . htmlspecialchars($n['title']) . "</h2>";
        echo "<h3>" . htmlspecialchars($n["genre"]) . "</h3>";

        if (!isset($n['image_url']) || empty($n['image_url'])) {
            $imageSrc = 'img/not_found.jpg'; // Укажите путь к изображению по умолчанию
        } else {
            $imageSrc = $n['image_url'];
        }
        echo '<br><img src="' . $imageSrc . '" width=150 /><br>';
        echo "<p>" . nl2br(htmlspecialchars($n['description'])) . "</p>";
    }
}
