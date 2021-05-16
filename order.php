<?php include('partials-front/menu.php') ?>

<?php
 if(isset($_GET['food_id']))
  {
    $food_id=$_GET['food_id'];
      $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
      $rec = mysqli_query($connect, $sql);
      $count = mysqli_num_rows($rec);

   if($count==1)
    {
     $row=mysqli_fetch_assoc($rec);   //Get the Data from Database
     $title=$row['title'];
     $price=$row['price'];
     $image_name=$row['image_name'];
    }
   else
    {
      header('location:'.SITEURL.'/index.php');
    }
  }
 else
  {
      header('location:'.SITEURL.'/index.php');
  }

?>

<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
    <form action="" method="POST" class="order">
     <fieldset>
      <legend class="text-white">Selected Food</legend>
         <div class="food-menu-img">
 <?php
    if($image_name=="")
     {
       echo "<div class='error'>Image not Available.</div>";
     }
    else
     {
 ?>
     <img src="/images/food/<?php echo $image_name ?>" alt="" class="img-responsive img-curve">
 <?php
     }
?>
  </div>

     <div class="food-menu-desc">
       <h3 class="text-white"><?php echo $title; ?></h3>
        <input type="hidden" name="food"  value="<?php echo $title; ?>">
      <p class="food-price text-white" >¥<?php echo $price; ?></p>
        <input type="hidden" name="price" value="<?php echo $price; ?>">
     <div class="order-label text-azure">Quantity</div>
        <input type="number" name="quantity" class="input-responsive" value="1" required>
     </div>
    </fieldset>

    <fieldset>
     <legend class="text-white">Delivery Details</legend>
      <div class="order-label text-white" >Full Name</div>
       <input type="text" name="full-name" placeholder="Test Test" class="input-responsive" required>
      <div class="order-label text-white">Phone Number</div>
       <input type="tel" name="contact" placeholder="090-1234-1234" class="input-responsive" required>
      <div class="order-label text-white">Email</div>
        <input type="email" name="email" placeholder="1234aa@test.com" class="input-responsive" required>
      <div class="order-label text-white">Address</div>
        <textarea name="address" rows="5 " class="input-responsive" required></textarea>
        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
    </fieldset>
   </form>


  <?php   //CHeck whether submit button is clicked or not

    if(isset($_POST['submit']))
     {
         $food = $_POST['food'];
         $price = $_POST['price'];
         $quantity = $_POST['quantity'];

         $total = $price * $quantity;

         $order_date = date("Y/m/d H:i:s");

         $status = "Ordered";

         $customer_name = $_POST['full-name'];
         $customer_contact = $_POST['contact'];
         $customer_contact_boolean="/\A[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}\z/";
         if(!preg_match($customer_contact_boolean,$customer_contact))
         {
             print $customer_contact.'is not correct!';
         }
         $customer_email = $_POST['email'];
         $contents_mail='/¥A\w\-\.]+¥@[\w\-\.]+.([a-z]+)\z/';
         if(preg_match($contents_mail,$customer_email))
          {
             print 'write down your email correctly ! ';
          }
         else
          {
              //
          }
         $customer_address = $_POST['address'];


         $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = '$price',
                        quantity = '$quantity',
                        total = '$total',
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";

     $rec2=mysqli_query($connect,$sql2) or die(mysqli_error($connect));

      if($rec2==true)
       {
         $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
         header('location:'.SITEURL.'/index.php');
       }
      else
       {
         $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
         header('location:'.SITEURL.'/index.php');
       }
     }
  ?>

     <div class="order-button" style="text-align: center;">
      <a href="categories.php" class="btn btn-primary"  >Move to Categories</a>
      <a href="foods.php" class="btn btn-primary">Move to Foods</a>
     </div>

    </div>
   </section>
<?php include('partials-front/footer.php'); ?>

