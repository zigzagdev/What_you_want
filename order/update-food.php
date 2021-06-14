<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql2="SELECT * FROM tbl_food WHERE id=$id";
    $rec2 = mysqli_query($connect, $sql2);
    $row2=mysqli_fetch_assoc($rec2);

    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
}
else
{
    header('location:order/manage-food.php');
}
?>
<div class="main2">
    <div class="wrapper">
        <div class="inner">
            <h1 class="text-azure">Update Food</h1>
            <br/><br/>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td >Description: </td>
                        <td>
                            <textarea name="description" cols="30" rows="6" ><?php echo $description; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="text" name="price" value="<?php echo $price; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php
                            if($current_image == "")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="../images/food/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Select New Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <?php
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                $rec=mysqli_query($connect,$sql);
                                $count=mysqli_num_rows($rec);
                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($rec))
                                    {
                                        /*/ get category data /*/
                                        $category_title=$row['title'];
                                        $category_id=$row['id'];
                                        ?>
                                        <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title;?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Chosen</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php

            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {

                        $source_path2 = $_FILES['image']['tmp_name'];
                        $destination_path2 = "../images/food/".$image_name;
                        $upload = move_uploaded_file($source_path2, $destination_path2);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            header('location:order/manage-food.php');
                            die();
                        }
                        if($current_image!="")
                        {
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                header('location:'.SITEURL.'order/manage-food.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql3= "UPDATE tbl_food SET title = '$title',description = '$description',price = $price,image_name = '$image_name',
                    category_id = '$category',featured = '$featured',active = '$active' WHERE id=$id ";
                $rec3= mysqli_query($connect,$sql3);
                if($rec3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                    header('location:/order/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                    header('location:order/manage-food.php');
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include('partials/footer.php'); ?>

