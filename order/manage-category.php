<?php include('partials/menu.php'); ?>

    <!--Main Section -->
    <div class="main">
        <div class="wrapper">
            <h1>Manage Category</h1>
         <br/><br/>
       <?php
         if(isset($_SESSION['add']))
            {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            }

         if(isset($_SESSION['upload']))
            {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
            }
       ?>
       <br><br>
        <a href="<?php echo SITEURL; ?>/add-category.php" class="btn-primary">Add Category</a>

        <table class="tbl-full">
          <tr>
           <th>F.L</th>
           <th>Full Name</th>
           <th>UserName</th>
           <th>Featured</th>
           <th>Actions</th>
          </tr>
       <?php
         $sql="SELECT * FROM tbl_category";
         $rec=mysqli_query($connect,$sql);
         $count=mysqli_num_rows($rec);

         $FL=1;

          if($count>0)
           {
               /*/ get the data and display cord/*/
              while($row=mysqli_fetch_assoc($rec))
               {
                $id=         $row['id'];
                $title=      $row['title'];
                $image_name= $row['image_name'];
                $featured  = $row['featured'];
                $actice    = $row['active'];
               }
           }
          else
           {

           }
        ?>
          <tr>
           <td><?php echo $FL++; ?>.</td>
           <td><?php echo $title++; ?>.</td>
           <td>
            <?php
             if($image_name!="")
                 {
             ?>
                <img src="../images/category/<?php echo $image_name; ?>"width="100px" >
            <?php
                 }
             else
                 {
                echo "<div class='error'>Image not Added.</div>";
                 }
             ?>
           </td>
           <td><?php echo $featured ?></td>
           <td><?php echo $actice ?></td>
            <td>
             <a href="#" class="btn-secondary">Update Admin</a>
             <a href="#" class="btn-danger">Delete Admin</a>
            </td>
          </tr>

         </table>

        </div>
    </div>
    <!--Main Section -->
<?php include('partials/footer.php') ?>