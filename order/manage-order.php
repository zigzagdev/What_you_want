<?php include('partials/menu.php'); ?>

    <!--Main Section -->
    <div class="main">
        <div class="wrapper">
            <h1>Manage Order</h1>
         <br/><br/><br/>

     <?php
        if(isset($_SESSION['update']))
         {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
         }
     ?>
       <br/><br/>

        <table class="tbl-full">
         <tr>
          <th>S.N.</th>
          <th>Food</th>
          <th>Price</th>
          <th>Quantity.</th>
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
         $sql = "SELECT * FROM tbl_orders";
         $rec=mysqli_query($connect,$sql);
         $count=mysqli_num_rows($rec);

         $fo=1;
        if($count>0)
         {
           while($row=mysqli_fetch_assoc($rec))
            {
              $id = $row['id'];
              $food = $row['food'];
              $price = $row['price'];
              $quantity = $row['quantity'];
              $total = $row['total'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
              $customer_address = $row['customer_address'];
              $order_date = $row['order_date'];
      ?>
        <tr>
          <td><?php echo $sn++; ?>.</td>
          <td><?php echo $food; ?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo $quantity; ?></td>
          <td><?php echo $total; ?></td>
          <td><?php echo $order_date; ?></td>

          <td>
           <?php
             if($status=="Ordered")
              {
                echo "<label>$status</label>";
              }
             if($status=="On delivered")
              {
                echo "<label style='color: orchid'>$status</label>";
              }
             if($status=="Delivered")
              {
                echo "<label style='color: lawngreen'>$status</label>";
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
           <a href="order/update-orders.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
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
        </div>
    </div>
    <!--Main Section -->
<?php include('partials/footer.php') ?>