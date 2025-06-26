<?php
// Заголовок "All" (если нужен)
echo "<li class='submenuunit'><a href='/all'>" . tr("Näita kõike", "Показать всё") . "</a></li>";

// Вывод категорий с сортировкой
usort($arr, function ($a, $b) {
    return strcmp($a['name'], $b['name']); // Сортировка по алфавиту
});

foreach ($arr as $value) {
    echo "<li class='submenuunit'>
        <a href='genres?id=" . (int)$value['id'] . "'>" . htmlspecialchars($value['name']) . "</a>
    </li>";
}
