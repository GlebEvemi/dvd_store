<?php
class ViewComments
{
    public static function CommentsForm()
    {
        echo '<form action="insertComment">
    <input type="hidden" name="id" value="' . $_GET['id'] . '">
    <input type="text" name="comment">
    <input class="btn" type="submit" value="' . tr("Saada", "Отправить") . '"></form>';
    }


    public static function CommentsByDisk($arr)
    {
        if ($arr != null) {
            echo '<table id="comments">';
            echo '<thead><tr><th>Kommentaar</th><th>' . tr("Kommentaari kuupäev", "Создан в") . '</th></tr></thead>';
            echo '<tbody>';
            foreach ($arr as $value) {
                echo '<tr><td>' . htmlspecialchars($value['comment']) . '</td><td>' . htmlspecialchars($value['created_at']) . '</td></tr>';
            }
            echo '</tbody></table>';
        }
    }



    public static function CommentsCountWithAncor($value)
    {
        if ($value['count'] > 0)
            echo '<b><a href="#ctable"/> (' . $value['count'] . ') </a></b>';
    }

    public static function CommentsCount($value)
    {
        if ($value['count'] > 0) {
            echo '<b> (' . $value['count'] . ')</b>';
        }
    }
}
