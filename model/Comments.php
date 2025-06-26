<?php
class Comments
{
    public static function insertComment($comment, $diskId)
    {
        $db = new Database();
        $query = "INSERT INTO `comments` (`disk_id`, `comment`, `created_at`) 
              VALUES (?, ?, CURRENT_TIMESTAMP)";

        try {
            return $db->executeRun($query, [$diskId, $comment]);
        } catch (PDOException $e) {
            error_log("Ошибка при добавлении комментария: " . $e->getMessage());
            return false;
        }

        // Добавляем комментарий
        $query = "INSERT INTO `comments` (`disk_id`, `comment`, `created_at`) 
              VALUES (?, ?, CURRENT_TIMESTAMP)";
        return $db->executeRun($query, [$diskId, $comment]);
    }


    public static function getCommentByDiskID($id)
    {
        $query = "SELECT * FROM comments WHERE disk_id=? ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query, [$id]);
        return $arr;
    }

    public static function getCommentsCountByDiskID($id)
    {
        $query = "SELECT count(id) as 'count' FROM comments WHERE disk_id=" . (string)$id;
        $db = new Database();
        $c = $db->getOne($query);
        return $c;
    }
}

