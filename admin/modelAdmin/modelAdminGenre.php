<?php
class modelAdminGenre{

public static function getGenreList() {
    
    return array_merge(Genres::getAllGenres('ee'), Genres::getAllGenres('ru'));
    }
    public static function getGenresByDisk($id) {
        $db = new Database();

        return $db->getAll("
                SELECT g.*
                FROM genres g
                JOIN disk_genres dg ON g.id = dg.genre_id
            WHERE dg.disk_id = ?;           
            ", [$id]);
    }
}
?>
