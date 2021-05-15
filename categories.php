<?php include('partials-front/menu.php') ?>

  <section class="categories">
   <div class="container">
    <h2 class="text-center">Explore Foods Categories.</h2>
 <?php
   $sql="SELECT * FROM tbl_category WHERE active='Yes'";
   $rec=mysqli_query($connect,$sql);
   $count=mysqli_num_rows($rec);

   if($count>0)
    {
      while($row=mysqli_fetch_assoc($rec))
       {
         $id=$row['id'];
         $title=$row['title'];
         $image_name=$row['image_name'];
 ?>　　　
      <a href="/category-foods.php?category_id=<?php echo $id; ?>">
     <div class="box-3 float-container">
      <?php
        if($image_name=="")
         {
           echo "<div class='error'>Image not found.</div>";
         }
        else
         {
      ?>
         <img src="../images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
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
      echo "<div class='error'>Category not found.</div>";
    }
 ?>
       <div class="clearfix"></div>
   </div>
  </section>

<?php include('partials-front/footer.php')  ;?>
