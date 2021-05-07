<?php include('partials/menu.php'); ?>

<!--Main Section -->
<div class="main">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br/>
        <?php
         if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
        ?>
        <br/><br/>
       <!---button--->
       <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br/><br/><br/>
       <table class="tbl-full">
        <tr>
          <th>M.O</th>
          <th>Full Name</th>
           <th>User Name</th>
          <th>Actions</th>
        </tr>

        <?php
         $sql= "SELECT * FROM tbl_admin";
         $rec= mysqli_query($connect, $sql);

         if($rec==TRUE)
          {
            $rows= mysqli_num_rows($rec);

            if($rows>0)
             {
               while($rows=mysqli_fetch_assoc($rec))
                {
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
                  $password=$rows['password'];
                ?>
              <tr>
               <td><?php echo $id++; ?>. </td>
               <td><?php echo $full_name; ?></td>
               <td><?php echo $username; ?></td>
               <td>
                <a href="#" class="btn-secondary">Update Admin</a>
                <a href="#" class="btn-danger">Delete Admin</a>
                </td>
              </tr>

               <?php
                }
             }
            else
             {

             }
          }
        ?>

       </table>
    </div>
</div>
<!--Main Section -->

<?php include('partials/footer.php') ?>