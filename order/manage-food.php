<?php include('partials/menu.php'); ?>

<!--Main Section -->
<div class="main">
    <div class="wrapper">
        <h1>Manage Food</h1>
    <br/><br/>

   <a href="/order/add-food.php" class="btn-primary">Add food</a>
   <br/> <br/><br/>

   <?php
     if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

   ?>

      <table class="tbl-full">
       <tr>
           <th>F.O.</th>
           <th>Title</th>
           <th>Price</th>
           <th>Image</th>
           <th>Featured</th>
           <th>Active</th>
           <th>Actions</th>
       </tr>
  <?php
      $sql = "SELECT * FROM tbl_food";
      $rec=mysqli_query($connect,$sql);
      $count=mysqli_num_rows($rec);
      $fo=1;
     if($count>0)
      {
        while($row=mysqli_fetch_assoc($rec))
         {
           $id = $row['id'];
           $title = $row['title'];
           $price = $row['price'];
           $image_name = $row['image_name'];
           $featured = $row['featured'];
           $active = $row['active'];

      ?>
      <tr>
       <td><?php echo $fo++; ?>. </td>
       <td><?php echo $title; ?></td>
       <td>￥<?php echo $price; ?></td>
       <td>
        <?php
          if($image_name=="")
           {
             echo "<div class='error'>Image not Added.</div>";
           }
          else
           {
        ?>
             <img src="../images/food/<?php echo $image_name; ?>" width="100px">
        <?php
           }
        ?>
       </td>
          <td><?php echo $featured; ?></td>
          <td><?php echo $active; ?></td>
         <td>
          <a href="/order/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
          <a href="/order/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">DeleteFood</a>
         </td>
      </tr>
      <?php
         }
      }
      else
       {
         echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
       }
     ?>
      </table>

    </div>
</div>
<!--Main Section -->
<?php include('partials/footer.php') ?>
