<?php include('partials/menu.php'); ?>

    <div class="main">
        <div class="wrapper">
            <h1>Add Food</h1>
            <br/><br/>


            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl-30">

                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="write title food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description" cols="30" rows="5"
                                      placeholder="Description its feature."></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $rec = mysqli_query($connect, $sql);
                                $count = mysqli_num_rows($rec);
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_assoc($rec)) {
                                        /*/ get category data /*/
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add food" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if (isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }
                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }
                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "") {
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food" . $image_name;
                        $upload = move_uploaded_file($src, $dst);
                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:/order/add-food.php');
                            die();
                        }
                    }
                } else {
                    $image_name = "";
                }
                $sql2 = "INSERT INTO tbl_food SET title = '$title',description = '$description',price = $price,image_name = '$image_name',
             category_id = $category,featured = '$featured',active = '$active'";
                $rec2 = mysqli_query($connect, $sql2);
                if ($rec2 == true) {
                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:/order/manage-food.php');
                    exit();
                } else {
                    $_SESSION['add'] = "<div class='error'>Error in Food Add .</div>";
                    header('location:/order/manage-food.php');
                    exit();
                }
            }
            ?>
        </div>
    </div>

<?php include('partials/footer.php') ?>