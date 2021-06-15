<?php include('partials-front/menu.php'); ?>

<?php
if(isset($_GET['category_id']))
{
    $category_id=$_GET['category_id'];

    $sql="SELECT title FROM tbl_category WHERE id=$category_id";
    $rec=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($rec);
    $category_title=$row['title'];
}
else
{
    header('location:'.SITEURL.'/index.php');
}
?>

    <section class="food-search text-center">
        <div class="container">
            <h2 class="text-white">Foods on<a href="" class="text-white">"<?php echo $category_title; ?>"</a></h2>
        </div>
    </section>


    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql2="SELECT * FROM tbl_food WHERE category_id=$category_id && active='Yes'&& featured='Yes'";
            $rec2=mysqli_query($connect, $sql2);
            $count2=mysqli_num_rows($rec2);
            if($count2>0)
            {
                while($row2=mysqli_fetch_assoc($rec2))
                {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="/images/food/<?php echo $image_name ;?>" alt="" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">￥<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description ; ?>
                            </p>
                            <br>
                            <a href="/customer/order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Food is not available</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>