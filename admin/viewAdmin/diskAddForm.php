<?php ob_start(); ?>
<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>Disk Add</h2>
        <?php
        if (isset($result)) {
            if ($result == true) {

        ?>
                <div class="alert-info">
                    <strong>Success </strong><a href="diskAdmin"> Return to Disks</a>

                </div>
            <?php
            } else if ($result == false) {
            ?>
                <div class="alert-warning">
                    <strong>Error</strong><a href="diskAdmin"> Return to Disks</a>

                    <?= $_SESSION["error"] ?>
                </div>
            <?php
            }
        } else {
            ?>



            <form method="POST" action="diskAddResult" enctype="multipart/form-data">
                <table class="table-bordered">
                    <tr>
                        <td>Disk title</td>
                        <td><input type='text' name='title' class='form-control' required></td>
                    </tr>
                    <tr>
                        <td>Disk description</td>
                        <td><textarea rows="5" name="description" class='form-control' required></textarea></td>
                    </tr>
                    <tr>
                        <td>Disk price</td>
                        <td><input type="number" rows="5" name="price" class='form-control'></input></td>
                    </tr>
                    <tr>
                        <td>Release year</td>
                        <td><input type="number" rows="5" name="year" class='form-control'></input></td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td>
                            <select name="idGenre[]" multiple class="form-control">
                                <?php
                                foreach ($arr as $row) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!-- image-->
                    <tr>
                        <td>Pictures</td>
                        <td>
                            <div>
                                <input type=file name="picture" style="color:black;">
                            </div>
                        </td>
                    </tr>
                    <!-- end image-->
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn-primary" name="save">
                                <span class="glyphicon-plus"></span> Create </button>
                            <a href="diskAdmin" class="btn-large btn-success">
                                <i class="glyphicon-backward"></i> &nbsp;Cancel
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
