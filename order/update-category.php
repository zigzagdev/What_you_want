<?php include('partials/menu.php'); ?>

    <div class="main2">
        <div class="wrapper">
            <div class="inner">
                <h1>Update Category</h1>

                <br><br>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_category WHERE id=$id";
                    $rec = mysqli_query($connect, $sql);
                    $count = mysqli_num_rows($rec);

                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($rec);
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    } else {
                        $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                        header('location:' . SITEURL . 'order/manage-category.php');
                    }

                } else {
                    header('location:' . SITEURL . 'order/manage-category.php');
                }

                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Current Image:</td>
                            <td>
                                <?php
                                if ($current_image != "") {
                                    ?>
                                    <img src="../images/category/<?php echo $current_image; ?>" width="150px">
                                    <?php
                                } else {
                                    echo "<div class='error'>Image Not Added.</div>";
                                }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>New Image:</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td>Featured:</td>
                            <td>
                                <label for="featured"></label>
                                <input <?php if ($featured === "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="featured" id="featured" value="Yes"> Yes
                                <label for="nonfeatured"></label>
                                <input <?php if ($featured === "No") {
                                    echo "checked";
                                } ?> type="radio" name="featured" id="nonfeatured" value="No"> No
                            </td>
                        </tr>

                        <tr>
                            <td>Active:</td>
                            <td>
                                <label for="active"></label>
                                <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" name="active" id="active" value="Yes"> Yes
                                <label for="nonactive"></label>
                                <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" name="nonactive" id="nonactive" value="No"> No
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if (isset($_FILES['image']['name'])) {
                        $image_name = $_FILES['image']['name'];

                        if ($image_name != "") {

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../images/category/" . $image_name;
                            $upload = move_uploaded_file($source_path, $destination_path);

                            if ($upload == false) {
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                                header('location:' . SITEURL . 'order/manage-category.php');
                                die();
                            }
                            if ($current_image != "") {
                                $remove_path = "../images/category/" . $current_image;
                                $remove = unlink($remove_path);
                                if ($remove == false) {
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                    header('location:' . SITEURL . 'order/manage-category.php');
                                    die();
                                }
                            }
                        } else {
                            $image_name = $current_image;
                        }
                    } else {
                        $image_name = $current_image;
                    }
                    $sql2 = "UPDATE tbl_category SET title = '$title',image_name = '$image_name',featured = '$featured',active = '$active' WHERE id=$id ";
                    $res2 = mysqli_query($connect, $sql2);

                    if ($res2 == true) {
                        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                        header('location:/order/manage-category.php');
                    } else {
                        $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                        header('location:' . SITEURL . 'order/manage-category.php');
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php include('partials/footer.php'); ?>