<?php include('partials-front/menu.php'); ?>


    <section class="food-search text-center">
        <div class="container">

            <form action="/customer/food-search.php" method="POST">
                <label for="search"></label>
                　<input type="search" name="search" id="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'&& featured='Yes'";
            $rec=mysqli_query($connect, $sql);
            $count = mysqli_num_rows($rec);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($rec))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
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
                                <img src="/images/food/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                            　　</div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">¥<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
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
                echo "<div class='error'>Food not found.</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>