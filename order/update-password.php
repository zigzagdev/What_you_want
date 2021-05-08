<?php include ('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
   <h1>Change Passeword</h1>
    <br/><br/>
 <?php
   if(isset($_GET['id']))
    {
      $id=$_GET['id'];
    }
  ?>
  <form action="" method="post">
   <table class="tbl-30">
    <tr>
     <td>Old password :</td>
     <td>
       <input type="password" name="oldpassword" placeholder="old password" >
     </td>
    </tr>
    <tr>
     <td>New Password :</td>
      <td>
       <input type="password" name="newpassword" placeholder="new password">
      </td>
    </tr>
    <tr>
     <td>Confirm Password :</td>
      <td>
        <input type="password" name="confirmpassword" placeholder="confirm password">
      </td>
    </tr>
     <tr>
      <td colspan="2">
       <input type="hidden" name="id" value="<?php echo  $id ?>">
       <input type="submit" name="submit" value="Change password" class="btn-secondary">
      </td>
     </tr>
   </table>


  </form>






  </div>
</div>
<?php include ('partials/footer.php'); ?>
