<?php include('partials/menu.php'); ?>

    <!--Main Section -->
  <div class="main">
   <div class="wrapper">
    <div class="inner">
     <h1>Manage Order</h1>
         <br/><br/><br/>

     <?php
        if(isset($_SESSION['update']))
         {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
         }
     ?>

     <table class="tbl-full">
      <tr>
       <th>O.N</th>
       <th>Food</th>
       <th>Price</th>
       <th>Quantity</th>
       <th>Total</th>
       <th>Order Date</th>
       <th>Status</th>
       <th>Customer Name</th>
       <th>Contact</th>
       <th>Email</th>
       <th>Address</th>
       <th>Actions</th>
      </tr>

  <?php
         $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
         $rec=mysqli_query($connect,$sql);
         $count=mysqli_num_rows($rec);

         $on=1;
        if($count>0)
         {
           while($row=mysqli_fetch_assoc($rec))
            {
              $id = $row['id'];
              $food = $row['food'];
              $price = $row['price'];
              $quantity = $row['quantity'];
              $total = $row['total'];
              $order_date = $row['order_date'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
              $customer_address = $row['customer_address'];

    ?>
        <tr>
          <td><?php echo $on++; ?>.</td>
          <td><?php echo $food; ?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo $quantity; ?></td>
          <td><?php echo $total; ?></td>
          <td><?php echo $order_date; ?></td>

          <td>
           <?php
             if($status=="Ordered")
              {
                echo "<label style='color: #ed969e'>$status</label>";
              }
             if($status=="On delivery")
              {
                echo "<label style='color: azure'>$status</label>";
              }
             if($status=="Delivered")
              {
                echo "<label style='color: yellow'>$status</label>";
              }
             if($status=="Cancelled")
              {
                echo "<label style='color: slateblue'>$status</label>";
              }
           ?>
          </td>
          <td><?php echo $customer_name; ?></td>
          <td><?php echo $customer_contact; ?></td>
          <td><?php echo $customer_email; ?></td>
          <td><?php echo $customer_address; ?></td>
          <td>
           <a href="update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
          </td>
         </tr>

      <?php
          }
      }
      else
       {
        echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
       }
      ?>
     </table>
     </div>
   </div>
  </div>
    <!--Main Section -->
<?php include('partials/footer.php') ?>