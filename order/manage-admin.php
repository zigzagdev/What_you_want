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

        <tr>
         <td>1.</td>
         <td>Matthew</td>
         <td>Matt</td>
         <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
         </td>
        </tr>
        <tr>
         <td>2.</td>
         <td>Matthew</td>
         <td>Matt</td>
          <td>
           <a href="#" class="btn-secondary">Update Admin</a>
           <a href="#" class="btn-danger">Delete Admin</a>
          </td>
        </tr>
        <tr>
         <td>3.</td>
         <td>Matthew</td>
         <td>Matt</td>
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