<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Disk Edit</h2>

        <?php
        if (isset($test)) {
            if ($test == true) {
        ?>
                <div class="alert alert-info">
                    <strong>Записи изменены.</strong> <a href="diskAdmin">Список новостей</a>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи!</strong> <a href="diskAdmin">Список новостей</a>
                </div>
            <?php
            }
        } else {
            ?>

            <form method="POST" action="diskEditResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tr>
                        <td>Disk title</td>
                        <td><input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($detail['title']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Disk description</td>
                        <td><textarea rows="5" name="description" class="form-control" required><?php echo htmlspecialchars($detail['description']); ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>
                            <select multiple name="idGenre[]" class="form-control">
                                <?php
                                $genres = modelAdminGenre::getGenresByDisk($detail["id"]);
                                function toName($r)
                                {
                                    return $r["name"];
                                }
                                $genres_name = array_map("toName", $genres);

                                foreach ($arr as $row) {
                                    $selected = in_array($row["name"], $genres_name) ? "selected" : "";
                                    echo '<option value="' . $row['id'] . '"';
                                    echo $selected;
                                    echo '>' . htmlspecialchars($row['name']) . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input value=<?= $detail["price"] ?> multiple name="price" class="form-control" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>Release year</td>
                        <td>
                            <input value=<?= $detail["release_year"] ?> multiple name="year" class="form-control" type="number" />
                        </td>
                    </tr>
                    <tr>
                        <td>Old Picture</td>
                        <td>
                            <?php if (!empty($detail['image_url'])): ?>
                                <img src="<?= $detail["image_url"] ?>" width="150" />
                            <?php else: ?>
                                <p>No image available</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New Picture</td>
                        <td><input type="file" name="picture" style="color:black;"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="save">
                                <span class="glyphicon glyphicon-plus"></span> Изменить
                            </button>
                            <a href="diskAdmin" class="btn btn-large btn-success">
                                <i class="glyphicon glyphicon-backward"></i> &nbsp;Назад к списку
                            </a>
                        </td>
                    </tr>
                </table>
            </form>

        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>
