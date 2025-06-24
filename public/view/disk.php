<?php
class ViewDisks {

    public static function DisksByCategory($arr) {
        if (!is_array($arr) || empty($arr)) {
            echo "<p>Игры в этой категории отсутствуют</p>";
            return;
        }
        
        foreach($arr as $value){
            if (!isset($value['picture']) || empty($value['picture'])) {
                $imageSrc = 'path/to/default/image.jpg';
            }else{
                $imageSrc = 'data:image/jpeg;base64,'.base64_encode($value['picture']);
            }
            
            echo '<img src="'.$imageSrc.'" width=150 /><br>';
            echo "<h2>".htmlspecialchars($value['title'])."</h2>";
            
            if(isset($value['id'])){
                Controller::CommentsCount($value['id']);
                echo "<a href='disk?id=".(int)$value['id']."'>Edasi</a><br>";
            }
        }
    }

    public static function AllDisks($arr) {
        if (!is_array($arr)) {
            echo "<p>Игры отсутствуют</p>";
            return;
        }
        
        echo "<ul>";
        foreach($arr as $value) {
            echo "<li>".htmlspecialchars($value['title']);
            
            if (isset($value['id'])) {
                Controller::CommentsCount($value['id']);
                echo "<a href='disk?id=".(int)$value['id']."'>Edasi</a>";
            }
            
            echo "</li><br>";
        }
        echo "</ul>";
    }

    public static function ReadDisk($n) {
        if (!is_array($n)) {
            echo "<p>Игра не найдена</p>";
            return;
        }
        
        echo "<h2>".htmlspecialchars($n['title'])."</h2>";
        
        if (isset($n['id'])) {
            Controller::CommentsCountWithAncor($n['id']);
        }
        
        if (!isset($n['picture']) || empty($n['picture'])) {
            $imageSrc = 'path/to/default/image.jpg';// Укажите путь к изображению по умолчанию
        } else {
            $imageSrc = 'data:image/jpeg;base64,'.base64_encode($n['picture']);
        }
        
        echo '<br><img src="'.$imageSrc.'" width=150 /><br>';
        echo "<p>".nl2br(htmlspecialchars($n['text']))."</p>";
    }
}
?>