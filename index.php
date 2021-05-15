<?php include('partials-front/menu.php'); ?>

    <section class="food-search text-center">
        <div class="container">

            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Foods.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>


  <?php
    if(isset($_SESSION['order']))
     {
       echo $_SESSION['order'];
       unset($_SESSION['order']);
     }
  ?>


    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

   <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
            $rec = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($rec);

         if($count>0)
           {
            while($row=mysqli_fetch_assoc($rec))
                {
                 $id = $row['id'];
                 $title = $row['title'];
                 $image_name = $row['image_name'];
   ?>

         <a href="category-foods.php?category_id=<?php echo $id; ?>">
          <br/><br/>
       <div class="box-3 float-container" >
   <?php
         if($image_name=="")
          {
            echo "<div class='error'>Image not Available</div>";
          }
         else
          {
   ?>
         <img src="/images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
   <?php
          }
   ?>
         <h3 class="float-text text-white"><?php echo $title; ?></h3>
          </div>
         </a>
   <?php
                }
            }
          else
            {
              echo "<div class='error'>Category not Added.</div>";
            }
   ?>

     <div class="clearfix"></div>
     </div>
    </section>


    <section class="food-menu">
     <div class="container">
      <h2 class="text-center">Food Menu</h2>
  <?php
          $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 8";
          $rec2 = mysqli_query($connect, $sql2);
          $count2 = mysqli_num_rows($rec2);
        if($count2>0)
         {
           while($row=mysqli_fetch_assoc($rec2))
            {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
  ?>

         <div class="food-menu-box">
           <div class="food-menu-img">
   <?php
       if($image_name=="")
        {
         echo "<div class='error'>Image not available.</div>";
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
             <p class="food-price">￥<?php echo $price; ?></p>
             <p class="food-detail">
               <?php echo $description; ?>
             </p>
         <br>
            <a href="/order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
         </div>
        </div>
   <?php
         }
        }
       else
        {
          echo "<div class='error'>Food not available.</div>";
        }
   ?>

     <div class="clearfix"></div>

    </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>

<?php include('partials-front/footer.php'); ?>