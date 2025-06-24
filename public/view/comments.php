<?php
class ViewComments{
    public static function CommentsForm() {
    echo '<form action="insertComment">
    <input type="hidden" name="id" value="'. $_GET['id'].'">
    }  Comment=<input type="text" name="comment">
    <input type="submit" value="Saada"></form>';
}


public static function CommentsByDisk($arr){
    if($arr!=null) {
    echo '<table id="<table"></th>Kommentaar</th><th>Kumpäev</th>';
    foreach($arr as $value){
    echo '<tr><td>'.$value['text']."</td><td>".$value['date']."</td></tr>";
    }
    echo '</table>';
}}

public static function CommentsCountWithAncor($value) {
    if ($value['count']>0)
    echo '<b><a href="#ctable"/> ('.$value['count'].') </a></b>';
    }

public static function CommentsCount($value) {
    if ($value['count']>0) {
    echo '<b><font color="red">('.$value['count'].') </font></b>';
    }
    }

}
?>