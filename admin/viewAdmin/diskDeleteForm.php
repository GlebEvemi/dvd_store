<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Удаление новости</h2>
        
        <?php if(isset($result)): ?>
            <?php if($result === true): ?>
                <div class="alert alert-info">
                    <strong>Запись успешно удалена.</strong>
                    <a href="diskAdmin" class="alert-link">Вернуться к списку диско</a>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">
                    <strong>Ошибка при удалении записи!</strong>
                    <a href="diskAdmin" class="alert-link">Вернуться к списку дисков</a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-danger">
                <strong>Внимание!</strong> Are you sure you want to delete the game? 
            </div>
            
            <form method="POST" action="diskDelResult?id=<?php echo htmlspecialchars($id); ?>">
                <table class="table table-bordered">
                    <tr>
                        <td>Заголовок новости</td>
                        <td>
                            <input type="text" name="title" class="form-control" 
                                   value="<?php echo htmlspecialchars($detail['title']); ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Текст новости</td>
                        <td>
                            <textarea rows="5" name="description" class="form-control" readonly>
                                <?php echo htmlspecialchars($detail['description']); ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td>
                            <select name="idCategory" multiple class="form-control" disabled>
                                <?php foreach($arr as $row): ?>
                                    <option value="<?php echo $row['id']; ?>"
                                        <?php if($row['id'] == $detail['category_id']) echo ' selected'; ?>>
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Изображение</td>
                        <td>
                            <?php if(!empty($detail['image_url'])): ?>
                                <img src="<?= $detail["image_url"]; ?>" 
                                     width="150" alt="Изображение диска">
                            <?php else: ?>
                                <span class="text-muted">Изображение отсутствует</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-danger" name="delete">
                                <span class="glyphicon glyphicon-trash"></span> Подтвердить удаление
                            </button>
                            <a href="diskAdmin" class="btn btn-success">
                                <span class="glyphicon glyphicon-arrow-left"></span> Отмена
                            </a>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="confirm_delete" value="1">
            </form>
        <?php endif; ?>
    </div>
</div>
<?php 
$content = ob_get_clean(); 
include "viewAdmin/templates/layout.php"; 
?>
