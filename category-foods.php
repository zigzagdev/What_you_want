<?php include('partials-front/menu.php'); ?>

<?php
 if(isset($_GET['category_id']))
  {
   $category_id=$_GET['category_id'];

   $sql="SELECT title FROM tbl_category WHERE id=$category_id";
   $rec=mysqli_query($connect,$sql);
   $row=mysqli_num_rows($rec);
   $category_title=$row['title'];
  }
 else
  {
   header('location:'.SITEURL.'/index.php');
  }
?>

  <section class="food-search text-center">
    <div class="container">
   <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>
    </div>
  </section>

 <section class="food-menu">
  <div class="container">
   <h2 class="text-center">Food Menu</h2>
<?php
  $sql2="SELECT * FROM tbl_food WHERE category_id=$category_id";
  $rec2=mysqli_query($connect, $sql2);
  $count2=mysqli_num_rows($rec2);
 if($count2>0)
  {
    while($row2=mysqli_num_rows($rec2))
     {

     }
  }

?>
  </div>
 </section>