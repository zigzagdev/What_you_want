<?php include('partials/menu.php'); ?>

<!--Main Section -->
<div class="main">
    <div class="wrapper">
        <h1>Manage User</h1>
        <br/>
        <?php
         if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
        if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }

        if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change-pwd']))
        {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
        }
        ?>
        <br/><br/>
       <!---button--->
       <a href="add-admin.php" class="btn-primary">Add User</a>
        <br/><br/><br/>
       <table class="tbl-full">
        <tr>
          <th>O.N</th>
          <th>Full Name</th>
           <th>User Name</th>
          <th>Actions</th>
        </tr>

        <?php
         $sql= "SELECT * FROM tbl_admin";
         $rec= mysqli_query($connect, $sql);

         if($rec==TRUE)
          {
            $count = mysqli_num_rows($rec); // Function to get all the rows in database

            $on=1;

          if($count>0)
            {
               while($rows=mysqli_fetch_assoc($rec))
                {
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
                  $password=$rows['password'];
                ?>
              <tr>
               <td><?php echo $on++; ?>. </td>
               <td><?php echo $full_name; ?></td>
               <td><?php echo $username; ?></td>
               <td>
                <a href="/order/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                <a href="/order/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                <a href="/order/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                </td>
              </tr>
               <?php
                }
             }
            else
             {
                 //
             }
          }
        ?>
       </table>
    </div>
</div>
<!--Main Section -->

<?php include('partials/footer.php') ?>