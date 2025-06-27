<?php ob_start();
?>
<h2>Disk List </h2>

<div class="container" style="min-height:400px;">
    <div style="margin:20px;">
        <a class="btn" href="diskAdd" role="button">Add new disk</a>
    </div>
    <div class="col-md-11">
        <table id="comment" class="table-responsive">
            <tr>
                <th width="10%">ID</th>
                <th width="70%">Game Title/Genre</th>
                <th width="auto">Price</th>
                <th width="auto"></th>
            </tr>

            <?php
            foreach ($arr as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td> ';
                echo '<td><b>Title:</b> ' . $row['title'] . '<br>';
                $genres = modelAdminGenre::getGenresByDisk($row["id"]);

                echo '<b>Genre: </b><i>';
                if (!empty($genres)) {

                    foreach ($genres as $genre) {
                        echo $genre["name"] . " ";
                    }
                    echo '</i>';
                } else {
                    echo "-";
                }
                echo '<td><b>' . ($row['price'] ? $row['price'] : '-') . '</b></td>';
                echo '</td>';
                echo '<td>
                        <a href="diskEdit?id=' . $row['id'] . '">Edit <span class="glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="diskDel?id=' . $row['id'] . '">Delete <span class="glyphicon-remove" aria-hidden="true"></span></a>
                    </td> ';
                echo '</tr>';
            }

            ?>
        </table>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php include "viewAdmin/templates/layout.php"; ?>
